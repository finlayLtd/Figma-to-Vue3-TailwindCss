<template>
  <section class="xl:my-[150px] mt-[120px] mb-2 mx-4">
    <div class="container mx-auto flex justify-between items-end mb-[50px]">
        <h2 class="text-primary dark:text-white lg:text-[42px] text-[36px] font-bold leading-[95%] tracking-[0.42px]">Blog site</h2>
        <router-link to="#">
            <div class="flex items-center">
                <p class="text-right text-blue lg:text-lg text-[16px] font-medium leading-[130%] tracking-[0.4px] mr-2">View All News</p>
                <img src="../../assets/svgs/right-arrow-blue.svg" alt="Arrow">
            </div>
        </router-link>
    </div>
    <swiper
      :slidesPerView="width >= 600 ? 4 : 1"
      :centeredSlides="true"
      :spaceBetween="14"
      :grabCursor="true"
      :loop="true"
      :modules="[Pagination]"
      :initialSlide="2"
      class="mySwiper"
    >
      <swiper-slide class="" v-for="(blog, index) in blogItem" :key="index">
        <div class="relative">
          <img
            :src="`src/assets/images/${blog.img}`"
            class="w-full dark:brightness-[0]"
            alt="Blog"
          />
          <span
            class="text-white text-center lg:text-base text-[14px] font-medium leading-[150%] bg-[#FD3C3C] absolute top-0 m-3.5 px-[11px] py-[5px] rounded-[8px]"
            >{{ blog.hosting }}</span
          >
          <div class="px-1.5">
            <div class="flex items-center mt-5 mb-3">
              <img :src="`src/assets/svgs/${blog.avtar}`" alt="Avtar" />
              <p
                class="text-primary dark:text-white lg:text-[15px] text-[14px] font-medium leading-[130%] tracking-[0.3px] ml-1.5"
              >
                {{ blog.user }}
              </p>
              <img
                src="../../assets/svgs/divider.svg"
                class="mx-2.5"
                alt="Divider"
              />
              <p
                class="text-primary dark:text-white lg:text-[15px] text-[14px] font-normal leading-[130%] tracking-[0.3px] opacity-50"
              >
                {{ blog.date }}
              </p>
            </div>
            <h4
              class="text-primary dark:text-white lg:text-[22px] text-[18px] font-bold leading-[120%] tracking-[0.22px]"
            >
              {{ blog.title }}
            </h4>

            <p
              class="text-primary dark:text-white text-base lh:block hidden font-normal leading-[130%] tracking-[0.32px] opacity-70 mt-2"
            >
              {{ blog.caption }}
            </p>
          </div>
        </div>
      </swiper-slide>
    </swiper>
  </section>
</template>

<script setup>
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from "swiper/vue";
import { reactive , computed } from "vue";

// Import Swiper styles
import "swiper/css";

import "swiper/css/pagination";

// import required modules
import { Pagination } from "swiper/modules";
const width = computed(() => window.innerWidth)

const blogItem = reactive([
  {
    img: "blog.png",
    hosting: "Hosting",
    avtar: "avtar.svg",
    user: "Dmitry Udodov",
    date: "May 2, 2023",
    title: "First Mover Americas: Ether-Bitcoin Ratio on Track for Monthly",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized methods.",
  },
  {
    img: "blog.png",
    hosting: "Hosting",
    avtar: "avtar.svg",
    user: "Dmitry Udodov",
    date: "May 2, 2023",
    title: "First Mover Americas: Ether-Bitcoin Ratio on Track for Monthly",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized methods.",
  },
  {
    img: "blog.png",
    hosting: "Hosting",
    avtar: "avtar.svg",
    user: "Dmitry Udodov",
    date: "May 2, 2023",
    title: "First Mover Americas: Ether-Bitcoin Ratio on Track for Monthly",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized methods.",
  },
  {
    img: "blog.png",
    hosting: "Hosting",
    avtar: "avtar.svg",
    user: "Dmitry Udodov",
    date: "May 2, 2023",
    title: "First Mover Americas: Ether-Bitcoin Ratio on Track for Monthly",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized methods.",
  },
  {
    img: "blog.png",
    hosting: "Hosting",
    avtar: "avtar.svg",
    user: "Dmitry Udodov",
    date: "May 2, 2023",
    title: "First Mover Americas: Ether-Bitcoin Ratio on Track for Monthly",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized methods.",
  },
  {
    img: "blog.png",
    hosting: "Hosting",
    avtar: "avtar.svg",
    user: "Dmitry Udodov",
    date: "May 2, 2023",
    title: "First Mover Americas: Ether-Bitcoin Ratio on Track for Monthly",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized methods.",
  },
]);
</script>
