<script setup>
import { Head, Link } from '@inertiajs/vue3'
import { ref } from 'vue'

const orderStatus = ref('out_for_delivery')

const order = {
    id: '#DRK-10245',
    date: '09 September 2026',
    estimatedTime: '12:45 PM - 1:15 PM',
    customer: 'John Smith',
    address: '123 Main Street, Colombo',
    driver: 'Kasun',
    driverPhone: '+94 77 123 4567',
}

const items = [
    {
        id: 1,
        name: 'Mango Blast',
        quantity: 1,
        price: 650,
        emoji: '🥭'
    },
    {
        id: 2,
        name: 'Berry Fresh',
        quantity: 2,
        price: 700,
        emoji: '🍓'
    }
]

const subtotal = 2050
const deliveryFee = 250
const total = 2300

const trackingSteps = [
    {
        key: 'confirmed',
        icon: '✓',
        title: 'Order Confirmed',
        text: 'Your order has been received.'
    },
    {
        key: 'preparing',
        icon: '🥤',
        title: 'Preparing Your Drinks',
        text: 'Our team is making your drinks fresh.'
    },
    {
        key: 'out_for_delivery',
        icon: '🚚',
        title: 'Out for Delivery',
        text: 'Your order is on the way to you.'
    },
    {
        key: 'delivered',
        icon: '🏠',
        title: 'Delivered',
        text: 'Enjoy your DRINKY!'
    }
]

const getStepState = (key) => {
    const order = [
        'confirmed',
        'preparing',
        'out_for_delivery',
        'delivered'
    ]

    const currentIndex = order.indexOf(orderStatus.value)
    const stepIndex = order.indexOf(key)

    if (stepIndex < currentIndex) {
        return 'completed'
    }

    if (stepIndex === currentIndex) {
        return 'current'
    }

    return 'pending'
}
</script>

