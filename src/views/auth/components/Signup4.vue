<template>
    <form @submit.prevent="formSubmit()" class="xl:w-auto w-[calc(100vw-32px)]">
      <TextInput
        type="number"
        label="Verification code"
        :value="cusFormData.code"
        @atInput="(newValue) => (cusFormData.code = newValue)"
        :is-message-show="v$.code.$invalid & v$.$dirty"
        :error-message="v$.code.required.$message"
      />
      
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

      <div class="flex justify-center items-center mt-6" >
        <Btn text-size="lg:text-base text-[15px] font-medium leading-[115%]" type="button" text-color="text-blue" bg-color="bg-transparent" border-color="border-0" btn-padding="p-0">
          Resend code
        </Btn>
      </div>
    </form>
  </template>
  
  <script setup>
  import TextInput from "../../../components/Helper/TextInput.vue";
  import Btn from "../../../components/Helper/Btn.vue";
  import { useVuelidate } from "@vuelidate/core";
  import { ref, reactive, computed } from "vue";
  import { required } from "@vuelidate/validators";
  
  const cusFormData = reactive({
    code : null,
  });
  
  const rulesFromData = ref({
    code : {
      required
    }
  });
  const v$ = useVuelidate(rulesFromData, cusFormData);
  
  const formSubmit = () => {
    v$.value.$touch();
    return null;
  };
  
  const submitDisable = computed(
    () => cusFormData.code
  );
  </script>
  