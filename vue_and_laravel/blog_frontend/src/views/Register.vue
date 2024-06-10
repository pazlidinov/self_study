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

                                <div>
                                    <div class=" col-lg-12 input-group w-100 mx-auto d-flex mb-4">
                                        <span class=" input-group-text p-3">+998</span>
                                        <input v-model="phone_number" type="tel" name="phone_number"
                                            class="form-control border-0 py-3" maxlength="9"
                                            placeholder="XX12345678 - Your Phone Number " required>
                                        <span class=" input-group-text p-3"
                                            v-bind:class="{ 'text-danger': text_color, 'text-success': !text_color }">{{
                                                phone_number_info }}</span>
                                    </div>
                                </div>
                                <span v-if="check_phone_number" class="m-0 py-3 text-danger">This phone
                                    number is registered!</span>
                                <div v-if="next_section">
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
                                    <div class="col-lg-12 mb-4">
                                        <input v-model="confirm_password" type="password"
                                            class="w-100 form-control border-0 py-3" name="confirm_password"
                                            placeholder="Confirm Password" required>
                                        <span v-if="check_confirm" class="text-danger">Password not confirmed!</span>
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="file" name="img" class="w-100 form-control border-0 py-3 mb-4"
                                            accept="image/*" @change="uploadImage($event)" id="file-input" required>
                                    </div>
                                    <div class="col-12">
                                        <button v-on:click="registered()"
                                            class="w-100 btn btn-primary form-control py-3"
                                            v-bind:class="{ 'disabled': send_btn }">Register</button>
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
            check_phone_number: false,
            next_section: false,
            full_name: null,
            password: null,
            confirm_password: null,
            check_confirm: false,
            data: new FormData(),
        }
    },
    computed: {
        send_btn() {
            return (this.phone_number && this.full_name && this.password && this.confirm_password && this.password == this.confirm_password) ? false : true;
        }
    },
    watch: {
        async phone_number(val) {
            if (Number.isInteger(Number(val)) && val.length == 9) {
                this.phone_number_info = 'Correctly'
                this.text_color = false
                let domain = await axios.get("../../data/url.txt");
                let response = await axios.get(domain.data + 'check_user/' + val)

                switch (response.data.status) {
                    case 200:
                        this.check_phone_number = true
                        break;
                    case 400:
                        this.next_section = true
                        break;
                }
            }
            else {
                this.phone_number_info = 'Wrong!'
                this.text_color = true
                this.next_section = false
                this.check_phone_number = false
            }
        },
        confirm_password(val) {
            this.check_confirm = this.password != val ? true : false;
        },

    },
    methods: {
        uploadImage(event) {
            this.data.append('img', event.target.files[0])
        },
        async registered() {
            let config = {
                header: {
                    'Content-Type': 'image'
                }
            };
            this.data.append('full_name', this.full_name);
            this.data.append('phone_number', this.phone_number);
            this.data.append('password', this.password);
            this.data.append('full_name', this.full_name);
            this.data.append('full_name', this.full_name);
            let domain = await axios.get("../../data/url.txt");
            await axios.post(domain.data + 'user', this.data)
                .then(response => {
                    alert('You have successfully registered!');
                    this.$router.push('/login')
                })
                .catch(error => {
                    alert('Something is wrong!')
                });
        }
    }
}
</script>