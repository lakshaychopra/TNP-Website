<template>
  <section class="app-main" style="min-height: 100%;">
    <transition name="fade-transform" mode="out-in">
      <keep-alive :include="cachedViews">
      <router-view :key="key"></router-view>
      </keep-alive>
    </transition>
  </section>
</template>
<style scoped>
.app-main{
  padding: 20px;
    margin: 15px;
    background-color: #fff
}
</style>

<script>
export default {
  name: 'AppMain',
   computed: {
    cachedViews() {
      return this.$store.state.tagsView.cachedViews
    },
    key() {
      return this.$route.fullPath
    }
  }
}
</script>
