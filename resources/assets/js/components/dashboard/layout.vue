<template>
<div class="app-body">
<sidebar></sidebar>
<mai></mai>
</div>
</template>
<style>
</style>

<script>
    import Sidebar from "./sidebar.vue";
    import mai from "./main.vue";
    export default {
      components:{
        Sidebar,
        mai
      },
      mounted() {
            console.log('Component mounted.')
        }
    }
</script>
