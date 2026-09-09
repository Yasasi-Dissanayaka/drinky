<script setup>
import { Head, Link } from '@inertiajs/vue3'
import { ref, computed } from 'vue'

const selectedCategory = ref('All')

const categories = [
    'All',
    'Fresh Juices',
    'Smoothies',
    'Milkshakes',
    'Coffee',
    'Tea',
    'Iced Drinks',
]

const drinks = [
    {
        id: 1,
        name: 'Mango Blast',
        category: 'Smoothies',
        description: 'Creamy mango smoothie with a fresh tropical taste.',
        price: 650,
        icon: '🥭',
        popular: true,
    },
    {
        id: 2,
        name: 'Berry Fresh',
        category: 'Fresh Juices',
        description: 'A refreshing mix of fresh berries and fruit.',
        price: 700,
        icon: '🍓',
        popular: true,
    },
    {
        id: 3,
        name: 'Choco Dream',
        category: 'Milkshakes',
        description: 'Rich chocolate milkshake topped with creamy goodness.',
        price: 750,
        icon: '🍫',
        popular: false,
    },
    {
        id: 4,
        name: 'Pineapple Splash',
        category: 'Fresh Juices',
        description: 'Fresh pineapple juice with a bright tropical flavour.',
        price: 600,
        icon: '🍍',
        popular: false,
    },
    {
        id: 5,
        name: 'Strawberry Cream',
        category: 'Smoothies',
        description: 'Sweet strawberries blended with smooth creamy milk.',
        price: 700,
        icon: '🍓',
        popular: true,
    },
    {
        id: 6,
        name: 'Classic Coffee',
        category: 'Coffee',
        description: 'Smooth and rich coffee made for your everyday moment.',
        price: 450,
        icon: '☕',
        popular: false,
    },
    {
        id: 7,
        name: 'Peach Iced Tea',
        category: 'Tea',
        description: 'Refreshing iced tea with a sweet peach flavour.',
        price: 500,
        icon: '🍑',
        popular: false,
    },
    {
        id: 8,
        name: 'Lime Cooler',
        category: 'Iced Drinks',
        description: 'A cool and refreshing lime drink with a citrus kick.',
        price: 450,
        icon: '🍋',
        popular: true,
    },
]

const filteredDrinks = computed(() => {
    if (selectedCategory.value === 'All') {
        return drinks
    }

    return drinks.filter(
        drink => drink.category === selectedCategory.value
    )
})
const addToCart = (drink) => {
    const cart = JSON.parse(
        localStorage.getItem('drinky_cart') || '[]'
    )

    const existingItem = cart.find(
        item => item.id === drink.id
    )

    if (existingItem) {
        existingItem.quantity++
    } else {
        cart.push({
            id: drink.id,
            name: drink.name,
            category: drink.category,
            price: drink.price,
            quantity: 1,
            icon: drink.icon
        })
    }

    localStorage.setItem(
        'drinky_cart',
        JSON.stringify(cart)
    )

    alert(`${drink.name} added to cart!`)
}
</script>

