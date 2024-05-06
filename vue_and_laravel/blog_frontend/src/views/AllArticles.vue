<template>
    <!-- Single Product Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <ol class="breadcrumb justify-content-start mb-4">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active text-dark">Articles</li>
            </ol>
            <div class="row g-4">
                <div v-for="article in articles" class="col-lg-7">
                    <div class=" row bg-light rounded mb-3">
                        <div class=" col-md-4 p-3 rounded overflow-hidden">
                            <img v-bind:src="article.img" class="img-zoomin img-fluid rounded w-100" alt="">
                        </div>

                        <div class="col-md-8 d-flex flex-column p-4">
                            <a href="#" class="h4">{{ article.title }}</a>
                            <p>{{ article.body.slice(0, 150) }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="small text-body link-hover">{{ article.user_id.full_name }}</a>
                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i>
                                    {{ article.created_at.slice(0, 10) }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="p-3 rounded border">
                                <div class="input-group w-100 mx-auto d-flex mb-4">
                                    <input type="search" class="form-control p-3" placeholder="keywords"
                                        aria-describedby="search-icon-1">
                                    <span id="search-icon-1" class="btn btn-primary input-group-text p-3"><i
                                            class="fa fa-search text-white"></i></span>
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
        }
    },
    async mounted() {
        let domain = await axios.get("../../data/url.txt");
        let response = await axios.get(domain.data + "article");
        this.articles = await response.data.data;
    },

};
</script>