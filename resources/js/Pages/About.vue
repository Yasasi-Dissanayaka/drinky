<script setup>
import { Head, Link } from '@inertiajs/vue3'

const values = [
    {
        image: 'https://images.unsplash.com/photo-1610832958506-aa56368176cf?auto=format&fit=crop&w=600&q=80',
        icon: '🌿',
        accent: '#5fae72',
        title: 'Fresh Ingredients',
        text: 'We use fresh, high-quality ingredients to make every drink taste better.'
    },
    {
        image: 'https://images.unsplash.com/photo-1553530666-ba11a7da3888?auto=format&fit=crop&w=600&q=80',
        icon: '❤️',
        accent: '#e8748c',
        title: 'Made With Care',
        text: 'Every drink is prepared with care, quality and attention.'
    },
    {
        image: 'https://images.unsplash.com/photo-1526367790999-0150786686a2?auto=format&fit=crop&w=600&q=80',
        icon: '🚚',
        accent: '#e8b23d',
        title: 'Fast Delivery',
        text: 'We bring your favourite drinks straight to your door.'
    },
    {
        image: 'https://images.unsplash.com/photo-1497534446932-c925b458314e?auto=format&fit=crop&w=600&q=80',
        icon: '😊',
        accent: '#5aa7d6',
        title: 'Happy Customers',
        text: 'Our goal is simple: great drinks and happy customers.'
    }
]

const heroFeatures = [
    {
        icon: '🌿',
        accent: '#5fae72',
        title: '100% Fresh',
        text: 'Real Ingredients'
    },
    {
        icon: '❤️',
        accent: '#e8748c',
        title: 'Loved by Many',
        text: 'Happy Customers'
    },
    {
        icon: '🥤',
        accent: '#e8b23d',
        title: 'Made with Care',
        text: 'Quality in Every Cup'
    }
]

const stats = [
    {
        number: '50+',
        label: 'Drinks'
    },
    {
        number: '10K+',
        label: 'Happy Customers'
    },
    {
        number: '30 min',
        label: 'Average Delivery'
    },
    {
        number: '4.9',
        label: 'Customer Rating'
    }
]
</script>

