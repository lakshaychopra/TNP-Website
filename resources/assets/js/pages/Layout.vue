<template>
    <div class="app-layout">
        <navigation></navigation>         
        <router-view></router-view>
    </div>
</template>

<script>
  import Navigation from '../components/ExampleComponent.vue';

    export default {
        components:{
            Navigation,
        }
    }
</script>