<template>
    <Head title="Track Order | DRINKY" />

    <div class="tracking-page">

        <!-- NAVBAR -->
        <nav class="navbar">
            <div class="nav-container">

                <Link href="/" class="logo">
                    DRINKY<span>.</span>
                </Link>

                <div class="nav-links">
                    <Link href="/">Home</Link>
                    <Link href="/menu">Menu</Link>
                    <Link href="/about">About</Link>
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


        <!-- HEADER -->
        <section class="tracking-header">

            <div class="header-content">

                <span class="small-title">
                    ORDER TRACKING
                </span>

                <h1>
                    Your drinks are
                    <span>on the way.</span>
                </h1>

                <p>
                    Follow your order from our kitchen
                    all the way to your doorstep.
                </p>

            </div>

        </section>


        <!-- MAIN -->
        <main class="tracking-container">

            <!-- LEFT -->
            <div class="tracking-main">

                <!-- CURRENT STATUS -->
                <section class="status-card">

                    <div class="status-top">

                        <div>
                            <span class="status-label">
                                CURRENT STATUS
                            </span>

                            <h2>
                                Out for Delivery
                            </h2>

                            <p>
                                Your drinks are on their way!
                            </p>
                        </div>

                        <div class="delivery-icon">
                            🚚
                        </div>

                    </div>

                    <div class="estimated">

                        <div>
                            <span>Estimated Arrival</span>

                            <strong>
                                {{ order.estimatedTime }}
                            </strong>
                        </div>

                        <div class="order-number">
                            <span>Order</span>

                            <strong>
                                {{ order.id }}
                            </strong>
                        </div>

                    </div>

                </section>


                <!-- TRACKING TIMELINE -->
                <section class="timeline-card">

                    <div class="card-heading">

                        <div>
                            <span class="section-label">
                                ORDER PROGRESS
                            </span>

                            <h2>
                                Track your order
                            </h2>
                        </div>

                        <span class="live-badge">
                            ● LIVE
                        </span>

                    </div>


                    <div class="timeline">

                        <div
                            v-for="(step, index) in trackingSteps"
                            :key="step.key"
                            class="timeline-item"
                            :class="getStepState(step.key)"
                        >

                            <div class="timeline-line"
                                v-if="index < trackingSteps.length - 1"
                            ></div>

                            <div class="timeline-icon">
                                {{ step.icon }}
                            </div>

                            <div class="timeline-content">

                                <h3>
                                    {{ step.title }}
                                </h3>

                                <p>
                                    {{ step.text }}
                                </p>

                                <span
                                    v-if="getStepState(step.key) === 'current'"
                                    class="current-label"
                                >
                                    Happening now
                                </span>

                            </div>

                        </div>

                    </div>

                </section>


                <!-- DELIVERY INFO -->
                <section class="delivery-card">

                    <div class="card-heading">

                        <div>
                            <span class="section-label">
                                DELIVERY DETAILS
                            </span>

                            <h2>
                                Where we're delivering
                            </h2>
                        </div>

                        <span class="location-icon">
                            📍
                        </span>

                    </div>


                    <div class="address-box">

                        <div class="address-icon">
                            🏠
                        </div>

                        <div>
                            <strong>
                                {{ order.customer }}
                            </strong>

                            <p>
                                {{ order.address }}
                            </p>
                        </div>

                    </div>


                    <!-- DRIVER -->
                    <div class="driver-box">

                        <div class="driver-avatar">
                            👨‍🚚
                        </div>

                        <div class="driver-info">

                            <span>
                                YOUR DELIVERY DRIVER
                            </span>

                            <strong>
                                {{ order.driver }}
                            </strong>

                        </div>

                        <a
                            :href="`tel:${order.driverPhone}`"
                            class="call-button"
                        >
                            📞 Call
                        </a>

                    </div>

                </section>

            </div>


            <!-- RIGHT -->
            <aside class="order-sidebar">

                <!-- ORDER SUMMARY -->
                <section class="summary-card">

                    <div class="summary-heading">

                        <div>
                            <span class="section-label">
                                YOUR ORDER
                            </span>

                            <h2>
                                {{ order.id }}
                            </h2>
                        </div>

                        <span class="date">
                            {{ order.date }}
                        </span>

                    </div>


                    <!-- ITEMS -->
                    <div class="order-items">

                        <div
                            v-for="item in items"
                            :key="item.id"
                            class="order-item"
                        >

                            <div class="item-image">
                                {{ item.emoji }}
                            </div>

                            <div class="item-details">

                                <h3>
                                    {{ item.name }}
                                </h3>

                                <span>
                                    Qty: {{ item.quantity }}
                                </span>

                            </div>

                            <strong>
                                Rs.
                                {{ (item.price * item.quantity).toLocaleString() }}
                            </strong>

                        </div>

                    </div>


                    <div class="divider"></div>


                    <!-- PRICES -->
                    <div class="price-row">
                        <span>Subtotal</span>

                        <strong>
                            Rs. {{ subtotal.toLocaleString() }}
                        </strong>
                    </div>

                    <div class="price-row">
                        <span>Delivery</span>

                        <strong>
                            Rs. {{ deliveryFee.toLocaleString() }}
                        </strong>
                    </div>


                    <div class="divider"></div>


                    <div class="total-row">
                        <span>Total</span>

                        <strong>
                            Rs. {{ total.toLocaleString() }}
                        </strong>
                    </div>

                </section>


                <!-- HELP -->
                <section class="help-card">

                    <div class="help-icon">
                        💬
                    </div>

                    <div>
                        <h3>
                            Need help?
                        </h3>

                        <p>
                            Something wrong with your order?
                            We're here to help.
                        </p>

                        <Link href="/contact">
                            Contact DRINKY →
                        </Link>
                    </div>

                </section>


                <!-- BACK TO MENU -->
                <Link
                    href="/menu"
                    class="menu-button"
                >
                    Order More Drinks
                    <span>→</span>
                </Link>

            </aside>

        </main>


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