<template>
    <Head title="About Us | DRINKY" />

    <div class="about-page">

        <!-- NAVBAR -->
        <nav class="navbar">
            <div class="nav-container">

                <Link href="/" class="logo">
                    DRINKY<span>.</span>
                </Link>

                <div class="nav-links">
                    <Link href="/">Home</Link>
                    <Link href="/menu">Menu</Link>
                    <Link href="/about" class="active">About</Link>
                    <Link href="/contact">Contact</Link>
                </div>

                <div class="nav-actions">
                    <Link href="/cart" class="cart-button">
                        🛒
                        <span>Cart</span>
                    </Link>
                </div>

            </div>
        </nav>


        <!-- HERO -->
        <section class="about-hero">

            <div class="hero-content">

                <span class="small-title">
                    OUR STORY
                </span>

                <h1>
                    Fresh Drinks.
                    <br>
                    <span>Good Moments.</span>
                </h1>

                <p>
                    DRINKY was created with one simple idea:
                    make fresh, delicious drinks that make
                    people's everyday moments a little better.
                </p>

                <div class="hero-actions">

                    <Link href="/menu" class="primary-button">
                        Explore Our Menu
                        <span>→</span>
                    </Link>

                    <button type="button" class="watch-story">
                        <span class="play-icon">▶</span>
                        Watch Our Story
                    </button>

                </div>

                

            </div>

            <div class="hero-decoration">

                <div class="hero-blob"></div>

                <img class="hero-image" src="/images/drinky-hero.png" alt="Drinky" />

                <div class="hero-doodle">
                    Good Drinks
                    <br>
                    Brighter Days
                </div>

                <div class="hero-badge">
                    SIP
                    <br>
                    GOOD
                    <br>
                    VIBES
                </div>

            </div>

        </section>


        <!-- OUR STORY -->
        <section class="story-section">

            <div class="story-image">

                <div class="image-card">

                    <div class="big-emoji">
                        🥤
                    </div>

                    <div class="image-badge">
                        <strong>Fresh</strong>
                        <span>Every Day</span>
                    </div>

                </div>

            </div>

            <div class="story-content">

                <span class="section-label">
                    WHO WE ARE
                </span>

                <h2>
                    Drinks made for
                    <span>real moments.</span>
                </h2>

                <p>
                    At DRINKY, we believe a good drink can change
                    your mood. Whether you are starting your morning
                    with a coffee, cooling down with an iced drink,
                    or enjoying a smoothie with friends, we want
                    every sip to feel special.
                </p>

                <p>
                    We bring together fresh ingredients, simple
                    recipes and a passion for great taste to create
                    drinks everyone can enjoy.
                </p>

                <Link href="/menu" class="primary-button">
                    Explore Our Menu
                    <span>→</span>
                </Link>

            </div>

        </section>


        <!-- STATS -->
        <section class="stats-section">

            <div class="stats-container">

                <div
                    v-for="stat in stats"
                    :key="stat.label"
                    class="stat-card"
                >
                    <strong>{{ stat.number }}</strong>
                    <span>{{ stat.label }}</span>
                </div>

            </div>

        </section>


        <!-- VALUES -->
        <section class="values-section">

            <div class="section-heading">

                <span class="section-label">
                    WHY DRINKY
                </span>

                <h2>
                    Simple things.
                    <span>Done well.</span>
                </h2>

                <p>
                    We focus on the things that matter most.
                </p>

            </div>

            <div class="section-doodle">
                Good Drinks
                <br>
                Brighter Days
            </div>


            <div class="values-grid">

                <div
                    v-for="value in values"
                    :key="value.title"
                    class="value-card"
                >

                    <div class="value-image">
                        <img :src="value.image" :alt="value.title">

                        <div
                            class="value-icon"
                            :style="{ background: value.accent + '22', color: value.accent }"
                        >
                            {{ value.icon }}
                        </div>
                    </div>

                    <h3>
                        {{ value.title }}
                    </h3>

                    <p>
                        {{ value.text }}
                    </p>

                    <span
                        class="value-underline"
                        :style="{ background: value.accent }"
                    ></span>

                </div>

            </div>

        </section>


        <!-- MISSION -->
        <section class="mission-section">

            <div class="mission-card">

                <div class="mission-text">

                    <span class="section-label">
                        OUR MISSION
                    </span>

                    <h2>
                        Make every sip
                        <span>worth remembering.</span>
                    </h2>

                    <p>
                        We want DRINKY to be more than just a
                        drinks shop. We want to be part of your
                        everyday moments, celebrations, breaks
                        and little treats.
                    </p>

                    <p>
                        Great taste should never be complicated.
                    </p>

                    <Link href="/menu" class="mission-button">
                        Find Your Favourite Drink
                        <span>→</span>
                    </Link>

                </div>

                <div class="mission-visual">

                    <div class="floating-fruit fruit-a">
                        🍓
                    </div>

                    <div class="floating-fruit fruit-b">
                        🥭
                    </div>

                    <div class="main-drink">
                        🥤
                    </div>

                </div>

            </div>

        </section>


        <!-- CTA -->
        <section class="cta-section">

            <div class="cta-content">

                <span class="section-label">
                    READY FOR A DRINK?
                </span>

                <h2>
                    Your next favourite
                    <span>drink is waiting.</span>
                </h2>

                <p>
                    Explore our menu and find something
                    delicious today.
                </p>

                <Link href="/menu" class="cta-button">
                    View Menu
                    <span>→</span>
                </Link>

            </div>

        </section>


        <!-- FOOTER -->
        <footer class="footer">

            <div class="footer-container">

                <div class="footer-brand">

                    <Link href="/" class="logo">
                        DRINKY<span>.</span>
                    </Link>

                    <p>
                        Fresh drinks. Happy moments.
                        Delivered to your door.
                    </p>

                </div>

                <div class="footer-links">

                    <Link href="/">Home</Link>
                    <Link href="/menu">Menu</Link>
                    <Link href="/about">About</Link>
                    <Link href="/contact">Contact</Link>

                </div>

            </div>

            <div class="footer-bottom">
                © 2026 DRINKY. All rights reserved.
            </div>

        </footer>

    </div>
