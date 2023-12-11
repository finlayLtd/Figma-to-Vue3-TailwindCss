<template>
    <div class="container px-4 flex flex-col 2xl:flex-row justify-between mx-auto lg:mt-[60px] mt-[50px]">
        <div class="2xl:max-w-[389px]" >
            <h4 class="text-[22px] font-bold leading-[90%] tracking-[0.22px] pb-2" >Top articles</h4>

            <div>
                <router-link to="#">
                    <div class="flex mt-4" >
                        <p class="lg:text-lg text-[16px] font-normal leading-[115%] tracking-[0.18px] text-blue-80" >Dedicated Server: Troubleshooting?</p>
                        <img src="../../../assets/svgs/right-arrow-blue.svg" class="w-[14px] ml-2.5" alt="Arrow">
                    </div>
                </router-link>
                <router-link to="#">
                    <div class="flex mt-4" >
                        <p class="lg:text-lg text-[16px] font-normal leading-[115%] tracking-[0.18px] text-blue-80" >Set Up and Manage an External Domain at..?</p>
                        <img src="../../../assets/svgs/right-arrow-blue.svg" class="w-[14px] ml-2.5" alt="Arrow">
                    </div>
                </router-link>
                <router-link to="#">
                    <div class="flex mt-4" >
                        <p class="lg:text-lg text-[16px] font-normal leading-[115%] tracking-[0.18px] text-blue-80" >Ordering a Domain: Find the Right Domain?</p>
                        <img src="../../../assets/svgs/right-arrow-blue.svg" class="w-[14px] ml-2.5" alt="Arrow">
                    </div>
                </router-link>
                <router-link to="#">
                    <div class="flex mt-4" >
                        <p class="lg:text-lg text-[16px] font-normal leading-[115%] tracking-[0.18px] text-blue-80" >Email Accounts for Your Domain?</p>
                        <img src="../../../assets/svgs/right-arrow-blue.svg" class="w-[14px] ml-2.5" alt="Arrow">
                    </div>
                </router-link>
            </div>
        </div>

        <div class="2xl:max-w-[934px] w-full grow mt-[60px] lg:mb-0 mb-[150px] 2xl:mt-0" >
            <div class="rounded-[9px] border overflow-hidden border-light-white-blue dark:border-light-white-8" >
                <div class="py-[13px] px-[18px] border border-light-white-blue dark:border-light-white-8 bg-light-white-blue-8 flex shadow-light-white dark:shadow-light-black" >
                    <img src="../../../assets/svgs/server-cloud.svg" alt="Cloud">
                    <p class="lg:text-xl text-[18px] font-medium leading-[150%] text-primary dark:text-white ml-3" >Server & Cloud Infrastructure</p>
                </div>
                <div>
                    <Collapse :list-item="faqList" btn-text="lg:text-[18px] text-[16px]" />
                </div>
            </div>
            <div class="rounded-[9px] border overflow-hidden border-light-white-blue dark:border-light-white-8 my-10" >
                <div class="py-[13px] px-[18px] border border-light-white-blue dark:border-light-white-8 bg-light-white-blue-8 flex shadow-light-white dark:shadow-light-black" >
                    <img src="../../../assets/svgs/server-cloud.svg" alt="Cloud">
                    <p class="lg:text-xl text-[18px] font-medium leading-[150%] text-primary dark:text-white ml-3" >Domain</p>
                </div>
                <div>
                    <Collapse :list-item="faqListDomain" btn-text="lg:text-[18px] text-[16px]" />
                </div>
            </div>
            <div class="rounded-[9px] border overflow-hidden border-light-white-blue dark:border-light-white-8" >
                <div class="py-[13px] px-[18px] border border-light-white-blue dark:border-light-white-8 bg-light-white-blue-8 flex shadow-light-white dark:shadow-light-black" >
                    <img src="../../../assets/svgs/server-cloud.svg" alt="Cloud">
                    <p class="lg:text-xl text-[18px] font-medium leading-[150%] text-primary dark:text-white ml-3" >Web Security</p>
                </div>
                <div>
                    <Collapse :list-item="faqListSeq" btn-text="lg:text-[18px] text-[16px]" />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {reactive} from 'vue'
import Collapse from './Collapse.vue';
const faqList = reactive([
    {
      title: "Differences between Dedicated Server and Cloud Server?",
      disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
          
          Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
      `,
    },
    {
      title: "Dedicated Server: Troubleshooting?",
      disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
          
          Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
      `,
    },
    {
      title: "Forgot Root Password (Linux Dedicated Server)",
      disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
          
          Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
      `,
    },
    {
      title: "Reset the Root Password (Dedicated Server Linux)",
      disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
          
          Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
      `,
    },
    {
      title: "Recovering a Server from an Image",
      disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
          
          Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
      `,
    }
  ]);
const faqListDomain = reactive([
    {
      title: "Using Subdomains with Your Website?",
      disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
          
          Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
      `,
    },
    {
      title: "Set Up and Manage an External Domain at Server_ly?",
      disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
          
          Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
      `,
    },
    {
      title: "Domain Transfers to Server_ly: Quick and Easy?",
      disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
          
          Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
      `,
    },
    {
      title: "Ordering a Domain: Find the Right Domain?",
      disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
          
          Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
      `,
    },
    {
      title: "Domain Actions for Multiple Domains?",
      disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
          
          Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
      `,
    },
    {
      title: "Email Accounts for Your Domain?",
      disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
          
          Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
      `,
    }
  ]);
const faqListSeq = reactive([
    {
      title: "Server Blocked by the Server_ly Security Team",
      disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
          
          Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
      `,
    },
    {
      title: "Upgrading the Linux operating system and software",
      disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
          
          Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
      `,
    },
    {
      title: "Disable NTP monitoring",
      disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
          
          Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
      `,
    },
    {
      title: "Configuring DNS servers securely",
      disc: `It has long been found that when evaluating design and composition, readable text makes it difficult to concentrate. Lorem Ipsum is used because it provides more or less standard template padding, as well as actual distribution of letters and spaces in paragraphs, which is not obtained by simply duplicating "Here is your text ..
          
          Here is your text.. Here is your text.." Many web page layout programs and HTML editors use Lorem Ipsum as their default text, so searching for the keywords "lorem ipsum" immediately reveals how many web pages are still waiting for their real The text of Lorem Ipsum has received many versions over the years, some by mistake, some by design (for example, humorous versions).
      `,
    }
  ]);
</script>