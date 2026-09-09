<script setup>
import { Head, Link } from '@inertiajs/vue3'
import { ref, computed } from 'vue'

const props = defineProps({
    drink: {
        type: [String, Object],
        default: '1'
    }
})

/*
|--------------------------------------------------------------------------
| Sample drink data
|--------------------------------------------------------------------------
*/

const drinks = [
    {
        id: 1,
        name: 'Mango Blast',
        category: 'Fresh Juices',
        price: 650,
        emoji: '🥭',
        description:
            'A refreshing mango drink made with sweet, juicy mangoes. Perfect for a hot day or whenever you need a tropical boost.',
        ingredients: [
            'Fresh mango',
            'Ice',
            'Fresh juice',
            'Natural sweetness'
        ],
        rating: 4.9,
        reviews: 128,
        popular: true
    },
    {
        id: 2,
        name: 'Berry Fresh',
        category: 'Smoothies',
        price: 700,
        emoji: '🍓',
        description:
            'A delicious blend of fresh berries and creamy goodness. Smooth, fruity and packed with flavour.',
        ingredients: [
            'Strawberries',
            'Blueberries',
            'Milk',
            'Ice'
        ],
        rating: 4.8,
        reviews: 96,
        popular: true
    },
    {
        id: 3,
        name: 'Choco Dream',
        category: 'Milkshakes',
        price: 750,
        emoji: '🍫',
        description:
            'A rich and creamy chocolate milkshake made for serious chocolate lovers.',
        ingredients: [
            'Chocolate',
            'Milk',
            'Ice cream',
            'Chocolate syrup'
        ],
        rating: 4.9,
        reviews: 114,
        popular: true
    },
    {
        id: 4,
        name: 'Pineapple Splash',
        category: 'Fresh Juices',
        price: 600,
        emoji: '🍍',
        description:
            'A bright and refreshing pineapple drink with a naturally sweet and tropical flavour.',
        ingredients: [
            'Fresh pineapple',
            'Ice',
            'Fresh juice'
        ],
        rating: 4.7,
        reviews: 82,
        popular: false
    },
    {
        id: 5,
        name: 'Strawberry Cream',
        category: 'Milkshakes',
        price: 700,
        emoji: '🍓',
        description:
            'A creamy strawberry favourite made with sweet strawberries and smooth milk.',
        ingredients: [
            'Strawberries',
            'Milk',
            'Ice cream',
            'Cream'
        ],
        rating: 4.8,
        reviews: 105,
        popular: true
    },
    {
        id: 6,
        name: 'Classic Coffee',
        category: 'Coffee',
        price: 450,
        emoji: '☕',
        description:
            'A smooth classic coffee with a rich aroma and balanced flavour.',
        ingredients: [
            'Coffee',
            'Hot water',
            'Milk'
        ],
        rating: 4.6,
        reviews: 74,
        popular: false
    },
    {
        id: 7,
        name: 'Peach Iced Tea',
        category: 'Tea',
        price: 500,
        emoji: '🍑',
        description:
            'Refreshing iced tea with a sweet peach flavour. Light, fruity and refreshing.',
        ingredients: [
            'Black tea',
            'Peach',
            'Ice',
            'Fresh lemon'
        ],
        rating: 4.7,
        reviews: 68,
        popular: false
    },
    {
        id: 8,
        name: 'Lime Cooler',
        category: 'Iced Drinks',
        price: 450,
        emoji: '🍋',
        description:
            'A refreshing lime cooler with a bright citrus flavour and plenty of ice.',
        ingredients: [
            'Fresh lime',
            'Ice',
            'Water',
            'Mint'
        ],
        rating: 4.8,
        reviews: 91,
        popular: true
    }
]


/*
|--------------------------------------------------------------------------
| Find selected drink
|--------------------------------------------------------------------------
*/

const selectedDrink = computed(() => {

    const drinkId = Number(
        typeof props.drink === 'object'
            ? props.drink.id
            : props.drink
    )

    return (
        drinks.find(drink => drink.id === drinkId)
        || drinks[0]
    )
})


/*
|--------------------------------------------------------------------------
| Quantity
|--------------------------------------------------------------------------
*/

const quantity = ref(1)

const increaseQuantity = () => {
    if (quantity.value < 10) {
        quantity.value++
    }
}

const decreaseQuantity = () => {
    if (quantity.value > 1) {
        quantity.value--
    }
}