<template>
    <Head title="Menu - DRINKY" />

    <div class="drinky-menu">

        <!-- =========================
             NAVBAR
        ========================== -->

        <header class="menu-navbar">
            <nav class="menu-nav-inner">

                <Link href="/" class="menu-logo">
                    drink<span>y</span>
                </Link>

                <div class="menu-links">

                    <Link href="/" class="menu-link">
                        Home
                    </Link>

                    <Link href="/menu" class="menu-link active">
                        Menu
                    </Link>

                    <Link href="/about" class="menu-link">
                        About
                    </Link>

                    <Link href="/contact" class="menu-link">
                        Contact
                    </Link>

                </div>

                <div class="menu-actions">

                    <Link href="/cart" class="cart-button">
                        🛒 Cart
                    </Link>

                    <Link href="/login" class="login-button">
                        Login
                    </Link>

                </div>

            </nav>
        </header>


        <!-- =========================
             MENU HERO
        ========================== -->

        <section class="menu-hero">

            <div class="menu-hero-content">

                <span class="menu-small-title">
                    OUR MENU
                </span>

                <h1>
                    Find your
                    <span>perfect drink.</span>
                </h1>

                <p>
                    Fresh juices, creamy smoothies, delicious shakes
                    and refreshing drinks made just for you.
                </p>

            </div>

            <div class="menu-hero-decoration">
                🥤
            </div>

        </section>


        <!-- =========================
             CATEGORY FILTER
        ========================== -->

        <section class="menu-section">

            <div class="menu-container">

                <div class="category-header">

                    <div>
                        <span class="section-label">
                            EXPLORE
                        </span>

                        <h2>
                            What are you craving?
                        </h2>
                    </div>

                    <p class="drink-count">
                        {{ filteredDrinks.length }} drinks
                    </p>

                </div>


                <div class="category-buttons">

                    <button
                        v-for="category in categories"
                        :key="category"
                        @click="selectedCategory = category"
                        :class="[
                            'category-button',
                            {
                                active:
                                    selectedCategory === category
                            }
                        ]"
                    >
                        {{ category }}
                    </button>

                </div>


                <!-- =========================
                     DRINK GRID
                ========================== -->

                <div class="drink-grid">

                    <div
                        v-for="drink in filteredDrinks"
                        :key="drink.id"
                        class="menu-drink-card"
                    >

                        <!-- Drink image area -->

                        <div class="drink-image">

                            <span
                                v-if="drink.popular"
                                class="popular-badge"
                            >
                                ⭐ Popular
                            </span>

                            <span class="drink-emoji">
                                {{ drink.icon }}
                            </span>

                        </div>


                        <!-- Drink information -->

                        <div class="drink-info">

                            <span class="drink-category">
                                {{ drink.category }}
                            </span>

                            <div class="drink-title-row">

                                <h3>
                                    {{ drink.name }}
                                </h3>

                                <span class="drink-price">
                                    Rs. {{ drink.price }}
                                </span>

                            </div>

                            <p>
                                {{ drink.description }}
                            </p>


                            <div class="drink-bottom">

                                <Link
                                    :href="`/menu/${drink.id}`"
                                    class="view-button"
                                >
                                    View Details
                                </Link>

                                <button
                                    class="add-button"
                                    @click="addToCart(drink)"
                                >
                                    +
                                </button>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- Empty state -->

                <div
                    v-if="filteredDrinks.length === 0"
                    class="empty-menu"
                >
                    <span>🥤</span>

                    <h3>
                        No drinks found
                    </h3>

                    <p>
                        Try another category.
                    </p>
                </div>

            </div>

        </section>


        <!-- =========================
             BOTTOM CTA
        ========================== -->

        <section class="menu-cta">

            <div>

                <span>
                    NEED A LITTLE INSPIRATION?
                </span>

                <h2>
                    Not sure what to drink?
                </h2>

                <p>
                    Start with one of our customer favourites.
                </p>

                <Link
                    href="/menu"
                    class="cta-button"
                >
                    Explore Favourites →
                </Link>

            </div>

            <div class="cta-drink">
                🥭
            </div>

        </section>


        <!-- =========================
             FOOTER
        ========================== -->

        <footer class="menu-footer">

            <div class="footer-inner">

                <div>

                    <Link href="/" class="footer-logo">
                        drink<span>y</span>
                    </Link>

                    <p>
                        Drink better. Feel better.
                    </p>

                </div>

                <div class="footer-links">

                    <Link href="/">
                        Home
                    </Link>

                    <Link href="/menu">
                        Menu
                    </Link>

                    <Link href="/about">
                        About
                    </Link>

                    <Link href="/contact">
                        Contact
                    </Link>

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
   GLOBAL
========================================= */

.drinky-menu {
    min-height: 100vh;
    background: #f8f7f2;
    color: #17251d;
    font-family: Inter, ui-sans-serif, system-ui, sans-serif;
}

* {
    box-sizing: border-box;
}


/* =========================================
   NAVBAR
========================================= */

.menu-navbar {
    background: #ffffff;
    border-bottom: 1px solid rgba(23, 37, 29, 0.08);
}

.menu-nav-inner {
    max-width: 1280px;
    margin: auto;
    padding: 22px 32px;

    display: flex;
    align-items: center;
    justify-content: space-between;
}

.menu-logo {
    font-size: 32px;
    font-weight: 900;
    color: #17251d;
    text-decoration: none;
    letter-spacing: -1.5px;
}

.menu-logo span,
.footer-logo span {
    color: #e85d3f;
}

.menu-links {
    display: flex;
    gap: 34px;
}

.menu-link {
    position: relative;
    color: #17251d;
    text-decoration: none;
    font-size: 14px;
    font-weight: 700;
    transition: color 0.25s ease;
}

.menu-link:hover,
.menu-link.active {
    color: #e85d3f;
}

.menu-link.active::after {
    content: "";

    position: absolute;

    left: 0;
    right: 0;
    bottom: -9px;

    height: 2px;

    background: #e85d3f;
    border-radius: 10px;
}

.menu-actions {
    display: flex;
    align-items: center;
    gap: 10px;
}

.cart-button,
.login-button {
    padding: 11px 18px;
    border-radius: 999px;

    text-decoration: none;

    font-size: 14px;
    font-weight: 700;

    transition: 0.25s ease;
}

.cart-button {
    color: #17251d;
    background: #f8f7f2;
}

.cart-button:hover {
    background: #e9e6dd;
}

.login-button {
    color: white;
    background: #17251d;
}

.login-button:hover {
    background: #e85d3f;
}


