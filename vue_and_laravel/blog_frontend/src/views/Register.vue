<template>
    <!-- Contact Us Start -->
    <div class="container-fluid py-5 w-50">
        <div class="container py-6">
            <div class="bg-light rounded p-5">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <div class="row g-4">
                                <span>REGISTER</span>
                                <div class="accept_phon_number">
                                    <div class=" col-lg-12 input-group w-100 mx-auto d-flex mb-4">
                                        <span class=" input-group-text p-3">+998</span>
                                        <input v-model="phone_number" type="tel" class="form-control border-0 py-3"
                                            maxlength="9" placeholder="Your Phone Number" required>
                                        <span class=" input-group-text p-3"
                                            v-bind:class="{ 'text-danger': text_color, 'text-success': !text_color }" ">{{ phone_number_info }}</span>
                                    </div>
                                    <div class=" col-12">
                                            <button class="w-100 btn btn-primary form-control py-3 disabled">Send Code
                                                With
                                                SMS</button>
                                    </div>
                                </div>
                                <div class="accept_code">
                                    <div class="col-lg-12">
                                        <input v-model="accept_code" type="password"
                                            class="w-100 form-control border-0 py-3 mb-4" name="password"
                                            placeholder="Enter Accept Code" maxlength="6" required>
                                    </div>
                                    <div class="col-12">
                                        <button class="w-100 btn btn-primary form-control py-3">Accept</button>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="col-lg-12">
                                        <input v-model="full_name" type="text"
                                            class="w-100 form-control border-0 py-3 mb-4" name="password"
                                            placeholder="Enter Your Full Name" required>
                                    </div>

                                    <div class="col-lg-12">
                                        <input v-model="password" type="password"
                                            class="w-100 form-control border-0 py-3 mb-4" name="password"
                                            placeholder="Enter  Password" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <input v-model="confirm_password" type="password"
                                            class="w-100 form-control border-0 py-3 mb-4" name="password"
                                            placeholder="Confirm Password" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="file" name="img" class="w-100 form-control border-0 py-3 mb-4"
                                            required>
                                    </div>
                                    <div class="col-12">
                                        <button v-on:click="send_message()"
                                            class="w-100 btn btn-primary form-control py-3">Register</button>
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
            phone_number: null,
            phone_number_info: '',
            text_color: false,

            full_name: null,
            password: null,
            confirm_password: null,
            accept_code: null,
        }
    },
    watch: {
        async phone_number(val) {
            if (Number.isInteger(Number(val)) && val.length == 9) {
                this.phone_number_info = 'Correctly'
                this.text_color = false

                let domain = await axios.get("../../data/url.txt");
                let response = await axios.get(domain.data + 'check_user/' + val)
                // if (response.data.status == 200) {

                // }
            }
            else {
                this.phone_number_info = 'Wrong!'
                this.text_color = true
            }

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
                })
                .catch(error => {
                    alert('Something is wrong!')
                });
        }
    }
}
</script>