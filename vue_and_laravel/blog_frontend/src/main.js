import { createRouter, createWebHistory } from 'vue-router'


import { createApp } from 'vue'
import App from './App.vue'
import Main from './views/Main.vue';


const router = createRouter({
    history: createWebHistory(),
    routes: [
      
        { path: '/', component: Main },
    ]
});

const app = createApp(App)
app.use(router);
app.mount('#app')

