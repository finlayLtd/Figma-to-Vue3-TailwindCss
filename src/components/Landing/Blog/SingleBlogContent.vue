<template>
  <div
    class="container px-4 flex flex-col 2xl:flex-row-reverse justify-between mx-auto lg:pt-[150px] pt-[115px]"
  >
    <div class="2xl:max-w-[389px] w-full">
      <div class="flex justify-between items-center">
        <h3
          class="lg:text-[32px] text-[28px] font-bold leading-[45px] text-dark dark:text-white"
        >
          Filtres
        </h3>

        <span
          class="text-dark dark:text-white text-center dark:bg-white-5 bg-dark-5 lg:text-base text-[14px] font-medium leading-[150%] px-[11px] py-[7px] mr-1.5 rounded-[8px]"
          >1 criteria</span
        >
      </div>

      <div
        class="flex justify-between items-center w-full py-1.5 pl-3.5 pr-1.5 bg-white dark:shadow-input-dark dark:bg-white-5 border border-light-white-blue dark:border-light-white-blue-8 shadow-light-white rounded-[8px] mt-6 mb-[30px]"
      >
        <div class="flex items-center grow">
          <img
            src="../../../assets/svgs/search.svg"
            class="dark:brightness-[100]"
            alt="Search"
          />
          <input
            type="search"
            class="bg-transparent text-primary dark:text-white lg:text-base text-[15px] outline-0 mx-2.5 grow"
            placeholder="Search in our resources"
          />
        </div>
        <Btn
          bgColor="bg-[#026DEBB8]"
          textColor="text-white"
          text-size="text-[14px] lg:text-[15px]"
          border-color="border-0"
          >Search</Btn
        >
      </div>

      <div
        class="bg-[#F8F9FC] dark:bg-[#f8f9fc14] rounded-[8px] lg:px-4 px-3.5 lg:py-5 py-[18px]"
      >
        <p
          class="lg:text-xl text-[18px] font-bold leading-[90%] tracking-[0.2px] text-dark dark:text-white"
        >
          Category Topics
        </p>
        <div class="mb-5 mt-[13px] flex flex-wrap">
          <div
            class="text-center lg:text-base text-[15px] mt-3 font-medium leading-[150%] px-[11px] py-[7px] mr-2 rounded-[8px]"
            v-for="(tag, index) in filterTag"
            :class="[tag.bgColor, tag.textColor]"
          >
            {{ tag.name }}
          </div>
        </div>

        <Btn
          text-color="text-primary dark:text-white"
          bg-color="bg-white dark:bg-white-5"
          border-color="border border-white dark:border-white-5"
          class="w-full shadow-[0px_8px_32px_-12px_rgba(16,24,40,0.05)] dark:shadow-[0px_8px_32px_-12px_rgba(16,24,40,0.05)]"
          >View All</Btn
        >
      </div>

      <div class="mt-[30px] px-4 py-[9px]" >
        <h5 class="text-[22px] font-bold leading-[90%] tracking-[0.22px] text-primary dark:text-white pb-2" >Contents</h5>

        <p class="mt-4" v-for="i in 3" :key="i" >

            <RouterLink class="text-lg font-normal underline leading-[115%] tracking-[0.18px] text-blue-80" 
            to="#">Anything information. Episode {{ i }}</RouterLink>
        </p>
      </div>
    </div>

    <div
      class="2xl:max-w-[934px] w-full grow mt-[60px] lg:mb-0 mb-[150px] 2xl:mt-0"
    >
      <span
        class="text-white text-center lg:text-base text-[14px] font-medium leading-[150%] px-[11px] py-[7px] mr-1.5 rounded-[8px]"
        v-for="(tag, index) in blogTag"
        :class="tag.bgColor"
        >{{ tag.name }}</span
      >

      <h1
        class="lg:text-[54px] text-[38px] text-primary dark:text-white font-bold leading-[90%] tracking-[0.54px] mt-5 mb-9"
      >
        First Mover Americas: Ether-Bitcoin Ratio on Track for Monthly
      </h1>

      <img
        src="../../../assets/images/blog.png"
        class="w-full dark:brightness-[0] rounded-[8px] bg-[#F8F9FC] dark:bg-[#F8F9FC14]"
        alt="Blog"
      />

      <div>
        <div class="flex items-center justify-between my-[25px]">
          <div class="flex items-center">
            <img src="../../../assets/svgs/avtar.svg" alt="Avtar" />
            <p
              class="text-primary dark:text-white lg:text-lg text-[14px] font-bold leading-[140%] ml-2.5"
            >
              Dmitry Udodov
            </p>
          </div>
          <div class="flex items-center">
            <img
              src="../../../assets/svgs/watch.svg"
              class="mr-[5px] lg:max-w-auto max-w-[18px] dark:brightness-[100]"
              alt="Divider"
            />
            <p
              class="text-primary dark:text-white lg:text-lg text-[14px] font-medium leading-[140%]"
            >
              May 2, 2023
            </p>
          </div>
        </div>

        <hr class="lg:mb-[45px] mb-5 dark:opacity-10" />

        <h2
          class="lg:text-[32px] text-[20px] lg:mb-6 mb-[18px] font-bold leading-[90%] tracking-[0.32px] dark:text-white text-primary"
        >
          Anything information. Episode 1
        </h2>

        <p class="opacity-70 lg:text-lg text-[15px] font-normal leading-[160%] dark:text-white text-primary">
          It has long been found that when evaluating design and composition,
          readable text makes it difficult to concentrate. Lorem Ipsum is used
          because it provides more or less standard template padding, as well as
          actual distribution of letters and spaces in paragraphs, which is not
          obtained by simply duplicating "Here is your text ..
          <br/><br class="sm:block hidden" />

          Here is your text.. Here is your text.." Many web page layout programs
          and HTML editors use Lorem Ipsum as their default text, so searching
          for the keywords "lorem ipsum" immediately reveals how many web pages
          are still waiting for their real The text of Lorem Ipsum has received
          many versions over the years, some by mistake, some by design (for
          example, humorous versions).
        </p>

        <img
          src="../../../assets/images/blog.png"
          class="w-full dark:brightness-[0] rounded-[8px] lg:my-[55px] my-10 bg-[#F8F9FC] dark:bg-[#F8F9FC14]"
          alt="Blog"
        />

        <h2
          class="lg:text-[32px] text-[20px] lg:mb-6 mb-[18px] font-bold leading-[90%] tracking-[0.32px] dark:text-white text-primary"
        >
          Anything information. Episode 1
        </h2>

        <p
          class="opacity-70 lg:text-lg text-[15px] font-normal leading-[160%] dark:text-white text-primary whitespace-pre-line"
        >
          It has long been found that when evaluating design and composition,
          readable text makes it difficult to concentrate. Lorem Ipsum is used
          because it provides more or less standard template padding, as well as
          actual distribution of letters and spaces in paragraphs, which is not
          obtained by simply duplicating "Here is your text .. Here is your
          text.. Here is your text.." Many web page layout programs and HTML
          editors use Lorem Ipsum as their default text, so searching for the
          keywords "lorem ipsum" immediately reveals how many web pages are
          still waiting for their real The text of Lorem Ipsum has received many
          versions over the years, some by mistake, some by design (for example,
          humorous versions).
          <br/><br class="sm:block hidden" />
          It has long been found that when evaluating design
          and composition, readable text makes it difficult to concentrate.
          Lorem Ipsum is used because it provides more or less standard template
          padding, as well as actual distribution of letters and spaces in
          paragraphs, which is not obtained by simply duplicating "Here is your
          text .. Here is your text.. Here is your text.." It has long been
          found that when evaluating design and composition, readable text makes
          it difficult to concentrate. Lorem Ipsum is used because it provides
          more or less standard template padding, as well as actual distribution
          of letters and spaces in paragraphs, which is not obtained by simply
          duplicating "Here is your text ..
          <br/><br class="sm:block hidden" />
          Here is your text.. Here is your
          text.." Many web page layout programs and HTML editors use Lorem Ipsum
          as their default text, so searching for the keywords "lorem ipsum"
          immediately reveals how many web pages are still waiting for their
          real The text of Lorem Ipsum has received many versions over the
          years, some by mistake, some by design (for example, humorous
          versions).
        </p>

        <h2
          class="lg:text-[32px] text-[20px] lg:mb-6 mb-[18px] lg:mt-[55px] mt-10 font-bold leading-[90%] tracking-[0.32px] dark:text-white text-primary"
        >
          Anything information. Episode 1
        </h2>

        <p
          class="opacity-70 lg:text-lg text-[15px] font-normal leading-[160%] whitespace-pre-line dark:text-white text-primary"
        >
          It has long been found that when evaluating design and composition,
          readable text makes it difficult to concentrate. Lorem Ipsum is used
          because it provides more or less standard template padding, as well as
          actual distribution of letters and spaces in paragraphs, which is not
          obtained by simply duplicating "Here is your text .. Here is your
          text.. Here is your text.." Many web page layout programs and HTML
          editors use Lorem Ipsum as their default text, so searching for the
          keywords "lorem ipsum" immediately reveals how many web pages are
          still waiting for their real The text of Lorem Ipsum has received many
          versions over the years, some by mistake, some by design (for example,
          humorous versions).
          <br/><br class="sm:block hidden" />
          It has long been found that when evaluating design
          and composition, readable text makes it difficult to concentrate.
          Lorem Ipsum is used because it provides more or less standard template
          padding, as well as actual distribution of letters and spaces in
          paragraphs, which is not obtained by simply duplicating "Here is your
          text .. Here is your text.. Here is your text.." It has long been
          found that when evaluating design and composition, readable text makes
          it difficult to concentrate. Lorem Ipsum is used because it provides
          more or less standard template padding, as well as actual distribution
          of letters and spaces in paragraphs, which is not obtained by simply
          duplicating "Here is your text ..
          <br/><br class="sm:block hidden" />
          Here is your text.. Here is your
          text.." Many web page layout programs and HTML editors use Lorem Ipsum
          as their default text, so searching for the keywords "lorem ipsum"
          immediately reveals how many web pages are still waiting for their
          real The text of Lorem Ipsum has received many versions over the
          years, some by mistake, some by design (for example, humorous
          versions).
        </p>
      </div>

      
    </div>
  </div>

  <div class="lg:mt-[150px] mb-[150px] -mt-[50px] lg:mb-0 px-4 container mx-auto" >
        <h2 class="lg:text-[42px] text-[34px] font-bold leading-[90%] tracking-[0.42px] dark:text-white text-primary mb-[35px]" >Related Articles</h2>

        <div class="grid lg:grid-cols-3 gap-[18px] lg:gap-x-[34px]">
        <div
          class="relative"
          v-for="(blog, index) in blogItem"
          :key="index"
        >
          <img
            src="../../../assets/images/blog.png"
            class="w-full dark:brightness-[0] rounded-[8px] max-h-[310px] object-contain bg-[#F8F9FC] dark:bg-[#F8F9FC14]"
            alt="Blog"
          />
          <div class="absolute top-0 m-3.5">
            <span
              class="text-white text-center lg:text-base text-[14px] font-medium leading-[150%] px-[11px] py-[7px] mr-1.5 rounded-[8px]"
              v-for="(tag, index) in blog.hosting"
              :class="tag.bgColor"
              >{{ tag.name }}</span
            >
          </div>
          <div class="px-1.5">
            <div class="flex items-center mt-5 mb-3">
              <img src="../../../assets/svgs/avtar.svg" alt="Avtar" />
              <p
                class="text-primary dark:text-white lg:text-[15px] text-[14px] font-medium leading-[130%] tracking-[0.3px] ml-1.5"
              >
                {{ blog.user }}
              </p>
              <img
                src="../../../assets/svgs/divider.svg"
                class="mx-2.5 dark:brightness-[100]"
                alt="Divider"
              />
              <p
                class="text-primary dark:text-white lg:text-[15px] text-[14px] font-normal leading-[130%] tracking-[0.3px] opacity-50"
              >
                {{ blog.date }}
              </p>
            </div>
            <h4
              class="text-primary dark:text-white lg:text-[22px] text-[18px] font-bold leading-[120%] tracking-[0.22px]"
            >
              {{ blog.title }}
            </h4>

            <p
              class="text-primary dark:text-white lg:text-base text-[15px] font-normal leading-[130%] tracking-[0.32px] opacity-70 mt-2"
            >
              {{ blog.caption }}
            </p>
          </div>
        </div>
      </div>
      </div>
