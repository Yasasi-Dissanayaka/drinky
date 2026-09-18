<script setup>
import { Head, Link } from '@inertiajs/vue3'
import VideoBanner from './VideoBanner.vue'
import Navbar from './Navbar.vue'

const categories = [
    {
        name: 'Fresh Juices',
        description: 'Freshly squeezed goodness',
        icon: '🍊',
        theme: 'yellow',
    },
    {
        name: 'Smoothies',
        description: 'Thick, creamy & delicious',
        icon: '🍓',
        theme: 'pink',
    },
    {
        name: 'Milkshakes',
        description: 'Sweet treats in a cup',
        icon: '🥤',
        theme: 'purple',
    },
    {
        name: 'Iced Drinks',
        description: 'Cool down your day',
        icon: '🧊',
        theme: 'green',
    },
]

const featuredDrinks = [
    {
        name: 'Mango Blast',
        category: 'Smoothie',
        price: 'Rs. 650',
        icon: '🥭',
    },
    {
        name: 'Berry Fresh',
        category: 'Fresh Juice',
        price: 'Rs. 700',
        icon: '🍓',
    },
    {
        name: 'Choco Dream',
        category: 'Milkshake',
        price: 'Rs. 750',
        icon: '🍫',
    },
]
</script>

<template>
    <Head title="DRINKY - Drink Better" />

    <div class="drinky-page">

        <Navbar />

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


        


        <!-- CATEGORIES -->
        <section class="section section-light categories-section">
            <div class="categories-decor categories-decor-top" aria-hidden="true">
                <svg viewBox="0 0 200 200">
                    <circle class="categories-decor-circle" cx="120" cy="70" r="90" />
                </svg>
                <img
                    src="/images/leaf-top.png"
                    alt=""
                    class="categories-leaf categories-leaf-top"
                    aria-hidden="true"
                />
                <span class="categories-splash categories-splash-a"></span>
                <span class="categories-splash categories-splash-b"></span>
            </div>

            <div class="categories-decor categories-decor-bottom" aria-hidden="true">
                <svg viewBox="0 0 200 200">
                    <circle class="categories-decor-circle" cx="60" cy="140" r="110" />
                </svg>
                <svg class="categories-leaf categories-leaf-bottom" viewBox="0 0 100 160" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="leafGradientBottom" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0%" />
                            <stop offset="100%" />
                        </linearGradient>
                    </defs>
                    <path class="leaf-blade leaf-blade-bottom" d="M50 0 C92 28 100 92 50 160 C0 92 8 28 50 0 Z" />
                    <path class="leaf-vein leaf-vein-main" d="M50 14 L50 146" />
                    <path class="leaf-vein leaf-vein-branch" d="M50 42 L24 58" />
                    <path class="leaf-vein leaf-vein-branch" d="M50 42 L76 58" />
                    <path class="leaf-vein leaf-vein-branch" d="M50 74 L22 94" />
                    <path class="leaf-vein leaf-vein-branch" d="M50 74 L78 94" />
                </svg>
                <span class="categories-splash categories-splash-c"></span>
                <span class="categories-splash categories-splash-d"></span>
            </div>

            <div class="container categories-container">

                <div class="section-head categories-head">
                    <div>
                        <p class="section-eyebrow">What are you craving?</p>

                        <h2 class="section-title categories-title">
                            Find your <span class="categories-title-accent">favourite</span>.
                        </h2>

                        <p class="categories-subtitle">
                            Fresh flavours for every mood. Pick a category and
                            explore our delicious drinks.
                        </p>
                    </div>

                    <Link href="/menu" class="section-link">
                        View all drinks →
                    </Link>
                </div>

                <div class="category-grid">

                    <Link
                        v-for="category in categories"
                        :key="category.name"
                        href="/menu"
                        class="category-card"
                        :class="`category-card--${category.theme}`"
                    >
                        <span class="category-card-splash" aria-hidden="true">
                            <svg class="category-card-splash-svg" viewBox="0 0 30 40">
                                <path class="category-card-splash-path" d="M6 2 L14 22" />
                                <path class="category-card-splash-path" d="M20 6 L24 20" />
                            </svg>
                        </span>

                        <div class="category-icon-wrap">
                            <div class="category-icon">{{ category.icon }}</div>
                        </div>

                        <h3 class="category-name">{{ category.name }}</h3>

                        <p class="category-description">
                            {{ category.description }}
                        </p>

                        <div class="category-cta">
                            <span>Explore</span>
                            <span class="category-cta-arrow">→</span>
                        </div>
                    </Link>

                </div>

            </div>
        </section>
        <VideoBanner />


        <!-- FEATURED DRINKS -->
        <section class="section section-dark">
            <div class="container">

                <div class="section-head">
                    <div>
                        <p class="section-eyebrow section-eyebrow-gold">
                            Fan favourites
                        </p>

                        <h2 class="section-title">Drinks worth trying.</h2>
                    </div>

                    <Link href="/menu" class="section-link section-link-gold">
                        See full menu →
                    </Link>
                </div>

                <div class="featured-grid">

                    <article
                        v-for="drink in featuredDrinks"
                        :key="drink.name"
                        class="featured-card"
                    >
                        <div class="featured-image">{{ drink.icon }}</div>

                        <div class="featured-body">

                            <p class="featured-category">{{ drink.category }}</p>

                            <div class="featured-row">
                                <h3 class="featured-name">{{ drink.name }}</h3>
                                <span class="featured-price">{{ drink.price }}</span>
                            </div>

                            <Link href="/menu" class="featured-button">
                                Add to order
                            </Link>

                        </div>
                    </article>

                </div>

            </div>
        </section>


        <!-- WHY DRINKY -->
        <section class="section">
            <div class="container">

                <div class="why-grid">

                    <div>
                        <p class="section-eyebrow">Why DRINKY?</p>

                        <h2 class="section-title">
                            Simple ingredients.
                            <br />
                            Big flavour.
                        </h2>

                        <p class="why-text">
                            We believe good drinks don't need complicated ingredients.
                            Just fresh flavours, quality ingredients and a little love.
                        </p>

                        <Link href="/about" class="btn btn-dark why-button">
                            Learn about DRINKY
                        </Link>
                    </div>

                    <div class="feature-grid">

                        <div class="feature-box feature-box-yellow">
                            <div class="feature-icon">🍓</div>
                            <h3 class="feature-name">Fresh ingredients</h3>
                            <p class="feature-text">Quality ingredients in every drink.</p>
                        </div>

                        <div class="feature-box feature-box-green feature-box-offset">
                            <div class="feature-icon">⚡</div>
                            <h3 class="feature-name">Made fresh</h3>
                            <p class="feature-text">Prepared fresh when you order.</p>
                        </div>

                        <div class="feature-box feature-box-pink">
                            <div class="feature-icon">❤️</div>
                            <h3 class="feature-name">Made with love</h3>
                            <p class="feature-text">Because boring drinks are sad.</p>
                        </div>

                        <div class="feature-box feature-box-grey feature-box-offset">
                            <div class="feature-icon">🚴</div>
                            <h3 class="feature-name">Easy ordering</h3>
                            <p class="feature-text">Order online and enjoy.</p>
                        </div>

                    </div>

                </div>

            </div>
        </section>


        <!-- CTA -->
        <section class="cta-wrapper">
            <div class="container">

                <div class="cta">
                    <p class="cta-eyebrow">Ready?</p>

                    <h2 class="cta-title">
                        Your next favourite drink is waiting.
                    </h2>

                    <p class="cta-text">
                        Explore our menu and find something delicious.
                    </p>

                    <Link href="/menu" class="cta-button">
                        Order a Drink →
                    </Link>
                </div>

            </div>
        </section>


        <!-- FOOTER -->
        <footer class="footer">

            <div class="container footer-inner">

                <div>
                    <Link href="/" class="logo logo-sm">
                        drink<span class="logo-accent">y</span>
                    </Link>

                    <p class="footer-tagline">Drink better. Feel better.</p>
                </div>

                <div class="footer-links">
                    <Link href="/menu" class="footer-link">Menu</Link>
                    <Link href="/about" class="footer-link">About</Link>
                    <Link href="/contact" class="footer-link">Contact</Link>
                </div>

            </div>

            <div class="footer-bottom">
                © {{ new Date().getFullYear() }} DRINKY. All rights reserved.
            </div>

        </footer>

    </div>
