<template>
  <section class="search-page">
    <div class="container">
      <div class="page-header">
        <h1>Search Products</h1>
        <p>Find jewelry by name or category.</p>
      </div>

      <div class="search-box">
        <input
          v-model="searchTerm"
          type="search"
          placeholder="Search for necklaces, rings, bracelets..."
          @input="onSearch"
        />
      </div>

      <div class="product-grid">
        <article v-for="product in filteredProducts" :key="product.id" class="product-card">
          <img :src="product.image_url" :alt="product.name" />
          <div class="product-content">
            <p class="product-category">{{ product.category }}</p>
            <h2>{{ product.name }}</h2>
            <p class="product-description">{{ product.description }}</p>
            <div class="product-meta">
              <span>${{ product.price }}</span>
              <span>{{ product.stock }} in stock</span>
            </div>
          </div>
        </article>
      </div>

      <div v-if="filteredProducts.length === 0" class="empty-state">
        <p>No products match your search.</p>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { computed, onMounted, ref } from 'vue';
import { useRuntimeConfig } from '#imports';

const config = useRuntimeConfig();
const searchTerm = ref('');
const products = ref<Array<any>>([]);

const fetchProducts = async () => {
  products.value = await $fetch(`${config.public.apiBase}/api/products`);
};

const filteredProducts = computed(() => {
  if (!searchTerm.value.trim()) {
    return products.value;
  }

  return products.value.filter((product) => {
    const needle = searchTerm.value.toLowerCase();
    return (
      product.name.toLowerCase().includes(needle) ||
      product.category.toLowerCase().includes(needle) ||
      product.description.toLowerCase().includes(needle)
    );
  });
});

const onSearch = () => {
  // reactive filter
};

onMounted(fetchProducts);
</script>
