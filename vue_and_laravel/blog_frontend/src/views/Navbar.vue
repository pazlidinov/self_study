<template>
    <!-- Navbar start -->
    <div class="container-fluid sticky-top px-0">
        <div class="container-fluid topbar bg-dark">
            <div class="container px-0">
                <div class="row ">
                    <div class="col-lg-9 col-sm-8 col-7 d-col-none">
                        <div class="d-inline-flex  h-100 ">
                            <span class="px-2 text-white rates"></span>
                            <span class="px-2 text-white rates"></span>
                            <span class="px-2 text-white rates"></span>
                        </div>
                    </div>
                    <div class="col-lg-3  col-sm-4 col-5">
                        <div class="d-inline-flex float-end">
                            <div class="nav-item dropdown">
                                <a v-on:click="user_menu()" class=" dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i> Account
                                </a>
                                <div class="dropdown-menu m-0  rounded-0">
                                    <div v-if="user_token">
                                        <router-link v-bind:to="'/by_author/'
                                            + user_id" class="dropdown-item">My article</router-link>
                                        <router-link to="/create" class="dropdown-item">Create</router-link>
                                        <hr>
                                        <button v-on:click="log_out()" class="dropdown-item">Log out</button>
                                    </div>
                                    <div v-if="!(user_token)">
                                        <router-link to="/login" class="dropdown-item">Log
                                            in</router-link>
                                        <router-link to="/register" class="dropdown-item">Register</router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light">
            <div class="container px-0 ">

                <nav class="navbar navbar-light navbar-expand-xl">
                    <router-link to="/" class="navbar-brand mt-3">
                        <p class="text-primary display-6 mb-2" style="line-height: 0;">Articles</p>
                        <small class="text-body fw-normal" style="letter-spacing: 8px;">Nespaper</small>
                    </router-link>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-light py-3" id="navbarCollapse">
                        <div class="navbar-nav mx-auto border-top">
                            <router-link to="/" class="nav-item nav-link active">Home</router-link>
                            <div class="nav-item dropdown">
                                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Categories</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <button v-for="category in categories" class="dropdown-item"
                                        v-on:click="redirect_category(category.id)">{{ category.name
                                        }}</button>

                                </div>
                            </div>
                            <router-link to="/all_articles" class="nav-item nav-link">Articles</router-link>


                            <router-link to="/contact" class="nav-item nav-link">Contact Us</router-link>
                        </div>
                        <div class="d-flex flex-nowrap border-top pt-3 pt-xl-0">
                            <button
                                class="btn-search btn border border-primary btn-md-square rounded-circle bg-white my-auto"
                                data-bs-toggle="modal" data-bs-target="#searchModal"><i
                                    class="fas fa-search text-primary"></i></button>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" v-model="title" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <button v-on:click="redirect_title" id="search-icon-1" class="input-group-text p-3"><i
                                class="fa fa-search"></i></button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->

</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {            
            categories: null,
            title: null,
            user_id: null,
            user_token: null,
        }
    },
    async mounted() {
        let domain = await axios.get("../../data/url.txt");
        let response = await axios.get(domain.data + "category");
        this.categories = await response.data.data;
    },
    methods: {
        redirect_category(id) {
            if (window.location.href.indexOf('by_category') != -1) {
                window.location.href = id;
            }
            else {
                window.location.href = 'by_category/' + id;
            }
        },
        redirect_title() {
            if (window.location.href.indexOf('by_title') != -1) {
                window.location.href = this.title;
            }
            else {
                window.location.href = 'by_title/' + this.title;
            }
        },
        user_menu() {
            this.user_token = sessionStorage.getItem("user_token")
            this.user_id = sessionStorage.getItem("user_id")
        },
        async log_out() {
            let domain = await axios.get("../../data/url.txt");
            await axios.get(domain.data + 'logout', { headers: { 'Accept': 'application/json', 'Authorization': 'Bearer ' + this.user_token } }).then(response => {
                if (response.status == 200) {
                    sessionStorage.removeItem("user_token");
                    sessionStorage.removeItem("user_id");                  

                    this.$router.push('/')
                }
            }).catch(error => {
                alert('Something is wrong!')
            })
        }
    }
}
</script>