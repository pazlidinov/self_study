<template>
    <!-- Single Product Start -->
    <div class="container-fluid py-3">
        <div class="container py-3">
            <ol class="breadcrumb justify-content-start mb-4">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Articles</a></li>
                <li class="breadcrumb-item active text-dark">Single Page</li>
            </ol>
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <span class="h1 display-5">{{ article[1] }}</span>
                    </div>
                   <div class="position-relative rounded overflow-hidden mb-3">
                        <img v-bind:src="article[2]" class="img-zoomin img-fluid rounded w-100" alt={{article[2]}}>
                        <div class="position-absolute text-white px-4 py-2 bg-primary rounded"
                            style="top: 20px; right: 20px;">
                            {{ article[6].name }}
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-clock"></i>by {{
                            article[5].full_name }}</a>
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> {{ article[4] }}
                            Views</a>
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i> {{
                            article[7].length }} Comment</a>
                    </div>
                    <p class="my-4"> {{ article[3] }}
                    </p> 

                    <div class="tab-class">
                        <div class="d-flex justify-content-between border-bottom mb-4">
                            <div class="d-flex align-items-center">
                                <router-link v-bind:to="'/edit/'+article[0]" class="link-hover text-body fs-6"><i
                                        class="fas fa-long-arrow-alt-right me-1 mb-3"></i> Edit</router-link>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light rounded my-4 p-4">
                        <h4 class="mb-4">You Might Also Like</h4>
                        <div class="row g-4">
                            <div v-for="item in like_articles" class="col-lg-6">
                                <div class="d-flex align-items-center p-3 bg-white rounded">
                                    <img v-bind:src="item.img" class="img-fluid rounded" alt="item.img">
                                    <div class="ms-3">
                                        <a style="cursor: pointer;" v-on:click="redirect_detail(item.id)"
                                            class="h5 mb-2">{{ item.title
                                            }}</a>
                                        <p class="text-dark mt-3 mb-0 me-3"><i class="fa fa-eye"></i> {{ item.view }}
                                            Views
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                   <div class="bg-light rounded p-4">
                        <h4 class="mb-4">Comments</h4>
                        <div class="p-4 bg-white rounded mb-4">
                            <div v-for="comment in article[7]" class="row g-4">
                                <div class="col-3">
                                    <img v-bind:src="comment.user_id.img" class="img-fluid rounded-circle w-100"
                                        alt="comment.user_id.img">
                                </div>
                                <div class="col-9">
                                    <div class="d-flex justify-content-between">
                                        <h5>{{ comment.user_id.full_name }}</h5>
                                        <a v-on:click="replay = !replay" class=" btn link-hover text-body fs-6"><i
                                                class="fas fa-long-arrow-alt-right me-1"></i> Reply</a>
                                    </div>
                                    <small class="text-body d-block mb-3"><i class="fas fa-calendar-alt me-1"></i> {{
                                        comment.created_at.slice(0, 10) }}</small>
                                    <p class="mb-0">{{ comment.comment }}
                                    </p>
                                </div>
                                <div v-if="replay" class="bg-light rounded p-4 my-4">
                                    <h4 class="mb-4">Reply A Comment</h4>
                                    <form action="#">
                                        <div class="row g-4">
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control py-3" placeholder="Full Name">
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="email" class="form-control py-3"
                                                    placeholder="Email Address">
                                            </div>
                                            <div class="col-12">
                                                <textarea class="form-control" name="textarea" id="" cols="30" rows="7"
                                                    placeholder="Write Your Comment Here"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button class="form-control btn btn-primary py-3" type="button">Submit
                                                    Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="bg-light rounded p-4 my-4">
                        <h4 class="mb-4">Leave A Comment</h4>
                        <form action="#">
                            <div class="row g-4">
                                <div class="col-12">
                                    <textarea class="form-control" name="textarea" id="" cols="30" rows="7"
                                        placeholder="Write Your Comment Here"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="form-control btn btn-primary py-3" type="button">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="p-3 rounded border">
                                <div class="input-group w-100 mx-auto d-flex mb-4">
                                    <input type="search" v-model="title" class="form-control p-3" placeholder="keywords"
                                        aria-describedby="search-icon-1">
                                    <router-link v-bind:to="'/by_title/' + title" id="search-icon-1"
                                        class="btn btn-primary input-group-text p-3"><i
                                            class="fa fa-search text-white"></i></router-link>
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
            article: null,
            like_articles: null,
            title: null,
            replay: false,
        }
    },
    async mounted() {
        let domain = await axios.get("../../data/url.txt");
        let response = await axios.get(domain.data + "article/" + this.$route.params.id);
        this.article = Object.keys( response.data.article).map((key) =>  response.data.article[key]);
        this.like_articles = response.data.like_articles;
        console.log(this.article)
    },
    methods: {
        // redirect_detail(id) {
        //     if (window.location.href.indexOf('detail') != -1) {
        //         window.location.href = id;
        //     }
        //     else {
        //         window.location.href = 'detail/' + id;
        //     }
        // },
    },
};
</script>