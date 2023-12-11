<template>
  <div>
    <p class="text-base text-primary dark:text-white">Installation method</p>
    <div
      class="py-2.5 px-3.5 bg-[#F9F9FA] dark:bg-[#F8F9FB14] my-5 flex items-center rounded-[8px] cursor-pointer border border-primary-8 justify-center"
    >
      <img src="../../assets/svgs/host.svg" class="mr-3 dark:brightness-[100]" alt="Drop" />
      <p class="dark:text-white lg:text-[15px] text-[15.5px]" >Hostname + VPS Password</p>
    </div>

    <TextInput label="Hostname" type="email" />

    <div class="relative mt-[18px]">
      <TextInput
        :type="iscurrPassShow ? 'text' : 'password'"
        label="Password"
      />
      <div class="absolute top-0 right-0 h-full grid place-items-center px-3.5">
        <Btn
          btn-padding="p-[5px]"
          border-color="border-0"
          bg-color="dark:bg-white-5"
          @click="iscurrPassShow = !iscurrPassShow"
        >
          <img
            src="../../assets/svgs/eyes-dash.svg"
            v-if="!iscurrPassShow"
            class="dark:brightness-[100]"
            alt="Eyes"
          />
          <img
            src="../../assets/svgs/eyes-dash-close.svg"
            v-else
            class="dark:brightness-[100]"
            alt="Eyes"
          />
        </Btn>
      </div>
    </div>
  </div>
</template>

<script setup>
import TextInput from "./TextInput.vue";
import {ref} from 'vue'
const iscurrPassShow = ref(true)
</script>
