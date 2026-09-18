<script setup>
import { ref, computed, watch, onMounted } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    videos: {
        type: Array,
        default: () => [
            '/video/drinky-vdo1.mp4',
            /*'/video/drinky-vdo2.mp4',*/
            
        ],
    },
    poster: { type: String, default: '/images/video-banner-poster.jpg' },
    eyebrow: { type: String, default: 'Watch it happen' },
    heading: { type: String, default: 'From fresh fruit to your cup, in seconds.' },
    ctaText: { type: String, default: 'Explore Menu →' },
    ctaHref: { type: String, default: '/menu' },
})

const currentIndex = ref(0)
const activeLayer = ref('a') // 'a' or 'b' — whichever layer is currently visible/playing

const videoA = ref(null)
const videoB = ref(null)

const srcA = ref(props.videos[0] ?? '')
const srcB = ref(props.videos[1] ?? props.videos[0] ?? '')

function nextIndex(i) {
    return (i + 1) % props.videos.length
}

function handleEnded(layer) {
    if (props.videos.length <= 1) {
        // Only one video — just replay it, forever
        const el = layer === 'a' ? videoA.value : videoB.value
        el?.play()
        return
    }

    const upcoming = nextIndex(currentIndex.value)

    // Load the next clip into the *other* (currently hidden) layer,
    // then crossfade to it. When it wraps past the last video it
    // goes right back to index 0 — first video again — automatically.
    if (layer === 'a') {
        srcB.value = props.videos[upcoming]
        activeLayer.value = 'b'
    } else {
        srcA.value = props.videos[upcoming]
        activeLayer.value = 'a'
    }

    currentIndex.value = upcoming
}

watch(activeLayer, async (layer) => {
    // Give the browser a tick to swap the src, then play the newly active layer.
    await new Promise((r) => setTimeout(r, 30))
    const el = layer === 'a' ? videoA.value : videoB.value
    if (el) {
        el.currentTime = 0
        el.play().catch(() => {})
    }
})

onMounted(() => {
    videoA.value?.play().catch(() => {})
})

const isSingle = computed(() => props.videos.length <= 1)
</script>

<template>
    <section class="mt-16 bg-white pb-16 sm:mt-24 sm:pb-24">

        <div class="video-banner relative left-1/2 right-1/2 -mx-[50vw] w-screen overflow-hidden bg-[#17251d]">

            <!-- Layer A -->
            <video
                ref="videoA"
                class="video-banner__layer absolute inset-0 object-cover transition-opacity duration-700 ease-in-out"
                :class="activeLayer === 'a' ? 'opacity-100 z-10' : 'opacity-0 z-0'"
                :src="srcA"
                :poster="poster"
                :loop="isSingle"
                muted
                playsinline
                autoplay
                preload="auto"
                @ended="handleEnded('a')"
            />

            <!-- Layer B -->
            <video
                ref="videoB"
                class="video-banner__layer absolute inset-0 object-cover transition-opacity duration-700 ease-in-out"
                :class="activeLayer === 'b' ? 'opacity-100 z-10' : 'opacity-0 z-0'"
                :src="srcB"
                :poster="poster"
                muted
                playsinline
                preload="auto"
                @ended="handleEnded('b')"
            />

            <!-- Spacer to size the container since videos are absolutely positioned -->
            <div class="video-banner__spacer invisible"></div>


            <div class="absolute inset-0 z-30 flex flex-col items-start justify-end p-7 sm:p-11 lg:p-14 xl:px-20">

                <p class="mb-3 text-[11px] font-bold uppercase tracking-[0.15em] text-[#f4c95d] sm:text-sm sm:tracking-[0.2em]">
                    {{ eyebrow }}
                </p>

                <h2 class="max-w-xl text-[32px] font-black leading-tight text-white sm:text-4xl lg:text-5xl">
                    {{ heading }}
                </h2>

                <Link
                    :href="ctaHref"
                    class="mt-6 rounded-full bg-[#e85d3f] px-6 py-3.5 text-sm font-bold text-white transition hover:-translate-y-1 hover:bg-[#d94f32] sm:mt-7 sm:px-7 sm:py-4 sm:text-base"
                >
                    {{ ctaText }}
                </Link>

            </div>

        </div>
    </section>
</template>

<style scoped>
.video-banner {
    --banner-height: 420px;
    --banner-height-md: 500px;
    --banner-height-lg: 800px;
    --banner-width: 100%;
    margin-top: -100px;
    
}

.video-banner,
.video-banner__layer,
.video-banner__spacer {
    height: var(--banner-height);
    width: var(--banner-width);
}

.video-banner__layer {
    object-fit: cover;
    object-position: center 35%;
}

@media (min-width: 768px) {
    .video-banner,
    .video-banner__layer,
    .video-banner__spacer {
        height: var(--banner-height-md);
    }
}

@media (min-width: 1024px) {
    .video-banner,
    .video-banner__layer,
    .video-banner__spacer {
        height: var(--banner-height-lg);
    }
}
</style>