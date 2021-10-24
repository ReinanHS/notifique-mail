<template>
    <app-layout title="Mailbox">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Caixa de email
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Inbox/>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import {defineComponent} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Inbox from "../../Components/Mail/Inbox";

export default defineComponent({
    components: {Inbox, AppLayout}
})
</script>

<style scoped>

</style>
