<template>
  <section class="cart-page">
    <div class="container">
      <div class="page-header">
        <h1>Shopping Cart</h1>
        <p>Review your selected items before checkout.</p>
      </div>

      <div v-if="items.length > 0" class="cart-grid">
        <div v-for="item in items" :key="item.product.id" class="cart-item">
          <img :src="item.product.image_url" :alt="item.product.name" />
          <div class="cart-item-content">
            <h2>{{ item.product.name }}</h2>
            <p>{{ item.product.category }}</p>
            <p>Quantity: {{ item.quantity }}</p>
            <p>Subtotal: ${{ item.subtotal }}</p>
          </div>
          <button class="btn-outline" @click="removeItem(item.product.id)">Remove</button>
        </div>

        <div class="cart-summary">
          <h3>Order summary</h3>
          <p>Items: {{ count }}</p>
          <p>Total: ${{ total }}</p>
          <button class="btn-black" type="button">Proceed to Checkout</button>
        </div>
      </div>

      <div v-else class="empty-state">
        <p>Your cart is empty. Add some jewelry from the shop.</p>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { useRuntimeConfig } from '#imports';

const config = useRuntimeConfig();
const items = ref<Array<any>>([]);
const total = ref(0);
const count = ref(0);

const fetchCart = async () => {
  const cart = await $fetch(`${config.public.apiBase}/api/cart`);
  items.value = cart.items;
  total.value = cart.total;
  count.value = cart.count;
};

const removeItem = async (id: number) => {
  await $fetch(`${config.public.apiBase}/api/cart/${id}`, { method: 'DELETE' });
  await fetchCart();
};

onMounted(fetchCart);
</script>
