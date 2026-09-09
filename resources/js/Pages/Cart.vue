<script setup>
import { Head, Link } from '@inertiajs/vue3'
import { ref, computed } from 'vue'

const cartItems = ref([
    {
        id: 1,
        name: 'Mango Blast',
        category: 'Smoothies',
        price: 650,
        quantity: 1,
        icon: '🥭',
    },
    {
        id: 2,
        name: 'Berry Fresh',
        category: 'Fresh Juices',
        price: 700,
        quantity: 2,
        icon: '🍓',
    },
])

const increaseQuantity = (item) => {
    item.quantity++
}

const decreaseQuantity = (item) => {
    if (item.quantity > 1) {
        item.quantity--
    }
}

const removeItem = (id) => {
    cartItems.value = cartItems.value.filter(item => item.id !== id)
}

const subtotal = computed(() => {
    return cartItems.value.reduce(
        (total, item) => total + item.price * item.quantity,
        0
    )
})

const deliveryFee = computed(() => {
    return subtotal.value > 0 ? 250 : 0
})

const total = computed(() => {
    return subtotal.value + deliveryFee.value
})
</script>

<template>
    <Head title="Your Cart - DRINKY" />

    <div class="drinky-cart">

        <!-- =====================================
             NAVBAR
        ====================================== -->

        <header class="cart-navbar">

            <nav class="cart-nav-inner">

                <Link href="/" class="cart-logo">
                    drink<span>y</span>
                </Link>

                <div class="cart-nav-links">

                    <Link href="/" class="cart-nav-link">
                        Home
                    </Link>

                    <Link href="/menu" class="cart-nav-link">
                        Menu
                    </Link>

                    <Link href="/about" class="cart-nav-link">
                        About
                    </Link>

                    <Link href="/contact" class="cart-nav-link">
                        Contact
                    </Link>

                </div>

                <Link href="/menu" class="back-menu-button">
                    ← Continue Shopping
                </Link>

            </nav>

        </header>


        <!-- =====================================
             PAGE HEADER
        ====================================== -->

        <section class="cart-header">

            <div>

                <span class="cart-label">
                    YOUR ORDER
                </span>

                <h1>
                    Your cart<span>.</span>
                </h1>

                <p>
                    Almost there. Your favourite drinks are waiting.
                </p>

            </div>

            <div class="cart-icon">
                🛒
            </div>

        </section>


        <!-- =====================================
             CART CONTENT
        ====================================== -->

        <main class="cart-container">

            <!-- EMPTY CART -->

            <div
                v-if="cartItems.length === 0"
                class="empty-cart"
            >

                <div class="empty-cart-icon">
                    🥤
                </div>

                <h2>
                    Your cart is empty
                </h2>

                <p>
                    Looks like you haven't added any drinks yet.
                </p>

                <Link
                    href="/menu"
                    class="empty-cart-button"
                >
                    Explore Menu →
                </Link>

            </div>


            <!-- CART WITH ITEMS -->

            <div
                v-else
                class="cart-layout"
            >

                <!-- =================================
                     ITEMS
                ================================== -->

                <section class="cart-items">

                    <div class="items-header">

                        <h2>
                            Your drinks
                        </h2>

                        <span>
                            {{ cartItems.length }} items
                        </span>

                    </div>


                    <div
                        v-for="item in cartItems"
                        :key="item.id"
                        class="cart-item"
                    >

                        <!-- Product image -->

                        <div class="cart-product-image">
                            {{ item.icon }}
                        </div>


                        <!-- Product details -->

                        <div class="cart-product-details">

                            <span>
                                {{ item.category }}
                            </span>

                            <h3>
                                {{ item.name }}
                            </h3>

                            <p>
                                Rs. {{ item.price }}
                            </p>

                        </div>


                        <!-- Quantity -->

                        <div class="quantity-control">

                            <button
                                @click="decreaseQuantity(item)"
                            >
                                −
                            </button>

                            <span>
                                {{ item.quantity }}
                            </span>

                            <button
                                @click="increaseQuantity(item)"
                            >
                                +
                            </button>

                        </div>


                        <!-- Item total -->

                        <div class="item-total">
                            Rs. {{ item.price * item.quantity }}
                        </div>


                        <!-- Remove -->

                        <button
                            @click="removeItem(item.id)"
                            class="remove-button"
                            title="Remove item"
                        >
                            ×
                        </button>

                    </div>


                    <!-- Continue shopping -->

                    <Link
                        href="/menu"
                        class="continue-shopping"
                    >
                        ← Continue shopping
                    </Link>

                </section>


                <!-- =================================
                     ORDER SUMMARY
                ================================== -->

                <aside class="order-summary">

                    <h2>
                        Order summary
                    </h2>


                    <div class="summary-row">

                        <span>
                            Subtotal
                        </span>

                        <strong>
                            Rs. {{ subtotal }}
                        </strong>

                    </div>


                    <div class="summary-row">

                        <span>
                            Delivery
                        </span>

                        <strong>
                            Rs. {{ deliveryFee }}
                        </strong>

                    </div>


                    <div class="summary-divider"></div>


                    <div class="summary-total">

                        <span>
                            Total
                        </span>

                        <strong>
                            Rs. {{ total }}
                        </strong>

                    </div>


                    <!-- Checkout -->

                    <Link
                        href="/checkout"
                        class="checkout-button"
                    >
                        Proceed to Checkout
                        <span>→</span>
                    </Link>


                    <div class="secure-message">
                        🔒 Secure checkout
                    </div>


                    <!-- Delivery info -->

                    <div class="delivery-box">

                        <div class="delivery-icon">
                            🚴
                        </div>

                        <div>
                            <strong>
                                Fast delivery
                            </strong>

                            <p>
                                Your drinks will be prepared fresh
                                and delivered to you.
                            </p>
                        </div>

                    </div>

                </aside>

            </div>

        </main>


        <!-- =====================================
             FOOTER
        ====================================== -->

        <footer class="cart-footer">

            <div class="footer-inner">

                <div>

                    <Link
                        href="/"
                        class="footer-logo"
                    >
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
   BASE
