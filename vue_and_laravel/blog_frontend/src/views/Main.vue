<template>
  <random_article />
  <!-- <main_article /> -->
  <whatnew />
</template>

<script>
import RandomArticle from '@/components/RandomArticle.vue';
import MainArticle from '@/components/MainArticle.vue';
import WhatNew from '@/components/WhatNew.vue';

export default {
  components: {
    'random_article': RandomArticle,
    'main_article': MainArticle,
    'whatnew': WhatNew,
  }
}
</script>