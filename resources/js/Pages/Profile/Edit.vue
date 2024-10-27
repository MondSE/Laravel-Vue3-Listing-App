<script setup>
import UpdateInfo from "./Section/UpdateInfo.vue";
import UpdatePassword from "./Section/UpdatePassword.vue";
import DeleteAccount from "./Section/DeleteAccount.vue";

defineProps({
    user: Object,
    status: String,
});
</script>

<template>
    <Head title="Profile" />
    <UpdateInfo :user="user" :status="status" />
    <UpdatePassword />
    <DeleteAccount />
</template>
