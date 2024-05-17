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
                                <div v-if="first_section">
                                    <div class=" col-lg-12 input-group w-100 mx-auto d-flex mb-4">
                                        <span class=" input-group-text p-3">+998</span>
                                        <input v-model="phone_number" type="tel" name="phone_number"
                                            class="form-control border-0 py-3" maxlength="9"
                                            placeholder="Your Phone Number" required>
                                        <span class=" input-group-text p-3"
                                            v-bind:class="{ 'text-danger': text_color, 'text-success': !text_color }">{{
                                                phone_number_info }}</span>
                                    </div>
                                    <div class=" col-12">
                                        <button v-on:click="send_accept_code()"
                                            class="w-100 btn btn-primary form-control py-3"
                                            v-bind:class="{ 'disabled': !sen_button }">Send Code
                                            With
                                            SMS</button>
                                    </div>
                                </div>
                                <div v-if="second_section">
                                    <div class="col-lg-12">
                                        <input v-model="accept_code" type="password"
                                            class="w-100 form-control border-0 py-3 mb-4" name="accept_code"
                                            placeholder="Enter Accept Code" maxlength="6" required>
                                    </div>
                                    <div class="col-12">
                                        <button class="w-100 btn btn-primary form-control py-3">Accept</button>
                                    </div>
                                </div>
                                <div v-if="third_section">
                                    <div class="col-lg-12">
                                        <input v-model="full_name" type="text"
                                            class="w-100 form-control border-0 py-3 mb-4" name="full_name"
                                            placeholder="Enter Your Full Name" required>
                                    </div>

                                    <div class="col-lg-12">
                                        <input v-model="password" type="password"
                                            class="w-100 form-control border-0 py-3 mb-4" name="password"
                                            placeholder="Enter  Password" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <input v-model="confirm_password" type="password"
                                            class="w-100 form-control border-0 py-3 mb-4" name="confirm_password"
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
            first_section: true,
            phone_number: null,
            phone_number_info: '',
            text_color: false,
            sen_button: false,

            second_section: false,

            third_section: false,
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

                if (response.data.status == 200) {
                    this.sen_button = true
                }
            }
            else {
                this.phone_number_info = 'Wrong!'
                this.text_color = true
                this.sen_button = false
            }

        }
    },
    methods: {
         send_accept_code() {
            let send_code = Math.floor(Math.random() * (999999 - 100000 + 1)) + 100000;
            var axios = require('axios');
            var FormData = require('form-data');
            var data = new FormData();
            data.append('mobile_phone', '998'+this.phone_number);
            data.append('message', send_code );
            data.append('from', '7wUxnDo6v2nBgeRLQRautOzPXR0bfIv9LozhxVWi');
            data.append('callback_url', '');

            var config = {
                method: 'post',
                maxBodyLength: Infinity,
                url: 'notify.eskiz.uz/api/message/sms/send',
                headers: {
                    ...data.getHeaders()
                },
                data: data
            };

            axios(config)
                .then(function (response) {
                    console.log(JSON.stringify(response.data));
                })
                .catch(function (error) {
                    console.log(error);
                });


            // await axios.post('notify.eskiz.uz/api/message/sms/send', {
            //     'mobile_phone': '9989'+this.phone_number, 'message': send_code, 'from': '7wUxnDo6v2nBgeRLQRautOzPXR0bfIv9LozhxVWi', 'callback_url': ''
            // }, Headers)
            //     .then(response => {
            //         console.log(JSON.stringify(response.data));
            //     })
            //     .catch(error => {
            //         console.log(error);
            //     });

        }
    }
}
</script>