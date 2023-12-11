<template>
  <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
    <div
      class="py-4 px-5 rounded-[14px] bg-white dark:bg-white-5"
    >
      <h3 class="text-primary dark:text-white text-[15.5px]  font-bold leading-[100%] tracking-[-0.155px]">Owner details</h3>
      <hr class="my-4 dark:opacity-10" />

      <divm class="[&>*]:mb-[22px] [&>*:last-child]:mb-0">
        <div
          class="flex justify-between items-center"
          v-for="(contact, index) in contactLeft"
          :key="index"
        >
          <p class="dark:text-white-70 lg:text-[15.5px] text-[14.5px]  font-normal leading-[100%] tracking-[-0.155px]">{{ contact.title }}</p>
          <div class="flex items-center">
            <input
              :type="contact.type"
              :value="contact.value"
              class="outline-none h-[16px] bg-transparent text-primary dark:text-white text-right lg:text-[15.5px] text-[14.5px]  font-medium leading-[100%] tracking-[0.31px] max-w-[100px]"
              v-if="contact.isEdit"
              v-model="contact.value"
            />
            <p
              class="text-primary dark:text-white text-right lg:text-[15.5px] text-[14.5px]  font-medium leading-[100%] tracking-[0.31px]"
              v-else
            >
              {{ contact.value }}
            </p>
            <img
              src="../../../assets/svgs/pen.svg"
              class="ml-3 dark:brightness-[100] cursor-pointer"
              v-if="!contact.isEdit"
              @click="contact.isEdit = true"
              alt="Pen"
            />
            <img
              src="../../../assets/svgs/pen-black.svg"
              class="ml-3 dark:brightness-[100] cursor-pointer"
              v-else
              @click="contact.isEdit = false"
              alt="Pen"
            />
          </div>
        </div>
      </divm>
    </div>
    <div
      class="py-4 px-5 rounded-[14px] bg-white dark:bg-white-5"
    >
      <h3 class="text-primary dark:text-white lg:text-[15.5px] text-[14.5px]  font-bold leading-[100%] tracking-[-0.155px]">Address details</h3>
      <hr class="my-4 dark:opacity-10" />

      <divm class="[&>*]:mb-[22px] [&>*:last-child]:mb-0">
        <div
          class="flex justify-between items-center"
          v-for="(contact, index) in contactRight"
          :key="index"
        >
          <p class="dark:text-white-70 lg:text-[15.5px] text-[14.5px]  font-normal leading-[100%] tracking-[-0.155px]">{{ contact.title }}</p>
          <div class="flex items-center">
            <input
              :type="contact.type"
              :value="contact.value"
              class="outline-none bg-transparent h-[16px] text-primary dark:text-white text-right lg:text-[15.5px] text-[14.5px]  font-medium leading-[100%] tracking-[0.31px] max-w-[100px]"
              v-if="contact.isEdit"
              v-model="contact.value"
            />
            <p
              class="text-primary dark:text-white text-right lg:text-[15.5px] text-[14.5px]  font-medium leading-[100%] tracking-[0.31px]"
              v-else
            >
              {{ contact.value }}
            </p>
            <img
              src="../../../assets/svgs/pen.svg"
              class="ml-3 dark:brightness-[100] cursor-pointer"
              v-if="!contact.isEdit"
              @click="contact.isEdit = true "
              alt="Pen"
            />
            <img
              src="../../../assets/svgs/pen-black.svg"
              class="ml-3 dark:brightness-[100] cursor-pointer"
              v-else
              @click="contact.isEdit = false"
              alt="Pen"
            />
          </div>
        </div>
      </divm>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";

const contactLeft = ref([
  {
    title: "First name",
    value: "Dmitry",
    type: "text",
    isEdit: false,
  },
  {
    title: "Last name",
    value: "Udodov",
    type: "text",
    isEdit: false,
  },
  {
    title: "VAT Number",
    value: 'GB999999973',
    type: "text",
    isEdit: false,
  },
  {
    title: "Automomic",
    value: "Dmitry",
    type: "text",
    isEdit: false,
  },
  {
    title: "Phone number",
    value: '+2 231 22 52 11',
    type: "text",
    isEdit: false,
  },
]);

const contactRight = ref([
  {
    title: "Country",
    value: "United States",
    type: "text",
    isEdit: false,
  },
  {
    title: "City",
    value: "SpringFeel",
    type: "text",
    isEdit: false,
  },
  {
    title: "Street",
    value: 'Evergeen Teerace',
    type: "text",
    isEdit: false,
  },
  {
    title: "Postal code",
    value: "90200",
    type: "text",
    isEdit: false,
  },
  {
    title: "House number",
    value: '742',
    type: "text",
    isEdit: false,
  },
]);
</script>
