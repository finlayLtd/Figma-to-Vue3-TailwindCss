<template>
  <div>

    <div
      class="lg:flex block justify-between items-center py-[18px] px-5 bg-white dark:bg-white-5 my-4 rounded-[14px]"
    >
      <div class="flex items-center">
        <div class="px-3 py-2 bg-light-white dark:bg-light-white-8 rounded-[8px]">
          <img
            src="../../../assets/svgs/penal.svg"
            class="dark:brightness-[100]"
            alt="DNS"
          />
        </div>
        <div class="ml-3">
          <p
            class="text-primary dark:text-white text-[14px] lg:text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
          >
          Go to panel
          </p>
          <p
            class="mt-[7px] text-primary-50 dark:text-white-50 text-[13px] lg:text-sm  font-normal leading-[100%] tracking-[0.14px]"
          >
          Navigate to settings server
          </p>
        </div>
      </div>
      <Btn
        bg-color="bg-blue"
        textColor="text-white"
        border-color="border-0"
        text-size="lg:text-[15px] text-[14px]"
          class="lg:w-fit lg:mt-0 mt-4 w-full"
        >Open panel</Btn
      >
    </div>
    <div
      class="lg:flex block justify-between items-center py-[18px] px-5 bg-white dark:bg-white-5 my-4 rounded-[14px]"
    >
      <div class="flex items-center">
        <div class="px-3 py-2 bg-light-white dark:bg-light-white-8 rounded-[8px]">
          <img
            src="../../../assets/svgs/renewal.svg"
            class="dark:brightness-[100]"
            alt="DNS"
          />
        </div>
        <div class="ml-3">
          <p
            class="text-primary dark:text-white text-[14px] lg:text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
          >
          Renewal
          </p>
          <p
            class="mt-[7px] text-primary-50 dark:text-white-50 text-[13px] lg:text-sm  font-normal leading-[100%] tracking-[0.14px]"
          >
          Registered until 10/19/2023
          </p>
        </div>
      </div>
      <Btn
        bg-color="bg-blue-5 dark:bg-white-5"
        textColor="text-blue dark:text-white"
        border-color="border-0"
        text-size="lg:text-[15px] text-[14px]"
          class="lg:w-fit lg:mt-0 mt-4 w-full"
        >Extend</Btn
      >
    </div>

    <div class="bg-white dark:bg-white-5  rounded-[14px]">
      <div
        class="lg:flex block justify-between items-center py-[18px] px-5 border-b border-light-white-blue dark:border-light-white-blue-8"
      >
        <div class="flex items-center">
          <div class="px-3 py-2 bg-light-white dark:bg-light-white-8 rounded-[8px]">
            <img
              src="../../../assets/svgs/request-code.svg"
              class="dark:brightness-[100]"
              alt="DNS"
            />
          </div>
          <div class="ml-3">
            <p
              class="text-primary dark:text-white text-[14px] lg:text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
            >
            Request transfer code
            </p>
            <p
              class="mt-[7px] text-primary-50 dark:text-white-50 text-[13px] lg:text-sm  font-normal leading-[100%] tracking-[0.14px]"
            >
            Registered until 10/19/2023
            </p>
          </div>
        </div>
        <Btn
          bg-color="bg-blue-5 dark:bg-white-5"
          textColor="text-blue dark:text-white"
          border-color="border-0"
          text-size="lg:text-[15px] text-[14px]"
          class="lg:w-fit lg:mt-0 mt-4 w-full"
          >Request code</Btn
        >

      </div>
      <div class="lg:flex block justify-between items-center py-[18px] px-5">
        <div class="flex items-center">
          <div class="px-3 py-2 bg-light-white dark:bg-light-white-8 rounded-[8px]">
            <img
              src="../../../assets/svgs/turmineted-domain.svg"
              class="dark:brightness-[100]"
              alt="DNS"
            />
          </div>
          <div class="ml-3">
            <p
              class="text-primary dark:text-white text-[14px] lg:text-[15px]  font-medium leading-[100%] tracking-[0.15px]"
            >
            Terminate domain
            </p>
            <p
              class="mt-[7px] text-primary-50 dark:text-white-50 text-[13px] lg:text-sm  font-normal leading-[100%] tracking-[0.14px]"
            >
            Closed domain
            </p>
          </div>
        </div>
        <Btn
          bg-color="bg-transparent"
          textColor="text-tomato-8"
          border-color="border-0"
          text-size="lg:text-[15px] text-[14px]"
          class="lg:w-fit lg:mt-0 mt-4 w-full"
          btn-padding="p-0"
          >Terminate plan</Btn
        >
      </div>
    </div>

  </div>
</template>

<script setup>
import Btn from "../../../components/Helper/Btn.vue";
</script>


<style scoped>
.model-dark {
  @apply dark:bg-black !important
}
</style>