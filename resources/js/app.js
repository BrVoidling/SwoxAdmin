import './bootstrap';
import { createApp } from 'vue';
import { createPinia,  } from 'pinia';
import { createRouter, createWebHistory } from 'vue-router';

import App from './App.vue';
import Forms from './Pages/Forms.vue';
import Questions from './Pages/Questions.vue';

const router = createRouter({
    history: createWebHistory('/questionmaker'),
    routes: [
        { path: '/forms', component: Forms },
        { path: '/questions', component: Questions },
    ],
});

const app = createApp(App);

app.use(createPinia());
app.use(router);
app.mount('#app');
