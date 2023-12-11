<template>
  <h1
    class="text-lg font-medium leading-[110%] text-primary-50 dark:text-white-50 mb-5"
  >
    Owner details
  </h1>
  <form @submit.prevent="formSubmit()" class="xl:w-auto w-[calc(100vw-32px)]">
    <div class="grid grid-cols-2 gap-[18px] mb-[18px]">
      <div>
        <TextInput
          type="text"
          label="First name"
          :value="cusFormData.fname"
          @atInput="(newValue) => (cusFormData.fname = newValue)"
          :is-message-show="v$.fname.$invalid & v$.$dirty"
          :error-message="v$.fname.required.$message"
        />
      </div>
      <div>
        <TextInput
          type="text"
          label="Last name"
          :value="cusFormData.lname"
          @atInput="(newValue) => (cusFormData.lname = newValue)"
          :is-message-show="v$.lname.$invalid & v$.$dirty"
          :error-message="v$.lname.required.$message"
        />
      </div>
    </div>
    <TextInput
      type="text"
      label="Company name"
      :value="cusFormData.companyName"
      @atInput="(newValue) => (cusFormData.companyName = newValue)"
      :is-message-show="v$.companyName.$invalid & v$.$dirty"
      :error-message="v$.companyName.required.$message"
    />
    <div class="pt-[18px]">
      <TextInput
        type="text"
        label="VAT Number"
        :value="cusFormData.vat"
        @atInput="(newValue) => (cusFormData.vat = newValue)"
        :is-message-show="v$.vat.$invalid & v$.$dirty"
        :error-message="v$.vat.required.$message"
      />
    </div>
    <div class="pt-[18px]">
      <TextInput
        type="number"
        label="Phone number"
        :value="cusFormData.pnumber"
        @atInput="(newValue) => (cusFormData.pnumber = newValue)"
        :is-message-show="v$.pnumber.$invalid & v$.$dirty"
        :error-message="v$.pnumber.required.$message"
      />
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
const iscurrPassShow = ref(false);
const isresetPassShow = ref(false);

const cusFormData = reactive({
  fname: null,
  lname: null,
  companyName: null,
  vat: null,
  pnumber: null,
});

const rulesFromData = ref({
  fname: {
    required: helpers.withMessage(
      "The First name must be alphabat",
      helpers.regex(/[a-z]+$/g)
    ),
  },
  lname: {
    required: helpers.withMessage(
      "The Last name must be alphabat",
      helpers.regex(/[a-z]+$/g)
    ),
  },
  companyName: {
    required: helpers.withMessage(
      "The Company name must be alphabat",
      helpers.regex(/[a-z]+$/g)
    ),
  },
  vat: {
    required: helpers.withMessage(
      "The VAT Number must be alphabat and number",
      helpers.regex(/[a-z0-9]+$/g)
    ),
  },
  pnumber: {
    required: helpers.withMessage(
      "The VAT Number must be number",
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
    cusFormData.fname &&
    cusFormData.lname &&
    cusFormData.companyName &&
    cusFormData.vat &&
    cusFormData.pnumber
);
</script>
