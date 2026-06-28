<template>
  <div class="container" style="padding: 40px 0;">
    <h1 style="margin-bottom: 24px; text-transform: uppercase; letter-spacing: 2px;">Admin Product Management</h1>
    <section style="margin-bottom: 40px;">
      <form @submit.prevent="saveProduct" style="display: grid; gap: 16px; max-width: 800px;">
        <input v-model="productForm.name" placeholder="Product name" required />
        <input v-model="productForm.category" placeholder="Category" />
        <input v-model="productForm.price" type="number" step="0.01" placeholder="Price" required />
        <input v-model="productForm.image_url" placeholder="Image URL" />
        <input v-model="productForm.stock" type="number" step="1" placeholder="Stock" required />
        <textarea v-model="productForm.description" placeholder="Description"></textarea>
        <div style="display: flex; gap: 16px; align-items: center;">
          <button class="btn-black" type="submit">{{ editMode ? 'Update' : 'Create' }}</button>
          <button type="button" @click="resetForm" class="btn-outline">Reset</button>
        </div>
      </form>
    </section>

    <section>
      <h2 style="margin-bottom: 16px;">Products</h2>
      <div style="display: grid; gap: 20px;">
        <div v-for="product in products" :key="product.id" style="border: 1px solid #eee; padding: 24px; display: grid; gap: 8px;">
          <div style="display: flex; gap: 20px; align-items: center;">
            <img :src="product.image_url" alt="product.name" style="width: 100px; height: 100px; object-fit: cover;" />
            <div>
              <h3 style="margin: 0 0 8px;">{{ product.name }}</h3>
              <p style="margin: 0; color: #666;">{{ product.category }} • ${{ product.price }}</p>
            </div>
          </div>
          <p style="color: #444;">{{ product.description }}</p>
          <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <button class="btn-black" type="button" @click="editProduct(product)">Edit</button>
            <button type="button" class="btn-outline" @click="deleteProduct(product.id)">Delete</button>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { useRuntimeConfig } from '#imports';

const config = useRuntimeConfig();
const products = ref<Array<any>>([]);
const editMode = ref(false);
const selectedId = ref<number | null>(null);
const productForm = ref({
  name: '',
  category: '',
  price: 0,
  image_url: '',
  stock: 0,
  description: '',
});

const fetchProducts = async () => {
  const data = await $fetch(`${config.public.apiBase}/api/products`);
  products.value = data;
};

const saveProduct = async () => {
  const payload = { ...productForm.value };
  if (editMode.value && selectedId.value) {
    await $fetch(`${config.public.apiBase}/api/products/${selectedId.value}`, {
      method: 'PUT',
      body: payload,
    });
  } else {
    await $fetch(`${config.public.apiBase}/api/products`, {
      method: 'POST',
      body: payload,
    });
  }
  await fetchProducts();
  resetForm();
};

const editProduct = (product: any) => {
  selectedId.value = product.id;
  editMode.value = true;
  productForm.value = {
    name: product.name,
    category: product.category,
    price: product.price,
    image_url: product.image_url,
    stock: product.stock,
    description: product.description,
  };
};

const deleteProduct = async (id: number) => {
  await $fetch(`${config.public.apiBase}/api/products/${id}`, { method: 'DELETE' });
  await fetchProducts();
};

const resetForm = () => {
  editMode.value = false;
  selectedId.value = null;
  productForm.value = { name: '', category: '', price: 0, image_url: '', stock: 0, description: '' };
};

onMounted(fetchProducts);
</script>
