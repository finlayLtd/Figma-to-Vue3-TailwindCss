<template>
    <div class="bg-white dark:bg-[#32323580] rounded-[14px] pb-5">
        <div class="flex justify-between items-center p-5 border-b dark:bg-[#00000014] dark:border-[#4B4B4B] border-light">
            <div class="flex items-center" >
                <img src="../../assets/svgs/left-arrow.svg" class="mr-4 cursor-pointer dark:brightness-[100]" alt="Left">
                <div class="flex items-center" >
                    <img src="../../assets/svgs/chat-avtar.svg" class="border rounded-[50%] dark:border-white-5" alt="Chat">
                    <div class="ml-3">
                        <p class="text-primary dark:text-white lg:text-base text-[15px] font-medium leading-[110%]">Support</p>
                        <p class="text-primary dark:text-white mt-1 opacity-60 lg:text-[15px] text-[14px] font-normal leading-[110%]">Online</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center px-[9px] py-2 rounded-[16px] bg-orange">
                <img src="../../assets/svgs/refresh.svg" alt="Refresh">
                <p class="text-base font-medium leading-[100%] tracking-[0.16px] text-white ml-2">In work</p>
            </div>
        </div>
        <div class="pt-4 lg:pb-0 pb-5 px-[30px] overflow-y-auto 2xl:max-h-[calc(100vh-340px)] 2xl:min-h-[calc(100vh-340px)] max-h-[calc(100vh-355px)] min-h-[calc(100vh-355px)]">
            <div class="flex items-center">
                <hr class="grow opacity-50 dark:opacity-10">
                <p class="py-[7px] mx-[23px] px-[9px] lg:text-[15px] text-[14px] font-medium leading-[115%] tracking-[0.15px] text-blue bg-blue-5 rounded-[16px]">
                    Ticket #1234
                </p>
                <hr class="grow opacity-50 dark:opacity-10">
            </div>

            <p class="pt-5 pb-[5px] text-primary-50 text-center text-sm dark:text-white-50 font-normal leading-[110%]">Today</p>

            <div class="[&>*:first-child]:mt-0 [&>*:last-child]:mb-0">
                <div :class="getSpacing(textchat, ind)" :dir="textchat.type == 'team' && innerWidth >  991 ? 'rtl' : ''" v-for="(textchat, ind) in chat" :key="ind">
                    <div class="flex items-center lg:max-w-[50%]">
                        <img :src="getImageUrl(textchat.avtar)" class="max-w-[35px] min-w-[35px]" alt="Avtar">
                        <div class="ml-2.5 rtl:mr-2.5" >
                            <p class="lg:text-[15px] text-[14px] font-medium leading-[110%] text-primary dark:text-white" >
                                <span class="text-blue text-[13px] font-normal leading-[110%]" v-if="textchat.type == 'team'" >Support:</span>
                                {{ textchat.name }}
                            </p>
                            <p class="py-1.5 px-[11px] bg-[#E6ECF4] dark:bg-[#E6ECF40A] rounded-[16px] my-[7px] lg:text-left text-[15px] dark:text-white">{{ textchat.text }}</p>
                            <p class="text-primary-50 dark:text-white-50 text-[13px] font-normal leading-[110%] rtl:text-right" dir="ltr">{{ textchat.time }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="flex border border-primary-8 mx-[25px] py-2.5 px-[15px] mt-5 bg-light-white dark:bg-white-5 dark:border-white-5 rounded-[8px]">
            <input type="text" v-model="newChat" class="grow outline-0 bg-transparent dark:text-white" placeholder="Type a message">
            <input type="file" class="hidden" ref="file">
            <button @click="file.click()">
                <img src="../../assets/svgs/file.svg" class="dark:brightness-[100]" alt="Submit">
            </button>
            <img src="../../assets/svgs/divider.svg" class="ml-3 mr-4 dark:brightness-[100]" alt="Submit">
            <button @click="addnewChat()">
                <img src="../../assets/svgs/submit-chat.svg" class="dark:brightness-[100]" alt="Submit">
            </button>
        </div>
    </div>
</template>

<script setup>
import {ref , computed } from 'vue'
const file = ref(null)
const newChat = ref('')
const innerWidth = computed(() => window.innerWidth);

const getSpacing = (textchat ,index) =>  {
    let nextChat = chat.value[index+1]
    if(nextChat && textchat && nextChat.type == textchat.type){
        return 'lg:mb-5 mb-4'
    }
    return 'lg:mb-0 mb-[35px]'
}


const addnewChat = () => {
    if(newChat.value) {
        chat.value = [
            ...chat.value ,
            {
                type : 'user',
                avtar : '../../assets/svgs/user-avtar.svg',
                name : 'Udodov',
                text : newChat.value,
                time : '19:55 AM'
            }
        ]
    }
}

const chat = ref([
    {
        type : 'user',
        avtar : '../../assets/svgs/user-avtar.svg',
        name : 'Udodov',
        text : 'Help me!',
        time : '19:55 AM'
    },
    {
        type : 'user',
        avtar : '../../assets/svgs/user-avtar.svg',
        name : 'Udodov',
        text : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doeiusmod tempor incididunt ut labore et dolore magna aliqua?',
        time : '19:55 AM'
    },
    {
        type : 'team',
        avtar : '../../assets/svgs/team-avtar.svg',
        name : 'BestieC',
        text : 'Lorem ipsum dolor sit amet',
        time : '19:55 AM'
    },
    {
        type : 'team',
        avtar : '../../assets/svgs/team-avtar.svg',
        name : 'BestieC',
        text : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doeiusmod tempor incididunt ut labore et dolore magna aliqua?',
        time : '19:55 AM'
    },
    {
        type : 'user',
        avtar : '../../assets/svgs/user-avtar.svg',
        name : 'Udodov',
        text : 'Thanks!!!',
        time : '19:55 AM'
    },
])

const getImageUrl = (name) => {
  return new URL(name, import.meta.url).href;
}
</script>