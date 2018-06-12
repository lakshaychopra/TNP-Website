<template>
<div class="">
<navigation></navigation>
<layout></layout>
<foot></foot>
</div>
</template>

<script>

        // import '../../custom.js'
    import navigation from "./header.vue";
    import layout from "./layout.vue";
    import foot from "./footer.vue";

    export default {
       components:{
        layout,
        navigation,
        foot
      },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
