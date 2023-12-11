<script setup>
import Navbar from "../components/Landing/Navbar.vue";
import Footer from "../components/Landing/Footer.vue";
import BHero from "../components/Landing/Blog/BHero.vue";
import SingleBlogContent from "../components/Landing/Blog/SingleBlogContent.vue";


</script>

<template>
  <div class="dark:bg-[#1C1D20]" >
    <Navbar bgColor="bg-white dark:bg-black" />
    <SingleBlogContent />
    <Footer />
  </div>
</template>
