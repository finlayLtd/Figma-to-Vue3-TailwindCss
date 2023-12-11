<template>
  <div class="xl:flex block h-screen">
    <div class="xl:max-w-[700px] flex flex-col w-full xl:py-10 py-4 h-full dark:bg-[#1C1D20]">
      <img
        src="../../assets/svgs/logo.svg"
        class="mx-auto min-w-[110px] dark:hidden block"
        alt="logo"
      />
      <img
        src="../../assets/svgs/logo-white.svg"
        class="mx-auto min-w-[110px] hidden dark:block"
        alt="logo"
      />
      <div class="grow flex">
        <div class="mx-auto my-auto">
          <slot name="body" />
        </div>
      </div>
      <slot name="bottom" />
    </div>
    <div class="grow xl:block hidden">
      <img
        src="../../assets/images/auth.png"
        class="h-full w-full object-cover"
        alt="Auth"
      />
    </div>
  </div>
</template>
