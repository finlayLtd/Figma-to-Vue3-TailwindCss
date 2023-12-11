<template>
  <div class="lg:flex block">
    <div class="lg:px-5 px-4 lg:py-5 py-4 lg:pb-0 bg-white dark:bg-white-5 rounded-[14px] grow w-full mr-5">
      <div class="flex justify-between items-center py-[4.5px]">
        <p
          class="text-primary dark:text-white lg:text-[15.5px] text-[14.5px]  font-medium leading-[100%] tracking-[-0.155px]"
        >
          Location
        </p>
        <div class="flex items-center">
          <p
            class="text-primary dark:text-white lg:text-[15.5px] text-[14.5px]  font-medium leading-[100%] tracking-[0.31px] lg:mr-3 mr-2.5"
          >
            Netherlands, Amsterdam
          </p>
          <img src="../../../assets/svgs/flags/de.svg" alt="DE" />
        </div>
      </div>
      <hr class="my-5 dark:opacity-10" />
      <div class="flex justify-between items-center py-[4.5px] mb-5">
        <p
          class="text-primary dark:text-white lg:text-[15.5px] text-[14.5px]  font-medium leading-[100%] tracking-[-0.155px]"
        >
          Username
        </p>
        <div class="flex items-center">
          <p
            class="text-primary dark:text-white lg:text-[15.5px] text-[14.5px]  font-medium leading-[100%] tracking-[0.31px] lg:mr-3 mr-2.5"
            id="username"
          >
            root
          </p>
          <img
            src="../../../assets/svgs/copy.svg"
            alt="DE"
            class="cursor-pointer dark:brightness-[100]"
            @click="copytext('username')"
          />
        </div>
      </div>
      <div class="flex justify-between items-center py-[4.5px]">
        <p
          class="text-primary dark:text-white lg:text-[15.5px] text-[14.5px]  font-medium leading-[100%] tracking-[-0.155px]"
        >
          Password
        </p>
        <div class="flex items-center">
          <p
            class="text-primary dark:text-white lg:text-[15.5px] text-[14.5px]  font-medium leading-[100%] tracking-[0.31px] lg:mr-3 mr-2.5 opacity-40"
            id="password"
            v-if="!isPasswordShow"
          >
            ••••••••••
          </p>
          <p
            class="text-primary dark:text-white lg:text-[15.5px] text-[14.5px]  font-medium leading-[100%] tracking-[0.31px] lg:mr-3 mr-2.5 opacity-40"
            id="password"
            v-else
          >
            0123456789
          </p>
          <img
            src="../../../assets/svgs/eyes.svg"
            class="lg:mr-3 mr-2.5 cursor-pointer dark:brightness-[100]"
            v-if="!isPasswordShow"
            @click="isPasswordShow = true"
            alt="DE"
          />
          <img
            src="../../../assets/svgs/eyesshow.svg"
            class="lg:mr-3 mr-2.5 cursor-pointer dark:brightness-[100]"
            @click="isPasswordShow = false"
            v-else
            alt="DE"
          />
          <img
            src="../../../assets/svgs/copy.svg"
            alt="DE"
            class="cursor-pointer dark:brightness-[100]"
            @click="copytext('password')"
          />
        </div>
      </div>
      <hr class="my-5 dark:opacity-10" />
      <div class="flex justify-between items-center mb-5 py-[4.5px]">
        <p
          class="text-primary dark:text-white lg:text-[15.5px] text-[14.5px]  font-medium leading-[100%] tracking-[-0.155px]"
        >
          IP Address
        </p>
        <div class="flex items-center">
          <p
            class="text-primary dark:text-white lg:text-[15.5px] text-[14.5px]  font-medium leading-[100%] tracking-[0.31px] lg:mr-3 mr-2.5"
            id="ip"
          >
            147.189.161.205
          </p>
          <img
            src="../../../assets/svgs/copy.svg"
            alt="DE"
            class="cursor-pointer dark:brightness-[100]"
            @click="copytext('ip')"
          />
        </div>
      </div>
      <div class="flex justify-between items-center py-[4.5px]">
        <p
          class="text-primary dark:text-white lg:text-[15.5px] text-[14.5px]  font-medium leading-[100%] tracking-[-0.155px]"
        >
          Private IPv4
        </p>
        <div class="flex items-center">
          <p
            class="text-primary dark:text-white lg:text-[15.5px] text-[14.5px]  font-medium leading-[100%] tracking-[0.31px] lg:mr-3 mr-2.5"
            id="private"
          >
            2400:8d60:0002:0000:0000
          </p>
          <img
            src="../../../assets/svgs/copy.svg"
            alt="DE"
            class="cursor-pointer dark:brightness-[100]"
            @click="copytext('private')"
          />
        </div>
      </div>
    </div>
    <div
      class="px-5 py-5 lg:pb-0 bg-white dark:bg-white-5 rounded-[14px] grow w-full lg:mt-0 mt-5"
    >
      <div class="flex justify-between items-center">
        <div class="flex items-center">
          <div
            class="w-fit rounded-[6px] border dark:border-transparent border-light bg-primary-8n p-[5px] lg:mr-3 mr-2.5"
          >
            <img
              src="../../../assets/svgs/windows-dark-blue.svg"
              class="h-[14px] aspect-square min-w-[14px]"
              alt="Window"
            />
          </div>
          <p
            class="text-primary dark:text-white text-[15.5px]  font-medium leading-[100%] tracking-[-0.155px]"
          >
            OS
          </p>
        </div>
        <p
          class="text-primary dark:text-white text-[15.5px]  font-medium leading-[100%] tracking-[0.31px]"
        >
          Windows RDP 2019
        </p>
      </div>
      <hr class="my-5 dark:opacity-10" />
      <div class="flex justify-between items-center mb-5">
        <div class="flex items-center">
          <div
            class="w-fit rounded-[6px] border dark:border-transparent bg-primary-8 border-light p-[5px] lg:mr-3 mr-2.5"
          >
            <img
              src="../../../assets/svgs/cpu.svg"
              class="h-[14px] aspect-square dark:brightness-[100] min-w-[14px]"
              alt="Window"
            />
          </div>
          <p
            class="text-primary dark:text-white text-[15.5px]  font-medium leading-[100%] tracking-[-0.155px]"
          >
            12vCore
          </p>
        </div>
        <p
          class="text-primary dark:text-white text-[15.5px]  font-medium leading-[100%] tracking-[0.31px]"
        >
          Windows RDP 2019
        </p>
      </div>
      <div class="flex justify-between items-center mb-5">
        <div class="flex items-center">
          <div
            class="w-fit rounded-[6px] border dark:border-transparent bg-primary-8 border-light p-[5px] lg:mr-3 mr-2.5"
          >
            <img
              src="../../../assets/svgs/ram-overview.svg"
              class="h-[14px] aspect-square dark:brightness-[100] min-w-[14px]"
              alt="Window"
            />
          </div>
          <p
            class="text-primary dark:text-white text-[15.5px]  font-medium leading-[100%] tracking-[-0.155px]"
          >
            Ram
          </p>
        </div>
        <p
          class="text-primary dark:text-white text-[15.5px]  font-medium leading-[100%] tracking-[0.31px]"
        >
          512 MB
        </p>
      </div>
      <hr class="my-5 dark:opacity-10" />
      <div class="flex justify-between items-center mb-5">
        <div class="flex items-center">
          <div
            class="w-fit rounded-[6px] border dark:border-transparent bg-primary-8 border-light p-[5px] lg:mr-3 mr-2.5"
          >
            <img
              src="../../../assets/svgs/storge.svg"
              class="h-[14px] aspect-square dark:brightness-[100] min-w-[14px]"
              alt="Window"
            />
          </div>
          <p
            class="text-primary dark:text-white text-[15.5px]  font-medium leading-[100%] tracking-[-0.155px]"
          >
            Storage
          </p>
        </div>
        <p
          class="text-primary dark:text-white text-[15.5px]  font-medium leading-[100%] tracking-[0.31px]"
        >
          5 GB
        </p>
      </div>
      <div class="flex justify-between items-center mb-5">
        <div class="flex items-center">
          <div
            class="w-fit rounded-[6px] border dark:border-transparent border-light bg-primary-8 p-[5px] lg:mr-3 mr-2.5"
          >
            <img
              src="../../../assets/svgs/bandwidth.svg"
              class="h-[14px] aspect-square dark:brightness-[100] min-w-[14px]"
              alt="Window"
            />
          </div>
          <p
            class="text-primary dark:text-white text-[15.5px]  font-medium leading-[100%] tracking-[-0.155px]"
          >
            Bandwidth
          </p>
        </div>
        <div class="flex items-center">
          <p
            class="text-primary dark:text-white text-[15.5px]  font-medium leading-[100%] tracking-[0.31px] lg:mr-3 mr-2.5"
          >
            1500 GB
          </p>
          <img src="../../../assets/svgs/que.svg" class="dark:brightness-[100]" alt="Qui" />
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { ref } from "vue";
const copytext = (elementId) => {
  navigator.clipboard.writeText(document.getElementById(elementId).innerText);
};
const isPasswordShow = ref(false);
</script>