========================================= */

.drinky-cart {
    min-height: 100vh;

    background: #f8f7f2;

    color: #17251d;

    font-family:
        Inter,
        ui-sans-serif,
        system-ui,
        sans-serif;
}

* {
    box-sizing: border-box;
}


/* =========================================
   NAVBAR
========================================= */

.cart-navbar {
    background: white;

    border-bottom:
        1px solid rgba(23, 37, 29, 0.08);
}

.cart-nav-inner {
    max-width: 1280px;

    margin: auto;

    padding: 22px 32px;

    display: flex;

    align-items: center;

    justify-content: space-between;
}

.cart-logo {
    color: #17251d;

    text-decoration: none;

    font-size: 32px;

    font-weight: 900;

    letter-spacing: -1.5px;
}

.cart-logo span,
.footer-logo span {
    color: #e85d3f;
}

.cart-nav-links {
    display: flex;

    gap: 34px;
}

.cart-nav-link {
    color: #17251d;

    text-decoration: none;

    font-size: 14px;

    font-weight: 700;

    transition: color 0.2s ease;
}

.cart-nav-link:hover {
    color: #e85d3f;
}

.back-menu-button {
    padding: 11px 18px;

    border-radius: 999px;

    background: #17251d;

    color: white;

    text-decoration: none;

    font-size: 13px;

    font-weight: 700;

    transition: 0.25s ease;
}

.back-menu-button:hover {
    background: #e85d3f;

    transform: translateY(-2px);
}


/* =========================================
   HEADER
========================================= */

.cart-header {
    max-width: 1280px;

    margin: auto;

    padding: 80px 32px 60px;

    display: flex;

    align-items: center;

    justify-content: space-between;
}

.cart-label {
    display: block;

    margin-bottom: 12px;

    color: #e85d3f;

    font-size: 12px;

    font-weight: 800;

    letter-spacing: 0.2em;
}

.cart-header h1 {
    margin: 0;

    font-size: clamp(55px, 7vw, 82px);

    line-height: 0.95;

    font-weight: 900;

    letter-spacing: -4px;
}

.cart-header h1 span {
    color: #e85d3f;
}

.cart-header p {
    margin-top: 20px;

    color: #777;

    font-size: 17px;
}

.cart-icon {
    width: 150px;
    height: 150px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #f4c95d;

    font-size: 75px;

    animation: floating 4s ease-in-out infinite;
}


