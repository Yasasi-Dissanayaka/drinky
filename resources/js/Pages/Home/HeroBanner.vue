<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <!-- HERO -->
    <section class="hero">

        <div class="container hero-grid">

            <!-- Hero text -->
            <div class="hero-content">

                <div class="hero-eyebrow">
                    <span class="hero-eyebrow-dash"></span>
                    <span>Good drinks, brighter days</span>
                </div>

                <h1 class="hero-title">
                    Drink
                    <br />
                    <span class="hero-title-line">
                        <span class="hero-title-accent">better.</span>
                        <svg class="hero-title-mark" viewBox="0 0 40 40" aria-hidden="true">
                            <path class="hero-title-mark-path" d="M8 4 L14 16" />
                            <path class="hero-title-mark-path" d="M22 2 L24 14" />
                            <path class="hero-title-mark-path" d="M32 8 L34 20" />
                        </svg>
                    </span>
                </h1>

                <p class="hero-text">
                    Fresh juices, creamy smoothies, delicious shakes
                    and refreshing drinks made to brighten your day.
                </p>

                <div class="hero-actions">
                    <Link href="/menu" class="btn btn-primary">
                        Explore Menu →
                    </Link>

                    <!--Link href="/about" class="watch-story">
                        <span class="watch-story-icon">▶</span>
                        <span>Watch Our Story</span>
                    </Link-->
                </div>

            </div>


            <!-- Hero drink -->
            <div class="drink-wrapper">

                <div class="drink-background"></div>

                <span class="hero-tag hero-tag-fruit">
                    Made With Real Fruits
                    <svg class="hero-tag-arrow" viewBox="0 0 60 40" aria-hidden="true">
                        <path class="hero-tag-arrow-line" d="M2 4 C 20 4, 30 20, 50 30" />
                        <path class="hero-tag-arrow-head" d="M42 25 L50 30 L44 36" />
                    </svg>
                </span>

                <span class="hero-tag hero-tag-circle">
                    Good Drinks
                    <br />
                    Brighter Days
                    <br />
                    ♥
                </span>

                <img
                    src="/images/drinkyb.png"
                    alt="Mango, strawberry and kiwi smoothies surrounded by fresh fruit"
                    class="hero-photo"
                />

                <!--div class="floating-product">
                    <div class="floating-product-icon">🍓</div>

                    <div>
                        <p class="floating-product-name">Strawberry Dream</p>
                        <p class="floating-product-note">Customer favourite</p>
                    </div>

                    <span class="floating-product-arrow">›</span>
                </div-->

                <div class="hero-dots">
                    <span class="hero-dot is-active"></span>
                    <span class="hero-dot"></span>
                    <span class="hero-dot"></span>
                </div>

            </div>

        </div>
    </section>
</template>

<style scoped>
/* =========================================
   BASE (needed for the hero to render standalone)
   ========================================= */

* {
    box-sizing: border-box;
}

a {
    color: inherit;
    text-decoration: none;
}

img {
    max-width: 100%;
    height: auto;
    display: block;
}

.container {
    width: 100%;
    max-width: 1500px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
}

/* =========================================
   BUTTON (used by hero CTA)
   ========================================= */

.btn {
    display: inline-block;
    border: 0;
    border-radius: 999px;
    padding: 16px 28px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    text-align: center;
    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease,
        background 0.25s ease,
        color 0.25s ease;
}

.btn-primary {
    background: #e85d3f;
    color: #ffffff;
    box-shadow: 0 12px 25px rgba(232, 93, 63, 0.2);
}

.btn-primary:hover {
    background: #d94f32;
    transform: translateY(-3px);
}

.btn:focus-visible,
a:focus-visible {
    outline: 3px solid #e85d3f;
    outline-offset: 3px;
}

/* =========================================
   HERO
   ========================================= */

.hero {
    position: relative;
    overflow: hidden;
}

/* Background image fills whatever height the hero section ends up
   being (inset: 0 tracks the parent's own box), so it always covers
   the section no matter how much the content stacks/wraps at a
   given breakpoint. */
.hero::before {
    content: "";
    position: absolute;
    inset: 0;
    z-index: 0;
    background-image: url('/images/hero-bg.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.hero-grid {
    position: relative;
    z-index: 1;
    display: grid;
    align-items: center;
    gap: 32px;
    min-height: 380px;
    padding-top: 70px;
    padding-bottom: 30px;
}

.hero-content {
    position: relative;
    z-index: 10;
}

.hero-eyebrow {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 18px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.18em;
    color: #17251d;
}

.hero-eyebrow-dash {
    display: inline-block;
    width: 32px;
    height: 2px;
    background: #17251d;
    flex: none;
}

.hero-title {
    margin: 0;
    font-size: clamp(40px, 12vw, 72px);
    font-weight: 900;
    line-height: 0.98;
    letter-spacing: -0.03em;
}

.hero-title-line {
    position: relative;
    display: inline-flex;
    align-items: flex-start;
    flex-wrap: wrap;
}

.hero-title-accent {
    color: #e85d3f;
}

.hero-title-mark {
    width: 28px;
    height: 28px;
    margin-left: 6px;
    margin-top: -2px;
    flex: none;
    fill: none;
}

.hero-title-mark-path {
    stroke: #e85d3f;
    stroke-width: 5;
    stroke-linecap: round;
}

.hero-text {
    max-width: 460px;
    margin-top: 20px;
    font-size: 16px;
    line-height: 1.7;
    color: #6b7280;
}

.hero-actions {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 20px;
    margin-top: 28px;
}

.watch-story {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    font-size: 15px;
    font-weight: 700;
}

.watch-story-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #ffffff;
    box-shadow: 0 8px 18px rgba(0, 0, 0, 0.1);
    font-size: 12px;
    color: #17251d;
    transition: transform 0.25s ease;
}

