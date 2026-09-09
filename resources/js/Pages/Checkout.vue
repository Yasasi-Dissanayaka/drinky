<script setup>
import { Head, Link } from '@inertiajs/vue3'
import { ref, computed } from 'vue'

const paymentMethod = ref('card')

const form = ref({
    firstName: '',
    lastName: '',
    email: '',
    phone: '',
    address: '',
    city: '',
    postalCode: '',
    cardNumber: '',
    expiry: '',
    cvv: '',
})

const cartItems = ref([
    {
        id: 1,
        name: 'Mango Blast',
        price: 650,
        quantity: 1,
        image: '🥭',
    },
    {
        id: 2,
        name: 'Berry Fresh',
        price: 700,
        quantity: 2,
        image: '🍓',
    },
])

const subtotal = computed(() => {
    return cartItems.value.reduce(
        (total, item) => total + item.price * item.quantity,
        0
    )
})

const deliveryFee = computed(() => 250)

const total = computed(() => subtotal.value + deliveryFee.value)

const placeOrder = () => {
    alert('Order placed successfully! 🎉')
}
</script>

<template>
    <Head title="Checkout | DRINKY" />

    <div class="checkout-page">

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


        <!-- PAGE HEADER -->
        <section class="checkout-header">
            <div class="header-content">

                <span class="small-title">
                    DRINKY CHECKOUT
                </span>

                <h1>
                    Complete Your
                    <span>Order</span>
                </h1>

                <p>
                    Just a few details and your favourite drinks
                    will be on their way.
                </p>

            </div>
        </section>


        <!-- CHECKOUT CONTENT -->
        <main class="checkout-container">

            <!-- LEFT SIDE -->
            <div class="checkout-left">

                <!-- CONTACT INFORMATION -->
                <section class="checkout-card">

                    <div class="section-title">
                        <div class="step-number">01</div>

                        <div>
                            <h2>Contact Information</h2>
                            <p>How can we reach you?</p>
                        </div>
                    </div>

                    <div class="form-grid">

                        <div class="form-group">
                            <label>First Name</label>
                            <input
                                v-model="form.firstName"
                                type="text"
                                placeholder="John"
                            />
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input
                                v-model="form.lastName"
                                type="text"
                                placeholder="Smith"
                            />
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input
                                v-model="form.email"
                                type="email"
                                placeholder="john@example.com"
                            />
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input
                                v-model="form.phone"
                                type="tel"
                                placeholder="+94 77 123 4567"
                            />
                        </div>

                    </div>

                </section>


                <!-- DELIVERY INFORMATION -->
                <section class="checkout-card">

                    <div class="section-title">
                        <div class="step-number">02</div>

                        <div>
                            <h2>Delivery Address</h2>
                            <p>Where should we deliver your drinks?</p>
                        </div>
                    </div>

                    <div class="form-grid">

                        <div class="form-group full-width">
                            <label>Address</label>

                            <input
                                v-model="form.address"
                                type="text"
                                placeholder="123 Main Street"
                            />
                        </div>

                        <div class="form-group">
                            <label>City</label>

                            <input
                                v-model="form.city"
                                type="text"
                                placeholder="Colombo"
                            />
                        </div>

                        <div class="form-group">
                            <label>Postal Code</label>

                            <input
                                v-model="form.postalCode"
                                type="text"
                                placeholder="00100"
                            />
                        </div>

                    </div>

                    <div class="delivery-note">
                        <span>🚚</span>

                        <div>
                            <strong>Fast Delivery</strong>

                            <p>
                                Your order will usually arrive
                                within 30–60 minutes.
                            </p>
                        </div>
                    </div>

                </section>


                <!-- PAYMENT -->
                <section class="checkout-card">

                    <div class="section-title">
                        <div class="step-number">03</div>

                        <div>
                            <h2>Payment Method</h2>
                            <p>Choose how you want to pay.</p>
                        </div>
                    </div>


                    <div class="payment-options">

                        <button
                            type="button"
                            class="payment-option"
                            :class="{ active: paymentMethod === 'card' }"
                            @click="paymentMethod = 'card'"
                        >
                            <div class="payment-icon">
                                💳
                            </div>

                            <div class="payment-info">
                                <strong>Card Payment</strong>
                                <span>Visa, Mastercard or other cards</span>
                            </div>

                            <div class="radio">
                                <span></span>
                            </div>
                        </button>


                        <button
                            type="button"
                            class="payment-option"
                            :class="{ active: paymentMethod === 'cash' }"
                            @click="paymentMethod = 'cash'"
                        >
                            <div class="payment-icon">
                                💵
                            </div>

                            <div class="payment-info">
                                <strong>Cash on Delivery</strong>
                                <span>Pay when your order arrives</span>
                            </div>

                            <div class="radio">
                                <span></span>
                            </div>
                        </button>

                    </div>


                    <!-- CARD DETAILS -->
                    <div
                        v-if="paymentMethod === 'card'"
                        class="card-details"
                    >

                        <div class="form-group full-width">
                            <label>Card Number</label>

                            <input
                                v-model="form.cardNumber"
                                type="text"
                                placeholder="1234 5678 9012 3456"
                                maxlength="19"
                            />
                        </div>

                        <div class="form-grid">

                            <div class="form-group">
                                <label>Expiry Date</label>

                                <input
                                    v-model="form.expiry"
                                    type="text"
                                    placeholder="MM / YY"
                                />
                            </div>

                            <div class="form-group">
                                <label>CVV</label>

                                <input
                                    v-model="form.cvv"
                                    type="password"
                                    placeholder="123"
                                    maxlength="3"
                                />
                            </div>

                        </div>

                    </div>

                    <div class="secure-payment">
                        🔒
                        <span>Your payment information is secure.</span>
                    </div>

                </section>

            </div>


            <!-- RIGHT SIDE -->
            <aside class="order-summary">

                <div class="summary-header">
                    <h2>Your Order</h2>

                    <Link href="/cart">
                        Edit Cart
                    </Link>
                </div>


                <!-- ITEMS -->
                <div class="summary-items">

                    <div
                        v-for="item in cartItems"
                        :key="item.id"
                        class="summary-item"
                    >

                        <div class="item-image">
                            {{ item.image }}
                        </div>

                        <div class="item-info">

                            <h3>{{ item.name }}</h3>

                            <span>
                                Qty: {{ item.quantity }}
                            </span>

                        </div>

                        <strong>
                            Rs. {{ (item.price * item.quantity).toLocaleString() }}
                        </strong>

                    </div>

                </div>


                <!-- TOTALS -->
                <div class="summary-divider"></div>

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

                <div class="summary-divider"></div>

                <div class="total-row">
                    <span>Total</span>

                    <strong>
                        Rs. {{ total.toLocaleString() }}
                    </strong>
                </div>


                <!-- PLACE ORDER -->
                <button
                    type="button"
                    class="place-order-btn"
                    @click="placeOrder"
                >
                    <span>Place Order</span>
                    <span>→</span>
                </button>


                <div class="checkout-benefits">

                    <div>
                        <span>✓</span>
                        Freshly prepared drinks
                    </div>

                    <div>
                        <span>✓</span>
                        Fast delivery
                    </div>

                    <div>
                        <span>✓</span>
                        Secure checkout
                    </div>

                </div>

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
   GLOBAL