</template>

<style scoped>
/* =========================================
   DRINKY HOME PAGE
   ========================================= */

* {
    box-sizing: border-box;
}

:deep(html) {
    overflow-x: hidden;
}

:deep(body) {
    margin: 0;
    background: #f8f7f2;
    font-family: Inter, ui-sans-serif, system-ui, sans-serif;
    overflow-x: hidden;
}

.drinky-page {
    min-height: 100vh;
    width: 100%;
    overflow-x: hidden;
    background: #f8f7f2;
    color: #17251d;
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

/* =========================================
   LAYOUT
   ========================================= */

.container {
    width: 100%;
    max-width: 1500px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
}

.section {
    padding-top: 56px;
    padding-bottom: 56px;
}

.section-light {
    background: #ffffff;
}

.section-dark {
    background: #17251d;
    color: #ffffff;
}

.section-head {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 40px;
}

.section-eyebrow {
    margin: 0 0 12px;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    color: #e85d3f;
}

.section-eyebrow-gold {
    color: #f4c95d;
}

.section-title {
    margin: 0;
    font-size: clamp(28px, 6vw, 40px);
    font-weight: 900;
    line-height: 1.1;
    letter-spacing: -0.02em;
}

.section-link {
    font-weight: 700;
    text-decoration: underline;
    text-decoration-color: #e85d3f;
    text-decoration-thickness: 2px;
    text-underline-offset: 4px;
    white-space: nowrap;
}

.section-link-gold {
    color: #f4c95d;
    text-decoration: none;
}

/* =========================================
   BUTTONS
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

.btn-dark {
    background: #17251d;
    color: #ffffff;
}

.btn-dark:hover {
    background: #e85d3f;
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
   HERO STATS
   ========================================= */

.hero-stats {
    display: flex;
    flex-wrap: wrap;
    gap: 24px;
    margin: 44px 0 0;
    padding: 0;
    list-style: none;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 10px;
}

.stat-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    font-size: 17px;
    flex: none;
}

