<template>
    <h4 class="my-4">News</h4>
    <div class="row g-4">
        <div v-for="article in articles" class="col-12">
            <div class="row g-4 align-items-center features-item">
                <div class="col-4">
                    <div class="rounded-circle position-relative">
                        <div class="overflow-hidden rounded-circle">
                            <img v-bind:src="article.img" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                        </div>
                        <span
                            class="rounded-circle border border-2 border-white bg-primary btn-sm-square text-white position-absolute"
                            style="top: 10%; right: -10px;">{{ article.view }}</span>
                    </div>
                </div>
                <div class="col-8">
                    <div class="features-content d-flex flex-column">
                        <p class="text-uppercase mb-2">{{ article.category_id.name }}</p>
                        <a href="#" class="h6">
                           {{ article.title }}
                        </a>
                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> {{ article.created_at.slice(0,10) }}</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col-lg-12">
            <a href="#" class="link-hover btn border border-primary rounded-pill text-dark w-100 py-3 mb-4">View
                More</a>
        </div> -->

    </div>
</template>


<script>
import axios from 'axios'

export default {
    data() {
        return {
            articles: null,
        }
    },
    async mounted() {
        let domain = await axios.get("../../data/url.txt");
        let response = await axios.get(domain.data + "random_articles");
        this.articles = await response.data.data;
    },

};
</script>