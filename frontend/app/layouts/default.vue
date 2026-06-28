<template>
  <div>
    <header class="site-header">
      <div class="container header-wrapper">
        <div class="logo">Tyferet</div>
        <nav class="main-nav">
          <ul class="nav-list">
            <li><NuxtLink to="/">HOME</NuxtLink></li>
            <li><NuxtLink to="/shop">SHOP</NuxtLink></li>
            <li><NuxtLink to="/contact">CONTACT</NuxtLink></li>
            <li><NuxtLink to="/admin">ADMIN</NuxtLink></li>
          </ul>
        </nav>
        <div class="header-actions">
          <span>USD $ | ENGLISH</span>
          <div class="header-icons">
            <NuxtLink to="/search"><i class="fa-solid fa-magnifying-glass"></i></NuxtLink>
            <NuxtLink to="/account"><i class="fa-regular fa-user"></i></NuxtLink>
            <NuxtLink to="/cart"><i class="fa-solid fa-bag-shopping"></i></NuxtLink>
          </div>
        </div>
      </div>
    </header>
    <main>
      <NuxtPage />
    </main>
  </div>
</template>

<script setup lang="ts"></script>
