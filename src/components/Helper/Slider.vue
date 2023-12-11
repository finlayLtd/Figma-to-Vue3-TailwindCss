<template>
  <div class="carousel2">
    <div
      class="border lg:mx-3 mx-1 border-[#171E261A] dark:border-white-8 rounded-[10px] p-3.5 flex flex-col justify-center items-center"
      v-for="(curr, ind) in data.filter((curr, ind) => ind < 3)"
    >
      <img :src="`/src/assets/svgs/${curr.svg}`" class="aspect-square" alt="" />

      <h5
        class="text-secondary dark:text-white text-center font-medium leading-[130%] line-clamp-1"
      >
        {{ curr.head }}
      </h5>
      <p
        class="text-secondary dark:text-white font-normal leading-[130%] -tracking-[0.16px] opacity-50 lg:mt-[3px] mt-[1.5px]"
      >
        Server
      </p>
    </div>
  </div>
  <div class="flex xl :mt-0 mt-6 xl:justify-between justify-center items-center">
    <div class="lg:mr-5 mr-2.5">
      <button @click="slideLeft()">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="25"
          viewBox="0 0 24 25"
          fill="none"
        >
          <path
            d="M11.0527 19L4.82953 13.7049C4.38373 13.3256 4.35764 12.6461 4.77304 12.2336L11.0527 6"
            stroke="#484E54"
            stroke-width="2"
            stroke-miterlimit="10"
          />
          <path
            d="M4.8893 13L20 13"
            stroke="#484E54"
            stroke-width="2"
            stroke-miterlimit="10"
          />
        </svg>
      </button>
    </div>
    <div class="carousel">
      <div
        class="border lg:mx-3 mx-1 border-[#171E261A] dark:border-white-8 rounded-[10px] p-3.5 flex flex-col justify-center items-center"
        v-for="(curr, ind) in data.filter((curr, ind) => ind < 7)"
      >
        <img
          :src="`/src/assets/svgs/${curr.svg}`"
          class="aspect-square"
          alt=""
        />

        <h5
          class="text-secondary dark:text-white text-center font-medium leading-[130%] line-clamp-1"
        >
          {{ curr.head }}
        </h5>
        <p
          class="text-secondary dark:text-white font-normal leading-[130%] -tracking-[0.16px] opacity-50 mt-[3px]"
        >
          Server
        </p>
      </div>
    </div>
    <div class="lg:ml-5 ml-2.5">
      <button @click="slideRight()">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="25"
          viewBox="0 0 24 25"
          fill="none"
        >
          <path
            d="M12.9482 6L19.1714 11.2951C19.6172 11.6744 19.6433 12.3539 19.2279 12.7664L12.9482 19"
            stroke="#484E54"
            stroke-width="2"
            stroke-miterlimit="10"
          />
          <path
            d="M19.1107 12H4"
            stroke="#484E54"
            stroke-width="2"
            stroke-miterlimit="10"
          />
        </svg>
      </button>
    </div>
  </div>
</template>

<script setup>
const slideRight = () => {
  let pushData = props.data.shift();
  props.data.push(pushData);
};

const slideLeft = () => {
  let pushData = props.data.pop();
  props.data.unshift(pushData);
};

const props = defineProps({
  data: {
    required: true,
  },
});
</script>

<style scoped>
.carousel {
  @apply xl:flex hidden justify-center items-center grow [&>*:nth-child(1)]:w-[115px] [&>*:nth-child(1)]:h-[138px] [&>*:nth-child(7)]:w-[115px] [&>*:nth-child(7)]:h-[138px] [&>*:nth-child(2)]:w-[135px] [&>*:nth-child(2)]:h-[150px] [&>*:nth-child(6)]:w-[135px] [&>*:nth-child(6)]:h-[150px] [&>*:nth-child(3)]:w-[145px] [&>*:nth-child(3)]:h-[166px] [&>*:nth-child(5)]:w-[145px] [&>*:nth-child(5)]:h-[166px] [&>*:nth-child(4)]:w-[175px] [&>*:nth-child(4)]:h-[181px] [&>*:nth-child(4)>h5]:text-[18px] [&>*:nth-child(4)>h5]:mt-[18px] [&>*:nth-child(1)>h5]:text-[14.5px] [&>*:nth-child(1)>h5]:mt-[14px] [&>*:nth-child(7)>h5]:text-[14.5px] [&>*:nth-child(7)>h5]:mt-[14px] [&>*:nth-child(2)>h5]:text-[15.5px] [&>*:nth-child(2)>h5]:mt-[15px] [&>*:nth-child(6)>h5]:text-[15.5px] [&>*:nth-child(6)>h5]:mt-[15px] [&>*:nth-child(3)>h5]:text-[17px] [&>*:nth-child(3)>h5]:mt-[16px] [&>*:nth-child(5)>h5]:text-[17px] [&>*:nth-child(5)>h5]:mt-[16px] [&>*:nth-child(4)]:shadow-[0_23px_64px_-12px_rgba(16,24,40,0.15)] [&>*:nth-child(4)]:border-[#F8F9FC] [&>*:nth-child(4)]:dark:border-[#f8f9fc14] [&>*:nth-child(4)]:dark:bg-white-8 [&>*:nth-child(4)>img]:w-[74px] [&>*:nth-child(1)>img]:w-[56px] [&>*:nth-child(7)>img]:w-[56px] [&>*:nth-child(2)>img]:w-[62px] [&>*:nth-child(6)>img]:w-[62px] [&>*:nth-child(3)>img]:w-[70px] [&>*:nth-child(5)>img]:w-[70px];
}
.carousel2 {
  @apply flex xl:hidden justify-center items-center grow [&>*:nth-child(1)]:w-[101px] [&>*:nth-child(3)]:w-[101px] [&>*:nth-child(2)]:w-[112px] [&>*:nth-child(1)>h5]:text-[12px] [&>*:nth-child(1)>h5]:mt-2.5 [&>*:nth-child(3)>h5]:text-[12px] [&>*:nth-child(3)>h5]:mt-2.5 [&>*:nth-child(2)>h5]:text-[13px] [&>*:nth-child(2)>h5]:mt-[11.5px]  [&>*:nth-child(2)]:shadow-[0_23px_64px_-12px_rgba(16,24,40,0.15)] [&>*:nth-child(2)]:border-[#F8F9FC] [&>*:nth-child(2)]:dark:border-[#f8f9fc14] [&>*:nth-child(2)]:dark:bg-white-8 [&>*:nth-child(1)>img]:w-[43px] [&>*:nth-child(3)>img]:w-[43px] [&>*:nth-child(2)>img]:w-[45px] ;
}
</style>
