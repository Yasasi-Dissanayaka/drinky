<script setup>
import { Head, Link } from '@inertiajs/vue3'
import { ref } from 'vue'

const form = ref({
    name: '',
    email: '',
    subject: '',
    message: ''
})

const submitted = ref(false)

const submitForm = () => {
    submitted.value = true

    form.value = {
        name: '',
        email: '',
        subject: '',
        message: ''
    }
}
</script>

<template>
    <Head title="Contact Us | DRINKY" />

    <div class="contact-page">

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
                    <Link href="/contact" class="active">Contact</Link>
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
        <section class="contact-hero">

            <div class="hero-content">

                <span class="small-title">
                    GET IN TOUCH
                </span>

                <h1>
                    We'd love to
                    <span>hear from you.</span>
                </h1>

                <p>
                    Have a question, suggestion or just want to
                    say hello? Send us a message and our team
                    will get back to you.
                </p>

            </div>

            <div class="hero-decoration">
                💌
            </div>

        </section>


        <!-- CONTACT CONTENT -->
        <main class="contact-container">

            <!-- LEFT SIDE -->
            <div class="contact-info">

                <span class="section-label">
                    CONTACT DETAILS
                </span>

                <h2>
                    Let's talk
                    <span>DRINKY.</span>
                </h2>

                <p class="intro-text">
                    We are always happy to hear from our customers.
                    Here are the best ways to reach us.
                </p>


                <!-- EMAIL -->
                <div class="info-card">

                    <div class="info-icon">
                        ✉️
                    </div>

                    <div>
                        <span>Email Us</span>

                        <a href="mailto:hello@drinky.com">
                            hello@drinky.com
                        </a>
                    </div>

                </div>


                <!-- PHONE -->
                <div class="info-card">

                    <div class="info-icon">
                        📞
                    </div>

                    <div>
                        <span>Call Us</span>

                        <a href="tel:+94112345678">
                            +94 11 234 5678
                        </a>
                    </div>

                </div>


                <!-- LOCATION -->
                <div class="info-card">

                    <div class="info-icon">
                        📍
                    </div>

                    <div>
                        <span>Visit Us</span>

                        <strong>
                            Colombo, Sri Lanka
                        </strong>
                    </div>

                </div>


                <!-- HOURS -->
                <div class="info-card">

                    <div class="info-icon">
                        🕐
                    </div>

                    <div>
                        <span>Opening Hours</span>

                        <strong>
                            Every Day · 8:00 AM – 10:00 PM
                        </strong>
                    </div>

                </div>


                <!-- SOCIAL -->
                <div class="social-section">

                    <span class="section-label">
                        FOLLOW US
                    </span>

                    <div class="social-links">

                        <a href="#" aria-label="Instagram">
                            📷
                        </a>

                        <a href="#" aria-label="Facebook">
                            f
                        </a>

                        <a href="#" aria-label="TikTok">
                            ♪
                        </a>

                    </div>

                </div>

            </div>


            <!-- RIGHT SIDE FORM -->
            <div class="contact-form-card">

                <div class="form-heading">

                    <span class="section-label">
                        SEND A MESSAGE
                    </span>

                    <h2>
                        How can we help?
                    </h2>

                    <p>
                        Fill in the form below and we'll get back
                        to you as soon as possible.
                    </p>

                </div>


                <!-- SUCCESS MESSAGE -->
                <div
                    v-if="submitted"
                    class="success-message"
                >
                    <div class="success-icon">
                        ✓
                    </div>

                    <div>
                        <strong>Message sent!</strong>

                        <p>
                            Thanks for contacting DRINKY.
                            We'll get back to you soon.
                        </p>
                    </div>
                </div>


                <!-- FORM -->
                <form
                    v-else
                    @submit.prevent="submitForm"
                >

                    <div class="form-grid">

                        <!-- NAME -->
                        <div class="form-group">

                            <label>
                                Your Name
                            </label>

                            <input
                                v-model="form.name"
                                type="text"
                                placeholder="John Smith"
                                required
                            />

                        </div>


                        <!-- EMAIL -->
                        <div class="form-group">

                            <label>
                                Email Address
                            </label>

                            <input
                                v-model="form.email"
                                type="email"
                                placeholder="john@example.com"
                                required
                            />

                        </div>


                        <!-- SUBJECT -->
                        <div class="form-group full-width">

                            <label>
                                Subject
                            </label>

                            <select
                                v-model="form.subject"
                                required
                            >
                                <option
                                    value=""
                                    disabled
                                >
                                    Choose a subject
                                </option>

                                <option value="general">
                                    General Question
                                </option>

                                <option value="order">
                                    Order Support
                                </option>

                                <option value="delivery">
                                    Delivery Question
                                </option>

                                <option value="feedback">
                                    Feedback
                                </option>

                                <option value="other">
                                    Other
                                </option>
                            </select>

                        </div>


                        <!-- MESSAGE -->
                        <div class="form-group full-width">

                            <label>
                                Message
                            </label>

                            <textarea
                                v-model="form.message"
                                rows="6"
                                placeholder="Tell us how we can help..."
                                required
                            ></textarea>

                        </div>

                    </div>


                    <button
                        type="submit"
                        class="send-button"
                    >
                        <span>Send Message</span>
                        <span>→</span>
                    </button>

                </form>

            </div>

        </main>


        <!-- FAQ -->
        <section class="faq-section">

            <div class="section-heading">

                <span class="section-label">
                    QUICK ANSWERS
                </span>

                <h2>
                    Frequently asked
                    <span>questions.</span>
                </h2>

            </div>


            <div class="faq-grid">

                <div class="faq-card">

                    <div class="faq-icon">
                        🚚
                    </div>

                    <h3>
                        How long does delivery take?
                    </h3>

                    <p>
                        Most orders arrive within 30–60 minutes,
                        depending on your location and order time.
                    </p>

                </div>


                <div class="faq-card">

                    <div class="faq-icon">
                        🥤
                    </div>

                    <h3>
                        Can I customise my drink?
                    </h3>

                    <p>
                        Some drinks can be customised.
                        Check the drink details before ordering.
                    </p>

                </div>


                <div class="faq-card">

                    <div class="faq-icon">
                        💳
                    </div>

                    <h3>
                        What payment methods do you accept?
                    </h3>

                    <p>
                        We support card payments and
                        cash on delivery.
                    </p>

                </div>

            </div>

        </section>


        <!-- CTA -->
        <section class="cta-section">

            <div class="cta-content">

                <span class="section-label">
                    HUNGRY FOR A DRINK?
                </span>

                <h2>
                    Maybe it's time for
                    <span>a little DRINKY.</span>
                </h2>

                <p>
                    Explore our drinks and find your next favourite.
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

