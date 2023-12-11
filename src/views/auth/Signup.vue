<template>
  <Auth>
    <template #body>
      <div class="max-w-[564px] lg:min-w-[564px] w-full xl:p-[32px] p-[16px]">
        <div
          class="border border-light dark:border-light-white-8 px-3 py-2 rounded-[8px] w-fit"
        >
          <img
            src="../../assets/svgs/auth-signup.svg"
            class="brightness-[0] dark:brightness-[100]"
            :class="activetab == 4 ? ' hidden' : 'block'"
            alt="Login"
            />
            <img
            src="../../assets/svgs/otp.svg"
            class="brightness-[0] dark:brightness-[100]"
            :class="activetab == 4 ? 'block' : 'hidden'"
            alt="Login"
          />
        </div>

        <h1
          class="text-[28px] font-bold leading-[110%] text-primary dark:text-white mt-5 mb-[35px]"
        >
          {{ activetab == 4 ? 'Enter the code' : 'Register account' }}
        </h1>

        <Signup1 v-if="activetab == 1" />
        <Signup2 v-if="activetab == 2"/>
        <Signup3 v-if="activetab == 3" />
        <Signup4 v-if="activetab == 4" />

        <AuthTab
          :activeVal="activetab"
          @changeTab="(Tval) => (activetab = Tval)"
          class="mt-[50px] xl:max-w-[400px] mx-auto"
        />
      </div>
    </template>
  </Auth>
</template>

<script setup>
import Auth from "./index.vue";

import { ref } from "vue";
import AuthTab from "./components/AuthTab.vue";
import Signup1 from "./components/Signup1.vue";
import Signup2 from "./components/Signup2.vue";
import Signup3 from "./components/signup3.vue";
import Signup4 from "./components/Signup4.vue";

const activetab = ref(1);
</script>