/* =========================================
   MENU HERO
========================================= */

.menu-hero {
    position: relative;

    min-height: 390px;

    display: flex;
    align-items: center;

    padding: 80px 8%;

    overflow: hidden;

    background: #17251d;
    color: white;
}

.menu-hero-content {
    position: relative;
    z-index: 2;

    max-width: 720px;
}

.menu-small-title {
    display: inline-block;

    margin-bottom: 18px;

    color: #f4c95d;

    font-size: 13px;
    font-weight: 800;

    letter-spacing: 0.2em;
}

.menu-hero h1 {
    margin: 0;

    font-size: clamp(50px, 7vw, 88px);

    line-height: 0.95;

    font-weight: 900;

    letter-spacing: -4px;
}

.menu-hero h1 span {
    display: block;
    color: #e85d3f;
}

.menu-hero p {
    max-width: 600px;

    margin-top: 25px;

    color: rgba(255, 255, 255, 0.7);

    font-size: 18px;
    line-height: 1.7;
}

.menu-hero-decoration {
    position: absolute;

    right: 8%;
    top: 50%;

    transform: translateY(-50%);

    width: 250px;
    height: 250px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #f4c95d;

    font-size: 130px;

    animation: floatDrink 4s ease-in-out infinite;
}


/* =========================================
   MENU SECTION
========================================= */

.menu-section {
    padding: 90px 24px;
}

.menu-container {
    max-width: 1280px;
    margin: auto;
}

.category-header {
    display: flex;
    align-items: end;
    justify-content: space-between;

    margin-bottom: 35px;
}

.section-label {
    display: block;

    margin-bottom: 10px;

    color: #e85d3f;

    font-size: 12px;
    font-weight: 800;

    letter-spacing: 0.2em;
}

.category-header h2 {
    margin: 0;

    font-size: 42px;
    font-weight: 900;

    letter-spacing: -1.5px;
}

.drink-count {
    margin: 0;

    color: #777;
    font-size: 14px;
}


/* =========================================
   CATEGORY BUTTONS
========================================= */

.category-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;

    margin-bottom: 45px;
}

.category-button {
    padding: 12px 20px;

    border: 1px solid rgba(23, 37, 29, 0.15);

    border-radius: 999px;

    background: white;
    color: #17251d;

    font-family: inherit;

    font-size: 14px;
    font-weight: 700;

    cursor: pointer;

    transition: all 0.25s ease;
}

.category-button:hover {
    border-color: #e85d3f;
    color: #e85d3f;
}

.category-button.active {
    border-color: #17251d;

    background: #17251d;
    color: white;
}


/* =========================================
   DRINK GRID
========================================= */

.drink-grid {
    display: grid;

    grid-template-columns: repeat(3, 1fr);

    gap: 25px;
}

.menu-drink-card {
    overflow: hidden;

    border-radius: 28px;

    background: white;

    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);

    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}

.menu-drink-card:hover {
    transform: translateY(-8px);

    box-shadow: 0 20px 45px rgba(0, 0, 0, 0.1);
}


/* =========================================
   DRINK IMAGE
========================================= */

.drink-image {
    position: relative;

    height: 270px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #f8f7f2;

    overflow: hidden;
}

.drink-emoji {
    font-size: 125px;

    transition:
        transform 0.4s ease;
}

.menu-drink-card:hover .drink-emoji {
    transform: scale(1.12) rotate(3deg);
}

.popular-badge {
    position: absolute;

    top: 18px;
    left: 18px;

    padding: 7px 12px;

    border-radius: 999px;

    background: #f4c95d;

    color: #17251d;

    font-size: 11px;
    font-weight: 800;
}


/* =========================================
   DRINK INFO
========================================= */

.drink-info {
    padding: 25px;
}

.drink-category {
    color: #e85d3f;

    font-size: 11px;
    font-weight: 800;

    text-transform: uppercase;

    letter-spacing: 0.12em;
}

.drink-title-row {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 15px;

    margin-top: 7px;
}

.drink-title-row h3 {
    margin: 0;

    font-size: 23px;
    font-weight: 900;
}

.drink-price {
    white-space: nowrap;

    color: #e85d3f;

    font-size: 15px;
    font-weight: 900;
}

.drink-info > p {
    min-height: 48px;

    margin: 10px 0 20px;

    color: #777;

    font-size: 14px;
    line-height: 1.6;
}


/* =========================================
   CARD BUTTONS
========================================= */

.drink-bottom {
    display: flex;
    align-items: center;
    gap: 10px;
}

.view-button {
    flex: 1;

    padding: 12px;

    border-radius: 999px;

    background: #17251d;
    color: white;

    text-align: center;
    text-decoration: none;

    font-size: 13px;
    font-weight: 800;

    transition: background 0.25s ease;
}

.view-button:hover {
    background: #e85d3f;
}

