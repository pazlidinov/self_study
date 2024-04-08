
<template>
    <!-- Latest News Start -->
    <div class="container-fluid latest-news py-2">
        <div class="container py-5">
            <h2 class="mb-4">Latest News</h2>
            <div class="latest-news-carousel owl-carousel">
                <div class="latest-news-item">
                    <div class="bg-light rounded">
                        <div class="rounded-top overflow-hidden">
                            <img src="../assets/img/banner-2.jpg" class="img-zoomin img-fluid rounded-top w-100" alt="">
                        </div>
                        <div class="d-flex flex-column p-4">
                            <a href="#" class="h4">Lorem Ipsum is simply dummy text of...</a>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="small text-body link-hover">by Willum Skeem</a>
                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9,
                                    2024</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="latest-news-item">
                    <div class="bg-light rounded">
                        <div class="rounded-top overflow-hidden">
                            <img src="../assets/img/banner-2.jpg" class="img-zoomin img-fluid rounded-top w-100" alt="">
                        </div>
                        <div class="d-flex flex-column p-4">
                            <a href="#" class="h4">Lorem Ipsum is simply dummy text of...</a>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="small text-body link-hover">by Willum Skeem</a>
                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9,
                                    2024</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="latest-news-item">
                    <div class="bg-light rounded">
                        <div class="rounded-top overflow-hidden">
                            <img src="../assets/img/banner-2.jpg" class="img-zoomin img-fluid rounded-top w-100" alt="">
                        </div>
                        <div class="d-flex flex-column p-4">
                            <a href="#" class="h4">Lorem Ipsum is simply dummy text of...</a>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="small text-body link-hover">by Willum Skeem</a>
                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9,
                                    2024</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="latest-news-item">
                    <div class="bg-light rounded">
                        <div class="rounded-top overflow-hidden">
                            <img src="../assets/img/banner-2.jpg" class="img-zoomin img-fluid rounded-top w-100" alt="">
                        </div>
                        <div class="d-flex flex-column p-4">
                            <a href="#" class="h4">Lorem Ipsum is simply dummy text of...</a>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="small text-body link-hover">by Willum Skeem</a>
                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9,
                                    2024</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="latest-news-item">
                    <div class="bg-light rounded">
                        <div class="rounded-top overflow-hidden">
                            <img src="../assets/img/banner-2.jpg" class="img-zoomin img-fluid rounded-top w-100" alt="">
                        </div>
                        <div class="d-flex flex-column p-4">
                            <a href="#" class="h4 ">Lorem Ipsum is simply dummy text of...</a>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="small text-body link-hover">by Willum Skeem</a>
                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9,
                                    2024</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-4">
                <a href="#" class="link-hover btn border border-primary rounded-pill text-dark w-100 py-3 mb-4">View
                    More</a>
            </div>
        </div>
    </div>
    <!-- Latest News End -->
    
    <!-- <button @click="fetchData">Submit</button> -->
    <ul>
        <li v-for="res in ress" :key="id">{{ res.title }}</li>
    </ul>
</template>

<script>
import axios from 'axios'
import "https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"
import "../assets/lib/owlcarousel/owl.carousel.min.js"
import "../assets/js/main2.js"
export default {
    data() {
        return {

            ress: null,
        };
    },
    async mounted() {
        // this.url = await axios.get("../../data/url.txt");
        let response = await axios.get("http://127.0.0.1:8000/api/article");
        this.ress = await response.data
    }


};

</script>


