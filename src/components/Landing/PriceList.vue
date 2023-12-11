<template>
  <section
    class="bg-[url('../assets/images/grad4.png')] bg-no-repeat bg-[length:100%_auto] bg-bottom mt-[90px]"
  >
    <div class="container max-w-[936px] mx-auto">
      <h2
        class="text-dark dark:text-white 2xl:text-[56px] text-[38px] font-bold leading-[120%] tracking-[-1.12px] text-center"
      >
        Pricing List
      </h2>

      <div class="overflow-x-auto w-full px-4 mt-[27px] mb-[63px] tab-over">
        <div
          class="flex p-[3px] mx-auto justify-center border rounded-[10px] border-solid border-light-white-gray w-fit bg-[#ffffff80] dark:bg-white-8 dark:border-light-white-gray-8"
        >
          <div
            class="flex items-center justify-between px-5 py-2 bg-white min-w-max dark:bg-white-15 rounded-[8px] dark:shadow-sm shadow-gray-15"
          >
            <img src="../../assets/svgs/flags/netherlands.svg" alt="Flag" />
            <p
              class="ml-2.5 font-medium text-[16px] xl:text-[18px] min-w-max text-primary dark:text-white"
            >
              Netherlands
            </p>
          </div>

          <img
            src="../../assets/svgs/divider.svg"
            class="mx-1.5 dark:brightness-[100]"
            alt="Divider"
          />

          <div class="flex items-center justify-between px-5 py-2 min-w-max">
            <img src="../../assets/svgs/flags/usa.svg" alt="Flag" />
            <p
              class="ml-2.5 font-normal text-[16px] xl:text-[18px] min-w-max text-primary dark:text-white"
            >
              United States
            </p>
          </div>

          <img
            src="../../assets/svgs/divider.svg"
            class="mx-1.5 dark:brightness-[100]"
            alt="Divider"
          />

          <div class="flex items-center justify-between px-5 py-2 min-w-max">
            <img src="../../assets/svgs/flags/russia.svg" alt="Flag" />
            <p
              class="ml-2.5 font-normal text-[16px] xl:text-[18px] min-w-max text-primary dark:text-white"
            >
              Russia
            </p>
          </div>
        </div>
      </div>

      <div class="px-4">
        <div>
          <h4 class="text-dark dark:text-white text-[28px] font-bold leading-6">
            💎 Shared
          </h4>
          <div class="flex flex-wrap [&>*]:mr-5 [&>*]:mb-3 mt-6 mb-3">
            <p
              class="text-dark dark:text-white-50 text-base font-medium leading-5"
            >
              AMD Ryzen 9™ Processor
            </p>
            <p
              class="text-dark dark:text-white-50 text-base font-medium leading-5"
            >
              Standard DDoS protection <span class="opacity-70">(?)</span>
            </p>
            <p
              class="text-dark dark:text-white-50 text-base font-medium leading-5"
            >
              Internet up to 1 Gbps
            </p>
            <p
              class="text-dark dark:text-white-50 text-base font-medium leading-5"
            >
              Internet up to 1 Gbps
            </p>
          </div>
        </div>

        <hr class="mb-2 dark:opacity-10" />

        <div>
          <Subpricelist :data="priceList" />
        </div>
      </div>

      <div class="mt-[60px] px-4">
        <div>
          <h4 class="text-dark dark:text-white text-[28px] font-bold leading-6">
            ⭐️ Dedicated
          </h4>
          <div class="flex flex-wrap [&>*]:mr-5 [&>*]:mb-3 mt-6 mb-3">
            <p
              class="text-dark dark:text-white-50 text-base font-medium leading-5"
            >
              AMD Ryzen 9™ Processor
            </p>
            <p
              class="text-dark dark:text-white-50 text-base font-medium leading-5"
            >
              Standard DDoS protection <span class="opacity-70">(?)</span>
            </p>
            <p
              class="text-dark dark:text-white-50 text-base font-medium leading-5"
            >
              Internet up to 1 Gbps
            </p>
            <p
              class="text-dark dark:text-white-50 text-base font-medium leading-5"
            >
              Internet up to 1 Gbps
            </p>
          </div>
        </div>

        <hr class="mb-2 dark:opacity-10" />

        <div>
          <Subpricelist :data="priceList" />
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import Subpricelist from "../Helper/Subpricelist.vue";

const priceList = [
  {
    price: 12.5,
    offer: "25%",
    del: 15.0,
    cat: "Standart",
    cores: 2,
    ram: 6,
    nvme: 30,
    tarffic: "Unlimited traffic",
  },
  {
    price: 25.0,
    offer: "25%",
    del: 15.0,
    cat: "Standart",
    cores: 2,
    ram: 6,
    nvme: 30,
    tarffic: "Unlimited traffic",
  },
  {
    price: 37.5,
    offer: "25%",
    del: 15.0,
    cat: "Standart",
    cores: 2,
    ram: 6,
    nvme: 30,
    tarffic: "Unlimited traffic",
  },
  {
    price: 50.0,
    offer: "25%",
    del: 15.0,
    cat: "Standart",
    cores: 2,
    ram: 6,
    nvme: 30,
    tarffic: "Unlimited traffic",
  },
];
</script>

<style scoped>
.tab-over::-webkit-scrollbar-track {
  display: none;
  height: 0px;
}

.tab-over::-webkit-scrollbar {
  display: none;
}
</style>
