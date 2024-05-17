import { createRouter, createWebHistory } from 'vue-router'


import { createApp } from 'vue'
import App from './App.vue'
import Main from './views/Main.vue';
import AllArticles from './views/AllArticles.vue';
import ByCategory from './views/ByCategory.vue';
import ByAuthor from './views/ByAuthor.vue';
import ByTitle from './views/ByTitle.vue';
import Detail from './views/Detail.vue';
import Contact from './views/Contact.vue';
import Login from './views/Login.vue';
import Register from './views/Register.vue';
import ResetPassword from './views/ResetPassword.vue';
import Create from './views/Create.vue';


const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', name: 'Main', component: Main },
        { path: '/all_articles', name: 'AllArticles', component: AllArticles },
        { path: '/by_category/:id', name: 'ByCategory', component: ByCategory },
        { path: '/by_author/:id', name: 'ByAuthor', component: ByAuthor },
        { path: '/by_title/:title', name: 'ByTitle', component: ByTitle },
        { path: '/detail/:id', name: 'Detail', component: Detail },
        { path: '/contact', name: 'Contact', component: Contact },
        { path: '/login', name: 'Login', component: Login },
        { path: '/resset_password', name: 'RessetPassword', component: ResetPassword },
        { path: '/register', name: 'Register', component: Register },
        { path: '/create', name: 'Create', component: Create },
    ]
});

const app = createApp(App)
app.use(router);
app.mount('#app')

