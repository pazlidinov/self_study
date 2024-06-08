<template>
    <h4 class="mb-4">Categories</h4>
    <div class="row g-2">
        <div v-for="category in comment_categories" class="col-12">
            <button class="link-hover btn btn-light w-100 rounded text-uppercase text-dark py-3"
                v-on:click="redirect_category(category.id)">
                {{ category.name }}
            </button>
        </div>

    </div>

</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            comment_categories: null,
        }
    },

    async mounted() {
        let domain = await axios.get("../../data/url.txt");
        let response = await axios.get(domain.data + "category");
        this.comment_categories = await response.data.data
    },

    methods: {
        redirect_category(id) {
            if (window.location.href.indexOf('/by_category') != -1) {
                window.location.href = id;
            }
            else {
                window.location.href = '/by_category/' + id;
            }
        }
    },

};


</script>