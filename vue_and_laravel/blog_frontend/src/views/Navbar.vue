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
                                <a href="#" class=" dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i> Account</a>
                                <div class="dropdown-menu m-0  rounded-0">
                                    <a href="#" class="dropdown-item">Log in</a>
                                    <a href="#" class="dropdown-item">Register</a>
                                    <a href="#" class="dropdown-item">Articles</a>
                                    <a href="#" class="dropdown-item">Create</a>
                                    <hr>
                                    <a href="#" class="dropdown-item">Log out</a>

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
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Categories</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a v-for="category in categories" class="dropdown-item">{{ category.name
                                        }}</a>

                                </div>
                            </div>
                            <router-link to="/all_articles" class="nav-item nav-link">Articles</router-link>


                            <a href="contact.html" class="nav-item nav-link">Contact Us</a>
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
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
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
        }
    },
    async mounted() {
        let domain = await axios.get("../../data/url.txt");
        let response = await axios.get(domain.data + "category");
        this.categories = await response.data.data
    },
};
</script>