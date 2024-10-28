<script setup>
import { ref } from "vue";

const emit = defineEmits(["image"]);

const preview = ref(null);
const oversizeImage = ref(false);

const imageSelected = (e) => {
    preview.value = URL.createObjectURL(e.target.files[0]);
    oversizeImage.value = e.target.files[0].size > 3145728;
    emit("image", e.target.files[0]);
};
</script>

<template>
    <div>
        <span
            class="block text-sm font-medium text-slate-700 dark:text-slate-300"
            :class="{ ' !text-red-500': oversizeImage }"
        >
            {{
                oversizeImage
                    ? "The selected image exceeds 3Mb"
                    : "Image (Max size 3Mb)"
            }}
        </span>

        <label
            for="image"
            class="block rounded-md mt-1 bg-slate-300 h-[140px] overflow-hidden cursor-pointer border-slate-300 border"
            :class="{ ' !border-red-500': oversizeImage }"
        >
            <img
                :src="preview ?? '/storage/images/listing/default.png'"
                class="object-fit object-center h-full w-full"
                alt=""
                srcset=""
            />
        </label>

        <input
            @input="imageSelected"
            type="file"
            name="image"
            id="image"
            hidden
        />
    </div>
</template>
