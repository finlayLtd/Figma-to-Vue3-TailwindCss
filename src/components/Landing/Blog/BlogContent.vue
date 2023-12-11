<template>
  <div
    class="container px-4 flex flex-col 2xl:flex-row justify-between mx-auto lg:mt-[60px] mt-[50px]"
  >
    <div class="2xl:max-w-[389px] w-full">
      <div class="flex justify-between items-center">
        <h3 class="lg:text-[32px] text-[28px] font-bold leading-[45px] text-dark dark:text-white">Filtres</h3>

        <span
          class="text-dark dark:text-white text-center dark:bg-white-5 bg-dark-5 lg:text-base text-[14px] font-medium leading-[150%] px-[11px] py-[7px] mr-1.5 rounded-[8px]"
          >1 criteria</span
        >
      </div>

      <div
        class="flex justify-between items-center w-full py-1.5 pl-3.5 pr-1.5 bg-white dark:shadow-input-dark dark:bg-white-5 border border-light-white-blue dark:border-light-white-blue-8 shadow-light-white rounded-[8px] mt-6 mb-[30px]"
      >
        <div class="flex items-center grow">
          <img
            src="../../../assets/svgs/search.svg"
            class="dark:brightness-[100]"
            alt="Search"
          />
          <input
            type="search"
            class="bg-transparent text-primary dark:text-white lg:text-base text-[15px] outline-0 mx-2.5 grow"
            placeholder="Search in our resources"
          />
        </div>
        <Btn
          bgColor="bg-[#026DEBB8]"
          textColor="text-white"
          text-size="text-[14px] lg:text-[15px]"
          border-color="border-0"
          >Search</Btn
        >
      </div>

      <div class="bg-[#F8F9FC] dark:bg-[#f8f9fc14] rounded-[8px] lg:px-4 px-3.5 lg:py-5 py-[18px]" >
        <p class="lg:text-xl text-[18px] font-bold leading-[90%] tracking-[0.2px] text-dark dark:text-white " >Category Topics</p>
        <div class="mb-5 mt-[13px] flex flex-wrap" >

            <div
              class="text-center lg:text-base text-[15px] mt-3 font-medium leading-[150%] px-[11px] py-[7px] mr-2 rounded-[8px]"
              v-for="(tag, index) in filterTag"
              :class="[tag.bgColor , tag.textColor]"
              >{{ tag.name }}</div
            >

        </div>

        <Btn text-color="text-primary dark:text-white" bg-color="bg-white dark:bg-white-5" border-color="border border-white dark:border-white-5" class="w-full shadow-[0px_8px_32px_-12px_rgba(16,24,40,0.05)] dark:shadow-[0px_8px_32px_-12px_rgba(16,24,40,0.05)]" >View All</Btn>
      </div>    
    </div>

    <div
      class="2xl:max-w-[934px] w-full grow mt-[60px] lg:mb-0 mb-[150px] 2xl:mt-0"
    >
      <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-y-10 gap-6 lg:gap-x-[34px]">
        <div
          class="relative"
          v-for="(blog, index) in blogItem"
          :key="index"
          :class="index == 0 ? 'lg:col-start-1 lg:col-end-3' : ''"
        >
          <img
            :src="`src/assets/images/${blog.img}`"
            class="w-full dark:brightness-[0] rounded-[8px] max-h-[310px] object-contain bg-[#F8F9FC] dark:bg-[#F8F9FC14]"
            alt="Blog"
          />
          <div class="absolute top-0 m-3.5">
            <span
              class="text-white text-center lg:text-base text-[14px] font-medium leading-[150%] px-[11px] py-[7px] mr-1.5 rounded-[8px]"
              v-for="(tag, index) in blog.hosting"
              :class="tag.bgColor"
              >{{ tag.name }}</span
            >
          </div>
          <div class="px-1.5">
            <div class="flex items-center mt-5 mb-3">
              <img :src="`src/assets/svgs/${blog.avtar}`" alt="Avtar" />
              <p
                class="text-primary dark:text-white lg:text-[15px] text-[14px] font-medium leading-[130%] tracking-[0.3px] ml-1.5"
              >
                {{ blog.user }}
              </p>
              <img
                src="../../../assets/svgs/divider.svg"
                class="mx-2.5 dark:brightness-[100]"
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
              class="text-primary dark:text-white lg:text-base text-[15px] font-normal leading-[130%] tracking-[0.32px] opacity-70 mt-2"
            >
              {{ blog.caption }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive } from "vue";
