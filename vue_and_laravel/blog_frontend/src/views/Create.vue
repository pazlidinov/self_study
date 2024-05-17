<template>
    <!-- Contact Us Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="bg-light rounded p-5">
                <div class="row g-4">

                    <div class="col-lg-12">
                        <div class="mb-4">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <input v-model="title" type="text" class="w-100 form-control border-0 py-3"
                                        name="title" placeholder="Title" required>
                                </div>
                                <div class="col-lg-6">
                                    <select v-model="category_id" name="category" id=""
                                        class="w-100 form-control border-0 py-3">
                                        <option disabled value="">Please select Category</option>
                                        <option v-for="category in categories" v-bind:value=category.id>{{ category.name
                                            }}</option>
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <input type="file" name="img" class="w-100 form-control border-0 py-3 mb-4"
                                        required>
                                </div>
                                <div class="col-12">
                                    <textarea v-model="body" name="body" class="w-100 form-control border-0" rows="6"
                                        cols="10" placeholder="Article" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button v-on:click="send_article()"
                                        class="w-100 btn btn-primary form-control py-3">Submit
                                        Now</button>
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
            categories: null,
            title: null,
            user_id: 1,
            category_id: null,
            body: null,
        }
    },
    async mounted() {
        let domain = await axios.get("../../data/url.txt");
        let response = await axios.get(domain.data + "category");
        this.categories = await response.data.data
    },
    methods: {
        async send_article() {
            let domain = await axios.get("../../data/url.txt");
            await axios.post(domain.data + 'article', {
                'title': this.title, 'user_id': this.user_id, 'category_id': this.category_id, 'body': this.body
            })
                .then(response => {
                    alert('Message received successfully!')
                    this.$router.push('/detail/' + response.data.article);
                })
                .catch(error => {
                    alert('Something is wrong!')
                });
        }
    }
}
</script>