/*
|--------------------------------------------------------------------------
| Add to cart
|--------------------------------------------------------------------------
*/

const addedToCart = ref(false)

const addToCart = () => {

    addedToCart.value = true

    setTimeout(() => {
        addedToCart.value = false
    }, 2500)
}


/*
|--------------------------------------------------------------------------
| Total
|--------------------------------------------------------------------------
*/

const itemTotal = computed(() => {
    return selectedDrink.value.price * quantity.value
})


/*
|--------------------------------------------------------------------------
| Related drinks
|--------------------------------------------------------------------------
*/

const relatedDrinks = computed(() => {

    return drinks
        .filter(drink => drink.id !== selectedDrink.value.id)
        .slice(0, 3)
})
</script>


<template>

    <Head :title="`${selectedDrink.name} | DRINKY`" />

    <div class="details-page">

        <!-- NAVBAR -->
        <nav class="navbar">

            <div class="nav-container">

                <Link href="/" class="logo">
                    DRINKY<span>.</span>
                </Link>


                <div class="nav-links">

                    <Link href="/">
                        Home
                    </Link>

                    <Link href="/menu" class="active">
                        Menu
                    </Link>

                    <Link href="/about">
                        About
                    </Link>

                    <Link href="/contact">
                        Contact
                    </Link>

                </div>


                <div class="nav-actions">

                    <Link
                        href="/cart"
                        class="cart-button"
                    >
                        🛒
                        <span>Cart</span>
                    </Link>

                </div>

            </div>

        </nav>


        <!-- BREADCRUMB -->
        <div class="breadcrumb-container">

            <Link href="/">
                Home
            </Link>

            <span>›</span>

            <Link href="/menu">
                Menu
            </Link>

            <span>›</span>

            <strong>
                {{ selectedDrink.name }}
            </strong>

        </div>


        <!-- PRODUCT DETAILS -->
        <main class="details-container">

            <!-- IMAGE -->
            <section class="product-visual">

                <div class="visual-background">

                    <span
                        v-if="selectedDrink.popular"
                        class="popular-badge"
                    >
                        ⭐ Popular
                    </span>


                    <div class="large-drink">
                        {{ selectedDrink.emoji }}
                    </div>


                    <div class="fruit-decoration fruit-one">
                        🍓
                    </div>

                    <div class="fruit-decoration fruit-two">
                        🍋
                    </div>

                    <div class="fruit-decoration fruit-three">
                        🫐
                    </div>

                </div>

            </section>


            <!-- INFORMATION -->
            <section class="product-info">

                <span class="category">
                    {{ selectedDrink.category }}
                </span>


                <h1>
                    {{ selectedDrink.name }}
                </h1>


                <!-- RATING -->
                <div class="rating-row">

                    <div class="stars">
                        ★★★★★
                    </div>

                    <strong>
                        {{ selectedDrink.rating }}
                    </strong>

                    <span>
                        ({{ selectedDrink.reviews }} reviews)
                    </span>

                </div>


                <div class="price">
                    Rs. {{ selectedDrink.price.toLocaleString() }}
                </div>


                <p class="description">
                    {{ selectedDrink.description }}
                </p>


                <!-- INGREDIENTS -->
                <div class="ingredients">

                    <h3>
                        What's inside?
                    </h3>

                    <div class="ingredient-list">

                        <span
                            v-for="ingredient in selectedDrink.ingredients"
                            :key="ingredient"
                        >
                            ✓ {{ ingredient }}
                        </span>

                    </div>

                </div>


                <!-- QUANTITY -->
                <div class="purchase-section">

                    <div class="quantity-box">

                        <button
                            type="button"
                            @click="decreaseQuantity"
                        >
                            −
                        </button>

                        <span>
                            {{ quantity }}
                        </span>

                        <button
                            type="button"
                            @click="increaseQuantity"
                        >
                            +
                        </button>

                    </div>


                    <button
                        type="button"
                        class="add-button"
                        @click="addToCart"
                    >

                        <span v-if="!addedToCart">
                            Add to Cart
                        </span>

                        <span v-else>
                            ✓ Added to Cart
                        </span>

                        <strong v-if="!addedToCart">
                            Rs. {{ itemTotal.toLocaleString() }}
                        </strong>

                    </button>

                </div>


                <!-- BENEFITS -->
                <div class="benefits">

                    <div>
                        <span>🥤</span>

                        <div>
                            <strong>Freshly Made</strong>
                            <small>Prepared after you order</small>
                        </div>
                    </div>


                    <div>
                        <span>🚚</span>

                        <div>
                            <strong>Fast Delivery</strong>
                            <small>Delivered in 30–60 minutes</small>
                        </div>
                    </div>


                    <div>
                        <span>💚</span>

                        <div>
                            <strong>Made With Care</strong>
                            <small>Fresh ingredients every time</small>
                        </div>
                    </div>

                </div>

            </section>

        </main>


        <!-- RELATED DRINKS -->
        <section class="related-section">

            <div class="section-heading">

                <div>

                    <span class="section-label">
                        YOU MAY ALSO LIKE
                    </span>

                    <h2>
                        More delicious
                        <span>drinks.</span>
                    </h2>

                </div>

                <Link
                    href="/menu"
                    class="view-menu"
                >
                    View Full Menu →
                </Link>

            </div>


            <div class="related-grid">

                <Link
                    v-for="drink in relatedDrinks"
                    :key="drink.id"
                    :href="`/menu/${drink.id}`"
                    class="related-card"
                >

                    <div class="related-image">
                        {{ drink.emoji }}

                        <span
                            v-if="drink.popular"
                            class="mini-badge"
                        >
                            Popular
                        </span>
                    </div>


                    <div class="related-info">

                        <span>
                            {{ drink.category }}
                        </span>

                        <h3>
                            {{ drink.name }}
                        </h3>

                        <div class="related-bottom">

                            <strong>
                                Rs. {{ drink.price.toLocaleString() }}
                            </strong>

                            <span class="arrow">
                                →
                            </span>

                        </div>

                    </div>

                </Link>

            </div>

        </section>


        <!-- CTA -->
        <section class="cta-section">

            <div class="cta-content">

                <span class="section-label">
                    MORE TO EXPLORE
                </span>

                <h2>
                    Find your next
                    <span>favourite.</span>
                </h2>

                <p>
                    There is always another delicious drink
                    waiting for you.
                </p>

                <Link
                    href="/menu"
                    class="cta-button"
                >
                    Explore Menu
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
                © 2026 DRINKY. All rights reserved.
            </div>

        </footer>

    </div>

