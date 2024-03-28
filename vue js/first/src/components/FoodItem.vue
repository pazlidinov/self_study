<template>
    <div>
        <h2>
            {{ foodName }}
            <img src="" v-show="foodIsFavorite">
        </h2>
        <p>{{ foodDesc }}</p>
        <button v-on:click="toggleFavorite">Favorite</button>
    </div>
</template>

<script>
export default {
    props: ['foodName', 'foodDesc', 'isFavorite'],
    data() {
        return {
            foodIsFavorite: this.isFavorite
        }
    },
    methods: {
        toggleFavorite() {
            this.$emit('toggle-favorite', this.foodName);
        }
    }
}
</script>

<style>
#red {
    font-weight: bold;
    color: rgb(144, 12, 12);
}
</style>