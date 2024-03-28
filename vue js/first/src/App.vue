<template>
  <h1>Food</h1>
  <food-item v-for="x in foods" :food-name="x.name" :food-desc="x.desc" :is-favorite="x.favorite"
    @toggle-favorite="receiveEmit" />
</template>

<script>
export default {
  data() {
    return {
      foods: [
        {
          name: 'Apples',
          desc: 'Apples are a type of fruit that grow on trees.',
          favorite: true
        },
        {
          name: 'Pizza',
          desc: 'Pizza has a bread base with tomato sauce, cheese, and toppings on top.',
          favorite: false
        },
        {
          name: 'Rice',
          desc: 'Rice is a type of grain that people like to eat.',
          favorite: false
        },
        {
          name: 'Fish',
          desc: 'Fish is an animal that lives in water.',
          favorite: true
        },
        {
          name: 'Cake',
          desc: 'Cake is something sweet that tastes good.',
          favorite: false
        }
      ]
    }
  },
  methods: {
    receiveEmit(foodname) {  
    alert( 'You clicked: ' + foodname );
  }
  }
}

</script>

<style>
#app>div {
  border: dashed black 1px;
  display: inline-block;
  margin: 10px;
  padding: 10px;
  background-color: lightgreen;
}

#app>div:hover {
  cursor: pointer;
}
</style>