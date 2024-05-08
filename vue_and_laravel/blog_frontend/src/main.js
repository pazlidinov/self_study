import { createRouter, createWebHistory } from 'vue-router'


import { createApp } from 'vue'
import App from './App.vue'
import Main from './views/Main.vue';
import AllArticles from './views/AllArticles.vue';
import ByCategory from './views/ByCategory.vue';
import ByAuthor from './views/ByAuthor.vue';


const router = createRouter({
    history: createWebHistory(),
    routes: [

        { path: '/', name: 'Main', component: Main },
        { path: '/all_articles', name: 'AllArticles', component: AllArticles },
        { path: '/by_category/:id', name: 'ByCategory', component: ByCategory },
        { path: '/by_author/:id', name: 'ByAuthor', component: ByAuthor },
    ]
});

const app = createApp(App)
app.use(router);
app.mount('#app')

