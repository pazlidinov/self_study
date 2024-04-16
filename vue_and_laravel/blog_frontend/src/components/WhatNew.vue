<template>

    <!-- Most Populer News Start -->
    <div class="container-fluid populer-news py-2">
        <div class="container py-5">
            <div class="tab-class mb-4">
                <div class="row g-4">
                    <div class="col-lg-12 col-xl-12">
                        <div class="d-flex flex-column flex-md-row justify-content-md-between border-bottom mb-4">
                            <h1 class="mb-4">What’s New</h1>
                            <ul class="nav nav-pills d-inline-flex text-center">
                                <li v-for="category in categories":key='id' class="nav-item mb-3">
                                    <a 
                                        class="d-flex py-2 bg-light rounded-pill active me-2" data-bs-toggle="pill"
                                        href="#tab-1">
                                        <span class="text-dark" style="width: 100px;">{{ category.name }}</span>
                                    </a>
                                </li>

                            </ul>
                        </div>                   
                        <!-- <div class="tab-content mb-4">
                            <div id="tab-2" class="tab-pane fade show p-0 active">
                                <div class="row g-4">
                                    <div class="col-lg-8">
                                        <div class="position-relative rounded overflow-hidden">
                                            <img v-bind:src="main_article.photo"
                                                class="img-zoomin img-fluid rounded w-100" alt="">
                                            <div class="position-absolute text-white px-4 py-2 bg-primary rounded"
                                                style="top: 20px; right: 20px;">
                                                {{ category_name }}
                                            </div>
                                        </div>
                                        <div class="my-4">
                                            <a href="#" class="h4">{{ main_article.titile }}</a>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <a href="#" class="text-dark link-hover me-3"><i class="fa fa-clock"></i>{{
                                                main_article.created_at.slice(0, 10) }}</a>
                                            <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> {{
                                                main_article.view }}
                                                Views</a>
                                            <a href="#" class="text-dark link-hover me-3"><i
                                                    class="fa fa-comment-dots"></i> 05 Comment</a>

                                        </div>
                                        <p class="my-4">{{ main_article.body.slice(0, 200) }}...
                                        </p>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row g-4">
                                            <div v-for="child_article in child_articles" class="col-12">
                                                <div class="row g-4 align-items-center">
                                                    <div class="col-5">
                                                        <div class="overflow-hidden rounded">
                                                            <img v-bind:src="child_article.photo"
                                                                class="img-zoomin img-fluid rounded w-100" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="features-content d-flex flex-column">
                                                            <p class="text-uppercase mb-2">{{ category_name }}</p>
                                                            <a href="#" class="h6">{{ child_article.title }}</a>
                                                            <small class="text-body d-block"><i
                                                                    class="fas fa-calendar-alt me-1"></i>{{
                                                                        child_article.created_at.slice(0, 10) }}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 mt-4">
                                            <a href="#"
                                                class="link-hover btn border border-primary rounded-pill text-dark w-100 py-3 mb-4">View
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Most Populer News End -->   
    
</template>
<script>
import axios from 'axios'

export default {
    data() {
        return {
            categories: null,
            category_name: nuul,
            main_article: null,
            child_articles: null,
        }
    },
    // methods: {
    //     async article_by_category(id, name) {
    //         let domain = await axios.get("../../data/url.txt");
    //         let response = await axios.get(domain.data + "article_by_category/" + id);
    //         this.main_articles = await response.data.slice(0, 1);
    //         this.child_articles = await response.data.slice(1, -1);
    //         this.category_name = name;
    //         console.log(await response.data)

    //     }
    // },
    async mounted() {
        let domain = await axios.get("../../data/url.txt");
        let category_response = await axios.get(domain.data + "category");
        this.categories = await category_response.data;
        // article_by_category(this.categories[0].id, this.categories[0].name);

        // let article_response = await axios.get(domain.data + "article_by_category/" + this.categories[0].id);
        // this.main_articles = await article_response.data.slice(0, 1);
        // this.child_articles = await article_response.data.slice(1, -1);
        // this.categories = this.categories[0].name;
    },
};
</script>