/* =========================================
   CONTAINER
========================================= */

.cart-container {
    max-width: 1280px;

    margin: auto;

    padding: 0 32px 100px;
}


/* =========================================
   CART LAYOUT
========================================= */

.cart-layout {
    display: grid;

    grid-template-columns: 1fr 390px;

    gap: 40px;

    align-items: start;
}


/* =========================================
   ITEMS
========================================= */

.cart-items {
    background: white;

    border-radius: 30px;

    padding: 30px;

    box-shadow:
        0 8px 30px rgba(0, 0, 0, 0.04);
}

.items-header {
    display: flex;

    align-items: center;

    justify-content: space-between;

    margin-bottom: 25px;
}

.items-header h2 {
    margin: 0;

    font-size: 25px;

    font-weight: 900;
}

.items-header span {
    color: #888;

    font-size: 13px;
}


/* =========================================
   CART ITEM
========================================= */

.cart-item {
    display: grid;

    grid-template-columns: 100px 1fr auto auto auto;

    gap: 18px;

    align-items: center;

    padding: 20px 0;

    border-bottom:
        1px solid rgba(23, 37, 29, 0.08);
}

.cart-item:last-of-type {
    border-bottom: none;
}

.cart-product-image {
    width: 100px;
    height: 100px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 22px;

    background: #f8f7f2;

    font-size: 55px;
}

.cart-product-details span {
    color: #e85d3f;

    font-size: 10px;

    font-weight: 800;

    text-transform: uppercase;

    letter-spacing: 0.1em;
}

.cart-product-details h3 {
    margin: 5px 0;

    font-size: 18px;

    font-weight: 900;
}

.cart-product-details p {
    margin: 0;

    color: #777;

    font-size: 13px;
}


/* =========================================
   QUANTITY
========================================= */

.quantity-control {
    display: flex;

    align-items: center;

    gap: 12px;

    padding: 6px;

    border:
        1px solid rgba(23, 37, 29, 0.12);

    border-radius: 999px;
}

.quantity-control button {
    width: 28px;
    height: 28px;

    border: none;

    border-radius: 50%;

    background: #f8f7f2;

    color: #17251d;

    font-size: 17px;

    cursor: pointer;

    transition: 0.2s ease;
}

.quantity-control button:hover {
    background: #17251d;

    color: white;
}

.quantity-control span {
    min-width: 18px;

    text-align: center;

    font-size: 13px;

    font-weight: 800;
}


/* =========================================
   ITEM TOTAL
========================================= */

.item-total {
    min-width: 90px;

    text-align: right;

    color: #17251d;

    font-size: 15px;

    font-weight: 900;
}


/* =========================================
   REMOVE
========================================= */

.remove-button {
    width: 32px;
    height: 32px;

    border: none;

    border-radius: 50%;

    background: transparent;

    color: #999;

    font-size: 23px;

    cursor: pointer;

    transition: 0.2s ease;
}

.remove-button:hover {
    background: #f3ddd4;

    color: #e85d3f;
}


/* =========================================
   CONTINUE SHOPPING
========================================= */

.continue-shopping {
    display: inline-block;

    margin-top: 25px;

    color: #17251d;

    text-decoration: none;

    font-size: 14px;

    font-weight: 800;

    transition: color 0.2s ease;
}

.continue-shopping:hover {
    color: #e85d3f;
}


/* =========================================
   ORDER SUMMARY
========================================= */

.order-summary {
    position: sticky;

    top: 25px;

    padding: 30px;

    border-radius: 30px;

    background: #17251d;

    color: white;

    box-shadow:
        0 20px 45px rgba(0, 0, 0, 0.12);
}

.order-summary h2 {
    margin: 0 0 28px;

    font-size: 25px;

    font-weight: 900;
}

.summary-row {
    display: flex;

    justify-content: space-between;

    margin-bottom: 17px;

    color: rgba(255, 255, 255, 0.65);

    font-size: 14px;
}

.summary-row strong {
    color: white;
}

.summary-divider {
    height: 1px;

    margin: 23px 0;

    background:
        rgba(255, 255, 255, 0.12);
}

.summary-total {
    display: flex;

    align-items: center;

    justify-content: space-between;

    margin-bottom: 25px;
}

.summary-total span {
    font-size: 16px;

    color: rgba(255, 255, 255, 0.7);
}

