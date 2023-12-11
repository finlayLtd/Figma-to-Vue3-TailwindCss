<template>
    <div
          class="flex lg:flex-row flex-col items-start gap-8 my-4 md:p-6 p-5 rounded-[14px] bg-white dark:bg-white-8 dark:border-b-0 border-b-[#E1E1E1] border-b border-solid cursor-pointer"
          :class="activePriceList == index ? 'active-list' : ''" @click="activePriceList = index"
          v-for="(priceList , index) in data" :key="index"
        >
          <div class="flex items-center gap-5">
            <h2
              class="text-dark dark:text-white md:text-5xl text-[42px] font-bold leading-[110%]"
            >
              ${{ priceList.price.toFixed(2) }}
            </h2>
            <div>
              <p
                class="rounded-[5px] bg-dark dark:bg-white text-white dark:text-primary text-lg  font-medium leading-6 mb-1.5 py-[1px] px-1 offer"
              >
                -{{ priceList.offer }}
              </p>
              <del
                class="opacity-50 text-dark dark:text-white text-[17px]  font-normal leading-[120%]"
                >${{ priceList.del.toFixed(2) }}</del
              >
            </div>
          </div>

          <div class="grow w-full">
            <div class="flex justify-between items-start">
              <p
                class="text-[#8E8E8E] md:text-[17px] text-[16px] font-normal leading-5"
              >
              {{ priceList.cat }}
              </p>
              <img src="../../assets/svgs/right-arrow-white.svg" v-if="activePriceList == index" alt="" />
              <img src="../../assets/svgs/right-arrow-gray.svg" v-else alt="" />
            </div>

            <hr class="my-3.5 opacity-50 dark:opacity-10" />

            <div class="grid md:grid-cols-4 grid-cols-2 md:gap-5 gap-y-4 gap-x-3.5">
              <div class="flex items-center">
                <div class="p-1.5 rounded-md bg-[#1f202214] dark:bg-white-8 feature">
                  <img src="../../assets/svgs/cpu.svg" class="md:min-w-[15px] min-w-[12px]" :class="activePriceList == index ? 'brightness-[100]' : 'dark:brightness-[100]'" alt="CPU">
                </div>
                <p class="md:ml-3 ml-2.5 text-dark dark:text-white md:text-[19px] text-[16px]  font-normal leading-6">{{ priceList.cores }} vCores</p>
              </div>
              <div class="flex items-center">
                <div class="p-1.5 rounded-md bg-[#1f202214] dark:bg-white-8 feature">
                  <img src="../../assets/svgs/ram-overview.svg" class="md:min-w-[15px] min-w-[12px]" :class="activePriceList == index ? 'brightness-[100]' : 'dark:brightness-[100]'" alt="CPU">
                </div>
                <p class="md:ml-3 ml-2.5 text-dark dark:text-white md:text-[19px] text-[16px]  font-normal leading-6">{{ priceList.ram }} GB RAM</p>
              </div>
              <div class="flex items-center">
                <div class="p-1.5 rounded-md bg-[#1f202214] dark:bg-white-8 feature">
                  <img src="../../assets/svgs/storge.svg" class="md:min-w-[15px] min-w-[12px]" :class="activePriceList == index ? 'brightness-[100]' : 'dark:brightness-[100]'" alt="CPU">
                </div>
                <p class="md:ml-3 ml-2.5 text-dark dark:text-white md:text-[19px] text-[16px] min-w-max font-normal leading-6">{{ priceList.nvme }} GB NVMe</p>
              </div>
              <div class="flex items-center">
                <div class="p-1.5 rounded-md bg-[#1f202214] dark:bg-white-8 feature">
                  <img src="../../assets/svgs/bandwidth.svg" class="md:min-w-[15px] min-w-[12px]" :class="activePriceList == index ? 'brightness-[100]' : 'dark:brightness-[100]'" alt="CPU">
                </div>
                <p class="md:ml-3 ml-2.5 text-dark dark:text-white md:text-[19px] text-[16px]  font-normal leading-6">{{ priceList.tarffic }}</p>
              </div>
            </div>
          </div>
        </div>
</template>

<script setup>
import Cores from '../svgs/Cores.vue';
import Traffic from '../svgs/Traffic.vue'
import Nvme from '../svgs/Nvme.vue';
import Ram from '../svgs/Ram.vue';
import {ref} from 'vue'

const props = defineProps(
    {
        data : {
            required : true
        }
    }
)

const activePriceList = ref(0)
</script>

<style>
.active-list :is(h2 , p , del) {
    @apply text-white !important
}

.active-list {
    @apply bg-blue !important
}

.active-list .feature {
    @apply bg-white-8 !important
}

.active-list .offer {
    @apply bg-white text-black  !important
}

</style>