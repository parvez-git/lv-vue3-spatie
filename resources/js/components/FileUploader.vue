<template>
    <div>
        <input type="file" accept="image/*" class="hidden" ref="file" @change="change">
        <img :src="src" alt="Image" class="h-40 w-40 rounded-lg object-cover">
        <button @click="browse()" class="px-4 py-2 border bg-green-600">browse</button>
        <button v-if="file" @click="remove()" class="px-4 py-2 border bg-red-300">remove</button>
    </div>
</template>

<script>
export default {
    props: {
        value: File,
        defaultSrc: String,
    },
    data() {
        return {
            src: this.defaultSrc,
            file: null
        }
    },
    methods: {
        browse() {
            this.$refs.file.click();
        },
        remove() {
            this.file = null;
            this.src = this.defaultSrc;
            this.$emit('input', this.file);
        },
        change(e) {
            this.file = e.target.files[0];
            this.$emit('input', this.file);

            let reader = new FileReader();
            reader.readAsDataURL(this.file);
            reader.onload = (e) => {
                this.src = e.target.result;
            }
        }
    }
}
</script>