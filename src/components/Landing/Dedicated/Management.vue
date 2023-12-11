<template>
  <section class="sm:bg-[url('../assets/images/management-grad.png')] bg-[url('../assets/images/sm-management-grad.png')] bg-no-repeat bg-[length:auto_100%] sm:bg-start bg-center">
    <div class="container mx-auto lg:px-0 px-4">
      <h2
        class="xl:text-[56px] text-[38px] font-bold leading-[95%] tracking-[0.56px] text-center"
      >
        Virtual Machine Management
      </h2>
      <p
        class="xl:text-lg text-[16px] font-normal leading-[150%] text-dark opacity-70 text-center mt-[22px]"
      >
        Save time managing your virtual machines with Evoxt. Spend time on the
        right thing.
      </p>

      <TabWithicon :tablist="managementTabList" />

      <div
        class="lg:mt-[60px] mt-10 flex xl:flex-row flex-col xl:items-center justify-between"
      >
        <div class="max-w-[536px]">
          <p class="xl:text-5xl text-[34px] font-bold leading-[45px] text-dark">
            IP Address Management
          </p>
          <p
            class="xl:text-[19px] text-[15px] font-normal leading-[150%] text-dark opacity-70 lg:mt-6 mt-[18px] lg:mb-9 mb-[30px]"
          >
            Located in 15+ global locations, Cloudzy’s Windows 10 VPS is a great
            solution for using the most popular Windows OS version anywhere in
            the world. Use Windows 10 to the fullest, running.
          </p>

          <div>
            <Btn bg-color="bg-blue" text-color="text-white">Read more</Btn>
            <Btn class="ml-2.5">Documentation</Btn>
          </div>
        </div>
        <img
          src="../../../assets/images/management.png"
          class="xl:max-w-[577px] mt-[30px] xl:mt-0"
          alt="Management"
        />
      </div>
    </div>
  </section>
</template>

<script setup>
import { reactive } from "vue";
import Btn from "../../Helper/Btn.vue";
import TabWithicon from "./TabWithicon.vue";

const managementTabList = reactive([
  {
    name: "Monitoring",
    icon: "../../../assets/svgs/monitering.svg",
  },
  {
    name: "Management",
    icon: "../../../assets/svgs/management.svg",
  },
  {
    name: "Firewall",
    icon: "../../../assets/svgs/firewall-tab.svg",
    isnotDestopDispaly: true,
  },
  {
    name: "Cloning",
    icon: "../../../assets/svgs/cloning.svg",
  },
  {
    name: "Accounts",
    icon: "../../../assets/svgs/accounts.svg",
  },
  {
    name: "Backups",
    icon: "../../../assets/svgs/referesh.svg",
  },
  {
    name: "VNC",
    icon: "../../../assets/svgs/vnc.svg",
  },
  {
    name: "API",
    icon: "../../../assets/svgs/api.svg",
  },
]);
</script>