</template>


<style scoped>

/* =========================
   GENERAL
========================= */

.details-page {
    min-height: 100vh;

    background: #f8faf9;

    color: #17231d;

    font-family:
        Arial,
        Helvetica,
        sans-serif;
}


/* =========================
   NAVBAR
========================= */

.navbar {
    position: sticky;

    top: 0;

    z-index: 100;

    background:
        rgba(255, 255, 255, 0.94);

    backdrop-filter: blur(16px);

    border-bottom:
        1px solid #e4ebe6;
}

.nav-container {
    max-width: 1200px;

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
   BREADCRUMB
========================= */

.breadcrumb-container {
    max-width: 1200px;

    margin: auto;

    padding: 25px 25px 10px;

    display: flex;

    align-items: center;

    gap: 9px;

    color: #9aa39e;

    font-size: 12px;
}

.breadcrumb-container a {
    color: #758079;

    text-decoration: none;
}

.breadcrumb-container a:hover {
    color: #65a976;
}

.breadcrumb-container strong {
    color: #26342c;
}


/* =========================
   PRODUCT DETAILS
========================= */

.details-container {
    max-width: 1200px;

    margin: auto;

    padding: 35px 25px 90px;

    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 75px;

    align-items: center;
}


/* =========================
   PRODUCT VISUAL
========================= */

.product-visual {
    display: flex;

    align-items: center;

    justify-content: center;
}

.visual-background {
    position: relative;

    width: 500px;

    height: 500px;

    display: flex;

    align-items: center;

    justify-content: center;

    background:
        radial-gradient(
            circle,
            #e5f3e8,
            #f1f7f3 65%,
            transparent 66%
        );

    border-radius: 50%;
}

.large-drink {
    position: relative;

    z-index: 2;

    font-size: 190px;

    filter:
        drop-shadow(
            0 25px 25px
            rgba(50, 70, 55, 0.15)
        );

    animation:
        drinkFloat 4s ease-in-out infinite;
}

@keyframes drinkFloat {

    0%,
    100% {
        transform: translateY(0)
            rotate(-2deg);
    }

    50% {
        transform: translateY(-12px)
            rotate(2deg);
    }
}

.popular-badge {
    position: absolute;

    top: 65px;

    left: 55px;

    z-index: 5;

    padding: 9px 14px;

    background: white;

    border-radius: 20px;

    color: #65a976;

    font-size: 11px;

    font-weight: 800;

    box-shadow:
        0 10px 25px
        rgba(40, 60, 45, 0.10);
}

.fruit-decoration {
    position: absolute;

    z-index: 3;

    width: 65px;

    height: 65px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: white;

    border-radius: 50%;

    font-size: 30px;

    box-shadow:
        0 12px 25px
        rgba(40, 60, 45, 0.10);

    animation:
        fruitFloat 3.5s ease-in-out infinite;
}

.fruit-one {
    right: 65px;

    top: 80px;
}

.fruit-two {
    left: 55px;

    bottom: 85px;

    animation-delay: 1s;
}

.fruit-three {
    right: 80px;

    bottom: 65px;

    animation-delay: 2s;
}

@keyframes fruitFloat {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-10px);
    }
}


