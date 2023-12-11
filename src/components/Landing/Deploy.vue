<template>
    <section class="xl:mt-[56px] mt-[120px] px-4">
    <div class="container mx-auto xl:pt-[90px] xl:pb-[106px] py-[30px] bg-[url('../assets/images/grad6.png')]  bg-no-repeat bg-left-top object-cover bg-[#fcfcfc] dark:bg-[#FCFCFC14] rounded-[20px] xl:bg-[length:100%_100%]">
      <div class="max-w-[1220px] mx-auto">
        <div class="mx-auto text-center">
          <h2
            class="mx-auto mt-3.5 mb-[22px] text-primary dark:text-white 2xl:text-[56px] text-[38px] tracking-[0.56px] font-bold leading-[95%]"
          >
          Deploy anything in seconds
          </h2>
          <p
            class="text-secondary dark:opacity-70 dark:text-white lg:text-[19px] text-base font-normal leading-[150%] 2xl:mb-[50px] mb-[30px] opacity-70 lg:w-[40%] md:mx-auto mx-4 text-center"
          >
          Spin up a new instance with your preferred operating system or pre-installed application in just seconds.
          </p>
        </div>
      </div>

      <LandingTab :tablist="['OS Library', 'One Click Apps']" />

      <div class="grid place-items-center md:grid-cols-5 grid-cols-2 border rounded-[20px] border-solid border-light-white-gray dark:border-light-white-8 bg-white dark:bg-white-8 md:mx-auto mx-5 max-w-[721px] mt-5 gap-1.5 p-1.5">
        <!-- <img src="../../assets/images/laptop.png" alt="Laptop" /> -->
        <Deployserver :data="deployServerList" />
      </div>
    </div>
  </section>
</template>

<script setup>
import Deployserver from '../Helper/Deployserver.vue';
import {reactive} from 'vue'
import LandingTab from './LandingTab.vue';
const deployServerList = reactive( 
    [
        {
            img : 'arch.svg',
            title : 'Arch Linux'
        },
        {
            img : 'debian.svg',
            title : 'Debian'
        },
        {
            img : 'fedora2.svg',
            title : 'Fedora'
        },
        {
            img : 'cent.svg',
            title : 'CentOS'
        },
        {
            img : 'alma.svg',
            title : 'Alma Linux'
        },
        {
            img : 'windows.svg',
            title : 'Windows'
        },
        {
            img : 'fedora-core.svg',
            title : 'Fedora CoreOS'
        },
        {
            img : 'ubuntu.svg',
            title : 'Ubuntu'
        },
        {
            img : 'rocky.svg',
            title : 'Rocky Linux'
        },
        {
            img : 'window-core.svg',
            title : 'Windows Core'
        },
        {
            img : 'flatcar.svg',
            title : 'Flatcar Container Linux'
        },
        {
            img : 'open-bsd.svg',
            title : 'OpenBSD'
        },
        {
            img : 'free-bsd.svg',
            title : 'FreeBSD'
        }
    ]
)
</script>