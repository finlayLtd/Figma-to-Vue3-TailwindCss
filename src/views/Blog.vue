<script setup>
import Navbar from "../components/Landing/Navbar.vue";
import Footer from "../components/Landing/Footer.vue";
import BHero from "../components/Landing/Blog/BHero.vue";
import BlogContent from '../components/Landing/Blog/BlogContent.vue'


</script>

<template>
  <div class="dark:bg-[#1C1D20]" >
    <Navbar bgColor="bg-white dark:bg-black" />
    <BHero />
    <BlogContent />
    <Footer />
  </div>
</template>
