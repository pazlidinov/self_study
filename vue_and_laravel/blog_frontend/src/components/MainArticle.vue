<template>
    <!-- Main Post Section Start -->
    <div class="container-fluid py-2">
        <div class="container py-5">
            <div class="row g-4">
                <div v-for="first_section in first_section"  class="col-lg-7 col-xl-8 mt-0">
                    <div class="position-relative overflow-hidden rounded">
                        <img  class="img-fluid rounded img-zoomin w-100" alt="">
                        <div class="d-flex justify-content-center px-4 position-absolute flex-wrap"
                            style="bottom: 10px; left: 0;">
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-eye"></i> {{
                                first_section.view }} Views</a>
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-comment-dots"></i> {{ first_section.comments.length }}
                                Comment</a>
                        </div>
                    </div>
                    <div class="border-bottom py-3">
                        <a href="#" class="display-4 text-dark mb-0 link-hover">{{ first_section.title }}</a>
                    </div>
                    <p class="mt-3 mb-4">{{ first_section.body.slice(0,2000) }}...
                    </p>

                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 pt-0">
                        <div class="row g-4">

                            <div v-for="article in second_section" class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img v-bind:src="article.img" class="img-zoomin img-fluid rounded w-100"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="#" class="h6">{{ article.title }}</a>
                                            <small><i class="fa fa-comment-dots">   {{ article.comments.length }}
                                Comment</i> </small>
                                            <small><i class="fa fa-eye"> {{ article.view }} Views</i></small>
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
            first_section: null,
            second_section: null,
        }
    },
    async mounted() {
        let domain = await axios.get("../../data/url.txt");
        let response = await axios.get(domain.data + "main_articles");
        this.first_section = await response.data.data.slice(0,1)
        this.second_section = await response.data.data.slice(1,-1)
    },
};
</script>