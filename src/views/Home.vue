<script setup>
import Btn from "../components/Helper/Btn.vue";
import Navbar from "../components/Landing/Navbar.vue";
import Hero from "../components/Landing/Hero.vue";
import Benifits from "../components/Landing/Benifits.vue";
import Server from "../components/Landing/Server.vue";
import Feedback from "../components/Landing/FeedbackCom.vue";
import PriceList from "../components/Landing/PriceList.vue";
import Performance from "../components/Landing/Performance.vue";
import Deploy from "../components/Landing/Deploy.vue";
import Feature from "../components/Landing/Feature.vue";
import Autoinstall from "../components/Landing/Autoinstall.vue";
import Support from "../components/Landing/Support.vue";
import Blog from "../components/Landing/Blog.vue";
import Footer from "../components/Landing/Footer.vue";
</script>

<template>
  <div class="dark:bg-[#1C1D20]" >
    <Navbar />
    <Hero />
    <Benifits />
    <Server />
    <Feedback />
    <PriceList />
    <Performance />
    <Deploy />
    <Feature />
    <Autoinstall />
    <Support />
    <Blog />
    <Footer />
  </div>
</template>
