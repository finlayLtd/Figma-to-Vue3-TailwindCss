<template>
  <Auth>
    <template #body>
      <div class="max-w-[564px] lg:min-w-[564px] w-full xl:p-[32px] p-[16px]">
        <div class="border border-light dark:border-light-white-8 px-3 py-2 rounded-[8px] w-fit">
          <img src="../../assets/svgs/change-password.svg" class="dark:brightness-[100]" alt="Login" />
        </div>

        <h1
          class="text-[28px] font-bold leading-[110%] text-primary dark:text-white mt-5 mb-[35px]"
        >
        Change Password
        </h1>

        <form @submit.prevent="formSubmit()" class="xl:w-auto w-[calc(100vw-32px)]">
          <div>
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
          <div class="mt-[18px]">
            <TextInput
              :type="isresetPassShow ? 'text' : 'password'"
              label="Repeat password"
              :value="cusFormData.repeat"
              @atInput="(newValue) => cusFormData.repeat = newValue"
              :is-message-show="v$.repeat.$invalid & v$.$dirty"
              :error-message="v$.repeat.required.$message"
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
                  src="../../assets/svgs/eyes-dash.svg"
                  v-if="!isresetPassShow"
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

          <Btn
            type="submit"
            class="w-full mt-9 text-white text-[17px] font-medium leading-6"
            border-color="!submitDisable ? 'border-[#026DEB99] border' : 'border-blue border'"
            :disabled="!submitDisable"
            btn-padding="py-3"
            :bg-color="!submitDisable ? 'bg-[#026DEB99]' : 'bg-blue'"
            rounded="rounded-[10px]"
            >Change password</Btn
          >
        </form>

      </div>
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
const isresetPassShow = ref(false);

const cusFormData = reactive({
  password: null,
  repeat: null,
});

const rulesFromData = ref({
  password: {
    required : helpers.withMessage('The password must be at least 6 characters long and capitalized.' , required),
    minLength : helpers.withMessage('The password must be at least 6 characters long and capitalized.' , minLength(6)),
    capitalized : helpers.withMessage( 'The password must be at least 6 characters long and capitalized.',helpers.regex(/^[A-Z][a-z0-9.,$;]+$/g))
  },
  repeat : {
    required : helpers.withMessage('The password must be at least 6 characters long and capitalized.' , required),
    minLength : helpers.withMessage('The password must be at least 6 characters long and capitalized.' , minLength(6)),
    capitalized : helpers.withMessage( 'The password must be at least 6 characters long and capitalized.',helpers.regex(/^[A-Z][a-z0-9.,$;]+$/g))
  }
});
const v$ = useVuelidate(rulesFromData, cusFormData);

const formSubmit = () => {
  v$.value.$touch();
  return null;
};
const submitDisable = computed(() => cusFormData.repeat && cusFormData.password ) 

</script>
