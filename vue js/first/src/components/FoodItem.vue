<template>
    <div v-on:click="countClicks">
        <h2>{{ foodName }}</h2>
        <p>{{ message }}</p>
        <p id="red">You have clicked me {{ clicks }} times.</p>
    </div>
</template>

<script>
export default {
    props: [
      'foodName'
    ]
    // data() {
    //     return {
    //         name: 'Apples',
    //         message: 'I like apples',
    //         clicks: 0
    //     }
    // },
    // methods: {
    //     countClicks() {
    //         this.clicks++;
    //     }
    // }
};
</script>

<style>
#red {
    font-weight: bold;
    color: rgb(144, 12, 12);
}
</style>                 