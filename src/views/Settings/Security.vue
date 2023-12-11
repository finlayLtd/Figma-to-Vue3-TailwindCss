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
          Security</span
        >
      </p>
      <h2
        class="text-primary dark:text-white lg:text-3xl text-[24px] font-bold leading-[115%] tracking-[0.3px] lg:my-4 my-3.5"
      >
        Security
      </h2>
    </div>

    <SettingTab :active="1" />

    <div
      class="mt-5 lg:mt-0 lg:p-5 p-4 lg:grid block grid-cols-2 gap-4 bg-white dark:bg-white-5 rounded-[14px]"
    >
      <div class="relative col-start-1 col-end-3">
        <TextInput
          :type="iscurrPassShow ? 'text' : 'password'"
          label="Current Password"
        />
        <div
          class="absolute top-0 right-0 h-full grid place-items-center px-3.5"
        >
          <Btn
            btn-padding="p-[5px]"
            border-color="border-0"
            bg-color="dark:bg-white-5"
            @click="iscurrPassShow = !iscurrPassShow"
          >
            <img
              src="../../assets/svgs/eyes-dash.svg"
              v-if="!iscurrPassShow"
              class="dark:brightness-[100]"
              alt="Eyes"
            />
            <img
              src="../../assets/svgs/eyes-dash-close.svg"
              v-else
              class="dark:brightness-[100]"
              alt="Eyes"
            />
          </Btn>
        </div>
      </div>
      <div class="relative lg:my-0 my-2.5">
        <TextInput
          :type="isnewPassShow ? 'text' : 'password'"
          label="New Password"
        />
        <div
          class="absolute top-0 right-0 h-full grid place-items-center px-3.5"
        >
          <Btn
            btn-padding="p-[5px]"
            border-color="border-0"
            bg-color="dark:bg-white-5"
            @click="isnewPassShow = !isnewPassShow"
          >
            <img
              src="../../assets/svgs/eyes-dash.svg"
              v-if="!isnewPassShow"
              class="dark:brightness-[100]"
              alt="Eyes"
            />
            <img
              src="../../assets/svgs/eyes-dash-close.svg"
              v-else
              class="dark:brightness-[100]"
              alt="Eyes"
            />
          </Btn>
        </div>
      </div>
      <div class="relative">
        <TextInput
          :type="isrepeatPassShow ? 'text' : 'password'"
          label="Repeat Password"
        />
        <div
          class="absolute top-0 right-0 h-full grid place-items-center px-3.5"
        >
          <Btn
            btn-padding="p-[5px]"
            border-color="border-0"
            bg-color="dark:bg-white-5"
            @click="isrepeatPassShow = !isrepeatPassShow"
          >
            <img
              src="../../assets/svgs/eyes-dash.svg"
              v-if="!isrepeatPassShow"
              class="dark:brightness-[100]"
              alt="Eyes"
            />
            <img
              src="../../assets/svgs/eyes-dash-close.svg"
              v-else
              class="dark:brightness-[100]"
              alt="Eyes"
            />
          </Btn>
        </div>
      </div>

      <div class="lg:pt-[9px] pt-[20px]">
        <Btn
          bg-color="bg-blue"
          text-color="text-white"
          border-color="border border-blue"
        >
          Change password
        </Btn>
      </div>
    </div>

    <div class="bg-white dark:bg-white-5 rounded-[14px] mt-5">
      <div class="lg:px-5 px-4 py-3.5">
        <p
          class="text-primary dark:text-white text-base font-medium leading-[normal] tracking-[0.16px]"
        >
          Multi Factor Authentication
        </p>
      </div>
      <hr class="dark:opacity-10" />
      <div class="lg:p-5 p-4">
        <div class="flex justify-between items-center">
          <div>
            <p
              class="text-primary dark:text-white text-[14px] lg:text-[15px] font-medium leading-[100%] tracking-[0.15px]"
            >
              Email
            </p>
            <p
              class="text-primary-50 dark:text-white-50 text-[13px] lg:text-sm font-normal leading-[100%] tracking-[0.14px] mt-[7px]"
            >
              Receive 2FA codes through your Email.
            </p>
          </div>

          <label class="relative inline-flex items-center cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer" checked />
            <div
              class="w-11 h-6 bg-gray-200 rounded-full dark:bg-white-8 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-[#0000000D] peer-checked:bg-blue"
            ></div>
          </label>
        </div>
        <div class="lg:flex block justify-between items-center mt-[25px]">
          <div>
            <p
              class="text-primary dark:text-white text-[14px] lg:text-[15px] font-medium leading-[100%] tracking-[0.15px]"
            >
              Two-Factor Authentication:
            </p>
            <p
              class="text-primary-50 dark:text-white-50 text-[13px] lg:text-sm font-normal leading-[100%] tracking-[0.14px] mt-[7px]"
            >
              Use an app like Authy or Google Authenticator to sign in to your
              Sellix account.
            </p>
          </div>

          <Btn
            class="lg:w-auto w-full mt-5 lg:mt-0"
            bg-color="bg-blue"
            text-color="text-white"
            border-color="border-0"
          >
          Add Authentication
          </Btn>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import Btn from "../../components/Helper/Btn.vue";
import TextInput from "../../components/Helper/TextInput.vue";
import SettingTab from "./SettingTab.vue";
import { ref, computed } from "vue";

const iscurrPassShow = ref(false);
const isnewPassShow = ref(false);
const isrepeatPassShow = ref(false);
</script>