</template>


<style scoped>

/* =========================
   GENERAL
========================= */

.about-page {
    min-height: 100vh;
    background: #f8faf9;
    color: #17231d;
    font-family: Arial, Helvetica, sans-serif;
}

.container {
    max-width: 1800px;
    margin: 0 auto;
}


/* =========================
   NAVBAR
========================= */

.navbar {
    position: sticky;
    top: 0;
    z-index: 100;

    background: rgba(255, 255, 255, 0.93);
    backdrop-filter: blur(16px);

    border-bottom: 1px solid #e4ebe6;
}

.nav-container {
    max-width: 1800px;
    margin: auto;
    padding: 18px 25px;

    display: flex;
    align-items: center;
    justify-content: space-between;
}

.logo {
    color: #17231d;
    text-decoration: none;

    font-size: 27px;
    font-weight: 900;
    letter-spacing: -1px;
}

.logo span {
    color: #79b88a;
}

.nav-links {
    display: flex;
    gap: 30px;
}

.nav-links a {
    color: #59665f;
    text-decoration: none;

    font-size: 14px;
    font-weight: 600;

    transition: 0.2s;
}

.nav-links a:hover,
.nav-links a.active {
    color: #65a976;
}

.cart-button {
    display: flex;
    align-items: center;
    gap: 7px;

    padding: 10px 16px;

    background: #eef5f0;
    color: #17231d;

    border-radius: 12px;

    text-decoration: none;
    font-size: 14px;
    font-weight: 700;
}


/* =========================
   HERO
========================= */

.about-hero {
    position: relative;
    min-height: 550px;

    display: flex;
    align-items: center;

    overflow: hidden;

    background:
        radial-gradient(
            circle at 75% 50%,
            #e6f4e9,
            transparent 38%
        );
}

.hero-content {
    position: relative;
    z-index: 2;

    max-width: 1600px;
    width: 100%;
    margin: auto;

    padding: 80px 25px;
}

.small-title,
.section-label {
    color: #70ae80;

    font-size: 11px;
    font-weight: 900;

    letter-spacing: 3px;
}

.hero-content h1 {
    margin: 15px 0;

    font-size: 64px;
    line-height: 1.02;
    letter-spacing: -3px;
}

.hero-content h1 span {
    position: relative;
    display: inline-block;

    color: #70ae80;
}

.hero-content h1 span::after {
    content: '';

    position: absolute;

    left: 2px;
    right: 8px;
    bottom: -12px;

    height: 14px;

    background: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 20'><path d='M2 10 Q 30 2, 60 10 T 120 10 T 180 10' fill='none' stroke='%2370ae80' stroke-width='4' stroke-linecap='round'/></svg>") no-repeat center / 100% 100%;
}

.hero-content p {
    max-width: 570px;

    margin: 20px 0 0;

    color: #69766f;

    font-size: 17px;
    line-height: 1.8;
}

.hero-actions {
    display: flex;
    align-items: center;
    gap: 24px;

    margin-top: 32px;
}

.watch-story {
    display: flex;
    align-items: center;
    gap: 12px;

    background: none;
    border: none;

    color: #17231d;

    font-size: 14px;
    font-weight: 700;
    font-family: inherit;

    cursor: pointer;
}

.play-icon {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 42px;
    height: 42px;

    background: white;
    color: #70ae80;

    border-radius: 50%;

    box-shadow: 0 10px 22px rgba(40, 60, 45, 0.14);

    font-size: 12px;
}

