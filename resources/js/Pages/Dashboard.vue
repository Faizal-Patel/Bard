<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref, onMounted } from 'vue';
import { useSessionStorage } from '@/utils/useSessionStorage.js';

const ipAddress = ref('');
const apiKey = useSessionStorage('apiKey', '');
const selectedWork = useSessionStorage('selectedWork', '');
const selectedAct = useSessionStorage('selectedAct', 1);
const selectedScene = useSessionStorage('selectedScene', 1);
const works = ref([]);
const paragraphs = useSessionStorage('paragraphs', []);
const error = ref('');

onMounted(async () => {
    try {
        const response = await fetch('/user-ip');
        const data = await response.json();
        ipAddress.value = data.ip;

        const worksResponse = await fetch('/api/works');
        works.value = await worksResponse.json();
    } catch (err) {
        console.error('Error fetching data:', err);
    }
});

const fetchParagraphs = async () => {
    try {
        const response = await fetch(`/fetch-paragraphs?token=${apiKey.value}&work=${selectedWork.value}&act=${selectedAct.value}&scene=${selectedScene.value}`);
        if (response.status === 403) {
            error.value = 'Invalid API token';
            paragraphs.value = [];
        } else {
            error.value = '';
            paragraphs.value = await response.json();
        }
    } catch (err) {
        console.error('Error fetching paragraphs:', err);
    }
};
</script>

<template>
    <AppLayout title="MyDash">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Dashboard
            </h2>
        </template>

        <br><br><div class="ip-container">
            <p>Current IP Address: {{ ipAddress }}</p>
        </div><br><br><br>

        <div class="form-container">
            <form @submit.prevent="fetchParagraphs" class="form-horizontal">
                <div class="form-item">
                    <label for="api-key">API Key:</label>
                    <input type="text" v-model="apiKey" id="api-key" required>
                </div>
                <div class="form-item">
                    <label for="work">Select Work:</label>
                    <select v-model="selectedWork" id="work" required>
                        <option v-for="work in works" :key="work.work_id" :value="work.work_id">{{ work.work_long_title }}</option>
                    </select>
                </div>
                <div class="form-item">
                    <label for="act">Select Act:</label>
                    <select v-model="selectedAct" id="act" required>
                        <option v-for="n in 5" :key="n" :value="n">Act {{ n }}</option>
                    </select>
                </div>
                <div class="form-item">
                    <label for="scene">Select Scene:</label>
                    <select v-model="selectedScene" id="scene" required>
                        <option v-for="n in 5" :key="n" :value="n">Scene {{ n }}</option>
                    </select>
                </div><br><br>
                <div class="form-item">
                    <button type="submit" class="submit-button">Search</button>
                </div>
            </form><br><br>

            <div v-if="error">
                <p style="color: red;">{{ error }}</p>
            </div>

            <div v-if="paragraphs.length" class="paragraph-container">
                <div class="paragraph" v-for="paragraph in paragraphs" :key="paragraph.par_id">
                    <p class="character-name" v-if="paragraph.char_name"><strong>{{ paragraph.char_name }}:</strong></p>
                    <p v-if="paragraph.par_char_id === 'xxx'" class="stage-directions">{{ paragraph.par_text }}</p>
                    <p v-else>{{ paragraph.par_text }}</p>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
.ip-container {
    text-align: left;
    margin-bottom: 1em;
    width: 100%;
    max-width: 1000px;
    margin: 0 auto;
}

.ip-container p {
    text-decoration: underline;
    margin: 0;
}

.form-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}

.form-horizontal {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1em;
    margin-bottom: 1em;
    width: 100%;
    max-width: 1000px;
}

.form-item {
    flex: 1 1 200px;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-width: 200px;
}

.form-item label {
    margin-bottom: 0.5em;
}

.form-item input,
.form-item select {
    width: 100%;
    padding: 0.5em;
    box-sizing: border-box;
    background-color: #f1f1f1; /* Light background color for inputs */
    border: 1px solid #ccc; /* Border for inputs */
    border-radius: 4px; /* Rounded corners */
    color: #333; /* Text color */
}

.submit-button {
    padding: 0.3em 0.6em; /* Smaller padding for a smaller button */
    margin-top: 1em;
    align-self: center;
    background-color: #4A90E2;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 0.9em; /* Smaller font size */
    width: auto;
}

.submit-button:hover {
    background-color: #357ABD;
}

.paragraph-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    max-width: 1000px;
    margin: 0 auto;
}

.paragraph {
    background-color: #2c2c2c; /* Dark background for paragraphs */
    color: #ffffff; /* White text for paragraphs */
    padding: 1em;
    margin: 1em 0;
    border-radius: 8px;
    width: 100%;
    max-width: 800px;
    position: relative;
}

.character-name {
    color: #ffcc00; /* Highlighted color for character names */
    margin-bottom: 0.5em;
}

.stage-directions {
    color: #ffcc00; /* Highlighted color for stage directions */
    font-style: italic; /* Italicize stage directions */
}

.paragraph p {
    margin: 0;
}

@media (max-width: 768px) {
    .form-horizontal {
        flex-direction: column;
        align-items: stretch;
    }
    .form-item {
        flex: 1 1 100%;
    }
    .paragraph {
        width: 90%; /* Make paragraphs responsive */
    }
}
</style>
