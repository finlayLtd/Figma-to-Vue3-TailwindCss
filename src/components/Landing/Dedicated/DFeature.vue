<template>
  <div class="max-w-[1220px] mx-4 xl:mx-auto">
    <div class="mx-auto text-center">
      <span
        class="px-3.5 py-[5px] 2xl:text-[17px] text-[15px] rounded-[76px] bg-[#3C95FF] text-white"
        >Any text about!</span
      >
      <h2
        class="mx-auto mt-3.5 lg:mb-[22px] mb-[18px] text-primary dark:text-white 2xl:text-[56px] text-[38px] tracking-[0.56px] font-bold leading-[95%] 2xl:w-[40%]"
      >
        Features for you love out site!
      </h2>
      <p
        class="text-secondary dark:text-white 2xl:text-[19px] text-[16px] font-normal leading-[150%] mb-[50px] opacity-70"
      >
        Reinstall or change the OS of your server at any time
      </p>
    </div>
  </div>
  <section class="flex justify-center items-center">
    <Button
      @click="prevSlide()"
      class="border p-5 rounded-full border-primary-8 dark:border-light-white-8 dark:bg-white-5 hidden min-[1729px]:block"
    >
      <img
        src="../../../assets/svgs/right-arrow-black.svg"
        class="rotate-180 min-w-[29px] dark:hidden block"
        alt="Right arrow"
      />
      <img
        src="../../../assets/svgs/swiper-arrow-white.svg"
        class="rotate-180 min-w-[29px] dark:block hidden"
        alt="Right arrow"
      />
    </Button>
    <div class="container px-1">
      <swiper
        :navigation="true"
        :modules="[Navigation]"
        class="mySwiper"
        :loop="true"
      >
        <swiper-slide
          v-for="(featureList, index) in multifeaturesList(featuresList)"
          :key="index"
          class="px-2 pb-5"
        >
          <div class="grid xl:grid-cols-4 grid-cols-2 lg:gap-4 gap-x-3 gap-y-4">
            <div
              class="lg:px-[33px] lg:py-6 p-3.5 border border-primary-8 dark:border-light-white-8 rounded-[16px] hover:shadow-box-hover-gray-15 dark:hover:shadow-box-hover-light-15 dark:bg-white-5"
              v-for="(feature, ind) in featureList"
            >
              <img
                :src="`src/assets/svgs/features/${feature.img}`"
                class="aspect-square lg:max-h-[230px] max-h-[144px] h-[144px] lg:h-[230px] mx-auto"
                :alt="feature.title"
              />
              <h5
                class="text-[#171618] dark:text-white lg:text-[22px] text-[16px] text-center font-bold leading-[29.04px] sm:mt-10 mt-2.5 mb-1.5"
              >
                {{ feature.title }}
              </h5>
              <p
                class="text-[#171618] dark:text-white opacity-70 text-center lg:text-base text-[12px] font-normal leading-[140%]"
              >
                {{ feature.caption }}
              </p>
            </div>
          </div>
        </swiper-slide>
      </swiper>
      <div class="flex justify-between items-center px-3 min-[1729px]:hidden">
        <Button
          @click="prevSlide()"
          class="border p-4 rounded-full border-primary-8 dark:border-light-white-8 dark:bg-white-5"
        >
          <img
            src="../../../assets/svgs/right-arrow-black.svg"
            class="rotate-180 min-w-[29px] dark:hidden block"
            alt="Right arrow"
          />
          <img
            src="../../../assets/svgs/swiper-arrow-white.svg"
            class="rotate-180 min-w-[29px] dark:block hidden"
            alt="Right arrow"
          />
        </Button>
        <Button
          @click="nextSlide()"
          class="border p-4 rounded-full border-primary-8 dark:border-light-white-8 dark:bg-white-5"
        >
          <img
            src="../../../assets/svgs/right-arrow-black.svg"
            class="min-w-[29px] dark:hidden block"
            alt="Right arrow"
          />
          <img
            src="../../../assets/svgs/swiper-arrow-white.svg"
            class="min-w-[29px] dark:block hidden"
            alt="Right arrow"
          />
        </Button>
      </div>
    </div>
    <Button
      @click="nextSlide()"
      class="border p-5 rounded-full border-primary-8 dark:border-light-white-8 dark:bg-white-5 hidden min-[1729px]:block"
    >
      <img
        src="../../../assets/svgs/right-arrow-black.svg"
        class="min-w-[29px] dark:hidden block"
        alt="Right arrow"
      />
      <img
        src="../../../assets/svgs/swiper-arrow-white.svg"
        class="min-w-[29px] dark:block hidden"
        alt="Right arrow"
      />
    </Button>
  </section>
</template>
<script setup>
import { Navigation } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import { Swiper, SwiperSlide } from "swiper/vue";
import { onMounted, reactive } from "vue";

let prev = document.getElementsByClassName("swiper-button-prev");
let next = document.getElementsByClassName("swiper-button-next");

const prevSlide = () => prev[0].click();
const nextSlide = () => next[0].click();

onMounted(() => {
  prev[0].style.display = "none";
  next[0].style.display = "none";
});

const multifeaturesList = (list) => {
  let i = 0;
  let newList = [];
  while (i < list.length) {
    newList = [...newList, list.slice(i, i + 4)];
    i = i + 4;
  }
  return newList;
};

const featuresList = reactive([
  {
    img: "setup.svg",
    title: "Instant setup",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized ",
  },
  {
    img: "system.svg",
    title: "Protection System",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized ",
  },
  {
    img: "ignore.svg",
    title: "DMCA ignored",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized ",
  },
  {
    img: "crypto.svg",
    title: "Pay with any crypto",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized ",
  },
  {
    img: "setup2.svg",
    title: "Instant setup",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized ",
  },
  {
    img: "system2.svg",
    title: "Protection System",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized ",
  },
  {
    img: "ignore2.svg",
    title: "DMCA ignored",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized ",
  },
  {
    img: "crypto2.svg",
    title: "Pay with any crypto",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized ",
  },
]);
</script>
