<template>
    <section class="bg-[url('../assets/images/grad2.png')] lg:bg-[length:100%_100%] bg-[length:100%_auto] px-4 bg-bottom bg-no-repeat">
    
    <div class="container mx-auto xl:mt-[100px] mt-[70px]">
      <div class="grid xl:gap-4 gap-2 xl:grid-cols-3 grid-cols-1 grow">
        <div class="w-full flex flex-wrap justify-between items-center py-4 px-5 rounded-[10px] border border-[#E1E1E1] dark:border-white-8 cursor-pointer" :class="[activeTab == index ? 'active-server' : '']" @click="activeTab = index" v-for="(server , index) in serverTypes" :key="index">
          <div class="flex items-center">
            <img :src="`src/assets/svgs/${server.svg}`" alt="">
            <h3 class="lg:text-[18px] text-[16px] font-bold leading-[19.8px] ml-2.5 dark:text-white-70 text-primary-70">{{ server.title }}</h3>
          </div>
          <p>
            <span class="opacity-50 lg:text-[18px] text-[16px] font-medium leading-[19.8px] dark:text-white ">From</span>
            <strong class="lg:text-[18px] text-[16px] font-bold leading-[19.8px] ml-1 dark:text-white">${{ server.price.toFixed(2) }}</strong>
          </p>
        </div>
      </div>
      <DTable :data="serverModels" :head="serverHead" />
    </div>
  </section>
  </template>
  
  <script setup>
  import { reactive , ref } from "vue";
