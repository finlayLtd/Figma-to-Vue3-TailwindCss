<template>
  <div
    class="flex flex-wrap mt-6 lg:flex-nowrap p-[3px] justify-center border rounded-[10px] border-solid border-light-white-gray dark:border-light-white-gray-8 bg-white-50 dark:bg-white-5 lg:hidden"
  >
    <div
      class="flex lg:w-full w-[48%] items-center justify-center px-5 py-2"
      :class="
        activeBillingTab == 0
          ? 'bg-white rounded-[8px] shadow-gray-15  dark:bg-white-15 dark:shadow-light-15'
          : 'opacity-70'
      "
      @click="router.push({name : 'Settings'})"
    >
      <div class="flex items-center">
        <img
          src="../../assets/svgs/dashbord/general.svg"
          class="dark:brightness-[100]"
          alt="General"
        />
        <p
          class="text-dark dark:text-white lg:text-[15px] text-[14px] ml-2.5 font-medium leading-6"
        >
        General
        </p>
      </div>
    </div>

    <img
      src="../../assets/svgs/divider.svg"
      class="mx-1.5 dark:brightness-[100]"
      alt="Divider"
    />

    <div
      class="flex lg:w-full w-[47%] items-center justify-center px-5 py-2"
      @click="router.push({name : 'SettingsSecurity'})"
      :class="
        activeBillingTab == 1
          ? 'bg-white rounded-[8px] shadow-gray-15 dark:bg-white-15 dark:shadow-light-15'
          : 'opacity-70'
      "
    >
      <div class="flex items-center">
        <img
          src="../../assets/svgs/dashbord/security-side.svg"
          class="dark:brightness-[100]"
          alt="General"
        />
        <p
          class="text-dark dark:text-white lg:text-[15px] text-[14px] ml-2.5 font-medium leading-6"
        >
        Security
        </p>
      </div>
    </div>

    <img
      src="../../assets/svgs/divider.svg"
      class="mx-1.5 hidden lg:block dark:brightness-[100]"
      alt="Divider"
    />

    <div
      class="flex lg:w-full w-[47%] items-center justify-center px-5 py-2"
      :class="
        activeBillingTab == 2
          ? 'bg-white rounded-[8px] shadow-gray-15 dark:bg-white-15 dark:shadow-light-15'
          : 'opacity-70'
      "
       @click="router.push({name : 'SettingsNotification'})"
    >
      <div class="flex items-center">
        <img
          src="../../assets/svgs/dashbord/notification.svg"
          class="dark:brightness-[100]"
          alt="General"
        />
        <p
          class="text-dark dark:text-white lg:text-[15px] text-[14px] ml-2.5 font-medium leading-6"
        >
        Notification
        </p>
      </div>
    </div>

    <img
      src="../../assets/svgs/divider.svg"
      class="mx-1.5 dark:brightness-[100]"
      alt="Divider"
    />

    <div
      class="flex lg:w-full w-[47%] items-center justify-center px-5 py-2"
      :class="
        activeBillingTab == 3
          ? 'bg-white rounded-[8px] shadow-gray-15 dark:bg-white-15 dark:shadow-light-15'
          : 'opacity-70'
      "
       @click="router.push({name : 'SettingsIdentify'})"
    >
      <div class="flex items-center">
        <img
          src="../../assets/svgs/dashbord/identify.svg"
          class="dark:brightness-[100]"
          alt="General"
        />
        <p
          class="text-dark dark:text-white lg:text-[15px] text-[14px] ml-2.5 font-medium leading-6"
        >
        Identify
        </p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import {useRouter} from 'vue-router'
const router = useRouter();
const activeBillingTab = ref(props.active);


const props = defineProps({
    active : {
        default : 0
    }
})
</script>
