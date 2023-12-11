<script setup>
import Btn from "../../Helper/Btn.vue";
</script>

<template>
  <section class="lg:h-[760px] h-[640px] overflow-hidden relative">
    <video autoplay loop muted class="absolute bottom-0 xl:h-auto h-full object-cover">
      <source src="../../../assets/landing/d-hero.mp4" type="video/mp4" />
    </video>
    <div class="bg-[url('../assets/images/d-hero-shad.png')] bg-no-repeat bg-[length:100%_100%] grid place-items-center h-full absolute top-0 left-0 right-0 px-4">
      <div
        class="container md:pt-0 pt-[120px] mx-auto md:max-w-[822px] w-full"
      >
          <h1
            class="text-center text-white xl:text-[72px] text-[39px] font-medium md:leading-[90%] leading-[100%] tracking-[0.72px]"
          >
          Hit the Jackpot and Easily Use Windows 10 VPS High Performance
          </h1>
          <p
            class="opacity-70 text-white xl:text-[19px] text-base text-center md:mx-0 mx-[7.5px] font-thin leading-[150%] tracking-[150%] mt-6 mb-[34px]"
          >
          Cloudzy's Windows 10 VPS performance unleashes your true power. Master the undefeated next-gen technology at your fingertips. Dominate with Windows 10 VPS, at $7.95!
          </p>

          <div class="flex  justify-center">
            <Btn
              bg-color="bg-blue"
              text-color="text-white"
              border-color="border border-blue"
              class="flex items-center ml-2.5"
              text-size="text-[18px]"
            >
            Starting from $12.50
              <img
                src="../../../assets/svgs/right-arrow.svg"
                class="ml-2"
                alt=""
              />
            </Btn>
          </div>
      </div>
    </div>
  </section>
</template>
