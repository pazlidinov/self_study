<template>
<random_article />
<!-- <whatnew /> -->
</template>

<script>
import RandomArticle from '@/components/RandomArticle.vue';
import WhatNew from '@/components/WhatNew.vue';

export default {
    components: {
      'random_article': RandomArticle,
      // 'whatnew': WhatNew,
    }
}
</script>