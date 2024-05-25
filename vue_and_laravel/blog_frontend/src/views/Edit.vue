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
                                        value="{{title}}" name="title" placeholder="Title" required>
                                </div>
                                <div class="col-lg-6">
                                    <select v-model="category_id" name="category" id=""
                                        class="w-100 form-control border-0 py-3">
                                        <option disabled value="">Please select Category</option>
                                        <option v-for="category in categories" v-bind:value=category.id
                                            :selected='category.id == category_id'>{{ category.name
                                            }}</option>
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <input type="file" name="img" class="w-100 form-control border-0 py-3 mb-4"
                                        accept="image/*" @change="uploadImage($event)" id="file-input" required>
                                </div>
                                <div class="col-12">
                                    <textarea v-model="body" name="body" value="{{ body }}"
                                        class="w-100 form-control border-0" rows="6" cols="10" placeholder="Article"
                                        required></textarea>
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
            user_id: null,
            category_id: null,
            body: null,
            data: new FormData(),
        }
    },
    async mounted() {
        let domain = await axios.get("../../data/url.txt");
        let response_category = await axios.get(domain.data + "category");
        this.categories = await response_category.data.data

        let response_article = await axios.get(domain.data + "article/" + this.$route.params.id);
        this.title = response_article.data.article.title
        this.user_id = response_article.data.article.user_id.id
        this.category_id = response_article.data.article.category_id.id
        this.body = response_article.data.article.body
    },
    computed: {
        send_btn() {
            return (this.title && this.user_id && this.category_id && this.body) ? false : true;
        }
    },
    methods: {
        uploadImage(event) {
            this.data.append('img', event.target.files[0])
        },
        async send_article() {
            let domain = await axios.get("../../data/url.txt");

            await axios.put(domain.data + 'article/' + this.$route.params.id + '?title=' + this.title + '&user_id=' + this.user_id + '&category_id=' + this.category_id + '&body=' + this.body, this.data)
                .then(response => {
                    alert('Article created successfully!')
                    this.$router.push('/detail/' + this.$route.params.id);
                })
                .catch(error => {
                    alert('Something is wrong!')
                });
        }
    }
}
</script>