<template>
    <Auth>
      <template #body>
        <div class="max-w-[564px] lg:min-w-[564px] w-full xl:p-[32px] p-[16px]">
          <div class="border border-light dark:border-light-white-8 px-3 py-2 rounded-[8px] w-fit">
            <img src="../../assets/svgs/reset.svg" class="dark:brightness-[100]" alt="Login" />
          </div>
  
          <h1
            class="xl:text-[32px] text-[28px] font-bold leading-[110%] text-primary dark:text-white mt-5 mb-[35px]"
          >
          Reset the password
          </h1>
  
          <form @submit.prevent="formSubmit()" class="xl:w-auto w-[calc(100vw-32px)]" >
            <TextInput
              label="Login or email"
              :value="cusFormData.email"
              @atInput="(newValue) => (cusFormData.email = newValue)"
              :is-message-show="v$.email.$invalid & v$.$dirty"
              :error-message="v$.email.required.$message"
            />  
            <Btn
              type="submit"
              class="w-full mt-9 lg:mb-6 mb-5 text-white text-[17px] font-medium leading-6"
              border-color="!submitDisable ? 'border-[#026DEB99] border' : 'border-blue border'"
              :disabled="!submitDisable"
              btn-padding="py-3"
              :bg-color="!submitDisable ? 'bg-[#026DEB99]' : 'bg-blue'"
              rounded="rounded-[10px]"
              >Continue</Btn
            >
          </form>
          <router-link to="#" >
            <div class="flex justify-center items-center">
                <p class="text-base font-medium leading-[115%] text-primary-50 dark:text-white-50" >Go back</p>
                <img src="../../assets/svgs/right-arrow-thin.svg" class="dark:brightness-[100] ml-1" alt="Arrow">
            </div>
          </router-link>
  
        </div>
      </template>
    </Auth>
  </template>
  
  <script setup>
  import Auth from "./index.vue";
  import TextInput from "../../components/Helper/TextInput.vue";
  import Btn from "../../components/Helper/Btn.vue";
  import { useVuelidate } from "@vuelidate/core";
  import { required,} from "@vuelidate/validators";
  import { ref , reactive, computed } from "vue";
  
  const cusFormData = reactive({
    email: null,
  });
  
  const rulesFromData = ref({
    email: {
      required,
    },
  });
  const v$ = useVuelidate(rulesFromData, cusFormData);
  
  const formSubmit = () => {
    v$.value.$touch();
    return null;
  };
  
  const submitDisable = computed(() => cusFormData.email) 
  
  </script>
  