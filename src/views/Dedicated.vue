<script setup>
import Navbar from "../components/Landing/Navbar.vue";
import Benifits from "../components/Landing/Benifits.vue";
import Performance from "../components/Landing/Performance.vue";
import Deploy from "../components/Landing/Deploy.vue";
import Footer from "../components/Landing/Footer.vue";
import DHero from "../components/Landing/Dedicated/DHero.vue";
import DServer from "../components/Landing/Dedicated/DServer.vue";
import Vps from "../components/Landing/Dedicated/Vps.vue";
import DFeature from "../components/Landing/Dedicated/DFeature.vue";
import Faq from "../components/Landing/Dedicated/Faq.vue";
import ChooseServer from "../components/Landing/Dedicated/ChooseServer.vue";
import Management from '../components/Landing/Dedicated/Management.vue'


</script>

<template>
  <div class="dark:bg-[#1C1D20]" >
    <Navbar :backBlack="650" :backActive="true" />
    <DHero />
    <Benifits />
    <DServer />
    <Vps />
    <DFeature />
    <ChooseServer />
    <Management />
    <Performance />
    <Deploy />
    <Faq />
    <Footer />
  </div>
</template>