/*.hero-features {
    display: flex;
    gap: 28px;

    margin-top: 46px;
}*/

.hero-feature {
    display: flex;
    align-items: center;
    gap: 12px;
}

.hero-feature-icon {
    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    width: 46px;
    height: 46px;

    border-radius: 50%;

    font-size: 17px;
}

.hero-feature strong {
    display: block;

    font-size: 13px;
}

.hero-feature span {
    display: block;

    margin-top: 2px;

    color: #8b968f;

    font-size: 12px;
}


/* =========================
   HERO DRINK
========================= */

.hero-decoration {
    position: absolute;

    right: 3%;
    top: 50%;

    width: 560px;
    height: 500px;

    transform: translateY(-50%);
}

.hero-blob {
    position: absolute;
    inset: 40px 60px;

    background: radial-gradient(
        circle at 42% 40%,
        #e2f1e5,
        #eef7f0 70%
    );

    border-radius: 48% 52% 45% 55% / 55% 45% 58% 42%;
}

.hero-image {
    position: absolute;

    left: 30%;
    top: 50%;

    width: 620px;

    transform: translate(-50%, -50%);

    filter: drop-shadow(0 25px 30px rgba(40, 60, 45, 0.22));

    z-index: 2;
}

.hero-doodle {
    position: absolute;

    right: -15px;
    top: 15px;

    color: #6ea27c;

    font-family: 'Brush Script MT', cursive;
    font-size: 21px;
    font-style: italic;
    line-height: 1.3;
    text-align: right;

    transform: rotate(-4deg);
}

.hero-badge {
    position: absolute;

    right: -15px;
    bottom: 15px;

    display: flex;
    align-items: center;
    justify-content: center;

    width: 92px;
    height: 92px;

    background: #eaf5ec;
    color: #5c8a68;

    border-radius: 50%;

    text-align: center;

    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1px;
    line-height: 1.6;

    transform: rotate(-8deg);
}

.fruit {
    position: absolute;

    display: flex;
    align-items: center;
    justify-content: center;

    width: 60px;
    height: 60px;

    background: white;

    border-radius: 50%;

    box-shadow: 0 10px 25px rgba(40, 60, 45, 0.10);

    font-size: 30px;

    animation: float 4s ease-in-out infinite;
}

.fruit-one {
    top: 40px;
    left: 70px;
}

.fruit-two {
    top: 80px;
    right: 30px;
    animation-delay: 1s;
}

.fruit-three {
    bottom: 55px;
    left: 20px;
    animation-delay: 2s;
}

.fruit-four {
    bottom: 25px;
    right: 65px;
    animation-delay: 1.5s;
}

@keyframes float {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-12px);
    }
}


/* =========================
   STORY
========================= */

.story-section {
    max-width: 1800px;

    margin: auto;
    padding: 100px 25px;

    display: grid;
    grid-template-columns: 1fr 1fr;

    gap: 80px;

    align-items: center;
}

.story-image {
    display: flex;
    justify-content: center;
}

.image-card {
    position: relative;

    width: 390px;
    height: 430px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #e9f4eb;

    border-radius: 35px;

    transform: rotate(-2deg);
}

.big-emoji {
    font-size: 150px;

    transform: rotate(2deg);

    filter: drop-shadow(
        0 20px 15px rgba(50, 70, 55, 0.12)
    );
}

.image-badge {
    position: absolute;

    right: -25px;
    bottom: 30px;

    padding: 17px 22px;

    background: white;

    border-radius: 16px;

    box-shadow: 0 15px 35px rgba(40, 60, 45, 0.12);

    transform: rotate(3deg);
}

.image-badge strong,
.image-badge span {
    display: block;
}

.image-badge strong {
    color: #65a976;
    font-size: 18px;
}

.image-badge span {
    margin-top: 3px;

    color: #87928b;
    font-size: 11px;
}

.story-content h2 {
    margin: 14px 0 20px;

    font-size: 43px;
    line-height: 1.1;

    letter-spacing: -2px;
}