</template>

<script setup>
import { reactive } from "vue";
import Btn from "../../Helper/Btn.vue";

const getImageUrl = (name) => {
  return new URL(name, import.meta.url).href;
};

const blogTag = reactive([
  {
    name: "News",
    bgColor: "bg-[#1F75F6]",
  },
  {
    name: "Crypto",
    bgColor: "bg-[#BD39FC]",
  },
]);

const blogItem = reactive([
  {
    img: "blog.png",
    hosting: [
      {
        name: "Hosting",
        bgColor: "bg-[#FD3C3C]",
      },
    ],
    avtar: "avtar.svg",
    user: "Dmitry Udodov",
    date: "May 2, 2023",
    title: "First Mover Americas: Ether-Bitcoin Ratio on Track for Monthly",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized methods.",
  },
  {
    img: "blog.png",
    hosting: [
      {
        name: "News",
        bgColor: "bg-[#1F75F6]",
      },
      {
        name: "Crypto",
        bgColor: "bg-[#BD39FC]",
      },
    ],
    avtar: "avtar.svg",
    user: "Dmitry Udodov",
    date: "May 2, 2023",
    title: "First Mover Americas: Ether-Bitcoin Ratio on Track for Monthly",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized methods.",
  },
  {
    img: "blog.png",
    hosting: [
      {
        name: "News",
        bgColor: "bg-[#1F75F6]",
      },
      {
        name: "Crypto",
        bgColor: "bg-[#BD39FC]",
      },
    ],
    avtar: "avtar.svg",
    user: "Dmitry Udodov",
    date: "May 2, 2023",
    title: "First Mover Americas: Ether-Bitcoin Ratio on Track for Monthly",
    caption:
      "«Servervy» protects your funds with both centralized and decentralized methods.",
  },
]);

const filterTag = reactive([
  {
    name: "Crypto",
    bgColor: "bg-[#BD39FC]",
    textColor: "text-white",
  },
  {
    name: "News",
    bgColor: "bg-[#1F75F71A]",
    textColor: "text-blue",
  },
  {
    name: "Hosting",
    bgColor: "bg-[#FD3C3C1A]",
    textColor: "text-tomato",
  },
  {
    name: "Culture",
    bgColor: "bg-[#11CD0E1A]",
    textColor: "text-[#11CD0E]",
  },
  {
    name: "Cloud Education",
    bgColor: "bg-[#00BFFB1A]",
    textColor: "text-[#00BFFB]",
  },
  {
    name: "Money",
    bgColor: "bg-[#0AE1A11A]",
    textColor: "text-[#0AE1A1]",
  },
  {
    name: "Community",
    bgColor: "bg-[#FF94321A]",
    textColor: "text-[#FF9432]",
  },
]);
</script>