========================= */

.checkout-page {
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
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(16px);
    border-bottom: 1px solid #e5ebe7;
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
    color: #53615a;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: 0.2s;
}

.nav-links a:hover {
    color: #79b88a;
}

.cart-button {
    display: flex;
    align-items: center;
    gap: 7px;

    padding: 10px 16px;

    color: #17231d;
    background: #eef5f0;

    border-radius: 12px;
    text-decoration: none;
    font-weight: 700;
    font-size: 14px;
}


/* =========================
   HEADER
========================= */

.checkout-header {
    padding: 75px 20px 55px;
    text-align: center;
    background:
        radial-gradient(
            circle at top,
            #e6f3e9,
            transparent 60%
        );
}

.header-content {
    max-width: 700px;
    margin: auto;
}

.small-title {
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 3px;
    color: #79b88a;
}

.checkout-header h1 {
    margin: 12px 0;
    font-size: 52px;
    line-height: 1.05;
    letter-spacing: -2px;
}

.checkout-header h1 span {
    color: #79b88a;
}

.checkout-header p {
    margin: 0;
    color: #69766f;
    font-size: 17px;
}


/* =========================
   CHECKOUT LAYOUT
========================= */

.checkout-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 45px 25px 80px;

    display: grid;
    grid-template-columns: 1fr 390px;
    gap: 30px;

    align-items: start;
}

.checkout-left {
    display: flex;
    flex-direction: column;
    gap: 25px;
}


/* =========================
   CHECKOUT CARD
========================= */

.checkout-card {
    background: white;
    border: 1px solid #e3eae5;
    border-radius: 22px;
    padding: 30px;

    box-shadow: 0 10px 35px rgba(30, 50, 40, 0.04);
}

.section-title {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 28px;
}

.step-number {
    width: 44px;
    height: 44px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 13px;

    background: #eaf5ed;
    color: #65a976;

    font-weight: 900;
    font-size: 13px;
}

.section-title h2 {
    margin: 0 0 4px;
    font-size: 21px;
}

.section-title p {
    margin: 0;
    color: #89938e;
    font-size: 13px;
}


/* =========================
   FORM
========================= */

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.full-width {
    grid-column: 1 / -1;
}

.form-group label {
    font-size: 13px;
    font-weight: 700;
    color: #45524b;
}

.form-group input {
    width: 100%;
    box-sizing: border-box;

    padding: 14px 15px;

    border: 1px solid #dce5df;
    border-radius: 12px;

    background: #fbfcfb;

    outline: none;

    font-size: 14px;
    color: #17231d;

    transition: 0.2s;
}

.form-group input:focus {
    border-color: #79b88a;
    background: white;
    box-shadow: 0 0 0 4px rgba(121, 184, 138, 0.10);
}

.form-group input::placeholder {
    color: #adb6b1;
}


