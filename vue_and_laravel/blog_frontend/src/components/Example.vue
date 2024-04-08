<script>
import axios from 'axios'

export default {
    data() {
        return {
            url: null,
            data: null,
        };
    },
    methods: {
        async fetchData() {
            this.url = await axios.get("../../data/url.txt");
            this.data = await axios.get(this.url.data+"/article");
        }
        
    }
};

</script>

<template>
    <button @click="fetchData">Submit</button>
    {{ data }}
</template>