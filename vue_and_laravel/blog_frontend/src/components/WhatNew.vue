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
                                <li v-for="category in categories" class="nav-item mb-3">
                                    <a class="d-flex py-2 bg-light rounded-pill  me-2" data-bs-toggle="pill"
                                        href="#tab-{{ category.id }}">
                                        <span class="text-dark" style="width: 100px;">{{ category.name }}</span>
                                    </a>
                                </li>                              
                            </ul>
                        </div>
                        <div v-for="article in articles" class="tab-content mb-4">
                            <div id="tab-{{ article.category }}" class="tab-pane fade show p-0 active">
                                <div class="row g-4">
                                    <div class="col-lg-8">
                                        <div class="position-relative rounded overflow-hidden">
                                            <img src="" class="img-zoomin img-fluid rounded w-100" alt="">
                                            <div class="position-absolute text-white px-4 py-2 bg-primary rounded"
                                                style="top: 20px; right: 20px;">
                                                Sports
                                            </div>
                                        </div>
                                        <div class="my-4">
                                            <a href="#" class="h4">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry.</a>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <a href="#" class="text-dark link-hover me-3"><i class="fa fa-clock"></i> 06
                                                minute read</a>
                                            <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> 3.5k
                                                Views</a>
                                            <a href="#" class="text-dark link-hover me-3"><i
                                                    class="fa fa-comment-dots"></i> 05 Comment</a>
                                            <a href="#" class="text-dark link-hover"><i class="fa fa-arrow-up"></i> 1.5k
                                                Share</a>
                                        </div>
                                        <p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has
                                            been the industry's standard dummy..
                                        </p>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row g-4">
                                            <div v-for="item in article.article" class="col-12">
                                                <div class="row g-4 align-items-center">
                                                    <div class="col-5">
                                                        <div class="overflow-hidden rounded">
                                                            <img v-bind:src="item.img"
                                                                class="img-zoomin img-fluid rounded w-100" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="features-content d-flex flex-column">
                                                            <p class="text-uppercase mb-2">{{ item.category_id.name }}</p>
                                                            <a href="#" class="h6">{{ item.title }}</a>
                                                            <small class="text-body d-block"><i
                                                                    class="fas fa-calendar-alt me-1"></i> Dec 9,
                                                                2024</small>
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
                           
                        </div>
                        

                        <div class="col-lg-12 mt-4">
                            <a href="#"
                                class="link-hover btn border border-primary rounded-pill text-dark w-100 py-3 mb-4">View
                                More</a>
                        </div>

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
            articles: null,
        }
    },

    async mounted() {
        let domain = await axios.get("../../data/url.txt");
        let response = await axios.get(domain.data + "whatnew");
        this.categories = response.data.categories;
        this.articles = response.data.articles;
        console.log(this.articles)
    }
};
</script>