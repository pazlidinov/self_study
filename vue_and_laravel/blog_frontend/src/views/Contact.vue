<template>
    <!-- Contact Us Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="bg-light rounded p-5">
                <div class="row g-4">
                    <div class="col-lg-5 p-3">
                        <div class="">
                            <h1 class="mb-4">General Customer Care & Technical Support</h1>
                            <div class="rounded">
                                <iframe class="rounded w-100" style="height: 425px;"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2296.79594158898!2d72.19325007473526!3d40.68223433943935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38bc8f002c970661%3A0x27ca4861cfd8e0a2!2sPazlidinov%20G&#39;ayraytbek!5e1!3m2!1suz!2s!4v1715577802312!5m2!1suz!2s"
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="mb-4">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <input v-model="name" type="text" class="w-100 form-control border-0 py-3"
                                        name="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-lg-6">
                                    <input v-model="email" type="email" class="w-100 form-control border-0 py-3"
                                        name="email" placeholder="Enter Your Email" required>
                                </div>

                                <div class="col-12">
                                    <textarea v-model="message" name="message" class="w-100 form-control border-0"
                                        rows="6" cols="10" placeholder="Your Message" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button v-on:click="send_message()"
                                        class="w-100 btn btn-primary form-control py-3">Submit
                                        Now</button>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col-xl-6">
                                <div class="d-flex p-4 rounded bg-white">
                                    <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Address</h4>
                                        <p class="mb-0">132 Uzbek st., Andijan, Uzbekistan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="d-flex p-4 rounded bg-white">
                                    <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Mail Us</h4>
                                        <p class="mb-0">pazlidinovg@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="d-flex p-4 rounded bg-white">
                                    <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Telephone</h4>
                                        <p class="mb-0">(+998) 90 621 3380</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="d-flex p-4 rounded bg-white">
                                    <i class="fa fa-share-alt fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Share</h4>
                                        <div class="d-flex">
                                            <a class="me-3" href=""><i
                                                    class="fab fa-twitter text-dark link-hover"></i></a>
                                            <a class="me-3" href=""><i
                                                    class="fab fa-facebook-f text-dark link-hover"></i></a>
                                            <a class="me-3" href=""><i
                                                    class="fab fa-youtube text-dark link-hover"></i></a>
                                            <a class="" href=""><i
                                                    class="fab fa-linkedin-in text-dark link-hover"></i></a>
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
    <!-- Contact Us End -->

</template>
<script>
import axios from 'axios'

export default {
    data() {
        return {
            name: null,
            email: null,
            message: null,
        }
    },
    methods: {
        async send_message() {
            let domain = await axios.get("../../data/url.txt");
            await axios.post(domain.data + 'message', {
                'name': this.name, 'email': this.email, 'message': this.message
            })
                .then(response => {
                    alert('Message received successfully!')
                    this.$router.push('/')
                })
                .catch(error => {
                    alert('Something is wrong!')
                });
        }
    }
}
</script>