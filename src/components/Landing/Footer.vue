<template>
  <footer class="bg-primary xl:mt-[138px] text-white">
    <div class="container mx-auto">
      <div class="flex xl:flex-row flex-col items-start justify-between py-[50px]">
        <div class="lg:text-start text-center">
          <RouterLink to="#">
            <img src="../../assets/svgs/logo-white.svg" class="lg:mx-0 mx-auto" alt="LOGO" />
          </RouterLink>

          <p
            class="lg:w-[50%] mt-4 text-white text-base font-normal leading-[140%] tracking-[-0.16px] opacity-50"
          >
            Work safe, work anonymous. We don't ask you for any personal
            information. <br /><br />
            Pay with Perfect Money, Bitcoin, Monero or any crypto.
          </p>
        </div>

        <div class="grow xl:w-auto w-full grid xl:mt-0 mt-[50px] lg:grid-cols-5 grid-cols-2 xl:gap-2 gap-[25px] [&>*]:justify-self-center [&>*]:xl:justify-self-end [&>*>*:last-child>*]:text-center [&>*>*]:text-center">
          <div>
            <h5
              class="text-white-50 text-base  font-light leading-[23.68px] mb-1.5"
            >
              Products
            </h5>
            <ul class="[&>*]:font-medium [&>*]:my-1">
              <li v-for="(product, ind) in ProductsList" :key="ind">
                <router-link to="#">{{ product }}</router-link>
              </li>
            </ul>
          </div>
          <div>
            <h5
              class="text-white-50 text-base  font-light leading-[23.68px] mb-1.5"
            >
              Location
            </h5>
            <ul class="[&>*]:font-medium [&>*]:my-1">
              <li v-for="(cont , index) in LocationList" :key="index">
                <button class="flex items-center" @click="activeLocationTab = index">
                  {{ cont.location }}
                  <img
                    src="../../assets/svgs/collapse-false.svg"
                    class="ml-2.5"
                    alt="Collapse"
                    v-if="activeLocationTab != index"
                  />
                  <img
                    src="../../assets/svgs/collapse-true.svg"
                    class="ml-2.5"
                    alt="Collapse"
                    v-else
                  />
                </button>
                <ul :class="activeLocationTab == index ? 'block' : 'hidden'">
                  <li v-for="(server , index) in cont.list" :key="index"><router-link class="tw-opacity" to="#">{{ server }}</router-link></li>
                </ul>
              </li>
            </ul>
          </div>
          <div>
            <h5
              class="text-white-50 text-base  font-light leading-[23.68px] mb-1.5"
            >
              Resources
            </h5>
            <ul class="[&>*]:font-medium [&>*]:my-1">
              <li v-for="(resource, ind) in ResourcesList" :key="ind">
                <router-link to="#">{{ resource }}</router-link>
              </li>
            </ul>
          </div>
          <div>
            <h5
              class="text-white-50 text-base  font-light leading-[23.68px] mb-1.5"
            >
              OS
            </h5>
            <ul class="[&>*]:font-medium [&>*]:my-1">
              <li v-for="(os, ind) in OSList" :key="ind">
                <router-link to="#">{{ os }}</router-link>
              </li>
            </ul>
          </div>
          <div class="col-start-1 col-end-3 lg:col-start-auto lg:col-end-auto">
            <h5
              class="text-white-50 text-base  font-light leading-[23.68px] mb-1.5"
            >
              Company
            </h5>
            <ul class="[&>*]:font-medium [&>*]:my-1">
              <li v-for="(company, ind) in CompanyList" :key="ind">
                <router-link to="#">{{ company }}</router-link>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <hr class="opacity-5" />

      <p
        class="text-white text-[15px] lg:text-start text-center font-normal leading-[19.88px] tracking-[0.14px] opacity-50 py-[30px]"
      >
        © 2023 Server_vy, Inc
      </p>
    </div>
  </footer>
</template>

<script setup>
import { reactive , ref } from "vue";

const activeLocationTab = ref(2)
const ProductsList = reactive([
  "Buy VPS",
  "Buy RDP",
  "Game VPS",
  "SSD VPS",
  "MikroTik VPS",
  "Forex VPS",
]);
const LocationList = reactive([
  {
    location: "USA",
    list: [
      "Europe VPS",
      "Europe VPS",
      "UK VPS",
      "London VPS",
      "France VPS",
      "Roubaix VPS",
    ],
  },
  {
    location: "Forex VPS",
    list: [
      "Europe VPS",
      "Europe VPS",
      "UK VPS",
      "London VPS",
      "France VPS",
      "Roubaix VPS",
    ],
  },
  {
    location: "Europe",
    list: [
      "Europe VPS",
      "Europe VPS",
      "UK VPS",
      "London VPS",
      "France VPS",
      "Roubaix VPS",
    ],
  },
  {
    location: "Asia",
    list: [
      "Europe VPS",
      "Europe VPS",
      "UK VPS",
      "London VPS",
      "France VPS",
      "Roubaix VPS",
    ],
  },
]);
const ResourcesList = reactive([
  "Best Forex VPS",
  "Best Windows VPS",
  "Best Linux VPS",
  "Best RDP Provider",
]);
const OSList = reactive([
  "Windows VM",
  "OpenVPN VM",
  "Ubuntu VM",
  "AlmaLinux VM",
  "Debian VM",
  "Fedora VM",
]);
const CompanyList = reactive([
  "About Us",
  "Contact Us",
  "FAQ",
  "Blog",
  "Customer Reviews",
  "Privacy Policy",
  "Terms of Service",
]);
</script>


<style scoped>
.tw-opacity {
    @apply opacity-70 font-normal !important
}
</style>