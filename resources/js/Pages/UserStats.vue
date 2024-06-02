<template>
    <AppLayout title="MyHistory">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                History
            </h2>
        </template>

        <div v-if="stats.length">
            <ul>
                <li v-for="stat in stats" :key="stat.id" class="mb-2">
                    <strong>{{ stat.work_title }}</strong> - Act {{ stat.act }}, Scene {{ stat.scene }} <br>
                    IP: {{ stat.ip_address }} <br>
                    Date: {{ new Date(stat.created_at).toLocaleString() }} <br>
                    Preview: {{ stat.preview }}
                </li>
            </ul>
        </div>
        <div v-else>
            <p>No search history available.</p>
        </div>
    </AppLayout>
</template>

<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { usePage } from '@inertiajs/vue3';

const { props } = usePage();
const stats = ref(props.stats);
</script>

<style scoped>
ul {
    list-style-type: none;
    padding: 0;
}

li {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    margin-bottom: 10px;
    background-color: #f9f9f9;
}

li strong {
    display: block;
    font-size: 1.2em;
    margin-bottom: 5px;
}
</style>