/* =========================
   PRODUCT INFO
========================= */

.category {
    color: #70ae80;

    font-size: 11px;

    font-weight: 900;

    letter-spacing: 2px;

    text-transform: uppercase;
}

.product-info h1 {
    margin: 10px 0;

    font-size: 53px;

    line-height: 1.05;

    letter-spacing: -2.5px;
}


/* =========================
   RATING
========================= */

.rating-row {
    display: flex;

    align-items: center;

    gap: 8px;

    margin-bottom: 20px;
}

.stars {
    color: #e9ad55;

    font-size: 15px;

    letter-spacing: 1px;
}

.rating-row strong {
    font-size: 13px;
}

.rating-row span {
    color: #8b9690;

    font-size: 12px;
}


/* =========================
   PRICE
========================= */

.price {
    margin-bottom: 20px;

    color: #65a976;

    font-size: 28px;

    font-weight: 900;
}

.description {
    max-width: 550px;

    margin: 0 0 25px;

    color: #6f7c74;

    font-size: 14px;

    line-height: 1.8;
}


/* =========================
   INGREDIENTS
========================= */

.ingredients {
    padding: 20px 0;

    border-top:
        1px solid #e4ebe6;

    border-bottom:
        1px solid #e4ebe6;
}

.ingredients h3 {
    margin: 0 0 13px;

    font-size: 14px;
}

.ingredient-list {
    display: flex;

    flex-wrap: wrap;

    gap: 9px;
}

.ingredient-list span {
    padding: 7px 10px;

    background: #edf6ef;

    border-radius: 8px;

    color: #62806a;

    font-size: 11px;

    font-weight: 600;
}


/* =========================
   PURCHASE
========================= */

.purchase-section {
    display: flex;

    gap: 12px;

    margin-top: 25px;
}

.quantity-box {
    display: flex;

    align-items: center;

    background: white;

    border:
        1px solid #dfe7e1;

    border-radius: 12px;

    overflow: hidden;
}

.quantity-box button {
    width: 42px;

    height: 48px;

    border: none;

    background: transparent;

    color: #536158;

    font-size: 20px;

    cursor: pointer;
}

.quantity-box button:hover {
    background: #edf5ef;
}

.quantity-box span {
    width: 35px;

    text-align: center;

    font-size: 14px;

    font-weight: 800;
}

.add-button {
    flex: 1;

    min-height: 48px;

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 0 18px;

    border: none;

    border-radius: 12px;

    background: #79b88a;

    color: white;

    font-size: 13px;

    font-weight: 800;

    cursor: pointer;

    transition: 0.2s;
}

.add-button:hover {
    background: #65a976;

    transform: translateY(-2px);
}

.add-button strong {
    font-size: 12px;
}


/* =========================
   BENEFITS
========================= */

.benefits {
    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 10px;

    margin-top: 25px;
}

.benefits > div {
    display: flex;

    flex-direction: column;

    align-items: center;

    gap: 8px;

    padding: 13px 8px;

    background: white;

    border:
        1px solid #e4ebe6;

    border-radius: 12px;

    text-align: center;
}

.benefits > div > span {
    font-size: 20px;
}

.benefits strong,
.benefits small {
    display: block;
}

.benefits strong {
    margin-bottom: 3px;

    font-size: 10px;
}

.benefits small {
    color: #909b95;

    font-size: 8px;
}


/* =========================
   RELATED
========================= */

