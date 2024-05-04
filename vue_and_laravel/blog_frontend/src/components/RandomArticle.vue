<template>
    <!-- Features Start -->
    <div class="container-fluid features mb-2">
        <div class="container py-5">
            <div class="row g-4">
                <div v-for="article in articles" class="col-md-6 col-lg-6 col-xl-3">
                    <div class="row g-4 align-items-center features-item">
                        <div class="col-4">
                            <div class="rounded-circle position-relative">
                                <div class="overflow-hidden rounded-circle">
                                    <img :src="article.img" class="img-zoomin img-fluid rounded-circle w-100"
                                        alt="Image">
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
                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i>{{
                                    article.created_at.slice(0,10) }}</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Features End -->

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