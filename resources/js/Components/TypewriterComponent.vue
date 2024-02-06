<script setup>
import {reactive, ref} from 'vue';

const props = defineProps({
    typedValueClasses: String,
    displayTextArray: Array
});

const typeValue = ref('');
const typeStatus = ref(false);
const reactiveDisplayTextArray = reactive(props.displayTextArray);
const typingSpeed = ref(100);
const erasingSpeed = ref(50);
const newTextDelay = ref(4000);
const displayTextArrayIndex = ref(0);
const charIndex = ref(0);

const typeText = function () {
    if (charIndex.value < reactiveDisplayTextArray[displayTextArrayIndex.value].length) {
        if (!typeStatus.value) typeStatus.value = true;
        typeValue.value += reactiveDisplayTextArray[displayTextArrayIndex.value].charAt(
            charIndex.value
        );
        charIndex.value += 1;
        setTimeout(typeText, typingSpeed.value);
    } else {
        typeStatus.value = false;
        setTimeout(eraseText, newTextDelay.value);
    }
}

const eraseText = function () {
    if (charIndex.value > 0) {
        if (!typeStatus.value) typeStatus.value = true;
        typeValue.value = reactiveDisplayTextArray[displayTextArrayIndex.value].substring(
            0,
            charIndex.value - 1
        );
        charIndex.value -= 1;
        setTimeout(eraseText, erasingSpeed.value);
    } else {
        typeStatus.value = false;
        displayTextArrayIndex.value += 1;
        if (displayTextArrayIndex.value >= reactiveDisplayTextArray.length)
            displayTextArrayIndex.value = 0;
        setTimeout(typeText, typingSpeed.value + 1000);
    }
}

setTimeout(typeText, 500);
</script>

<template>
    <p v-bind="$attrs">
        <slot/>
        <span class="typed-text" :class="typedValueClasses">{{ typeValue }}</span>
    </p>
</template>