.contact-page {
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

.contact-hero {
    position: relative;

    overflow: hidden;

    padding: 85px 25px 80px;

    background:
        radial-gradient(
            circle at 80% 50%,
            #e4f3e7,
            transparent 40%
        );
}

.hero-content {
    position: relative;
    z-index: 2;

    max-width: 1200px;
    margin: auto;
}

.small-title,
.section-label {
    color: #70ae80;

    font-size: 11px;
    font-weight: 900;

    letter-spacing: 3px;
}

.hero-content h1 {
    max-width: 700px;

    margin: 15px 0;

    font-size: 62px;
    line-height: 1.05;

    letter-spacing: -3px;
}

.hero-content h1 span {
    display: block;
    color: #70ae80;
}

.hero-content p {
    max-width: 600px;

    margin: 20px 0 0;

    color: #69766f;

    font-size: 17px;
    line-height: 1.8;
}

.hero-decoration {
    position: absolute;

    right: 12%;
    top: 50%;

    width: 170px;
    height: 170px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #e2f1e5;

    font-size: 80px;

    transform: translateY(-50%)
        rotate(8deg);

    box-shadow:
        0 25px 50px rgba(60, 90, 70, 0.10);
}


/* =========================
   CONTACT CONTENT
========================= */

.contact-container {
    max-width: 1200px;

    margin: auto;
    padding: 90px 25px;

    display: grid;

    grid-template-columns: 0.85fr 1.15fr;

    gap: 70px;

    align-items: start;
}


/* =========================
   CONTACT INFO
========================= */

.contact-info h2 {
    margin: 13px 0 18px;

    font-size: 45px;
    line-height: 1.1;

    letter-spacing: -2px;
}

.contact-info h2 span {
    color: #70ae80;
}

.intro-text {
    max-width: 480px;

    margin-bottom: 35px;

    color: #727e77;

    font-size: 15px;
    line-height: 1.8;
}

.info-card {
    display: flex;
    align-items: center;

    gap: 15px;

    margin-bottom: 17px;
}

.info-icon {
    width: 52px;
    height: 52px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #edf6ef;

    border-radius: 15px;

    font-size: 21px;
}

.info-card span,
.info-card strong {
    display: block;
}

.info-card span {
    margin-bottom: 5px;

    color: #87918c;

    font-size: 11px;
    font-weight: 700;
}

.info-card a,
.info-card strong {
    color: #26342c;

    font-size: 14px;
    font-weight: 700;

    text-decoration: none;
}

.info-card a:hover {
    color: #65a976;
}


/* =========================
   SOCIAL
========================= */

.social-section {
    margin-top: 35px;
}

.social-links {
    display: flex;

    gap: 10px;

    margin-top: 15px;
}

.social-links a {
    width: 40px;
    height: 40px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: white;

    border: 1px solid #e2eae4;

    border-radius: 11px;

    color: #55625a;

    text-decoration: none;

    font-size: 15px;
    font-weight: 800;

    transition: 0.2s;
}

.social-links a:hover {
    background: #79b88a;
    border-color: #79b88a;
    color: white;
}


/* =========================
   FORM CARD
========================= */

.contact-form-card {
    padding: 38px;

    background: white;

    border: 1px solid #e1e9e3;

    border-radius: 25px;

    box-shadow:
        0 15px 45px rgba(35, 55, 42, 0.06);
}

.form-heading h2 {
    margin: 10px 0;

    font-size: 27px;
}

.form-heading p {
    margin: 0 0 30px;

    color: #7d8882;

    font-size: 13px;
    line-height: 1.7;
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
    color: #445149;

    font-size: 12px;
    font-weight: 800;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    box-sizing: border-box;

    padding: 14px 15px;

    background: #fbfcfb;

    border: 1px solid #dce5df;

    border-radius: 12px;

    outline: none;

    color: #26342c;

    font-family: inherit;
    font-size: 13px;

    transition: 0.2s;
}

.form-group textarea {
    resize: vertical;
    min-height: 130px;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: #79b88a;

    background: white;

    box-shadow:
        0 0 0 4px rgba(121, 184, 138, 0.10);
}

.form-group input::placeholder,
.form-group textarea::placeholder {
    color: #adb6b1;
}


/* =========================
   SEND BUTTON
========================= */

.send-button {
    width: 100%;

    margin-top: 23px;

    padding: 16px 20px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    border: none;

    border-radius: 13px;

    background: #79b88a;
    color: white;

    font-size: 13px;
    font-weight: 800;

    cursor: pointer;

    transition: 0.2s;
}

.send-button:hover {
    background: #65a976;

    transform: translateY(-2px);
}


/* =========================
   SUCCESS
========================= */

.success-message {
    display: flex;
    align-items: flex-start;

    gap: 15px;

    padding: 22px;

    background: #edf7ef;

    border: 1px solid #cfe5d4;

    border-radius: 15px;
}

.success-icon {
    width: 40px;
    height: 40px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #79b88a;

    color: white;

    border-radius: 50%;

    font-weight: 900;
}

.success-message strong {
    display: block;

    margin-bottom: 5px;

    color: #416b4b;

    font-size: 15px;
}

.success-message p {
    margin: 0;

    color: #718077;

    font-size: 12px;
    line-height: 1.6;
}


/* =========================
   FAQ
========================= */

.faq-section {
    padding: 90px 25px;

    background: white;
}

.section-heading {
    max-width: 650px;

    margin: auto;

    text-align: center;
}

.section-heading h2 {
    margin: 13px 0;

    font-size: 42px;
    line-height: 1.1;

    letter-spacing: -2px;
}

.section-heading h2 span {
    color: #70ae80;
}

.faq-grid {
    max-width: 1100px;

    margin: 50px auto 0;

    display: grid;

    grid-template-columns: repeat(3, 1fr);

    gap: 20px;
}

.faq-card {
    padding: 28px;

    background: #f8faf9;

    border: 1px solid #e3eae5;

    border-radius: 20px;
}

.faq-icon {
    width: 48px;
    height: 48px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #e9f4eb;

    border-radius: 13px;

    font-size: 22px;
}

.faq-card h3 {
    margin: 20px 0 10px;

    font-size: 16px;
}

.faq-card p {
    margin: 0;

    color: #7a867f;

    font-size: 13px;
    line-height: 1.7;
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

    border-top: 1px solid #2c3932;

    text-align: center;

    color: #8e9b93;

    font-size: 12px;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 900px) {

    .contact-container {
        grid-template-columns: 1fr;

        gap: 50px;
    }

    .hero-decoration {
        right: 5%;
        opacity: 0.35;
    }

    .faq-grid {
        grid-template-columns: 1fr;
    }

}

@media (max-width: 650px) {

    .nav-links {
        display: none;
    }

    .contact-hero {
        padding: 65px 20px;
    }

    .hero-content h1 {
        font-size: 43px;
    }

    .hero-content p {
        font-size: 15px;
    }

    .hero-decoration {
        display: none;
    }

    .contact-container {
        padding: 60px 18px;
    }

    .contact-info h2 {
        font-size: 36px;
    }

    .contact-form-card {
        padding: 25px 20px;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .full-width {
        grid-column: auto;
    }

    .section-heading h2,
    .cta-content h2 {
        font-size: 34px;
    }

    .footer-container {
        flex-direction: column;
    }

    .footer-links {
        flex-wrap: wrap;
    }

}

</style>