.related-section {
    max-width: 1200px;

    margin: auto;

    padding: 0 25px 100px;
}

.section-heading {
    display: flex;

    align-items: flex-end;

    justify-content: space-between;

    margin-bottom: 30px;
}

.section-label {
    color: #70ae80;

    font-size: 10px;

    font-weight: 900;

    letter-spacing: 2px;
}

.section-heading h2 {
    margin: 10px 0 0;

    font-size: 35px;

    letter-spacing: -1.5px;
}

.section-heading h2 span {
    color: #70ae80;
}

.view-menu {
    color: #65a976;

    text-decoration: none;

    font-size: 12px;

    font-weight: 800;
}

.related-grid {
    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 20px;
}

.related-card {
    overflow: hidden;

    background: white;

    border:
        1px solid #e2eae4;

    border-radius: 20px;

    text-decoration: none;

    color: #17231d;

    transition: 0.25s;
}

.related-card:hover {
    transform: translateY(-5px);

    box-shadow:
        0 15px 35px
        rgba(40, 60, 45, 0.08);
}

.related-image {
    position: relative;

    height: 210px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #edf6ef;

    font-size: 90px;
}

.mini-badge {
    position: absolute;

    top: 14px;

    left: 14px;

    padding: 6px 9px;

    background: white;

    border-radius: 8px;

    color: #65a976;

    font-size: 9px;

    font-weight: 800;
}

.related-info {
    padding: 20px;
}

.related-info > span {
    color: #8b9690;

    font-size: 9px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: 1px;
}

.related-info h3 {
    margin: 8px 0 15px;

    font-size: 17px;
}

.related-bottom {
    display: flex;

    align-items: center;

    justify-content: space-between;
}

.related-bottom strong {
    color: #65a976;

    font-size: 14px;
}

.arrow {
    width: 30px;

    height: 30px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #edf6ef;

    border-radius: 8px;

    color: #65a976;

    font-weight: 800;
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
    margin: 13px 0;

    font-size: 43px;

    line-height: 1.1;

    letter-spacing: -2px;
}

.cta-content h2 span {
    color: #70ae80;
}

.cta-content p {
    color: #77837c;

    font-size: 14px;
}

.cta-button {
    display: inline-flex;

    align-items: center;

    gap: 18px;

    margin-top: 18px;

    padding: 14px 20px;

    background: #79b88a;

    color: white;

    border-radius: 12px;

    text-decoration: none;

    font-size: 13px;

    font-weight: 800;

    transition: 0.2s;
}

.cta-button:hover {
    background: #65a976;

    transform: translateY(-2px);
}


/* =========================
   FOOTER
========================= */

.footer {
    background: #17231d;

    color: white;
}

.footer-container {
    max-width: 1200px;

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

    border-top:
        1px solid #2c3932;

    text-align: center;

    color: #8e9b93;

    font-size: 12px;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 950px) {

    .details-container {
        grid-template-columns: 1fr;

        gap: 40px;

        text-align: center;
    }

    .product-info {
        max-width: 650px;

        margin: auto;
    }

    .description {
        margin-left: auto;
        margin-right: auto;
    }

    .ingredient-list {
        justify-content: center;
    }

    .visual-background {
        width: 430px;
        height: 430px;
    }

    .benefits {
        text-align: center;
    }

}

@media (max-width: 700px) {

    .nav-links {
        display: none;
    }

    .breadcrumb-container {
        padding-left: 18px;
        padding-right: 18px;
    }

    .details-container {
        padding:
            25px 18px 70px;
    }

    .visual-background {
        width: 330px;
        height: 330px;
    }

    .large-drink {
        font-size: 130px;
    }

    .fruit-decoration {
        width: 50px;
        height: 50px;

        font-size: 22px;
    }

    .popular-badge {
        top: 35px;
        left: 25px;
    }

    .product-info h1 {
        font-size: 40px;
    }

    .purchase-section {
        flex-direction: column;
    }

    .quantity-box {
        justify-content: center;
    }

    .benefits {
        grid-template-columns: 1fr;
    }

    .section-heading {
        flex-direction: column;

        align-items: flex-start;

        gap: 15px;
    }

    .related-grid {
        grid-template-columns: 1fr;
    }

    .related-section {
        padding-left: 18px;
        padding-right: 18px;
    }

    .footer-container {
        flex-direction: column;
    }

    .footer-links {
        flex-wrap: wrap;
    }

}

</style>