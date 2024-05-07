<template>
    <h4 class="mb-4">Categories</h4>
    <div class="row g-2">
        <div v-for="category in categories" class="col-12">
            <router-link v-bind:to="'/by_category/'+ category.id"  class="link-hover btn btn-light w-100 rounded text-uppercase text-dark py-3">
               {{ category.name }}
            </router-link>
        </div>

    </div>

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