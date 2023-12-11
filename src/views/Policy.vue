<script setup>
import Navbar from "../components/Landing/Navbar.vue";
import Footer from "../components/Landing/Footer.vue";
import BHero from "../components/Landing/Blog/BHero.vue";
import Tearm from "../components/Landing/Tearm.vue";


</script>

<template>
  <div class="dark:bg-[#1C1D20]" >
    <Navbar bgColor="bg-white dark:bg-black" />
    <BHero subtitle="Updated Jun 24, 2023" title="Privacy policy" caption="Our pricing structure is transparent from the outset, with no hidden charges." />
    <Tearm />
    <Footer />
  </div>
</template>
