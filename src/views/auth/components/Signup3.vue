<template>
  <h1
    class="text-lg font-medium leading-[110%] text-primary-50 dark:text-white-50 mb-5"
  >
    Address details
  </h1>
  <form @submit.prevent="formSubmit()" class="xl:w-auto w-[calc(100vw-32px)]">
    <Listbox as="div">
      <div class="relative lg:mt-[18px] mt-[16px]">
        <ListboxButton
          class="relative w-full cursor-default text-left focus:outline-none sm:text-sm sm:leading-6"
        >
          <div class="flex justify-between items-center border border-light dark:border-light-8 dark:bg-white-5 py-2.5 px-3.5 rounded-[8px]" >
            <div>
              <p class="text-xs font-medium leading-[100%] tracking-[-0.12px] opacity-40 text-primary dark:text-white" >Country</p>
              <p class="lg:text-[17px] text-[16px] font-medium leading-[100%] tracking-[-0.17px] text-primary dark:text-white mt-[7px]" >United States</p>
            </div>
            <img src="../../../assets/svgs/drop-thin.svg" class="dark:brightness-[100]" alt="Drop">
          </div>
        </ListboxButton>

        <transition
          leave-active-class="transition ease-in duration-100"
          leave-from-class="opacity-100"
          leave-to-class="opacity-0"
        >
          <ListboxOptions
            class="absolute z-20 mt-1 w-full overflow-auto rounded-md"
          >
            <ListboxOption as="template" v-slot="{ active, selected }">
              <div class="bg-black p-4">
                <p class="text-white">None</p>
              </div>
            </ListboxOption>
          </ListboxOptions>
        </transition>
      </div>
    </Listbox>
    <div class="pt-[18px]">
      <TextInput
        type="text"
        label="City"
        :value="cusFormData.city"
        @atInput="(newValue) => (cusFormData.city = newValue)"
        :is-message-show="v$.city.$invalid & v$.$dirty"
        :error-message="v$.city.required.$message"
      />
    </div>
    <div class="pt-[18px]">
      <TextInput
        type="number"
        label="Street"
        :value="cusFormData.street"
        @atInput="(newValue) => (cusFormData.street = newValue)"
        :is-message-show="v$.street.$invalid & v$.$dirty"
        :error-message="v$.street.required.$message"
      />
    </div>
    <div class="grid grid-cols-2 gap-[18px] mt-[18px]">
      <div>
        <TextInput
          type="text"
          label="Postal code"
          :value="cusFormData.code"
          @atInput="(newValue) => (cusFormData.code = newValue)"
          :is-message-show="v$.code.$invalid & v$.$dirty"
          :error-message="v$.code.required.$message"
        />
      </div>
      <div>
        <TextInput
          type="text"
          label="House number"
          :value="cusFormData.hnumber"
          @atInput="(newValue) => (cusFormData.hnumber = newValue)"
          :is-message-show="v$.hnumber.$invalid & v$.$dirty"
          :error-message="v$.hnumber.required.$message"
        />
      </div>
    </div>

    <Btn
      type="submit"
      class="w-full mt-9 text-white text-[17px] font-medium leading-6"
      border-color="!submitDisable ? 'border-[#026DEB99] border' : 'border-blue border'"
      :disabled="!submitDisable"
      btn-padding="py-3"
      :bg-color="!submitDisable ? 'bg-[#026DEB99]' : 'bg-blue'"
      rounded="rounded-[10px]"
      >Continue</Btn
    >
  </form>
  <div class="lg:pt-6 pt-5">
    <router-link to="#">
      <div class="flex justify-center items-center">
        <p
          class="text-base font-medium leading-[115%] text-primary-50 dark:text-white-50"
        >
          Go back
        </p>
        <img
          src="../../../assets/svgs/right-arrow-thin.svg"
          class="dark:brightness-[100] ml-1"
          alt="Arrow"
        />
      </div>
    </router-link>
  </div>
</template>

<script setup>
import TextInput from "../../../components/Helper/TextInput.vue";
import Btn from "../../../components/Helper/Btn.vue";
import { useVuelidate } from "@vuelidate/core";
import { ref, reactive, computed } from "vue";
import { required, email, helpers, minLength } from "@vuelidate/validators";
import {
  Listbox,
  ListboxButton,
  ListboxLabel,
  ListboxOption,
  ListboxOptions,
} from "@headlessui/vue";

const cusFormData = reactive({
  country: null,
  city: null,
  street: null,
  code: null,
  hnumber: null,
});

const rulesFromData = ref({
  country: {},
  city: {
    required: helpers.withMessage(
      "The City must be alphabat",
      helpers.regex(/[a-z]+$/g)
    ),
  },
  street: {
    required: helpers.withMessage(
      "The Street name must be alphabat",
      helpers.regex(/[a-z]+$/g)
    ),
  },
  code: {
    required: helpers.withMessage(
      "The Postal code must be number",
      helpers.regex(/[0-9]+$/g)
    ),
  },
  hnumber: {
    required: helpers.withMessage(
      "The House number Number must be number",
      helpers.regex(/[0-9]+$/g)
    ),
  },
});
const v$ = useVuelidate(rulesFromData, cusFormData);

const formSubmit = () => {
  v$.value.$touch();
  return null;
};

const submitDisable = computed(
  () =>
    cusFormData.country &&
    cusFormData.city &&
    cusFormData.street &&
    cusFormData.code &&
    cusFormData.hnumber
);
</script>
