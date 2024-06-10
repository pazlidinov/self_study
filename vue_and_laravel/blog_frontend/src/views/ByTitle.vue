<template>
    <!-- Single Product Start -->
    <div class="container-fluid py-3">
        <div class="container py-3">
            <ol class="breadcrumb justify-content-start mb-4">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active text-dark">Articles</li>
            </ol>
            <div class="row g-4">
                <div class="col-lg-7">
                    <div v-for="article in articles" class=" row bg-light rounded mb-3">
                        <div class=" col-md-4 p-3 rounded overflow-hidden">
                            <img v-bind:src="article.img" class="img-zoomin img-fluid rounded w-100" alt="">
                        </div>

                        <div class="col-md-8 d-flex flex-column p-4">
                            <router-link v-bind:to="'/detail/' + article.id"  class="h4">{{ article.title }}</router-link>
                            <p>{{ article.body.slice(0, 150) }}</p>
                            <div class="d-flex justify-content-between">
                                <router-link v-bind:to="'/by_author/' + article.user_id.id"
                                    class="small text-body link-hover">{{ article.user_id.full_name }}</router-link>
                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i>
                                    {{ article.created_at.slice(0, 10) }}</small>
                            </div>
                        </div>
                    </div>
                    <!-- Paging -->
                    <div class="text-start py-4">
                        <div class="custom-pagination">
                            <button v-on:click="laodpage(prev)" class="prev">Prevue</button>
                            <button v-for="page in pages" v-on:click="laodpage(page.url)"
                                :class="[page.active ? 'active' : '']">{{ page.label }} </button>

                            <button v-on:click="laodpage(next)" class="next">Next</button>
                        </div>
                    </div><!-- End Paging -->
                </div>
                <div class="col-lg-4">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="p-3 rounded border">
                                <div class="input-group w-100 mx-auto d-flex mb-4">
                                    <input type="search" v-model="title" class="form-control p-3" placeholder="keywords"
                                        aria-describedby="search-icon-1">
                                        <button v-on:click="redirect_title" id="search-icon-1" class="btn btn-primary input-group-text p-3"><i
                                            class="fa fa-search text-white"></i></button>
                                </div>
                                <categories />
                                <news />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Product End -->
</template>


<script>
import Categories from '@/components/Categories.vue';
import News from '@/components/News.vue';
import axios from 'axios'

export default {
    components: {
        'categories': Categories,
        'news': News,
    },
    data() {
        return {
            articles: null,
            prev: null,
            next: null,
            pages: null,
            title: null
        }
    },
    async mounted() {
        let domain = await axios.get("../../data/url.txt");
        let response = await axios.get(domain.data + "by_title/" + this.$route.params.title);
        this.articles = await response.data.data;
        this.prev = await response.data.links.prev;
        this.next = await response.data.links.next;
        this.pages = await response.data.meta.links.slice(1, -1);
    },
    methods: {
        async laodpage(url) {
            if (url != null) {
                let response = await axios.get(url);
                this.articles = await response.data.data;
                this.prev = await response.data.links.prev;
                this.next = await response.data.links.next;
                this.pages = await response.data.meta.links.slice(1, -1);
            }
        },
        redirect_title(){
            if ( window.location.href.indexOf('by_title')!=-1){
                window.location.href = this.title;
            }
            else{
                window.location.href ='by_title/'+ this.title;
            }     
        },
    },
};
</script>