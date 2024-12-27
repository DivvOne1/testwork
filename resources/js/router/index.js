import { createRouter, createWebHistory } from 'vue-router';
import ChangeSetting from '../components/ChangeSetting.vue';

const routes = [
    {
        path: '/change-setting',
        component: ChangeSetting,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