/* =========================
   DELIVERY NOTE
========================= */

.delivery-note {
    display: flex;
    gap: 13px;

    margin-top: 22px;
    padding: 16px;

    background: #f1f8f3;
    border-radius: 14px;
}

.delivery-note > span {
    font-size: 24px;
}

.delivery-note strong {
    display: block;
    font-size: 14px;
    margin-bottom: 4px;
}

.delivery-note p {
    margin: 0;
    color: #77827c;
    font-size: 12px;
}


/* =========================
   PAYMENT
========================= */

.payment-options {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.payment-option {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 14px;

    padding: 17px;

    border: 1px solid #dfe7e1;
    border-radius: 14px;

    background: white;

    cursor: pointer;
    text-align: left;

    transition: 0.2s;
}

.payment-option:hover {
    border-color: #9cc9a8;
}

.payment-option.active {
    border-color: #79b88a;
    background: #f4faf5;
}

.payment-icon {
    width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #edf5ef;
    border-radius: 12px;

    font-size: 20px;
}

.payment-info {
    flex: 1;
}

.payment-info strong {
    display: block;
    margin-bottom: 4px;
    font-size: 14px;
}

.payment-info span {
    color: #8a948f;
    font-size: 12px;
}

.radio {
    width: 19px;
    height: 19px;

    border: 2px solid #cbd6ce;
    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;
}

.payment-option.active .radio {
    border-color: #79b88a;
}

.payment-option.active .radio span {
    width: 9px;
    height: 9px;

    background: #79b88a;
    border-radius: 50%;
}

.card-details {
    margin-top: 22px;
}

.secure-payment {
    margin-top: 22px;

    display: flex;
    align-items: center;
    gap: 8px;

    color: #87928c;
    font-size: 12px;
}


/* =========================
   ORDER SUMMARY
========================= */

.order-summary {
    position: sticky;
    top: 100px;

    padding: 28px;

    background: white;
    border: 1px solid #e3eae5;
    border-radius: 22px;

    box-shadow: 0 10px 35px rgba(30, 50, 40, 0.05);
}

.summary-header {
    display: flex;
    align-items: center;
    justify-content: space-between;

    margin-bottom: 25px;
}

.summary-header h2 {
    margin: 0;
    font-size: 21px;
}

.summary-header a {
    color: #65a976;
    text-decoration: none;
    font-size: 12px;
    font-weight: 700;
}


/* =========================
   ITEMS
========================= */

.summary-items {
    display: flex;
    flex-direction: column;
    gap: 18px;
}

.summary-item {
    display: flex;
    align-items: center;
    gap: 12px;
}

.item-image {
    width: 55px;
    height: 55px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #f1f7f3;
    border-radius: 13px;

    font-size: 25px;
}

.item-info {
    flex: 1;
}

.item-info h3 {
    margin: 0 0 5px;
    font-size: 14px;
}

.item-info span {
    color: #929c96;
    font-size: 12px;
}

.summary-item > strong {
    font-size: 13px;
    white-space: nowrap;
}


/* =========================
   PRICES
========================= */

.summary-divider {
    height: 1px;
    background: #e8eeea;
    margin: 22px 0;
}

.price-row {
    display: flex;
    justify-content: space-between;

    margin-bottom: 13px;

    color: #77827c;
    font-size: 13px;
}

.price-row strong {
    color: #27352d;
}

.total-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.total-row span {
    font-size: 16px;
    font-weight: 800;
}

.total-row strong {
    color: #65a976;
    font-size: 23px;
}


/* =========================
   ORDER BUTTON
========================= */

.place-order-btn {
    width: 100%;

    margin-top: 25px;
    padding: 16px 20px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    border: none;
    border-radius: 13px;

    background: #79b88a;
    color: white;

    font-size: 14px;
    font-weight: 800;

    cursor: pointer;

    transition: 0.2s;
}

.place-order-btn:hover {
    background: #65a976;
    transform: translateY(-2px);
}


/* =========================
   BENEFITS
========================= */

.checkout-benefits {
    display: flex;
    flex-direction: column;
    gap: 10px;

    margin-top: 20px;
}

.checkout-benefits div {
    display: flex;
    align-items: center;
    gap: 9px;

    color: #78847d;
    font-size: 12px;
}

.checkout-benefits span {
    color: #65a976;
    font-weight: 900;
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

    text-align: center;

    border-top: 1px solid #2c3932;

    color: #8e9b93;
    font-size: 12px;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 900px) {

    .checkout-container {
        grid-template-columns: 1fr;
    }

    .order-summary {
        position: static;
    }

    .nav-links {
        display: none;
    }

}

@media (max-width: 600px) {

    .checkout-header {
        padding: 55px 20px 40px;
    }

    .checkout-header h1 {
        font-size: 38px;
    }

    .checkout-container {
        padding: 25px 15px 60px;
    }

    .checkout-card,
    .order-summary {
        padding: 22px;
        border-radius: 18px;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .full-width {
        grid-column: auto;
    }

    .footer-container {
        flex-direction: column;
    }

    .footer-links {
        flex-wrap: wrap;
    }

}

</style>