.add-button {
    width: 44px;
    height: 44px;

    border: none;

    border-radius: 50%;

    background: #e85d3f;
    color: white;

    font-size: 25px;
    line-height: 1;

    cursor: pointer;

    transition:
        transform 0.25s ease,
        background 0.25s ease;
}

.add-button:hover {
    transform: rotate(90deg);
    background: #17251d;
}


/* =========================================
   EMPTY MENU
========================================= */

.empty-menu {
    padding: 80px 20px;

    text-align: center;
}

.empty-menu span {
    font-size: 70px;
}

.empty-menu h3 {
    margin: 15px 0 5px;

    font-size: 25px;
}

.empty-menu p {
    color: #777;
}


/* =========================================
   CTA
========================================= */

.menu-cta {
    position: relative;

    max-width: 1280px;

    margin: 0 auto 90px;

    padding: 60px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    overflow: hidden;

    border-radius: 35px;

    background: #e85d3f;

    color: white;
}

.menu-cta span {
    font-size: 11px;
    font-weight: 800;

    letter-spacing: 0.18em;

    color: rgba(255, 255, 255, 0.7);
}

.menu-cta h2 {
    margin: 10px 0;

    font-size: 40px;
    font-weight: 900;
}

.menu-cta p {
    margin: 0;

    color: rgba(255, 255, 255, 0.8);
}

.cta-button {
    display: inline-block;

    margin-top: 25px;

    padding: 13px 22px;

    border-radius: 999px;

    background: white;
    color: #e85d3f;

    text-decoration: none;

    font-size: 14px;
    font-weight: 800;

    transition:
        transform 0.25s ease;
}

.cta-button:hover {
    transform: translateY(-3px);
}

.cta-drink {
    font-size: 150px;

    animation: floatDrink 4s ease-in-out infinite;
}


/* =========================================
   FOOTER
========================================= */

.menu-footer {
    border-top: 1px solid rgba(23, 37, 29, 0.1);

    background: white;
}

.footer-inner {
    max-width: 1280px;

    margin: auto;

    padding: 45px 32px;

    display: flex;
    align-items: center;
    justify-content: space-between;
}

.footer-logo {
    color: #17251d;

    text-decoration: none;

    font-size: 28px;
    font-weight: 900;
}

.footer-inner p {
    margin-top: 6px;

    color: #888;

    font-size: 13px;
}

.footer-links {
    display: flex;
    gap: 25px;
}

.footer-links a {
    color: #17251d;

    text-decoration: none;

    font-size: 13px;
    font-weight: 700;

    transition: color 0.2s ease;
}

.footer-links a:hover {
    color: #e85d3f;
}

.footer-bottom {
    padding: 18px;

    border-top: 1px solid rgba(23, 37, 29, 0.06);

    text-align: center;

    color: #999;

    font-size: 11px;
}


/* =========================================
   ANIMATION
========================================= */

@keyframes floatDrink {

    0%,
    100% {
        transform: translateY(-50%);
    }

    50% {
        transform: translateY(calc(-50% - 12px));
    }
}


/* =========================================
   TABLET
========================================= */

@media (max-width: 1000px) {

    .menu-links {
        display: none;
    }

    .drink-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .menu-hero-decoration {
        right: 3%;
        transform: translateY(-50%) scale(0.75);
    }
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 650px) {

    .menu-nav-inner {
        padding: 18px 20px;
    }

    .menu-logo {
        font-size: 27px;
    }

    .login-button {
        display: none;
    }

    .menu-hero {
        min-height: 500px;
        padding: 70px 25px;
    }

    .menu-hero h1 {
        font-size: 55px;
        letter-spacing: -2px;
    }

    .menu-hero p {
        font-size: 16px;
    }

    .menu-hero-decoration {
        opacity: 0.25;

        right: -60px;

        transform: translateY(-50%) scale(0.8);
    }

    .menu-section {
        padding: 60px 18px;
    }

    .category-header {
        align-items: flex-start;
        flex-direction: column;
        gap: 10px;
    }

    .category-header h2 {
        font-size: 32px;
    }

    .category-buttons {
        overflow-x: auto;
        flex-wrap: nowrap;

        padding-bottom: 5px;
    }

    .category-button {
        flex-shrink: 0;
    }

    .drink-grid {
        grid-template-columns: 1fr;
    }

    .menu-cta {
        margin: 0 18px 60px;

        padding: 40px 25px;

        flex-direction: column;
        align-items: flex-start;
    }

    .menu-cta h2 {
        font-size: 32px;
    }

    .cta-drink {
        display: none;
    }

    .footer-inner {
        padding: 35px 20px;

        flex-direction: column;
        align-items: flex-start;

        gap: 25px;
    }

    .footer-links {
        flex-wrap: wrap;
    }
}
</style>