.stat-icon-green {
    background: #e3efd9;
}

.stat-icon-pink {
    background: #fbe2df;
}

.stat-icon-gold {
    background: #fbeecb;
}

.stat-icon-mint {
    background: #dcf1ea;
}

.stat-value {
    margin: 0;
    font-size: 16px;
    font-weight: 800;
    line-height: 1.2;
}

.stat-label {
    margin: 0;
    font-size: 12px;
    color: #6b7280;
}

.hero-scroll {
    display: none;
    align-items: center;
    gap: 10px;
    margin-top: 56px;
    font-size: 12px;
    font-weight: 600;
    color: #6b7280;
}

.hero-scroll-icon {
    display: flex;
    justify-content: center;
    width: 20px;
    height: 32px;
    border: 1.5px solid #6b7280;
    border-radius: 12px;
    padding-top: 6px;
    flex: none;
}

.hero-scroll-icon span {
    width: 3px;
    height: 6px;
    border-radius: 2px;
    background: #6b7280;
    animation: scrollDot 1.6s ease-in-out infinite;
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
   CATEGORIES SECTION
   ========================================= */

.categories-section {
    position: relative;
    overflow: hidden;
}

.categories-container {
    position: relative;
    z-index: 2;
}

.categories-decor {
    position: absolute;
    z-index: 0;
    pointer-events: none;
}

.categories-decor svg {
    width: 100%;
    height: 100%;
    opacity: 0.6;
}

.categories-decor-circle {
    fill: #fbe2df;
}

.categories-decor-top {
    top: -60px;
    right: -70px;
    width: 260px;
    height: 260px;
}

.categories-decor-bottom {
    bottom: -80px;
    left: -80px;
    width: 260px;
    height: 260px;
}

.categories-leaf {
    position: absolute;
    filter: drop-shadow(0 10px 14px rgba(0, 0, 0, 0.12));
    object-fit: contain;
}

.categories-leaf-top {
    top: -6px;
    right: 4px;
    width: 64px;
    height: 104px;
    transform: rotate(18deg);
}

.categories-leaf-bottom {
    bottom: 6px;
    left: 8px;
    width: 44px;
    height: 70px;
    opacity: 0.85;
    transform: rotate(-150deg);
}

#leafGradientBottom stop:first-child {
    stop-color: #3c7d40;
}

