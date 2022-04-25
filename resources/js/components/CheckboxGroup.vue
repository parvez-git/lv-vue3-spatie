<template>
    <label :for="fieldId" class="flex items-center space-x-2 text-theme-color text-sm font-medium cursor-pointer">
        <input 
            @input="check()"
            type="checkbox"
            :checked="checked"
            :id="fieldId"
            v-bind="$attrs"
            :label="label" 
            class="w-4 h-4 cursor-pointer">
        <span>{{ label }}</span>
    </label>
</template>

<script>
import { computed } from "vue";

export default {
  emits: ["update:names"],
    props: {
        value: {
            type: Number,
            required: true,
        },
        fieldId: {
            type: String,
            required: true,
        },
        names: {
            type: Array,
            required: true,
        },        
        label: {
            type: String,
            required: true,
        },
    },
    setup(props, context) {
        const checked = computed(() => props.names.includes(props.value));

        function check() {
            let updatedNames = [...props.names];
            if (this.checked) {
                updatedNames.splice(updatedNames.indexOf(props.value), 1);
            } else {
                updatedNames.push(props.value);
            }
            context.emit("update:names", updatedNames);
        }

        return {
            checked,
            check,
        };
    },
};
</script>