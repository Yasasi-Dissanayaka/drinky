<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'

// Mobile navigation
const isMenuOpen = ref(false)

function closeMenu() {
    isMenuOpen.value = false
}
</script>

<template>
    <!-- NAVBAR -->
    <header class="navbar">
        <nav class="container nav-inner">

            <Link href="/" class="logo" @click="closeMenu">
                drink<span class="logo-accent">y</span>
            </Link>

            <div class="nav-links">
                <Link href="/" class="nav-link is-active">Home</Link>
                <Link href="/menu" class="nav-link">Menu</Link>
                <Link href="/about" class="nav-link">About</Link>
                <Link href="/contact" class="nav-link">Contact</Link>
            </div>

            <div class="nav-actions">
                <Link href="/login" class="nav-login">Login</Link>

                <Link href="/menu" class="btn btn-dark btn-sm">
                    Order Now
                </Link>

                <button
                    type="button"
                    class="nav-toggle"
                    :class="{ 'is-open': isMenuOpen }"
                    :aria-expanded="isMenuOpen"
                    aria-label="Toggle menu"
                    @click="isMenuOpen = !isMenuOpen"
                >
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>

        </nav>

        <!-- MOBILE MENU -->
        <div class="mobile-nav" :class="{ 'is-open': isMenuOpen }">
            <div class="container mobile-nav-inner">
                <Link href="/" class="mobile-nav-link is-active" @click="closeMenu">Home</Link>
                <Link href="/menu" class="mobile-nav-link" @click="closeMenu">Menu</Link>
                <Link href="/about" class="mobile-nav-link" @click="closeMenu">About</Link>
                <Link href="/contact" class="mobile-nav-link" @click="closeMenu">Contact</Link>
                <Link href="/login" class="mobile-nav-link mobile-nav-login" @click="closeMenu">Login</Link>
            </div>
        </div>
    </header>
</template>

<style scoped>
* {
    box-sizing: border-box;
}

a {
    color: inherit;
    text-decoration: none;
}

.container {
    width: 100%;
    max-width: 1500px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
}

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

.btn-sm {
    padding: 10px 18px;
    font-size: 16px;
    font-weight: 600;
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
   NAVBAR
   ========================================= */

.navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 50;
    width: 100%;
    background: rgba(255, 255, 255, 0.55);
    backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    border-bottom: 1px solid rgba(255, 255, 255, 0.35);
    box-shadow: 0 8px 32px rgba(23, 37, 29, 0.08);
    transition: background 0.3s ease, box-shadow 0.3s ease;
}

.nav-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 20px;
    padding-bottom: 20px;
    gap: 12px;
}

.logo {
    font-size: 34px;
    font-weight: 900;
    letter-spacing: -0.02em;
    flex: none;
}

.logo-accent {
    color: #e85d3f;
}

.nav-links {
    display: none;
    align-items: center;
    gap: 32px;
}

.nav-link {
    position: relative;
    font-size: 14px;
    font-weight: 600;
    transition: color 0.25s ease;
}

.nav-link:hover {
    color: #e85d3f;
}

.nav-link.is-active {
    color: #e85d3f;
}

.nav-link.is-active::after {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    bottom: -8px;
    height: 2px;
    border-radius: 10px;
    background: #e85d3f;
}

.nav-actions {
    display: flex;
    align-items: center;
    gap: 10px;
}

.nav-login {
    display: none;
    padding: 10px 20px;
    font-size: 20px;
    font-weight: 600;
}

/* Mobile hamburger toggle */
.nav-toggle {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 5px;
    width: 40px;
    height: 40px;
    padding: 0;
    border: 0;
    border-radius: 50%;
    background: rgba(23, 37, 29, 0.85);
    backdrop-filter: blur(4px);
    cursor: pointer;
    flex: none;
}

.nav-toggle span {
    width: 18px;
    height: 2px;
    border-radius: 2px;
    background: #ffffff;
    transition: transform 0.25s ease, opacity 0.25s ease;
}

.nav-toggle.is-open span:nth-child(1) {
    transform: translateY(7px) rotate(45deg);
}

.nav-toggle.is-open span:nth-child(2) {
    opacity: 0;
}

.nav-toggle.is-open span:nth-child(3) {
    transform: translateY(-7px) rotate(-45deg);
}

/* Mobile dropdown panel */
.mobile-nav {
    max-height: 0;
    overflow: hidden;
    background: rgba(255, 255, 255, 0.65);
    backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    box-shadow: 0 20px 30px rgba(0, 0, 0, 0.08);
    border-top: 1px solid rgba(255, 255, 255, 0.35);
    transition: max-height 0.3s ease;
}

.mobile-nav.is-open {
    max-height: 320px;
}

.mobile-nav-inner {
    display: flex;
    flex-direction: column;
    gap: 4px;
    padding-top: 12px;
    padding-bottom: 20px;
}

.mobile-nav-link {
    padding: 10px 4px;
    font-size: 15px;
    font-weight: 700;
    border-bottom: 1px solid rgba(23, 37, 29, 0.08);
}

.mobile-nav-link.is-active {
    color: #e85d3f;
}

.mobile-nav-login {
    border-bottom: 0;
    color: #6b7280;
}

/* =========================================
   RESPONSIVE
   ========================================= */

@media (min-width: 640px) {
    .container {
        padding-left: 24px;
        padding-right: 24px;
    }
}

@media (min-width: 768px) {
    .nav-links {
        display: flex;
    }

    .nav-login {
        display: block;
    }

    .nav-toggle {
        display: none;
    }

    .mobile-nav {
        display: none;
    }
}

@media (min-width: 1024px) {
    .container {
        padding-left: 32px;
        padding-right: 32px;
    }
}
</style>