#leafGradientBottom stop:last-child {
    stop-color: #1c4a22;
}

.leaf-blade-bottom {
    fill: url(#leafGradientBottom);
}

.leaf-vein {
    fill: none;
    stroke: #0e2a12;
    stroke-linecap: round;
}

.leaf-vein-main {
    stroke-width: 2;
    opacity: 0.5;
}

.leaf-vein-branch {
    stroke-width: 1.6;
    opacity: 0.42;
}

.leaf-vein-branch-light {
    stroke-width: 1.6;
    opacity: 0.38;
}

.categories-splash {
    position: absolute;
    width: 10px;
    height: 22px;
    border-radius: 999px;
    background: #f4c95d;
}

.categories-splash-a {
    top: 60px;
    right: 190px;
    transform: rotate(-20deg);
    background: #f4a29a;
}

.categories-splash-b {
    top: 92px;
    right: 172px;
    width: 7px;
    height: 15px;
    transform: rotate(-30deg);
    background: #f4a29a;
}

.categories-splash-c {
    bottom: 40px;
    left: 60px;
    transform: rotate(15deg);
    background: #f2a7c3;
}

.categories-splash-d {
    bottom: 20px;
    left: 84px;
    width: 7px;
    height: 15px;
    transform: rotate(35deg);
    background: #f2a7c3;
}

.categories-head {
    position: relative;
}

.categories-title {
    margin-top: 6px;
}

.categories-title-accent {
    background: linear-gradient(90deg, #e85d3f 0%, #ef6f6a 45%, #d6318f 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.categories-subtitle {
    max-width: 460px;
    margin: 14px 0 0;
    font-size: 15px;
    line-height: 1.6;
    color: #6b7280;
}

.category-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 16px;
}

.category-card {
    position: relative;
    display: block;
    overflow: hidden;
    padding: 28px 24px;
    border-radius: 24px;
    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}

.category-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
}

.category-card--yellow {
    background: #fdf3e0;
}

.category-card--pink {
    background: #fce7e6;
}

.category-card--purple {
    background: #f7e4f2;
}

.category-card--green {
    background: #e2f3e9;
}

.category-card-splash {
    position: absolute;
    top: 32px;
    right: 62px;
    width: 22px;
    height: 30px;
    opacity: 0.7;
}

.category-card-splash-svg {
    width: 100%;
    height: 100%;
    fill: none;
}

.category-card-splash-path {
    stroke-width: 6;
    stroke-linecap: round;
}

.category-card--yellow .category-card-splash-path {
    stroke: #eab13a;
}

.category-card--pink .category-card-splash-path {
    stroke: #ea9490;
}

.category-card--purple .category-card-splash-path {
    stroke: #d488c4;
}

.category-card--green .category-card-splash-path {
    stroke: #7dbf9a;
}

.category-icon-wrap {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 76px;
    height: 76px;
    margin-bottom: 24px;
    border-radius: 42% 58% 65% 35% / 45% 45% 55% 55%;
    background: rgba(255, 255, 255, 0.75);
    box-shadow: 0 8px 18px rgba(0, 0, 0, 0.06);
    transition: transform 0.3s ease;
}

