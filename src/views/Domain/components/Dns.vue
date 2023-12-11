<template>
  <div class="grid place-items-center rounded-[20px]">
    <div
      class="lg:p-[30px] p-5 bg-white dark:bg-black-blue lg:min-w-[502px] dark:shadow-none shadow-black-8 rounded-[10.709px]"
    >
      <div class="flex justify-between items-center">
        <button class="rounded-[8px] dark:bg-[#F5F7F80A] bg-light-white py-2 px-3">
          <img src="../../../assets/svgs/dns.svg" class="dark:brightness-[100]" alt="Dns" />
        </button>
        <button>
          <img
            src="../../../assets/svgs/close.svg"
            alt="Close"
            class="dark:brightness-[100]"
            @click="$emit('closeModel', false)"
          />
        </button>
      </div>

      <h2
        class="text-secondary dark:text-white text-[20px] lg:text-[22px]  font-bold leading-[100%] tracking-[0.22px] mt-5 mb-2.5"
      >
        Your list of DNS servers
      </h2>
      <p
        class="text-[#171e2699] dark:text-[#ffffff99] text-[15px]  font-normal leading-[140%] tracking-[0.15px] max-w-[321px]"
      >
        Specify the servers of your hosting provider, website builder or other
        services you need.
      </p>

      <div
        class="mt-[30px] [&>*:first-child]:mt-0 [&>*:last-child]:mb-0 [&>*]:my-4"
      >
        <div
          class="flex justify-between border border-light dark:border-light-8 hover:border-blue rounded-[8px] py-2.5 px-3"
          v-for="(server, i) in serverList"
          :key="i"
        >
          <div>
            <p
              class="opacity-40 text-primary dark:text-white text-[12px] lg:text-[12.5px]  font-medium leading-[100%] tracking-[-0.125px]"
            >
              Server name {{ i+1 }}
            </p>
            <p
              class="text-primary dark:text-white text-base  font-medium leading-[100%] tracking-[-0.16px] mt-[5px]"
            >
              {{ server }}
            </p>
          </div>
          <Btn
            text-size="lg:text-[15px] text-[13px]"
            btn-padding="p-0"
            bg-color="bg-transparent"
            border-color="border-0"
            text-color="text-blue"
            >Our DNS servers</Btn
          >
        </div>
      </div>

      <div class="mt-5 flex items-center cursor-pointer" @click="serverList = [...serverList , `ns${serverList.length+1}.serverly.com/`]">
        <img src="../../../assets/svgs/plus-gray.svg" class="dark:brightness-[100]" alt="Plus" />
        <p
          class="text-primary-70 dark:text-white-70 text-[15px]  font-normal leading-[100%] ml-1.5"
        >
          Add DNS Server
        </p>
      </div>

      <div class="flex items-center lg:mt-9 mt-8">
        <Btn class="w-full" bg-color="bg-light-white dark:bg-light-white-8" text-color="text-primary dark:text-white" btn-padding="lg:py-3 py-[7px]"
        border-color="border-0"
        @click="$emit('closeModel', false)"
          >Cancel</Btn
        >
        <Btn
          class="w-full ml-3"
          bg-color="bg-blue"
          border-color="border-0"
          text-color="text-white"
          btn-padding="lg:py-3 py-[7px]"
          >Update DNS</Btn
        >
      </div>
    </div>
  </div>
</template>

<script setup>
import Btn from "../../../components/Helper/Btn.vue";
import { ref } from "vue";

const props = defineProps({
  data: {
    default: ["ns1.serverly.com/", "ns2.serverly.com/", "ns3.serverly.com/"],
  },
});
const serverList = ref([...props.data]);
</script>