.watch-story:hover .watch-story-icon {
    transform: scale(1.08);
}

/* =========================================
   HERO VISUAL
   ========================================= */

.drink-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 320px;
    margin-top: 24px;
}

.drink-background {
    position: absolute;
    width: 280px;
    height: 280px;
    margin-right: 180px;
    border-radius: 50%;
    background: radial-gradient(circle at 35% 30%, #ffdede, #fbe2df00 65%, #f1c8db);
}

.hero-photo {
    position: relative;
    z-index: 5;
    width: 100%;
    margin-right: 0;
    margin-bottom: 0;
    max-width: 320px;
    height: auto;
    object-fit: contain;
    filter: drop-shadow(0 30px 40px rgba(0, 0, 0, 0.18));
}

.hero-tag {
    position: absolute;
    z-index: 8;
    font-family: 'Segoe Script', 'Bradley Hand', cursive;
    font-size: 14px;
    line-height: 1.3;
    color: #17251d;
}

.hero-tag-fruit {
    display: none;
    top: 6%;
    left: 0;
    transform: rotate(-3deg);
    width: 100%;
    max-width: 320px;
}

.hero-tag-arrow {
    width: 44px;
    height: 30px;
    margin-top: 4px;
    fill: none;
}

.hero-tag-arrow-line,
.hero-tag-arrow-head {
    stroke: #17251d;
    stroke-width: 2;
    fill: none;
}

.hero-tag-arrow-head {
    stroke-linecap: round;
    stroke-linejoin: round;
}

.hero-tag-circle {
    top: 2%;
    right: 2%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 96px;
    height: 96px;
    border-radius: 50%;
    background: #fbe2df;
    color: #d94f32;
    text-align: center;
    font-size: 11px;
    transform: rotate(6deg);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
}

.floating-product {
    position: absolute;
    z-index: 20;
    right: 4%;
    bottom: 8%;
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 18px;
    border-radius: 18px;
    background: #ffffff;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.14);
    animation: badgeFloat 3s ease-in-out infinite;
}

.floating-product-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: #fbe2df;
    font-size: 20px;
    flex: none;
}

.floating-product-name {
    margin: 0;
    font-size: 14px;
    font-weight: 700;
}

.floating-product-note {
    margin: 0;
    font-size: 12px;
    color: #6b7280;
}

.floating-product-arrow {
    font-size: 20px;
    color: #9ca3af;
}

.hero-dots {
    position: absolute;
    z-index: 10;
    bottom: -28px;
    left: 50%;
    display: flex;
    gap: 8px;
    transform: translateX(-50%);
}

.hero-dot {
    width: 8px;
    height: 8px;
    border-radius: 999px;
    background: #e3ddd0;
}

.hero-dot.is-active {
    width: 22px;
    background: #e85d3f;
}

/* =========================================
   ANIMATIONS
   ========================================= */

@keyframes badgeFloat {
    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-7px);
    }
}

@media (prefers-reduced-motion: reduce) {
    .floating-product {
        animation: none;
    }

    * {
        transition-duration: 0.01ms !important;
    }
}

/* =========================================
   RESPONSIVE (mobile-first)
   ========================================= */

@media (min-width: 400px) {
    .drink-background {
        width: 320px;
        height: 320px;
    }

    .hero-photo {
        max-width: 360px;
    }
}

@media (min-width: 640px) {
    .container {
        padding-left: 24px;
        padding-right: 24px;
    }

    .drink-background {
        width: 400px;
        height: 400px;
    }

    .hero-photo {
        max-width: 460px;
    }

    .hero-tag-fruit {
        display: block;
    }

    .hero-tag-circle {
        width: 120px;
        height: 120px;
        font-size: 13px;
    }
}

@media (min-width: 768px) {
    .hero-title {
        font-size: clamp(56px, 9vw, 84px);
    }

    .hero-title-mark {
        width: 32px;
        height: 32px;
    }

    .drink-wrapper {
        min-height: 460px;
        margin-top: 40px;
    }

    .drink-background {
        width: 560px;
        height: 560px;
    }

    .hero-photo {
        max-width: 560px;
    }

    .hero-tag-circle {
        width: 130px;
        height: 130px;
        font-size: 15px;
        top: 8%;
        right: -2%;
    }
}

@media (min-width: 1024px) {
    .container {
        padding-left: 32px;
        padding-right: 32px;
    }

    .hero-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        min-height: 460px;
        padding-top: 80px;
        padding-bottom: 40px;
    }

    .hero-title {
        font-size: clamp(72px, 7.5vw, 110px);
    }

    .hero-title-mark {
        width: 34px;
        height: 34px;
    }

    .drink-wrapper {
        min-height: 560px;
    }

    .drink-background {
        width: 700px;
        height: 700px;
    }

    .hero-photo {
        margin-right: 120px;
        margin-bottom: 80px;
        max-width: 780px;
    }

    .hero-tag-fruit {
        max-width: 560px;
    }
}

@media (min-width: 1280px) {
    .hero-photo {
        margin-right: 270px;
        margin-bottom: 130px;
        max-width: 880px;
    }

    .hero-tag-fruit {
        width: 1520px;
        max-width: none;
        font-size: 18px;
    }
}
</style>