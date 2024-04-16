<template>

    <!-- Features Start -->
    <div class="container-fluid features mb-2">
        <div class="container py-5">
            <div class="row g-4">
                <div v-for="article in first_articles" class="col-md-6 col-lg-6 col-xl-3">
                    <div class="row g-4 align-items-center features-item">
                        <div class="col-4">
                            <div class="rounded-circle position-relative">
                                <div class="overflow-hidden rounded-circle">
                                    <img v-bind:src="article.photo" class="img-zoomin img-fluid rounded-circle w-100"
                                        alt="">
                                </div>
                                <span
                                    class="rounded-circle border border-2 border-white bg-primary btn-sm-square text-white position-absolute"
                                    style="top: 10%; right: -10px;">{{ article.view }}</span>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="features-content d-flex flex-column">
                                <p class="text-uppercase mb-2">{{ article.categories }}</p>
                                <a href="#" class="h6">
                                    {{ article.title }}
                                </a>
                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i>{{
                                    article.created_at.slice(0, 10) }}</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Main Post Section Start -->
    <div class="container-fluid py-2">
        <div class="container py-5">
            <div class="row g-4">
                <div v-for="article in second_articles" class="col-lg-7 col-xl-8 mt-0">
                    <div class="position-relative overflow-hidden rounded">
                        <img v-bind:src="article.photo" class="img-fluid rounded img-zoomin w-100" alt="">
                        <div class="d-flex justify-content-center px-4 position-absolute flex-wrap"
                            style="bottom: 10px; left: 0;">
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-clock"></i> {{
                               article.created_at.slice(0, 10) }}</a>
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-eye"></i> {{ article.view }} Views</a>
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-comment-dots"></i> 05
                                Comment</a>

                        </div>
                    </div>
                    <div class="border-bottom py-3">
                        <a href="#" class="display-4 text-dark mb-0 link-hover">
                            {{ article.title }}
                        </a>
                    </div>
                    <p class="mt-3 mb-4">{{ article.body.slice(0,200) }}...
                    </p>

                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 pt-0">
                        <div class="row g-4">

                            <div v-for="article in third_articles" class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="" class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="#" class="h6">{{ article.title }}</a>
                                            <small><i class="fa fa-clock"> {{
                                                article.created_at.slice(0,10) }}</i> </small>
                                            <small><i class="fa fa-eye">  {{ article.view }} Views</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Post Section End -->

</template>


<script>
import axios from 'axios'

export default {
    data() {
        return {
            first_articles: null,
            second_articles: null,
            third_articles: null,
        }
    },
    async mounted() {
        let domain = await axios.get("../../data/url.txt");
        let response = await axios.get(domain.data + "random_articles");
        this.first_articles = await response.data.slice(0, 4)
        this.second_articles = await response.data.slice(4, 5)
        this.third_articles = await response.data.slice(4, -1)     
    },
};
</script>