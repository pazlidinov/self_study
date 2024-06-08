<template>
    <!-- Contact Us Start -->
    <div class="container-fluid py-5 w-50">
        <div class="container py-6">
            <div class="bg-light rounded p-5">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <div class="row g-4">
                                <span>LOG IN</span>
                                <div class=" col-lg-12 input-group w-100 mx-auto d-flex mb-4">
                                    <span class=" input-group-text p-3">+998</span>
                                    <input v-model="phone_number" type="tel" class="form-control border-0 py-3"
                                        maxlength="9" placeholder="Your Phone Number" required>
                                </div>
                                <div class="col-lg-12">
                                    <input v-model="password" type="password" class="w-100 form-control border-0 py-3"
                                        name="password" placeholder="Enter Your Password" required>
                                </div>
                                <div class="col-12">
                                    <button v-on:click="send_login()" class="w-100 btn btn-primary form-control py-3"
                                        v-bind:class="{ 'disabled': send_btn }">Log in</button>
                                </div>
                                <div class="col-12 d-flex align-items-center">
                                    <router-link to="/register">Do you not have an account?</router-link>
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
            phone_number: null,
            password: null,
        }
    },
    computed: {
        send_btn() {
            return (this.phone_number && this.password) ? false : true;
        }
    },
    methods: {       
        async send_login() {
            let domain =await axios.get("../../data/url.txt");
            await axios.post(domain.data + 'login', {
                'phone_number': this.phone_number, 'password': this.password
            }).then(response => {
              
                if (response.status == 200) {                   
                    sessionStorage.setItem('user_id', response.data.user.id);
                    sessionStorage.setItem('user_token', response.data.token);
                    this.$router.push('/')
                }
            }).catch(error => {
                alert('Something is wrong!')
            });


        }
    }
}
</script>