.tracking-page {
    min-height: 100vh;
    background: #f8faf9;
    color: #17231d;
    font-family: Arial, Helvetica, sans-serif;
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

.nav-links a:hover {
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
   HEADER
========================= */

.tracking-header {
    padding: 70px 25px 65px;

    text-align: center;

    background:
        radial-gradient(
            circle at center,
            #e4f3e7,
            transparent 65%
        );
}

.header-content {
    max-width: 700px;
    margin: auto;
}

.small-title,
.section-label {
    color: #70ae80;

    font-size: 11px;
    font-weight: 900;

    letter-spacing: 3px;
}

.tracking-header h1 {
    margin: 14px 0;

    font-size: 55px;
    line-height: 1.05;

    letter-spacing: -2.5px;
}

.tracking-header h1 span {
    color: #70ae80;
}

.tracking-header p {
    margin: 0;

    color: #737f78;

    font-size: 16px;
    line-height: 1.7;
}


/* =========================
   MAIN LAYOUT
========================= */

.tracking-container {
    max-width: 1200px;

    margin: auto;

    padding: 50px 25px 90px;

    display: grid;

    grid-template-columns: 1fr 370px;

    gap: 30px;

    align-items: start;
}

.tracking-main {
    display: flex;
    flex-direction: column;

    gap: 25px;
}


/* =========================
   STATUS CARD
========================= */

.status-card {
    padding: 30px;

    background: #17231d;

    color: white;

    border-radius: 23px;

    box-shadow:
        0 20px 40px rgba(30, 45, 35, 0.12);
}

.status-top {
    display: flex;

    justify-content: space-between;
    align-items: center;
}

.status-label {
    color: #8fac98;

    font-size: 10px;
    font-weight: 900;

    letter-spacing: 2px;
}

.status-top h2 {
    margin: 8px 0 5px;

    font-size: 26px;
}

.status-top p {
    margin: 0;

    color: #aebbb2;

    font-size: 13px;
}

.delivery-icon {
    width: 70px;
    height: 70px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #26362c;

    border-radius: 20px;

    font-size: 34px;
}

.estimated {
    display: flex;

    justify-content: space-between;

    margin-top: 30px;

    padding-top: 20px;

    border-top: 1px solid #304037;
}

.estimated span,
.order-number span {
    display: block;

    margin-bottom: 6px;

    color: #8f9d95;

    font-size: 10px;
}

.estimated strong,
.order-number strong {
    color: white;

    font-size: 14px;
}


/* =========================
   TIMELINE
========================= */

.timeline-card,
.delivery-card {
    padding: 30px;

    background: white;

    border: 1px solid #e2eae4;

    border-radius: 23px;

    box-shadow:
        0 10px 30px rgba(35, 55, 42, 0.04);
}

.card-heading {
    display: flex;

    align-items: flex-start;

    justify-content: space-between;

    margin-bottom: 30px;
}

.card-heading h2 {
    margin: 8px 0 0;

    font-size: 22px;
}

.live-badge {
    padding: 7px 10px;

    background: #edf7ef;

    border-radius: 8px;

    color: #65a976;

    font-size: 9px;
    font-weight: 900;

    letter-spacing: 1px;
}

.timeline {
    position: relative;

    padding-left: 5px;
}

.timeline-item {
    position: relative;

    min-height: 90px;

    display: flex;

    gap: 18px;
}

.timeline-icon {
    position: relative;
    z-index: 2;

    width: 48px;
    height: 48px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #edf1ee;

    color: #9ba69f;

    font-size: 17px;

    border: 3px solid white;
}

.timeline-item.completed .timeline-icon {
    background: #79b88a;
    color: white;
}

.timeline-item.current .timeline-icon {
    background: #17231d;
    color: white;

    box-shadow:
        0 0 0 6px #e4f2e7;
}

.timeline-content {
    padding-top: 4px;
}

.timeline-content h3 {
    margin: 0 0 6px;

    color: #26342c;

    font-size: 14px;
}

.timeline-content p {
    margin: 0;

    color: #87918b;

    font-size: 12px;

    line-height: 1.6;
}

.timeline-item.pending .timeline-content h3 {
    color: #a5ada8;
}

.current-label {
    display: inline-block;

    margin-top: 8px;

    color: #65a976;

    font-size: 10px;
    font-weight: 800;
}

.timeline-line {
    position: absolute;

    left: 24px;
    top: 45px;

    width: 2px;
    height: 60px;

    background: #e4eae5;
}

.timeline-item.completed .timeline-line {
    background: #79b88a;
}


/* =========================
   DELIVERY
========================= */

.location-icon {
    font-size: 22px;
}

.address-box {
    display: flex;

    align-items: center;

    gap: 14px;

    padding: 18px;

    background: #f5f9f6;

    border-radius: 15px;
}

.address-icon {
    width: 45px;
    height: 45px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: white;

    border-radius: 12px;

    font-size: 20px;
}

.address-box strong {
    display: block;

    margin-bottom: 5px;

    font-size: 14px;
}

.address-box p {
    margin: 0;

    color: #7c8781;

    font-size: 12px;
}

.driver-box {
    display: flex;

    align-items: center;

    gap: 13px;

    margin-top: 15px;

    padding: 16px;

    border: 1px solid #e5ebe7;

    border-radius: 15px;
}

.driver-avatar {
    width: 45px;
    height: 45px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #eaf4ec;

    border-radius: 50%;

    font-size: 21px;
}

.driver-info {
    flex: 1;
}

.driver-info span {
    display: block;

    margin-bottom: 4px;

    color: #99a39d;

    font-size: 8px;
    font-weight: 900;

    letter-spacing: 1px;
}

.driver-info strong {
    font-size: 13px;
}

.call-button {
    padding: 9px 12px;

    background: #edf6ef;

    border-radius: 9px;

    color: #65a976;

    text-decoration: none;

    font-size: 11px;
    font-weight: 800;
}


/* =========================
   SUMMARY
========================= */

.order-sidebar {
    display: flex;
    flex-direction: column;

    gap: 18px;
}

.summary-card {
    padding: 27px;

    background: white;

    border: 1px solid #e2eae4;

    border-radius: 23px;

    box-shadow:
        0 10px 30px rgba(35, 55, 42, 0.04);
}

.summary-heading {
    display: flex;

    justify-content: space-between;

    align-items: flex-end;

    margin-bottom: 25px;
}

.summary-heading h2 {
    margin: 8px 0 0;

    font-size: 20px;
}

.date {
    color: #929c96;

    font-size: 10px;
}


/* =========================
   ITEMS
========================= */

.order-items {
    display: flex;
    flex-direction: column;

    gap: 17px;
}

.order-item {
    display: flex;

    align-items: center;

    gap: 11px;
}

.item-image {
    width: 50px;
    height: 50px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #f0f7f2;

    border-radius: 12px;

    font-size: 23px;
}

.item-details {
    flex: 1;
}

.item-details h3 {
    margin: 0 0 5px;

    font-size: 13px;
}

.item-details span {
    color: #929c96;

    font-size: 10px;
}

.order-item > strong {
    font-size: 12px;
}

.divider {
    height: 1px;

    margin: 20px 0;

    background: #e8eeea;
}

.price-row {
    display: flex;

    justify-content: space-between;

    margin-bottom: 12px;

    color: #7d8882;

    font-size: 12px;
}

.price-row strong {
    color: #36443b;
}

.total-row {
    display: flex;

    justify-content: space-between;

    align-items: center;
}

.total-row span {
    font-size: 15px;
    font-weight: 800;
}

.total-row strong {
    color: #65a976;

    font-size: 20px;
}


/* =========================
   HELP
========================= */

.help-card {
    display: flex;

    gap: 13px;

    padding: 20px;

    background: #edf6ef;

    border-radius: 18px;
}

.help-icon {
    width: 40px;
    height: 40px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    background: white;

    border-radius: 11px;

    font-size: 18px;
}

.help-card h3 {
    margin: 0 0 5px;

    font-size: 14px;
}

.help-card p {
    margin: 0 0 8px;

    color: #77837c;

    font-size: 11px;
    line-height: 1.5;
}

.help-card a {
    color: #65a976;

    text-decoration: none;

    font-size: 11px;
    font-weight: 800;
}


/* =========================
   MENU BUTTON
========================= */

.menu-button {
    display: flex;

    align-items: center;
    justify-content: space-between;

    padding: 15px 18px;

    background: #79b88a;

    border-radius: 12px;

    color: white;

    text-decoration: none;

    font-size: 13px;
    font-weight: 800;

    transition: 0.2s;
}

.menu-button:hover {
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

    border-top: 1px solid #2c3932;

    text-align: center;

    color: #8e9b93;

    font-size: 12px;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 900px) {

    .tracking-container {
        grid-template-columns: 1fr;
    }

    .order-sidebar {
        order: -1;
    }

}

@media (max-width: 650px) {

    .nav-links {
        display: none;
    }

    .tracking-header {
        padding: 55px 20px;
    }

    .tracking-header h1 {
        font-size: 40px;
    }

    .tracking-container {
        padding: 30px 15px 60px;
    }

    .status-card,
    .timeline-card,
    .delivery-card,
    .summary-card {
        padding: 22px;
        border-radius: 18px;
    }

    .status-top h2 {
        font-size: 21px;
    }

    .delivery-icon {
        width: 55px;
        height: 55px;
        font-size: 26px;
    }

    .estimated {
        flex-direction: column;
        gap: 15px;
    }

    .footer-container {
        flex-direction: column;
    }

    .footer-links {
        flex-wrap: wrap;
    }

}

</style>