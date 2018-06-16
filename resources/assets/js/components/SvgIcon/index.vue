<template>
  <!-- <svg :class="svgClass" aria-hidden="true">
    <use :xlink:href="iconName"></use>
  </svg> -->
  <i v-bind:class="iconName"></i>
</template>

<script>
export default {
  name: 'svg-icon',
  props: {
    iconClass: {
      type: String,
      required: true
    },
    className: {
      type: String
    }
  },
  computed: {
    iconName() {
      return `svg-icon fa fa-${this.iconClass}`
    },
    // svgClass() {
    //   if (this.className) {
    //     return 'svg-icon ' + this.className
    //   } else {
    //     return 'svg-icon'
    //   }
    // }
  }
}
</script>

<style scoped>
.svg-icon {
  width: 1em;
  height: 1em;
  vertical-align:-0.3em !important;
  /* fill: currentColor; */
  color: #fff;
  overflow: hidden;

}
</style>
