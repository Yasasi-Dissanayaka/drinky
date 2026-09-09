<script setup>
import { Head, Link } from '@inertiajs/vue3'

const categories = [
    {
        name: 'Fresh Juices',
        description: 'Freshly squeezed goodness',
        icon: '🍊',
    },
    {
        name: 'Smoothies',
        description: 'Thick, creamy & delicious',
        icon: '🥭',
    },
    {
        name: 'Milkshakes',
        description: 'Sweet treats in a cup',
        icon: '🥤',
    },
    {
        name: 'Iced Drinks',
        description: 'Cool down your day',
        icon: '🧊',
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

    <div class="min-h-screen bg-[#f8f7f2] text-[#17251d]">

        <!-- NAVBAR -->
        <header class="absolute left-0 right-0 top-0 z-50">
            <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-6 lg:px-8">

                <!-- Logo -->
                <Link href="/" class="text-3xl font-black tracking-tight">
                    drink<span class="text-[#e85d3f]">y</span>
                </Link>

                <!-- Navigation -->
                <div class="hidden items-center gap-8 md:flex">
                    <Link
                        href="/"
                        class="text-sm font-semibold text-[#e85d3f]"
                    >
                        Home
                    </Link>

                    <Link
                        href="/menu"
                        class="text-sm font-semibold transition hover:text-[#e85d3f]"
                    >
                        Menu
                    </Link>

                    <Link
                        href="/about"
                        class="text-sm font-semibold transition hover:text-[#e85d3f]"
                    >
                        About
                    </Link>

                    <Link
                        href="/contact"
                        class="text-sm font-semibold transition hover:text-[#e85d3f]"
                    >
                        Contact
                    </Link>
                </div>

                <!-- Right -->
                <div class="flex items-center gap-3">
                    <Link
                        href="/login"
                        class="hidden rounded-full px-5 py-2.5 text-sm font-semibold md:block"
                    >
                        Login
                    </Link>

                    <Link
                        href="/menu"
                        class="rounded-full bg-[#17251d] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#e85d3f]"
                    >
                        Order Now
                    </Link>
                </div>

            </nav>
        </header>


        <!-- HERO -->
        <section class="relative overflow-hidden">

            <!-- Decorative circles -->
            <div class="absolute -right-32 -top-32 h-96 w-96 rounded-full bg-[#f4c95d]/40"></div>

            <div class="absolute -left-24 bottom-0 h-64 w-64 rounded-full bg-[#d9e8c8]/60"></div>

            <div class="mx-auto grid min-h-[720px] max-w-7xl items-center gap-10 px-6 pb-20 pt-32 lg:grid-cols-2 lg:px-8">

                <!-- Hero text -->
                <div class="relative z-10">

                    <div class="mb-6 inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 shadow-sm">
                        <span class="text-lg">✨</span>
                        <span class="text-sm font-semibold">
                            Fresh drinks. Happy moments.
                        </span>
                    </div>

                    <h1 class="max-w-2xl text-6xl font-black leading-[0.95] tracking-tight sm:text-7xl lg:text-8xl">
                        Drink
                        <span class="text-[#e85d3f]">better.</span>
                    </h1>

                    <p class="mt-7 max-w-lg text-lg leading-8 text-gray-600">
                        Fresh juices, creamy smoothies, delicious shakes
                        and refreshing drinks made to brighten your day.
                    </p>

                    <div class="mt-9 flex flex-wrap gap-4">

                        <Link
                            href="/menu"
                            class="rounded-full bg-[#e85d3f] px-7 py-4 font-bold text-white shadow-lg shadow-[#e85d3f]/20 transition hover:-translate-y-1 hover:bg-[#d94f32]"
                        >
                            Explore Menu →
                        </Link>

                        <Link
                            href="/about"
                            class="rounded-full border border-[#17251d]/20 bg-white px-7 py-4 font-bold transition hover:bg-[#17251d] hover:text-white"
                        >
                            Our Story
                        </Link>

                    </div>

                    <!-- Small stats -->
                    <div class="mt-12 flex gap-10">

                        <div>
                            <p class="text-2xl font-black">100%</p>
                            <p class="text-sm text-gray-500">Fresh</p>
                        </div>

                        <div>
                            <p class="text-2xl font-black">20+</p>
                            <p class="text-sm text-gray-500">Drinks</p>
                        </div>

                        <div>
                            <p class="text-2xl font-black">4.9★</p>
                            <p class="text-sm text-gray-500">Rating</p>
                        </div>

                    </div>

                </div>


                <!-- Hero drink -->
                <div class="relative flex items-center justify-center">

                    <!-- Background blob -->
                    <div class="absolute h-[430px] w-[430px] rounded-full bg-[#f4c95d] sm:h-[500px] sm:w-[500px]"></div>

                    <!-- Drink -->
                    <div class="relative z-10 flex h-[420px] w-[250px] rotate-[-5deg] items-end justify-center rounded-b-[70px] rounded-t-[30px] border-8 border-white bg-gradient-to-b from-[#ff9b62] via-[#f06b42] to-[#d94a32] shadow-2xl sm:h-[470px] sm:w-[280px]">

                        <!-- Straw -->
                        <div class="absolute -right-8 -top-28 h-40 w-5 rotate-[18deg] rounded-full bg-[#e85d3f]"></div>

                        <!-- Ice -->
                        <div class="absolute left-10 top-24 h-12 w-12 rotate-12 rounded-xl bg-white/30"></div>
                        <div class="absolute right-12 top-40 h-14 w-14 -rotate-12 rounded-xl bg-white/25"></div>

                        <!-- Fruit -->
                        <div class="absolute -top-12 left-10 text-7xl">
                            🍊
                        </div>

                        <!-- Label -->
                        <div class="mb-20 rounded-2xl bg-white/90 px-8 py-5 text-center shadow-lg">
                            <p class="text-xl font-black tracking-wide">
                                DRINKY
                            </p>

                            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-[#e85d3f]">
                                Fresh & Happy
                            </p>
                        </div>

                    </div>

                    <!-- Floating card -->
                    <div class="absolute bottom-10 left-0 z-20 rounded-2xl bg-white p-4 shadow-xl sm:left-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#f8e7b0] text-2xl">
                                🥭
                            </div>

                            <div>
                                <p class="text-sm font-bold">
                                    Mango Blast
                                </p>

                                <p class="text-xs text-gray-500">
                                    Customer favourite
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>


        <!-- CATEGORIES -->
        <section class="bg-white py-24">

            <div class="mx-auto max-w-7xl px-6 lg:px-8">

                <div class="mb-14 flex flex-col justify-between gap-5 md:flex-row md:items-end">

                    <div>
                        <p class="mb-3 text-sm font-bold uppercase tracking-[0.2em] text-[#e85d3f]">
                            What are you craving?
                        </p>

                        <h2 class="text-4xl font-black tracking-tight sm:text-5xl">
                            Find your favourite.
                        </h2>
                    </div>

                    <Link
                        href="/menu"
                        class="font-bold underline decoration-[#e85d3f] decoration-2 underline-offset-4"
                    >
                        View all drinks →
                    </Link>

                </div>


                <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

                    <Link
                        v-for="category in categories"
                        :key="category.name"
                        href="/menu"
                        class="group rounded-[28px] bg-[#f8f7f2] p-7 transition duration-300 hover:-translate-y-2 hover:shadow-xl"
                    >

                        <div class="mb-8 flex h-20 w-20 items-center justify-center rounded-full bg-white text-4xl shadow-sm transition group-hover:scale-110">
                            {{ category.icon }}
                        </div>

                        <h3 class="text-xl font-black">
                            {{ category.name }}
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            {{ category.description }}
                        </p>

                        <div class="mt-6 font-bold text-[#e85d3f]">
                            Explore →
                        </div>

                    </Link>

                </div>

            </div>
        </section>


        <!-- FEATURED DRINKS -->
        <section class="bg-[#17251d] py-24 text-white">

            <div class="mx-auto max-w-7xl px-6 lg:px-8">

                <div class="mb-14 flex flex-col justify-between gap-5 md:flex-row md:items-end">

                    <div>
                        <p class="mb-3 text-sm font-bold uppercase tracking-[0.2em] text-[#f4c95d]">
                            Fan favourites
                        </p>

                        <h2 class="text-4xl font-black tracking-tight sm:text-5xl">
                            Drinks worth trying.
                        </h2>
                    </div>

                    <Link
                        href="/menu"
                        class="font-bold text-[#f4c95d]"
                    >
                        See full menu →
                    </Link>

                </div>


                <div class="grid gap-6 md:grid-cols-3">

                    <div
                        v-for="drink in featuredDrinks"
                        :key="drink.name"
                        class="group overflow-hidden rounded-[30px] bg-white text-[#17251d]"
                    >

                        <div class="flex h-64 items-center justify-center bg-[#f8f7f2] text-[120px] transition duration-500 group-hover:scale-105">
                            {{ drink.icon }}
                        </div>

                        <div class="p-7">

                            <p class="text-xs font-bold uppercase tracking-wider text-gray-400">
                                {{ drink.category }}
                            </p>

                            <div class="mt-2 flex items-center justify-between">
                                <h3 class="text-2xl font-black">
                                    {{ drink.name }}
                                </h3>

                                <span class="font-black text-[#e85d3f]">
                                    {{ drink.price }}
                                </span>
                            </div>

                            <Link
                                href="/menu"
                                class="mt-6 block rounded-full bg-[#17251d] py-3 text-center text-sm font-bold text-white transition hover:bg-[#e85d3f]"
                            >
                                Add to order
                            </Link>

                        </div>

                    </div>

                </div>

            </div>
        </section>


        <!-- WHY DRINKY -->
        <section class="py-24">

            <div class="mx-auto max-w-7xl px-6 lg:px-8">

                <div class="grid gap-16 lg:grid-cols-2 lg:items-center">

                    <div>

                        <p class="mb-3 text-sm font-bold uppercase tracking-[0.2em] text-[#e85d3f]">
                            Why DRINKY?
                        </p>

                        <h2 class="text-4xl font-black tracking-tight sm:text-5xl">
                            Simple ingredients.
                            <br />
                            Big flavour.
                        </h2>

                        <p class="mt-6 max-w-lg text-lg leading-8 text-gray-600">
                            We believe good drinks don't need complicated ingredients.
                            Just fresh flavours, quality ingredients and a little love.
                        </p>

                        <Link
                            href="/about"
                            class="mt-8 inline-block rounded-full bg-[#17251d] px-7 py-4 font-bold text-white transition hover:bg-[#e85d3f]"
                        >
                            Learn about DRINKY
                        </Link>

                    </div>


                    <div class="grid grid-cols-2 gap-5">

                        <div class="rounded-[28px] bg-[#f4c95d] p-7">
                            <div class="text-4xl">🍓</div>

                            <h3 class="mt-8 text-xl font-black">
                                Fresh ingredients
                            </h3>

                            <p class="mt-2 text-sm text-gray-700">
                                Quality ingredients in every drink.
                            </p>
                        </div>


                        <div class="mt-10 rounded-[28px] bg-[#d9e8c8] p-7">
                            <div class="text-4xl">⚡</div>

                            <h3 class="mt-8 text-xl font-black">
                                Made fresh
                            </h3>

                            <p class="mt-2 text-sm text-gray-700">
                                Prepared fresh when you order.
                            </p>
                        </div>


                        <div class="rounded-[28px] bg-[#f3ddd4] p-7">
                            <div class="text-4xl">❤️</div>

                            <h3 class="mt-8 text-xl font-black">
                                Made with love
                            </h3>

                            <p class="mt-2 text-sm text-gray-700">
                                Because boring drinks are sad.
                            </p>
                        </div>


                        <div class="mt-10 rounded-[28px] bg-[#e8e4dc] p-7">
                            <div class="text-4xl">🚴</div>

                            <h3 class="mt-8 text-xl font-black">
                                Easy ordering
                            </h3>

                            <p class="mt-2 text-sm text-gray-700">
                                Order online and enjoy.
                            </p>
                        </div>

                    </div>

                </div>

            </div>
        </section>


        <!-- CTA -->
        <section class="px-6 pb-24 lg:px-8">

            <div class="mx-auto max-w-7xl overflow-hidden rounded-[40px] bg-[#e85d3f] px-8 py-16 text-center text-white sm:px-16">

                <p class="text-sm font-bold uppercase tracking-[0.2em] text-white/70">
                    Ready?
                </p>

                <h2 class="mt-4 text-4xl font-black sm:text-6xl">
                    Your next favourite drink is waiting.
                </h2>

                <p class="mx-auto mt-5 max-w-xl text-lg text-white/80">
                    Explore our menu and find something delicious.
                </p>

                <Link
                    href="/menu"
                    class="mt-8 inline-block rounded-full bg-white px-8 py-4 font-black text-[#e85d3f] transition hover:-translate-y-1"
                >
                    Order a Drink →
                </Link>

            </div>

        </section>


        <!-- FOOTER -->
        <footer class="border-t border-black/10 bg-white">

            <div class="mx-auto flex max-w-7xl flex-col justify-between gap-6 px-6 py-10 md:flex-row md:items-center lg:px-8">

                <div>
                    <Link href="/" class="text-2xl font-black">
                        drink<span class="text-[#e85d3f]">y</span>
                    </Link>

                    <p class="mt-2 text-sm text-gray-500">
                        Drink better. Feel better.
                    </p>
                </div>

                <div class="flex gap-6 text-sm font-semibold">
                    <Link href="/menu" class="hover:text-[#e85d3f]">
                        Menu
                    </Link>

                    <Link href="/about" class="hover:text-[#e85d3f]">
                        About
                    </Link>

                    <Link href="/contact" class="hover:text-[#e85d3f]">
                        Contact
                    </Link>
                </div>

            </div>

            <div class="border-t border-black/5 py-5 text-center text-xs text-gray-400">
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

:deep(body) {
    margin: 0;
    background: #f8f7f2;
    font-family: Inter, ui-sans-serif, system-ui, sans-serif;
}

.drinky-page {
    min-height: 100vh;
    background: #f8f7f2;
    color: #17251d;
}

/* =========================================
   NAVBAR
   ========================================= */

.navbar {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    z-index: 50;
}

.nav-link {
    position: relative;
    transition: color 0.25s ease;
}

.nav-link:hover {
    color: #e85d3f;
}

.nav-link.active {
    color: #e85d3f;
}

.nav-link.active::after {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    bottom: -8px;
    height: 2px;
    border-radius: 10px;
    background: #e85d3f;
}

/* =========================================
   HERO
   ========================================= */

.hero-section {
    position: relative;
    min-height: 720px;
    overflow: hidden;
}

.hero-content {
    animation: fadeUp 0.8s ease-out;
}

.hero-visual {
    animation: scaleIn 0.9s ease-out;
}

/* Decorative circles */

.hero-yellow-circle {
    position: absolute;
    width: 430px;
    height: 430px;
    right: -120px;
    top: -120px;
    border-radius: 50%;
    background: rgba(244, 201, 93, 0.4);
}

.hero-green-circle {
    position: absolute;
    width: 280px;
    height: 280px;
    left: -100px;
    bottom: -100px;
    border-radius: 50%;
    background: rgba(217, 232, 200, 0.6);
}

/* =========================================
   HERO DRINK
   ========================================= */

.drink-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 560px;
}

.drink-background {
    position: absolute;
    width: 500px;
    height: 500px;
    border-radius: 50%;
    background: #f4c95d;
}

.drink-cup {
    position: relative;
    z-index: 10;

    width: 280px;
    height: 470px;

    display: flex;
    align-items: flex-end;
    justify-content: center;

    border: 8px solid white;
    border-radius: 30px 30px 70px 70px;

    background: linear-gradient(
        to bottom,
        #ff9b62,
        #f06b42,
        #d94a32
    );

    box-shadow: 0 30px 70px rgba(0, 0, 0, 0.2);

    transform: rotate(-5deg);

    animation: drinkFloat 4s ease-in-out infinite;
}

/* Straw */

.drink-straw {
    position: absolute;

    width: 20px;
    height: 160px;

    top: -115px;
    right: -35px;

    border-radius: 20px;

    background: #e85d3f;

    transform: rotate(18deg);
}

/* Ice */

.ice {
    position: absolute;

    width: 50px;
    height: 50px;

    border-radius: 12px;

    background: rgba(255, 255, 255, 0.25);

    backdrop-filter: blur(3px);
}

.ice-one {
    top: 100px;
    left: 35px;
    transform: rotate(12deg);
}

.ice-two {
    top: 155px;
    right: 35px;
    transform: rotate(-12deg);
}

/* Fruit */

.drink-fruit {
    position: absolute;
    top: -45px;
    left: 25px;

    font-size: 70px;

    animation: fruitFloat 3s ease-in-out infinite;
}

/* Drink label */

.drink-label {
    position: relative;
    z-index: 5;

    margin-bottom: 75px;
    padding: 18px 30px;

    border-radius: 18px;

    background: rgba(255, 255, 255, 0.93);

    text-align: center;

    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
}

/* Floating product card */

.floating-product {
    position: absolute;
    z-index: 20;

    left: 0;
    bottom: 40px;

    padding: 16px;

    border-radius: 18px;

    background: white;

    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.14);

    animation: badgeFloat 3s ease-in-out infinite;
}

/* =========================================
   BUTTONS
   ========================================= */

.drinky-btn {
    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease,
        background 0.25s ease;
}

.drinky-btn:hover {
    transform: translateY(-3px);

    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
}

.drinky-btn:active {
    transform: translateY(0);
}

/* =========================================
   CATEGORY CARDS
   ========================================= */

.category-card {
    position: relative;

    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}

.category-card:hover {
    transform: translateY(-8px);

    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
}

.category-icon {
    transition:
        transform 0.3s ease,
        background 0.3s ease;
}

.category-card:hover .category-icon {
    transform: scale(1.12) rotate(5deg);
}

/* =========================================
   FEATURED DRINK CARDS
   ========================================= */

.featured-card {
    overflow: hidden;

    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}

.featured-card:hover {
    transform: translateY(-8px);

    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
}

.featured-image {
    transition: transform 0.5s ease;
}

.featured-card:hover .featured-image {
    transform: scale(1.08);
}

/* =========================================
   WHY DRINKY
   ========================================= */

.feature-box {
    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}

.feature-box:hover {
    transform: translateY(-7px);

    box-shadow: 0 18px 35px rgba(0, 0, 0, 0.08);
}

/* =========================================
   CTA
   ========================================= */

.cta-section {
    position: relative;
    overflow: hidden;
}

.cta-section::before {
    content: "";

    position: absolute;

    width: 320px;
    height: 320px;

    top: -170px;
    right: -80px;

    border-radius: 50%;

    background: rgba(255, 255, 255, 0.08);
}

.cta-section::after {
    content: "";

    position: absolute;

    width: 220px;
    height: 220px;

    bottom: -120px;
    left: -70px;

    border-radius: 50%;

    background: rgba(255, 255, 255, 0.06);
}

/* =========================================
   FOOTER
   ========================================= */

.footer-link {
    transition: color 0.2s ease;
}

.footer-link:hover {
    color: #e85d3f;
}

/* =========================================
   ANIMATIONS
   ========================================= */

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes scaleIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }

    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes drinkFloat {
    0%,
    100% {
        transform: translateY(0) rotate(-5deg);
    }

    50% {
        transform: translateY(-14px) rotate(-3deg);
    }
}

