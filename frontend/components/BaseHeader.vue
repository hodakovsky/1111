<template>
  <header class="site-header premium-header">
    <div class="header-inner container">
      <div class="brand-stack">
        <NuxtLink to="/" class="logo">TYFERET</NuxtLink>
        <p class="brand-subtitle">Premium Judaica Collections</p>
      </div>

      <nav class="main-nav">
        <ul class="nav-list">
          <li class="nav-item has-dropdown" @mouseenter="isMenuOpen = true" @mouseleave="isMenuOpen = false">
            <button type="button" class="nav-link menu-toggle">
              COLLECTIONS
              <span class="arrow">▾</span>
            </button>
            <div v-show="isMenuOpen" class="dropdown-menu">
              <NuxtLink
                v-for="item in categories"
                :key="item"
                :to="{ path: '/shop', query: { category: item } }"
                class="dropdown-link"
              >
                {{ item }}
              </NuxtLink>
            </div>
          </li>
          <li><NuxtLink to="/shop" class="nav-link">Shop</NuxtLink></li>
          <li><NuxtLink to="/account" class="nav-link">Account</NuxtLink></li>
          <li><NuxtLink to="/search" class="nav-link">Search</NuxtLink></li>
        </ul>
      </nav>

      <div class="header-actions premium-actions">
        <button type="button" class="action-pill" @click="goTo('/search')">Search</button>
        <button type="button" class="icon-btn" @click="goTo('/account')">
          <span class="icon icon-user"></span>
        </button>
        <button type="button" class="icon-btn cart-btn" @click="goTo('/cart')">
          <span class="icon icon-bag"></span>
          <span v-if="cartCount > 0" class="badge">{{ cartCount }}</span>
        </button>
      </div>
    </div>
  </header>
</template>

<script setup lang="ts">
import { computed, ref } from 'vue';
import { useRuntimeConfig, useRouter } from '#imports';

const categories = ['Necklaces', 'Earrings', 'Bracelets', 'Rings'];
const isMenuOpen = ref(false);
const router = useRouter();
const config = useRuntimeConfig();

const { data: cartData } = useFetch(`${config.public.apiBase}/api/cart`, {
  server: false,
});

const cartCount = computed(() => cartData.value?.count ?? 0);

const goTo = (path: string) => {
  router.push(path);
};
</script>
