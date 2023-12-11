<template>
  <form @submit.prevent="formSubmit()" class="xl:w-auto w-[calc(100vw-32px)]">
    <TextInput
      type="text"
      label="Username"
      :value="cusFormData.username"
      @atInput="(newValue) => (cusFormData.username = newValue)"
      :is-message-show="v$.username.$invalid & v$.$dirty"
      :error-message="v$.username.required.$message"
    />
    <div class="pt-[18px]">
      <TextInput
        type="email"
        label="Email"
        :value="cusFormData.email"
        @atInput="(newValue) => (cusFormData.email = newValue)"
        :is-message-show="v$.email.$invalid & v$.$dirty"
        :error-message="v$.email.email.$message"
      />
    </div>
    <div class="mt-[18px]">
      <TextInput
        :type="isresetPassShow ? 'text' : 'password'"
        label="password"
        :value="cusFormData.password"
        @atInput="(newValue) => (cusFormData.password = newValue)"
        :is-message-show="v$.password.$invalid & v$.$dirty"
        :error-message="v$.password.required.$message"
      >
        <div
          class="absolute top-0 right-0 h-full grid place-items-center px-3.5"
        >
          <Btn
            btn-padding="p-[5px]"
            border-color="border-0"
            bg-color="dark:bg-white-5"
            @click="isresetPassShow = !isresetPassShow"
          >
            <img
              src="../../../assets/svgs/eyes-dash.svg"
              v-if="!isresetPassShow"
              class="dark:brightness-[100]"
              alt="Eyes"
            />
            <img
              src="../../../assets/svgs/eyes-dash-close.svg"
              v-else
              class="dark:brightness-[100]"
              alt="Eyes"
            />
          </Btn>
        </div>
      </TextInput>
    </div>

    <div class="flex lg:items-center text-start mt-[25px]">
      <input
        type="checkbox"
        class="h-[19px] w-[19px] before:rounded-[2px] before:h-full before:w-full checked:before:-z-10 dark:before:bg-black before:content-[''] relative before:absolute before:top-0"
        v-model="cusFormData.policy"
      />
      <p
        class="ml-2.5 lg:text-base text-[15px] font-medium leading-[115%] text-primary-70 dark:text-white-70"
      >
        I agree to the User Agreement, and I have read the Privacy Policy.
      </p>
    </div>

    <Btn
      type="submit"
      class="w-full mt-9 text-white text-[17px] font-medium leading-6"
      border-color="!submitDisable ? 'border-[#026DEB99] border' : 'border-blue border'"
      :disabled="!submitDisable"
      btn-padding="py-3"
      :bg-color="!submitDisable ? 'bg-[#026DEB99]' : 'bg-blue'"
      rounded="rounded-[10px]"
      >Registration account</Btn
    >
  </form>
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
  username: null,
  email: null,
  password: null,
  policy : false
});

const rulesFromData = ref({
  username: {
    required: helpers.withMessage(
      "The username must be alphabat",
      helpers.regex(/[a-z]+$/g)
    ),
  },
  email: {
    email,
  },
  password: {
    required: helpers.withMessage(
      "The password must be at least 6 characters long and capitalized.",
      required
    ),
    minLength: helpers.withMessage(
      "The password must be at least 6 characters long and capitalized.",
      minLength(6)
    ),
    capitalized: helpers.withMessage(
      "The password must be at least 6 characters long and capitalized.",
      helpers.regex(/^[A-Z][a-z0-9.,$;]+$/g)
    ),
  },
});
const v$ = useVuelidate(rulesFromData, cusFormData);

const formSubmit = () => {
  v$.value.$touch();
  return null;
};

const submitDisable = computed(
  () => cusFormData.username && cusFormData.email && cusFormData.password && cusFormData.policy
);
</script>
