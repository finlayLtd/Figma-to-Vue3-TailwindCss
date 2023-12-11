<script setup>
import Navbar from "../components/Landing/Navbar.vue";
import Footer from "../components/Landing/Footer.vue";
import SHero from "../components/Landing/Help/SHero.vue";
import Acordians from "../components/Landing/Help/Acordians.vue";


</script>

<template>
  <div class="dark:bg-[#1C1D20]" >
    <Navbar bgColor="bg-white dark:bg-black" />
    <SHero />
    <Acordians />
    <Footer />
  </div>
</template>