import Btn from "../../Helper/Btn.vue";

const blogItem = reactive([
  {
    img: "blog.png",
    hosting: [
      {
        name: "Hosting",
        bgColor: "bg-[#FD3C3C]",
      },
    ],
    avtar: "avtar.svg",
    user: "Dmitry Udodov",
    date: "May 2, 2023",
    title: "First Mover Americas: Ether-Bitcoin Ratio on Track for Monthly",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized methods.",
  },
  {
    img: "blog.png",
    hosting: [
      {
        name: "Hosting",
        bgColor: "bg-[#FD3C3C]",
      },
    ],
    avtar: "avtar.svg",
    user: "Dmitry Udodov",
    date: "May 2, 2023",
    title: "First Mover Americas: Ether-Bitcoin Ratio on Track for Monthly",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized methods.",
  },
  {
    img: "blog.png",
    hosting: [
      {
        name: "News",
        bgColor: "bg-[#1F75F6]",
      },
      {
        name: "Crypto",
        bgColor: "bg-[#BD39FC]",
      },
    ],
    avtar: "avtar.svg",
    user: "Dmitry Udodov",
    date: "May 2, 2023",
    title: "First Mover Americas: Ether-Bitcoin Ratio on Track for Monthly",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized methods.",
  },
  {
    img: "blog.png",
    hosting: [
      {
        name: "Hosting",
        bgColor: "bg-[#FD3C3C]",
      },
    ],
    avtar: "avtar.svg",
    user: "Dmitry Udodov",
    date: "May 2, 2023",
    title: "First Mover Americas: Ether-Bitcoin Ratio on Track for Monthly",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized methods.",
  },
  {
    img: "blog.png",
    hosting: [
      {
        name: "News",
        bgColor: "bg-[#1F75F6]",
      },
      {
        name: "Crypto",
        bgColor: "bg-[#BD39FC]",
      },
    ],
    avtar: "avtar.svg",
    user: "Dmitry Udodov",
    date: "May 2, 2023",
    title: "First Mover Americas: Ether-Bitcoin Ratio on Track for Monthly",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized methods.",
  },
  {
    img: "blog.png",
    hosting: [
      {
        name: "Hosting",
        bgColor: "bg-[#FD3C3C]",
      },
    ],
    avtar: "avtar.svg",
    user: "Dmitry Udodov",
    date: "May 2, 2023",
    title: "First Mover Americas: Ether-Bitcoin Ratio on Track for Monthly",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized methods.",
  },
  {
    img: "blog.png",
    hosting: [
      {
        name: "News",
        bgColor: "bg-[#1F75F6]",
      },
      {
        name: "Crypto",
        bgColor: "bg-[#BD39FC]",
      },
    ],
    avtar: "avtar.svg",
    user: "Dmitry Udodov",
    date: "May 2, 2023",
    title: "First Mover Americas: Ether-Bitcoin Ratio on Track for Monthly",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized methods.",
  },
]);

const filterTag = reactive([
    {
        name : 'Crypto',
        bgColor : 'bg-[#BD39FC]',
        textColor : 'text-white'
    },
    {
        name : 'News',
        bgColor : 'bg-[#1F75F71A]',
        textColor : 'text-blue'
    },
    {
        name : 'Hosting',
        bgColor : 'bg-[#FD3C3C1A]',
        textColor : 'text-tomato'
    },
    {
        name : 'Culture',
        bgColor : 'bg-[#11CD0E1A]',
        textColor : 'text-[#11CD0E]'
    },
    {
        name : 'Cloud Education',
        bgColor : 'bg-[#00BFFB1A]',
        textColor : 'text-[#00BFFB]'
    },
    {
        name : 'Money',
        bgColor : 'bg-[#0AE1A11A]',
        textColor : 'text-[#0AE1A1]'
    },
    {
        name : 'Community',
        bgColor : 'bg-[#FF94321A]',
        textColor : 'text-[#FF9432]'
    },
])
</script>
