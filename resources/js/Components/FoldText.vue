<template>
  <span ref="rootRef" :class="['fold-text', className]">
    <span class="fold-text-sr-only">{{ text }}</span>
    <span class="fold-text-visual" aria-hidden="true">
      <template v-for="token in tokens" :key="token.key">
        <br v-if="token.type === 'br'" />

        <span v-else-if="token.type === 'whitespace'" class="fold-text-whitespace">{{ token.content }}</span>

        <span
          v-else-if="token.type === 'line'"
          class="fold-text-line"
        >
          <span
            class="fold-text-segment"
            data-fold-split="line"
            :style="{ '--fold-perspective': perspectivePx }"
          >
            <span class="fold-text-piece" :data-fold-hinge="hinge" :style="pieceStyle">{{ token.content }}</span>
          </span>
        </span>

        <span
          v-else
          class="fold-text-segment"
          :style="{ '--fold-perspective': perspectivePx }"
        >
          <span class="fold-text-piece" :data-fold-hinge="hinge" :style="pieceStyle">{{ token.content }}</span>
        </span>
      </template>
    </span>
  </span>
</template>

<script setup>
/**
 * Vue port of React Bits' <FoldText /> — same 3D "fold panels into place"
 * animation, driven by GSAP + ScrollTrigger, adapted to Vue's Composition API
 * since the source component was written for React/JSX.
 *
 * Requires: npm install gsap
 */
import { ref, computed, onMounted, onBeforeUnmount, watch, nextTick } from 'vue'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

gsap.registerPlugin(ScrollTrigger)

const props = defineProps({
  text: { type: String, default: 'Design unfolds' },
  splitBy: { type: String, default: 'char' }, // 'char' | 'word' | 'line'
  hinge: { type: String, default: 'top' }, // 'top' | 'bottom' | 'left' | 'right'
  duration: { type: Number, default: 0.65 },
  stagger: { type: Number, default: 0.045 },
  ease: { type: String, default: 'power3.out' },
  perspective: { type: Number, default: 700 },
  creaseShading: { type: Number, default: 0.55 },
  trigger: { type: String, default: 'mount' }, // 'mount' | 'hover' | 'scroll' | 'loop'
  className: { type: String, default: '' },
})

const HINGE_CONFIG = {
  top: { origin: '50% 0%', rotateX: -92, rotateY: 0 },
  bottom: { origin: '50% 100%', rotateX: 92, rotateY: 0 },
  left: { origin: '0% 50%', rotateX: 0, rotateY: 92 },
  right: { origin: '100% 50%', rotateX: 0, rotateY: -92 },
}

const clamp = (value, min, max) => Math.min(max, Math.max(min, value))

const rootRef = ref(null)
let timeline = null
let scrollTriggerInstance = null
let hoverHandler = null

const hingeConfig = computed(() => HINGE_CONFIG[props.hinge] || HINGE_CONFIG.top)
const safeCrease = computed(() => clamp(props.creaseShading, 0, 1))
const safePerspective = computed(() => Math.max(120, props.perspective))
const perspectivePx = computed(() => `${safePerspective.value}px`)

const pieceStyle = computed(() => ({
  transformOrigin: hingeConfig.value.origin,
  '--fold-crease': 0,
}))

// Flatten the text into render tokens (segment / whitespace / line-break / line-block)
const tokens = computed(() => {
  let segIndex = 0
  const nextKey = (prefix) => `${prefix}-${segIndex++}`

  if (props.splitBy === 'line') {
    return props.text.split('\n').map((line, i) => ({
      type: 'line',
      content: line || '\u00A0',
      key: `line-${i}`,
    }))
  }

  if (props.splitBy === 'word') {
    const out = []
    props.text.split(/(\s+)/).forEach((part, i) => {
      if (!part) return
      if (/^\s+$/.test(part)) {
        part.split(/(\n)/).forEach((p, j) => {
          if (p === '\n') out.push({ type: 'br', key: `br-${i}-${j}` })
          else if (p) out.push({ type: 'whitespace', content: p.replace(/ /g, '\u00A0'), key: `ws-${i}-${j}` })
        })
        return
      }
      out.push({ type: 'segment', content: part, key: nextKey('word') })
    })
    return out
  }

  // 'char' (default)
  const out = []
  Array.from(props.text).forEach((char, i) => {
    if (char === '\n') {
      out.push({ type: 'br', key: `br-${i}` })
    } else {
      out.push({ type: 'segment', content: char === ' ' ? '\u00A0' : char, key: nextKey('char') })
    }
  })
  return out
})

function getPieces() {
  if (!rootRef.value) return []
  return Array.from(rootRef.value.querySelectorAll('.fold-text-piece'))
}

function killTimeline(pieces) {
  timeline?.kill()
  timeline = null
  if (pieces?.length) gsap.killTweensOf(pieces)
}

