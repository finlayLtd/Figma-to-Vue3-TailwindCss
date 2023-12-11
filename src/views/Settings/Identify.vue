<template>
  <div class="max-w-[1046px] mx-auto">
    <div>
      <p>
        <span
          class="opacity-50 text-primary-50 dark:text-white lg:text-base text-[15px] font-normal leading-[115%]"
          >Identify /</span
        ><span
          class="text-primary dark:text-white lg:text-base text-[15px] font-medium leading-[115%]"
        >
          Identify</span
        >
      </p>
      <h2
        class="text-primary dark:text-white lg:text-3xl text-[24px] font-bold leading-[115%] tracking-[0.3px] lg:my-4 my-3.5"
      >
      Identify
      </h2>
    </div>

    <SettingTab :active="3" />

    <TabList
      class="mt-10 mb-5 w-full [&>*]:lg:w-full h-fit [&>*]:h-[38px]"
      :tabList="['Business', 'Personal']"
    />
    <div
      class="lg:p-5 p-4 mt-5 bg-white dark:bg-white-5 rounded-[14px] [&>*]:mb-[25px] [&>*:last-child]:mb-0"
    >

      <div class="grid grid-cols-2 gap-4">
        <TextInput label="First name" />
        <TextInput label="Last name" />
        <SelectInput :list="selectList" class="col-start-1 col-end-3"  />
        <TextInput label="City" class="col-start-1 col-end-3" />
        <TextInput label="Street" class="col-start-1 col-end-3" />
        <TextInput label="Postal code" />
        <TextInput label="House number" />
        <TextInput label="Phone number" class="col-start-1 col-end-3" />
      </div>

    </div>
  </div>
</template>

<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import Btn from "../../components/Helper/Btn.vue";
import TabList from "../../components/Helper/TabList.vue";
import SettingTab from "./SettingTab.vue";
import TextInput from "../../components/Helper/TextInput.vue";
import {ref} from 'vue'
import SelectInput from "../../components/Helper/SelectInput.vue";
const name = ref('')

const selectList = ref([
  {
    id: 1,
    name: "United States",
    icon: "../../assets/svgs/flags/usa.svg",
  },
  {
    id: 2,
    name: "DE",
    icon: "../../assets/svgs/flags/de.svg",
  },
  {
    id: 3,
    name: "Russia",
    icon: "../../assets/svgs/flags/russia.svg",
  },
]);
</script>