import DTable from "./DTable.vue";
  
  const activeTab = ref(0)
  
  const serverList = reactive([
    {
      svg: `window.svg`,
      head: "Windows VM",
      cap: "Server",
    },
    {
      svg: `almalinux.svg`,
      head: "AlmaLinux VM",
      cap: "Server",
    },
    {
      svg: `ubuntu.svg`,
      head: "Ubuntu VM",
      cap: "Server",
    },
    {
      svg: `openvpn.svg`,
      head: "OpenVPN VM",
      cap: "Server",
    },
    {
      svg: `debian.svg`,
      head: "Debian VM",
      cap: "Server",
    },
    {
      svg: `fedora.svg`,
      head: "Fedora VM",
      cap: "Server",
    },
    {
      svg: `rocky.svg`,
      head: "Rocky VM",
      cap: "Server",
    },
  ]);
  
  
  const serverModels = {
    headings : ['Country' , 'CPU' , 'Bench' , 'Cores' , 'Base clock' , 'Turbo Clock' , 'RAM' , 'SSD' , 'DDoS' , 'Monthly price'],
    data : [
      {
        flag : 'de.svg',
        active : true,
        countx : '1x',
        cpu : 'Intel Xeon E5-2609v2',
        bench : 3666,
        cores : 4,
        base : '2.5 GHz',
        turbo : '2.5 GHz',
        ram : '32 GB',
        ssd : '1x240 GB',
        ddos : true , 
        price : '$12.50'
      },
      {
        flag : 'de.svg',
        active : true,
        countx : '1x',
        cpu : 'Intel Xeon E5-2609v2',
        bench : 3666,
        cores : 8,
        base : '2.5 GHz',
        turbo : '2.5 GHz',
        ram : '32 GB',
        ssd : '1x240 GB',
        ddos : true , 
        price : '$25.00'
      },
      {
        flag : 'de.svg',
        active : false,
        countx : '1x',
        cpu : 'Intel Xeon E5-2609v2',
        bench : 3666,
        cores : 16,
        base : '2.5 GHz',
        turbo : '2.5 GHz',
        ram : '32 GB',
        ssd : '1x240 GB',
        ddos : true , 
        price : '$25.00'
      },
      {
        flag : 'de.svg',
        active : false,
        countx : '1x',
        cpu : 'Intel Xeon E5-2609v2',
        bench : 3666,
        cores : 16,
        base : '2.5 GHz',
        turbo : '2.5 GHz',
        ram : '32 GB',
        ssd : '1x240 GB',
        ddos : true , 
        price : '$25.00'
      },
      {
        flag : 'de.svg',
        active : false,
        countx : '1x',
        cpu : 'Intel Xeon E5-2609v2',
        bench : 3666,
        cores : 16,
        base : '2.5 GHz',
        turbo : '2.5 GHz',
        ram : '32 GB',
        ssd : '1x240 GB',
        ddos : true , 
        price : '$25.00'
      },
      {
        flag : 'de.svg',
        active : false,
        countx : '1x',
        cpu : 'Intel Xeon E5-2609v2',
        bench : 3666,
        cores : 16,
        base : '2.5 GHz',
        turbo : '2.5 GHz',
        ram : '32 GB',
        ssd : '1x240 GB',
        ddos : true , 
        price : '$25.00'
      },
      {
        flag : 'de.svg',
        active : false,
        countx : '1x',
        cpu : 'Intel Xeon E5-2609v2',
        bench : 3666,
        cores : 16,
        base : '2.5 GHz',
        turbo : '2.5 GHz',
        ram : '32 GB',
        ssd : '1x240 GB',
        ddos : true , 
        price : '$25.00'
      },
      {
        flag : 'de.svg',
        active : false,
        countx : '1x',
        cpu : 'Intel Xeon E5-2609v2',
        bench : 3666,
        cores : 16,
        base : '2.5 GHz',
        turbo : '2.5 GHz',
        ram : '32 GB',
        ssd : '1x240 GB',
        ddos : true , 
        price : '$25.00'
      },
      {
        flag : 'de.svg',
        active : false,
        countx : '1x',
        cpu : 'Intel Xeon E5-2609v2',
        bench : 3666,
        cores : 16,
        base : '2.5 GHz',
        turbo : '2.5 GHz',
        ram : '32 GB',
        ssd : '1x240 GB',
        ddos : true , 
        price : '$25.00'
      },
      {
        flag : 'de.svg',
        active : false,
        countx : '1x',
        cpu : 'Intel Xeon E5-2609v2',
        bench : 3666,
        cores : 16,
        base : '2.5 GHz',
        turbo : '2.5 GHz',
        ram : '32 GB',
        ssd : '1x240 GB',
        ddos : true , 
        price : '$25.00'
      },
    ]
  }
  
  const serverHead = ref([
    {
      name : 'Country',
      slotName : 'country',
      mobileIndex : 0,
    },
    {
      name : 'CPU',
      slotName : 'cpu',
      mobileIndex : 2,
    },
    {
      name : 'Bench',
      slotName : 'bench',
      mobileIndex : 3,
    },
    {
      name : 'Cores',
      slotName : 'cores',
      mobileIndex : 4,
    },
    {
      name : 'Base clock',
      slotName : 'base',
      mobileIndex : 5,
    },
    {
      name : 'Turbo Clock',
      slotName : 'turbo',
      mobileIndex : 6,
    },
    {
      name : 'RAM',
      slotName : 'ram',
      mobileIndex : 7,
    },
    {
      name : 'SSD',
      slotName : 'ssd',
      mobileIndex : 8,
    },
    {
      name : 'DDoS',
      slotName : 'ddos',
      mobileIndex : 9,
    },
    {
      name : 'Monthly price',
      slotName : 'monthly',
      mobileIndex : 1,
    }
  ])
  
  const serverTypes = [
    {
      svg : 'dedicated.svg',
      title : 'Dedicated Servers',
      price : 25.00
    },
    {
      svg : 'storage.svg',
      title : 'Storage Servers',
      price : 12.50
    },
    {
      svg : 'streaming.svg',
      title : 'Streaming Servers',
      price : 50.00
    },
  ]
  
  </script>
  
  <style scoped>
  
  .active-server {
    @apply bg-blue [&>*>*]:text-white [&>*>p>span]:text-white-50 !important
  }
  </style>
  
  