.story-content h2 span {
    color: #70ae80;
}

.story-content p {
    margin-bottom: 17px;

    color: #707c75;

    font-size: 15px;
    line-height: 1.8;
}

.primary-button,
.mission-button,
.cta-button {
    display: inline-flex;
    align-items: center;
    gap: 18px;

    margin-top: 15px;

    padding: 14px 20px;

    background: #79b88a;
    color: white;

    border-radius: 12px;

    text-decoration: none;

    font-size: 13px;
    font-weight: 800;

    transition: 0.2s;
}

.primary-button:hover,
.mission-button:hover,
.cta-button:hover {
    background: #65a976;
    transform: translateY(-2px);
}


/* =========================
   STATS
========================= */

.stats-section {
    background: #17231d;
}

.stats-container {
    max-width: 1400px;

    margin: auto;
    padding: 55px 25px;

    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.stat-card {
    text-align: center;
}

.stat-card strong {
    display: block;

    color: white;

    font-size: 32px;
    font-weight: 900;
}

.stat-card span {
    display: block;

    margin-top: 7px;

    color: #aab6af;

    font-size: 12px;
}


/* =========================
   VALUES
========================= */

.values-section {
    position: relative;

    max-width: 1800px;

    margin: auto;
    padding: 100px 25px;
}

.section-heading {
    text-align: center;

    max-width: 600px;
    margin: auto;
}

.section-heading h2 {
    margin: 12px 0;

    font-size: 42px;
    line-height: 1.1;

    letter-spacing: -2px;
}

.section-heading h2 span {
    color: #70ae80;

    text-decoration: underline;
    text-decoration-color: #70ae80;
    text-underline-offset: 6px;
}

.section-heading p {
    color: #78837d;
    font-size: 15px;
}

.section-doodle {
    position: absolute;

    right: 30px;
    top: 60px;

    color: #cddad1;

    font-family: 'Brush Script MT', cursive;
    font-size: 22px;
    font-style: italic;
    line-height: 1.3;
    text-align: right;

    transform: rotate(-3deg);

    pointer-events: none;
}

.values-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);

    gap: 26px;

    margin-top: 50px;
}

.value-card {
    padding-bottom: 26px;

    background: white;

    border: 1px solid #e3ebe5;

    border-radius: 22px;

    text-align: center;

    overflow: hidden;

    transition: 0.25s;
}

.value-card:hover {
    transform: translateY(-6px);

    box-shadow: 0 18px 35px rgba(35, 55, 42, 0.08);
}

.value-image {
    position: relative;

    width: 100%;
    height: 190px;

    margin-bottom: 45px;
}

.value-image img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;
}

.value-icon {
    position: absolute;

    left: 50%;
    bottom: -28px;

    transform: translateX(-50%);

    width: 56px;
    height: 56px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: white;
    border-radius: 50%;

    box-shadow: 0 10px 22px rgba(35, 55, 42, 0.14);

    font-size: 24px;
}

.value-card h3 {
    margin: 0 0 10px;

    padding: 0 20px;

    font-size: 17px;
}

.value-card p {
    margin: 0 0 18px;

    padding: 0 24px;

    color: #7d8882;

    font-size: 13px;
    line-height: 1.7;
}

.value-underline {
    display: block;

    width: 36px;
    height: 3px;

    margin: 0 auto;

    border-radius: 3px;
}


/* =========================
   MISSION
========================= */

.mission-section {
    padding: 20px 25px 100px;
}

.mission-card {
    max-width: 1340px;

    margin: auto;
    padding: 65px;

    display: grid;
    grid-template-columns: 1.2fr 0.8fr;

    align-items: center;

    overflow: hidden;

    background: #e8f4ea;

    border-radius: 30px;
}

.mission-text h2 {
    max-width: 550px;

    margin: 14px 0 20px;

    font-size: 43px;
    line-height: 1.1;

    letter-spacing: -2px;
}

.mission-text h2 span {
    color: #65a976;
}

