import { createRouter, createWebHistory } from 'vue-router'


import { createApp } from 'vue'
import App from './App.vue'


const router = createRouter({
    history: createWebHistory(),
    routes: [
      
        // { path: '/food', component: Food },
    ]
});

const app = createApp(App)
app.use(router);
app.mount('#app')