.category-card:hover .category-icon-wrap {
    transform: scale(1.1) rotate(4deg);
}

.category-icon {
    font-size: 34px;
    line-height: 1;
    filter: drop-shadow(0 6px 10px rgba(0, 0, 0, 0.12));
}

.category-name {
    margin: 0;
    font-size: 19px;
    font-weight: 900;
    color: #17251d;
}

.category-description {
    margin: 8px 0 0;
    font-size: 14px;
    line-height: 1.6;
    color: #6b7280;
}

.category-cta {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin-top: 22px;
    font-weight: 700;
}

.category-cta-arrow {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    font-size: 14px;
    transition: transform 0.25s ease;
}

.category-card:hover .category-cta-arrow {
    transform: translateX(4px);
}

.category-card--yellow .category-cta {
    color: #d38a1f;
}

.category-card--yellow .category-cta-arrow {
    background: rgba(234, 177, 58, 0.25);
    color: #b9781a;
}

.category-card--pink .category-cta {
    color: #d94f4a;
}

.category-card--pink .category-cta-arrow {
    background: rgba(234, 148, 144, 0.3);
    color: #c2433e;
}

.category-card--purple .category-cta {
    color: #b8378f;
}

.category-card--purple .category-cta-arrow {
    background: rgba(212, 136, 196, 0.3);
    color: #a02f7f;
}

.category-card--green .category-cta {
    color: #2f8f5b;
}

.category-card--green .category-cta-arrow {
    background: rgba(125, 191, 154, 0.3);
    color: #26794c;
}

/* =========================================
   FEATURED DRINKS
   ========================================= */

.featured-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
}

.featured-card {
    overflow: hidden;
    border-radius: 28px;
    background: #ffffff;
    color: #17251d;
    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}

.featured-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
}

.featured-image {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 200px;
    background: #f8f7f2;
    font-size: 90px;
    transition: transform 0.5s ease;
}

.featured-card:hover .featured-image {
    transform: scale(1.06);
}

.featured-body {
    padding: 24px;
}

.featured-category {
    margin: 0;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #9ca3af;
}

.featured-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 8px;
    margin-top: 8px;
}

.featured-name {
    margin: 0;
    font-size: 22px;
    font-weight: 900;
}

.featured-price {
    font-weight: 900;
    color: #e85d3f;
    white-space: nowrap;
}

.featured-button {
    display: block;
    margin-top: 22px;
    padding: 12px;
    border-radius: 999px;
    background: #17251d;
    color: #ffffff;
    font-size: 14px;
    font-weight: 700;
    text-align: center;
    transition: background 0.25s ease;
}

.featured-button:hover {
    background: #e85d3f;
}

/* =========================================
   WHY DRINKY
   ========================================= */

.why-grid {
    display: grid;
    gap: 48px;
}

.why-text {
    max-width: 512px;
    margin-top: 20px;
    font-size: 16px;
    line-height: 1.75;
    color: #4b5563;
}

.why-button {
    margin-top: 28px;
}

.feature-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 16px;
}

.feature-box {
    padding: 22px;
    border-radius: 24px;
    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}

.feature-box:hover {
    transform: translateY(-7px);
    box-shadow: 0 18px 35px rgba(0, 0, 0, 0.08);
}

.feature-box-offset {
    margin-top: 0;
}

.feature-box-yellow {
    background: #f4c95d;
}

.feature-box-green {
    background: #d9e8c8;
}

.feature-box-pink {
    background: #f3ddd4;
}

.feature-box-grey {
    background: #e8e4dc;
}

.feature-icon {
    font-size: 30px;
}

.feature-name {
    margin: 24px 0 0;
    font-size: 17px;
    font-weight: 900;
}

.feature-text {
    margin: 8px 0 0;
    font-size: 13px;
    color: #374151;
}

/* =========================================
   CTA
   ========================================= */

.cta-wrapper {
    padding-bottom: 56px;
}

