<template>
  <div>
    <section class="hero-section">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1>Contact Us</h1>
          <p>If you need any support, our team of experts is available to answer all your questions from assistance with your orders to style advice. Do not hesitate to contact us, we are here for you.</p>
          <button class="btn-black" type="button">Chat With Us</button>
        </div>
        <div class="hero-image">
          <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=600" alt="Support Model" />
        </div>
      </div>
    </section>

    <section class="form-section">
      <div class="container">
        <h2>Contact Form</h2>
        <p class="section-desc">Our team will personally review your inquiry and get back to you as soon as possible. Whether it's about an existing order, a custom request, or choosing the perfect piece, we're here to help.</p>

        <form class="contact-form" @submit.prevent="handleSubmit">
          <div class="form-row">
            <div class="form-group">
              <input v-model="form.name" type="text" placeholder="Name" required />
            </div>
            <div class="form-group">
              <input v-model="form.email" type="email" placeholder="E-mail" required />
            </div>
            <div class="form-group">
              <input v-model="form.phone" type="tel" placeholder="Phone" />
            </div>
          </div>
          <div class="form-group">
            <textarea v-model="form.message" placeholder="Message" required></textarea>
          </div>
          <button type="submit" class="btn-black">Send Message</button>
        </form>
      </div>
    </section>

    <section class="office-section">
      <div class="container office-grid">
        <div class="office-gallery">
          <img src="https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?q=80&w=400" alt="Jewelry 1" />
          <img src="https://images.unsplash.com/photo-1605100804763-247f67b3557e?q=80&w=400" alt="Jewelry 2" />
        </div>
        <div class="office-info">
          <h3>US OFFICE</h3>
          <div class="office-details">
            <p>4245 North Central Expressway, Ste 492, Dallas, TX 75205</p>
            <p>+972 52-889-9362</p>
            <p>info@tyferet.com</p>
          </div>
          <div class="office-buttons">
            <NuxtLink to="#" class="btn-outline">Click To Chat</NuxtLink>
            <NuxtLink to="#" class="btn-outline">Click To Email Us</NuxtLink>
          </div>
        </div>
      </div>
    </section>

    <section class="newsletter">
      <div class="container">
        <h4>Join The Tyferet World</h4>
        <p>Be the first to discover new collections, events and receive access to our exclusive member-only offers. Subscribe to our newsletter.</p>
        <form class="newsletter-form" @submit.prevent="subscribeNewsletter">
          <input v-model="newsletterEmail" type="email" placeholder="E-mail" required />
          <button type="submit" class="btn-black">Subscribe</button>
        </form>
      </div>
    </section>

    <footer class="site-footer">
      <div class="container">
        <div class="footer-grid">
          <div class="footer-col">
            <h5>Quick Links</h5>
            <ul>
              <li><a href="mailto:info@tyferet.com">info@tyferet.com</a></li>
              <li><a href="tel:+972528899362">+972 52-889-9362</a></li>
              <li><a href="#">Whatsapp</a></li>
              <li><a href="#">Instagram</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h5>Policies</h5>
            <ul>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms & Conditions</a></li>
              <li><a href="#">Return Policy</a></li>
              <li><a href="#">Shipping Policy</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h5>Our Company</h5>
            <ul>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">FAQ's</a></li>
              <li><a href="#">Blog</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h5>About</h5>
            <p>Inspired by centuries of Jewish legacy. Reflecting our heritage with contemporary and timeless designs, connection past, present, elegance and identity.</p>
          </div>
        </div>
        <div class="footer-bottom">
          <span>© 2026 · TYFERET JUDAICA JEWELRY</span>
          <div class="payment-icons">
            <i class="fa-brands fa-cc-visa"></i>
            <i class="fa-brands fa-cc-mastercard"></i>
            <i class="fa-brands fa-cc-apple-pay"></i>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const form = ref({
  name: '',
  email: '',
  phone: '',
  message: '',
});
const newsletterEmail = ref('');

const handleSubmit = () => {
  alert('Спасибо! Ваше сообщение успешно отправлено.');
  form.value = { name: '', email: '', phone: '', message: '' };
};

const subscribeNewsletter = () => {
  alert('Спасибо! Вы успешно подписаны на рассылку.');
  newsletterEmail.value = '';
};
</script>
