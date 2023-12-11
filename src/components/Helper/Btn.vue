<template>
    <button :type="type" class=" font-medium" :disabled="disabled"
        :class="[bgColor , borderColor , textColor , textSize , btnPadding , rounded]"
    >
        <slot/>
    </button>
</template>

<script setup>
    const props = defineProps(
        {
            bgColor : {
                default : 'bg-white'
            } ,

            borderColor : {
                default : 'border border-light'
            } , 

            textColor : {
                default : 'text-primary'
            },

            textSize : {
                default : 'text-[15px]'
            },

            btnPadding : {
                default : 'py-1.5 px-4'
            },
            rounded : {
                default : 'rounded-[7px]'
            },
            type : {
                default : 'button'
            },
            disabled : {
                default : false
            }
        }
    )
</script>