@keyframes fruitFloat {
    0%,
    100% {
        transform: translateY(0) rotate(0);
    }

    50% {
        transform: translateY(-8px) rotate(5deg);
    }
}

@keyframes badgeFloat {
    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-7px);
    }
}

/* =========================================
   RESPONSIVE
   ========================================= */

@media (max-width: 1024px) {
    .hero-section {
        min-height: auto;
    }

    .drink-background {
        width: 430px;
        height: 430px;
    }

    .drink-cup {
        width: 250px;
        height: 420px;
    }
}

@media (max-width: 768px) {

    .hero-section {
        padding-top: 100px;
    }

    .drink-wrapper {
        min-height: 500px;
        margin-top: 30px;
    }

    .drink-background {
        width: 350px;
        height: 350px;
    }

    .drink-cup {
        width: 220px;
        height: 370px;
    }

    .drink-fruit {
        font-size: 55px;
    }

    .floating-product {
        left: 10px;
        bottom: 20px;
    }

    .hero-yellow-circle {
        width: 280px;
        height: 280px;
    }

    .hero-green-circle {
        width: 200px;
        height: 200px;
    }
}

@media (max-width: 640px) {

    .drink-wrapper {
        min-height: 430px;
    }

    .drink-background {
        width: 290px;
        height: 290px;
    }

    .drink-cup {
        width: 190px;
        height: 320px;
        border-width: 6px;
    }

    .drink-straw {
        width: 15px;
        height: 120px;
        right: -25px;
        top: -90px;
    }

    .drink-label {
        margin-bottom: 50px;
        padding: 12px 20px;
    }

    .floating-product {
        transform: scale(0.85);
        transform-origin: left bottom;
    }
}
</style>