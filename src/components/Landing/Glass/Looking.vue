<template>
  <section class="pt-[86px] px-4">
    <div
      class="container mx-auto px-[18px] max-h-[394px] h-[394px] rounded-[24px] grid place-items-center bg-[#F8F9FC] dark:bg-[#15171C] liner dark:linerdark"
    >
      <div class="max-w-[810px]">
        <div
          class="py-2.5 px-3 border-light dark:bg-white-5 dark:border-light-8 rounded-[8px] mx-auto w-fit shadow-light-white bg-white dark:shadow-light-black"
        >
          <p class="lg:text-base text-[15px] font-medium leading-[140%] text-secondary dark:text-white">
            Your address:
            <span class="text-blue ml-2"> 217.149.190.230 </span>
          </p>
        </div>

        <h1
          class="lg:text-[54px] text-[36px] font-bold leading-[90%] tracking-[0.54px] text-center text-primary dark:text-white my-6"
        >
          Looking glass
        </h1>

        <p
          class="lg:text-lg text-[15px] font-normal leading-[150%] opacity-70 text-center text-primary dark:text-white max-w-[531px] mx-auto"
        >
          Check our network before purchasing services: traceroute, ping,
          speedtest and test files
        </p>

        <div class="overflow-x-auto w-full px-4 mt-[27px] mb-[63px] tab-over">
          <div
            class="flex flex-wrap p-[3px] mx-auto justify-center border rounded-[10px] border-solid border-light-white-gray w-fit bg-[#ffffff80] dark:bg-white-8 dark:border-light-white-gray-8"
          >
            <div
              class="flex items-center justify-between px-5 py-2 bg-white min-w-max dark:bg-white-15 rounded-[8px] dark:shadow-sm shadow-gray-15"
            >
              <img src="../../../assets/svgs/flags/netherlands.svg" alt="Flag" />
              <p
                class="ml-2.5 font-medium text-[15px] xl:text-[18px] min-w-max text-primary dark:text-white"
              >
                Netherlands
              </p>
            </div>

            <img
              src="../../../assets/svgs/divider.svg"
              class="mx-1.5 dark:brightness-[100] hidden sm:block"
              alt="Divider"
            />

            <div class="flex items-center justify-between px-5 py-2 min-w-max">
              <img src="../../../assets/svgs/flags/usa.svg" alt="Flag" />
              <p
                class="ml-2.5 font-normal text-[15px] xl:text-[18px] min-w-max text-primary dark:text-white"
              >
                United States
              </p>
            </div>

            <img
              src="../../../assets/svgs/divider.svg"
              class="mx-1.5 dark:brightness-[100] hidden sm:block"
              alt="Divider"
            />

            <div class="flex items-center justify-between px-5 py-2 min-w-max">
              <img src="../../../assets/svgs/flags/russia.svg" alt="Flag" />
              <p
                class="ml-2.5 font-normal text-[15px] xl:text-[18px] min-w-max text-primary dark:text-white"
              >
                Russia
              </p>
            </div>

            <Btn bg-color="bg-blue-80" border-color="border border-blue-80" text-color="text-white" btn-padding="py-2 px-5" class="hidden lg:block" >Test Start</Btn>
          </div>
        </div>
      </div>
    </div>

    <div class="container mx-auto my-10 grid lg:grid-cols-4 grid-cols-2 lg:gap-5 gap-x-2 gap-y-4" >
        <img src="../../../assets/images/glass1.png" alt="Glass">
        <img src="../../../assets/images/glass2.png" alt="Glass">
        <img src="../../../assets/images/glass3.png" alt="Glass">
        <img src="../../../assets/images/glass4.png" alt="Glass">
    </div>

    <div class="container mx-auto my-10 grid lg:grid-cols-2 grid-cols-1 gap-[30px]" >
        <div class="lg:p-[25px] p-5 bg-[#F8F9FC] dark:bg-[#f8f9fc14] rounded-[24px]">
            <h4 class="text-2xl font-bold leading-[120%] text-primary dark:text-white mb-[30px]" >Command execution</h4>

            <form @submit.prevent>

                <SelectInput :list="selectList" label="Command execution" />

                <div class="mt-[18px] mb-[30px]">
                    <TextInput label="Resource address (IPv4/IPv6/Host)" />
                </div>

                <Btn bg-color="bg-blue" text-color="text-white" btn-padding="py-2.5" class="w-full text-[16px]" border-color="border border-blue" >Exucute</Btn>
            </form>

            <h6 class="text-primary dark:text-white pl-[22px] mt-[30px] border-l border-blue lg:text-xl text-[18px] font-bold leading-[120%]" >Command execution</h6>

            <p class="border-l border-blue pl-[22px] mt-3 lg:text-base text-[15px] font-normal leading-[160%] tracking-[-0.16px] opacity-70 text-primary dark:text-white whitespace-pre-line" >
                32 bytes from 31.31.196.139: icmp_seq=0 time=1.745ms <br>
                32 bytes from 31.31.196.139: icmp_seq=1 time=2.103ms <br>
                32 bytes from 31.31.196.139: icmp_seq=2 time=1.471ms <br>
                32 bytes from 31.31.196.139: icmp_seq=3 time=9.540ms <br>
                --- udodov.pro ping statistics --- <br>
                4 packets transmitted, 4 packets received, 0% packet loss <br>
                round-trip min/avg/max/stddev = 1.471ms/3.715ms/9.540ms/3.370ms <br>
            </p>
        </div>
        <div class="lg:p-[25px] p-5 border h-fit border-primary-8 dark:border-white-8 rounded-[24px]">
            <h6 class="text-2xl font-bold leading-[120%] text-primary dark:text-white mb-3" >Test files</h6>

            <div class="py-3 px-3.5 rounded-[8px] mt-[18px] flex justify-between items-center shadow-light-white border dark:shadow-light-black border-light dark:bg-white-5 dark:border-light-8" v-for="i in 4" :key="i" >
                <div class="sm:max-w-full max-w-[220px]" >
                    <p class="opacity-40 text-[13px] font-medium leading-[100%] tracking-[-0.13px] text-primary mb-1 dark:text-white" >Test file 10 MB</p>
                    <p class="text-lg break-words font-medium leading-[100%] tracking-[-0.18px] text-primary dark:text-white" >wget -O /dev/null https://msk.lg.aeza.net/files/10MB</p>
                </div>

                <img src="../../../assets/svgs/download.svg" class="dark:brightness-[100]" alt="Download">
            </div>
        </div>
    </div>
  </section>
</template>

<script setup >
import Btn from '../../Helper/Btn.vue';
import SelectInput from '../../Helper/SelectInput.vue';
import {ref} from 'vue'
import TextInput from '../../Helper/TextInput.vue';

const selectList = ref([
  {
    id: 1,
    name: "Ping",
  },
  {
    id: 2,
    name: "Ping",
  },
  {
    id: 3,
    name: "Ping",
  },
]);
</script>

<style scoped>
.liner {
  background-image: radial-gradient(
      278.96% 50.66% at 76.12% 106.12%,
      rgba(193, 174, 249, 0.2) 0%,
      rgba(255, 255, 255, 0) 100%
    ),
    radial-gradient(
      416.7% 204.28% at 36.05% 170.96%,
      rgba(2, 109, 235, 0.1) 0%,
      rgba(248, 249, 252, 0) 100%
    );
}
</style>