.summary-total strong {
    color: #f4c95d;

    font-size: 26px;
}


/* =========================================
   CHECKOUT BUTTON
========================================= */

.checkout-button {
    display: flex;

    align-items: center;

    justify-content: space-between;

    width: 100%;

    padding: 16px 20px;

    border-radius: 999px;

    background: #e85d3f;

    color: white;

    text-decoration: none;

    font-size: 14px;

    font-weight: 900;

    transition: 0.25s ease;
}

.checkout-button:hover {
    background: #f06d4f;

    transform: translateY(-2px);
}

.checkout-button span {
    font-size: 20px;
}


/* =========================================
   SECURE MESSAGE
========================================= */

.secure-message {
    margin-top: 18px;

    text-align: center;

    color: rgba(255, 255, 255, 0.45);

    font-size: 11px;
}


/* =========================================
   DELIVERY BOX
========================================= */

.delivery-box {
    display: flex;

    gap: 12px;

    margin-top: 25px;

    padding: 16px;

    border-radius: 18px;

    background: rgba(255, 255, 255, 0.07);
}

.delivery-icon {
    width: 40px;
    height: 40px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #f4c95d;
}

.delivery-box strong {
    display: block;

    margin-bottom: 4px;

    font-size: 13px;
}

.delivery-box p {
    margin: 0;

    color: rgba(255, 255, 255, 0.55);

    font-size: 11px;

    line-height: 1.5;
}


/* =========================================
   EMPTY CART
========================================= */

.empty-cart {
    padding: 100px 30px;

    border-radius: 30px;

    background: white;

    text-align: center;
}

.empty-cart-icon {
    width: 120px;
    height: 120px;

    margin: auto;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #f4c95d;

    font-size: 60px;
}

.empty-cart h2 {
    margin: 25px 0 8px;

    font-size: 30px;

    font-weight: 900;
}

.empty-cart p {
    margin: 0;

    color: #777;
}

.empty-cart-button {
    display: inline-block;

    margin-top: 25px;

    padding: 14px 25px;

    border-radius: 999px;

    background: #17251d;

    color: white;

    text-decoration: none;

    font-size: 14px;

    font-weight: 800;

    transition: 0.25s ease;
}

.empty-cart-button:hover {
    background: #e85d3f;
}


/* =========================================
   FOOTER
========================================= */

.cart-footer {
    border-top:
        1px solid rgba(23, 37, 29, 0.08);

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
    margin: 5px 0 0;

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

    border-top:
        1px solid rgba(23, 37, 29, 0.06);

    text-align: center;

    color: #999;

    font-size: 11px;
}


/* =========================================
   ANIMATION
========================================= */

@keyframes floating {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-10px);
    }
}


/* =========================================
   TABLET
========================================= */

@media (max-width: 1000px) {

    .cart-nav-links {
        display: none;
    }

    .cart-layout {
        grid-template-columns: 1fr;
    }

    .order-summary {
        position: static;
    }

    .cart-icon {
        width: 120px;
        height: 120px;

        font-size: 60px;
    }
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 650px) {

    .cart-nav-inner {
        padding: 18px 20px;
    }

    .cart-logo {
        font-size: 27px;
    }

    .back-menu-button {
        padding: 9px 13px;

        font-size: 11px;
    }

    .cart-header {
        padding: 55px 20px 40px;

        align-items: flex-start;
    }

    .cart-header h1 {
        font-size: 55px;

        letter-spacing: -2px;
    }

    .cart-header p {
        font-size: 15px;
    }

    .cart-icon {
        display: none;
    }

    .cart-container {
        padding: 0 15px 70px;
    }

    .cart-items {
        padding: 20px;

        border-radius: 24px;
    }

    .cart-item {
        grid-template-columns: 70px 1fr auto;

        gap: 12px;
    }

    .cart-product-image {
        width: 70px;
        height: 70px;

        font-size: 38px;
    }

    .quantity-control {
        grid-column: 2;
        justify-self: start;
    }

    .item-total {
        grid-column: 3;
        grid-row: 1;

        min-width: auto;

        font-size: 13px;
    }

    .remove-button {
        grid-column: 3;
        grid-row: 2;
    }

    .order-summary {
        padding: 25px;

        border-radius: 24px;
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