function play(repeat, pieces) {
  killTimeline(pieces)

  const reduceMotion = window.matchMedia?.('(prefers-reduced-motion: reduce)').matches
  const activeDuration = reduceMotion ? Math.min(props.duration, 0.22) : props.duration
  const activeStagger = reduceMotion ? Math.min(props.stagger, 0.02) : props.stagger

  const fromVars = {
    opacity: 0,
    rotateX: reduceMotion ? 0 : hingeConfig.value.rotateX,
    rotateY: reduceMotion ? 0 : hingeConfig.value.rotateY,
    '--fold-crease': reduceMotion ? 0 : safeCrease.value,
    transformOrigin: hingeConfig.value.origin,
    force3D: true,
  }
  const toVars = {
    opacity: 1,
    rotateX: 0,
    rotateY: 0,
    '--fold-crease': 0,
    duration: activeDuration,
    ease: reduceMotion ? 'power1.out' : props.ease,
    stagger: activeStagger,
    clearProps: 'willChange',
  }

  timeline = gsap.timeline({ repeat: repeat ? -1 : 0, repeatDelay: repeat ? 0.75 : 0 })
  timeline.fromTo(pieces, fromVars, toVars)
  return timeline
}

function setupAnimation() {
  const root = rootRef.value
  if (!root) return
  const pieces = getPieces()
  if (!pieces.length) return

  const reduceMotion = window.matchMedia?.('(prefers-reduced-motion: reduce)').matches
  const fromVars = {
    opacity: 0,
    rotateX: reduceMotion ? 0 : hingeConfig.value.rotateX,
    rotateY: reduceMotion ? 0 : hingeConfig.value.rotateY,
    '--fold-crease': reduceMotion ? 0 : safeCrease.value,
    transformOrigin: hingeConfig.value.origin,
  }

  if (props.trigger === 'hover') {
    gsap.set(pieces, { opacity: 1, rotateX: 0, rotateY: 0, '--fold-crease': 0, transformOrigin: hingeConfig.value.origin })
    hoverHandler = () => play(false, pieces)
    root.addEventListener('mouseenter', hoverHandler)
  } else if (props.trigger === 'scroll') {
    gsap.set(pieces, fromVars)
    scrollTriggerInstance = ScrollTrigger.create({
      trigger: root,
      start: 'top 82%',
      once: true,
      onEnter: () => play(false, pieces),
    })
  } else if (props.trigger === 'loop') {
    play(true, pieces)
  } else {
    play(false, pieces)
  }
}

function teardownAnimation() {
  const root = rootRef.value
  if (hoverHandler && root) root.removeEventListener('mouseenter', hoverHandler)
  hoverHandler = null
  scrollTriggerInstance?.kill()
  scrollTriggerInstance = null
  killTimeline(getPieces())
}

onMounted(() => {
  nextTick(setupAnimation)
})

onBeforeUnmount(() => {
  teardownAnimation()
})

watch(
  () => [
    props.text,
    props.splitBy,
    props.hinge,
    props.duration,
    props.stagger,
    props.ease,
    props.perspective,
    props.creaseShading,
    props.trigger,
  ],
  async () => {
    teardownAnimation()
    await nextTick()
    setupAnimation()
  }
)
</script>

<style scoped>
.fold-text {
  display: inline-block;
  color: currentColor;
  font-size: inherit;
  font-weight: inherit;
  line-height: 0.95;
  letter-spacing: -0.04em;
  white-space: pre-wrap;
  user-select: text;
}

.fold-text-sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border: 0;
}

.fold-text-visual {
  display: inline;
}

.fold-text-line {
  display: block;
}

.fold-text-whitespace {
  display: inline;
}

.fold-text-segment {
  display: inline-block;
  line-height: inherit;
  perspective: var(--fold-perspective, 700px);
  transform-style: preserve-3d;
  vertical-align: baseline;
}

.fold-text-segment[data-fold-split='line'] {
  display: block;
}

.fold-text-piece {
  position: relative;
  display: inline-block;
  color: inherit;
  line-height: inherit;
  transform-style: preserve-3d;
  backface-visibility: hidden;
  will-change: transform, opacity;
}

.fold-text-piece::after {
  content: '';
  position: absolute;
  inset: -0.08em -0.02em;
  pointer-events: none;
  opacity: var(--fold-crease, 0);
  mix-blend-mode: multiply;
  border-radius: 0.08em;
}

.fold-text-piece[data-fold-hinge='top']::after {
  background: linear-gradient(180deg, rgba(0, 0, 0, 0.58) 0%, rgba(0, 0, 0, 0.22) 42%, rgba(255, 255, 255, 0.26) 100%);
}

.fold-text-piece[data-fold-hinge='bottom']::after {
  background: linear-gradient(0deg, rgba(0, 0, 0, 0.58) 0%, rgba(0, 0, 0, 0.22) 42%, rgba(255, 255, 255, 0.26) 100%);
}

.fold-text-piece[data-fold-hinge='left']::after {
  background: linear-gradient(90deg, rgba(0, 0, 0, 0.58) 0%, rgba(0, 0, 0, 0.22) 42%, rgba(255, 255, 255, 0.26) 100%);
}

.fold-text-piece[data-fold-hinge='right']::after {
  background: linear-gradient(270deg, rgba(0, 0, 0, 0.58) 0%, rgba(0, 0, 0, 0.22) 42%, rgba(255, 255, 255, 0.26) 100%);
}

@media (prefers-reduced-motion: reduce) {
  .fold-text-piece {
    transform: none !important;
  }

  .fold-text-piece::after {
    opacity: 0 !important;
  }
}
</style>