.cta {
    position: relative;
    overflow: hidden;
    padding: 48px 24px;
    border-radius: 32px;
    background: #e85d3f;
    color: #ffffff;
    text-align: center;
}

.cta::before {
    content: "";
    position: absolute;
    width: 320px;
    height: 320px;
    top: -170px;
    right: -80px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.08);
}

.cta::after {
    content: "";
    position: absolute;
    width: 220px;
    height: 220px;
    bottom: -120px;
    left: -70px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.06);
}

.cta-eyebrow {
    position: relative;
    z-index: 1;
    margin: 0;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    color: rgba(255, 255, 255, 0.7);
}

.cta-title {
    position: relative;
    z-index: 1;
    margin: 16px 0 0;
    font-size: clamp(28px, 6vw, 40px);
    font-weight: 900;
    line-height: 1.1;
}

.cta-text {
    position: relative;
    z-index: 1;
    max-width: 576px;
    margin: 18px auto 0;
    font-size: 16px;
    color: rgba(255, 255, 255, 0.8);
}

.cta-button {
    position: relative;
    z-index: 1;
    display: inline-block;
    margin-top: 28px;
    padding: 14px 28px;
    border-radius: 999px;
    background: #ffffff;
    color: #e85d3f;
    font-weight: 900;
    transition: transform 0.25s ease;
}

.cta-button:hover {
    transform: translateY(-3px);
}

/* =========================================
   FOOTER
   ========================================= */

.footer {
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    background: #ffffff;
}

.footer-inner {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
    padding-top: 36px;
    padding-bottom: 36px;
}

.footer-tagline {
    margin: 8px 0 0;
    font-size: 14px;
    color: #6b7280;
}

.footer-links {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    font-size: 14px;
    font-weight: 600;
}

.footer-link {
    transition: color 0.2s ease;
}

.footer-link:hover {
    color: #e85d3f;
}

.footer-bottom {
    border-top: 1px solid rgba(0, 0, 0, 0.05);
    padding: 18px 0;
    font-size: 12px;
    text-align: center;
    color: #9ca3af;
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

@keyframes scrollDot {
    0% {
        transform: translateY(0);
        opacity: 1;
    }

    100% {
        transform: translateY(10px);
        opacity: 0;
    }
}

@media (prefers-reduced-motion: reduce) {
    .floating-product,
    .hero-scroll-icon span {
        animation: none;
    }

    * {
        transition-duration: 0.01ms !important;
    }
}

/* =========================================
   RESPONSIVE (mobile-first)
   ========================================= */

@media (max-width: 420px) {
    .feature-grid {
        grid-template-columns: 1fr;
    }

    .feature-box-offset {
        margin-top: 0;
    }

    .categories-decor-top,
    .categories-decor-bottom {
        width: 160px;
        height: 160px;
    }

    .categories-leaf-top {
        width: 42px;
        height: 68px;
    }

    .categories-leaf-bottom {
        width: 30px;
        height: 48px;
    }
}

@media (min-width: 400px) {
    .drink-background {
        width: 320px;
        height: 320px;
    }

    .hero-photo {
        max-width: 360px;
    }
}

@media (min-width: 480px) {
    .category-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (min-width: 640px) {
    .container {
        padding-left: 24px;
        padding-right: 24px;
    }

    .section {
        padding-top: 72px;
        padding-bottom: 72px;
    }

    .cta {
        padding-left: 64px;
        padding-right: 64px;
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
    .section-head,
    .footer-inner {
        flex-direction: row;
        align-items: flex-end;
    }

    .categories-head {
        align-items: flex-end;
    }

    .footer-inner {
        align-items: center;
    }

    .featured-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

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

    .section {
        padding-top: 96px;
        padding-bottom: 96px;
    }

    .cta-wrapper {
        padding-bottom: 96px;
    }

    .hero-grid,
    .why-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .why-grid {
        align-items: center;
    }

    .hero-grid {
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

    .hero-scroll {
        display: flex;
    }

    .category-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
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