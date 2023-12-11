<template>
  <Auth>
    <template #body>
      <div class="max-w-[564px] lg:min-w-[564px] w-full xl:p-[32px] p-[16px]">
        <div class="border border-light dark:border-light-white-8 px-3 py-2 rounded-[8px] w-fit">
          <img src="../../assets/svgs/login.svg" class="dark:brightness-[100]" alt="Login" />
        </div>

        <h1
          class="text-[28px] font-bold leading-[110%] text-primary dark:text-white mt-5 mb-[35px]"
        >
          Login account
        </h1>

        <form @submit.prevent="formSubmit()">
          <TextInput
            label="Login or email"
            :value="cusFormData.email"
            @atInput="(newValue) => (cusFormData.email = newValue)"
            :is-message-show="v$.email.$invalid & v$.$dirty"
            :error-message="v$.email.email.$message"
          />
          <div class="lg:mt-[18px] mt-[16px]">
            <TextInput
              :type="iscurrPassShow ? 'text' : 'password'"
              label="Password"
              :value="cusFormData.password"
              @atInput="(newValue) => cusFormData.password = newValue"
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
            </TextInput>
          </div>

          <div class="flex justify-between items-center mt-[25px]">
            <div class="flex items-center">
              <input type="checkbox" class="h-[19px] w-[19px] before:rounded-[2px] before:h-full before:w-full checked:before:-z-10 dark:before:bg-black before:content-[''] relative before:absolute before:top-0" />
              <p
                class="ml-2.5 text-base font-medium leading-[115%] text-primary-70 dark:text-white-70"
              >
                Remember me
              </p>
            </div>

            <router-link :to="{ name: 'Reset' }"
              class="text-[#1378EF] text-base font-medium leading-[115%]"
              to="#"
              >Forget password?</router-link>
          </div>

          <Btn
            type="submit"
            class="w-full mt-9 text-white text-[17px] font-medium leading-6"
            border-color="!submitDisable ? 'border-[#026DEB99] border' : 'border-blue border'"
            :disabled="!submitDisable"
            btn-padding="py-3"
            :bg-color="!submitDisable ? 'bg-[#026DEB99]' : 'bg-blue'"
            rounded="rounded-[10px]"
            >Login to account</Btn
          >
        </form>

        <div class="flex items-center my-6">
          <hr class="grow dark:opacity-10" />
          <p
            class="text-base font-medium leading-[115%] text-primary-50 dark:text-white-50 mx-[25px]"
          >
            Or
          </p>
          <hr class="grow dark:opacity-10" />
        </div>

        <Btn class="w-full" btn-padding="py-3.5 mb-3.5" bg-color="dark:bg-white-5" border-color="border border-light-8">
          <div class="flex justify-center">
            <img src="../../assets/svgs/google-logo.svg" alt="Google" />
            <p
              class="text-[17px] dark:text-white font-medium leading-[115%] tracking-[-0.17px] ml-2.5"
            >
              Sign in with Google
            </p>
          </div>
        </Btn>

        <Btn class="w-full" btn-padding="py-3.5" bg-color="dark:bg-white-5" border-color="border border-light-8">
          <div class="flex justify-center">
            <img src="../../assets/svgs/telegram.svg" alt="Google" />
            <p
              class="text-[17px] dark:text-white font-medium leading-[115%] tracking-[-0.17px] ml-2.5"
            >
              Sign in with Telegram
            </p>
          </div>
        </Btn>
      </div>
    </template>
    <template #bottom>
      <p
        class="text-center text-[17px] font-medium leading-[115%] text-primary-70 dark:text-white-70"
      >
        New to Server_ly?
        <router-link :to="{ name: 'Signup' }" class="text-blue"> Create an Account </router-link>
      </p>
    </template>
  </Auth>
</template>

<script setup>
import Auth from "./index.vue";
import TextInput from "../../components/Helper/TextInput.vue";
import Btn from "../../components/Helper/Btn.vue";
import { useVuelidate } from "@vuelidate/core";
import { required, email , helpers , minLength } from "@vuelidate/validators";
import { ref , watch, reactive, computed } from "vue";
const iscurrPassShow = ref(false);

const cusFormData = reactive({
  email: null,
  password: null,
});

const rulesFromData = ref({
  email: {
    required,
    email,
  },
  password: {
    required : helpers.withMessage('The password must be at least 6 characters long and capitalized.' , required),
    minLength : helpers.withMessage('The password must be at least 6 characters long and capitalized.' , minLength(6)),
    capitalized : helpers.withMessage( 'The password must be at least 6 characters long and capitalized.',helpers.regex(/^[A-Z][a-z0-9.,$;]+$/g))
  },
});
const v$ = useVuelidate(rulesFromData, cusFormData);

const formSubmit = () => {
  v$.value.$touch();
  return null;
};

// const capitalized = (value) => value.match(/^[A-Z]/g);

// const submitDisable = ref(false);

const submitDisable = computed(() => cusFormData.email && cusFormData.password ) 

</script>