.mission-text p {
    max-width: 560px;

    color: #66736b;

    font-size: 15px;
    line-height: 1.8;
}

.mission-visual {
    position: relative;

    height: 280px;

    display: flex;
    align-items: center;
    justify-content: center;
}

.main-drink {
    font-size: 160px;

    filter: drop-shadow(
        0 25px 15px rgba(60, 80, 65, 0.15)
    );
}

.floating-fruit {
    position: absolute;

    font-size: 45px;

    animation: float 3s ease-in-out infinite;
}

.fruit-a {
    top: 10px;
    left: 30px;
}

.fruit-b {
    right: 20px;
    bottom: 20px;

    animation-delay: 1s;
}


/* =========================
   CTA
========================= */

.cta-section {
    padding: 100px 25px;

    text-align: center;

    background:
        radial-gradient(
            circle at center,
            #e5f3e8,
            transparent 60%
        );
}

.cta-content {
    max-width: 650px;
    margin: auto;
}

.cta-content h2 {
    margin: 14px 0;

    font-size: 45px;
    line-height: 1.1;

    letter-spacing: -2px;
}

.cta-content h2 span {
    color: #70ae80;
}

.cta-content p {
    color: #76817b;
    font-size: 15px;
}

.cta-button {
    margin-top: 20px;
}


/* =========================
   FOOTER
========================= */

.footer {
    background: #17231d;
    color: white;
}

.footer-container {
    max-width: 1800px;

    margin: auto;
    padding: 45px 25px;

    display: flex;
    justify-content: space-between;

    gap: 30px;
}

.footer .logo {
    color: white;
}

.footer-brand p {
    max-width: 300px;

    margin-top: 12px;

    color: #aebbb2;

    font-size: 13px;
    line-height: 1.7;
}

.footer-links {
    display: flex;
    gap: 25px;
}

.footer-links a {
    color: #c0cbc4;

    text-decoration: none;

    font-size: 13px;
}

.footer-links a:hover {
    color: #79b88a;
}

.footer-bottom {
    padding: 18px 25px;

    border-top: 1px solid #2c3932;

    text-align: center;

    color: #8e9b93;

    font-size: 12px;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 1000px) {

    .hero-decoration {
        right: -100px;
        opacity: 0.45;
    }

    .story-section {
        gap: 45px;
    }

    .values-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .section-doodle {
        display: none;
    }

}

@media (max-width: 800px) {

    .nav-links {
        display: none;
    }

    .about-hero {
        min-height: 600px;
    }

    .hero-content {
        text-align: center;
    }

    .hero-content p {
        margin-left: auto;
        margin-right: auto;
    }

    .hero-decoration {
        opacity: 0.18;
        right: 50%;
        transform: translate(50%, -50%);
    }

    .story-section {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .story-content {
        max-width: 650px;
        margin: auto;
    }

    .stats-container {
        grid-template-columns: repeat(2, 1fr);
        row-gap: 35px;
    }

    .mission-card {
        grid-template-columns: 1fr;
        padding: 45px 30px;
    }

    .mission-text {
        text-align: center;
    }

    .mission-text p {
        margin-left: auto;
        margin-right: auto;
    }

}

@media (max-width: 600px) {

    .hero-content h1 {
        font-size: 45px;
    }

    .hero-content p {
        font-size: 15px;
    }

    .image-card {
        width: 280px;
        height: 320px;
    }

    .big-emoji {
        font-size: 110px;
    }

    .story-content h2,
    .section-heading h2,
    .mission-text h2,
    .cta-content h2 {
        font-size: 34px;
    }

    .values-grid {
        grid-template-columns: 1fr;
    }

    .stats-container {
        grid-template-columns: 1fr 1fr;
    }

    .mission-visual {
        height: 220px;
    }

    .main-drink {
        font-size: 120px;
    }

    .footer-container {
        flex-direction: column;
    }

    .footer-links {
        flex-wrap: wrap;
    }

}

</style>
