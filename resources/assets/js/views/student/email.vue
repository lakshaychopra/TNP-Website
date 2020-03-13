<template>
  <div class="container">
    <form action>
      <div class="d-flex justify-content-center mt-5 mb-3">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text lab">Email</span>
          </div>
          <input type="email" name="email" id="email" class="form-control" />
        </div>
      </div>
      <div class="d-flex justify-content-center mt-3 mb-5">
        <input type="button" value="Verify" class="btn btn-primary" />
      </div>
    </form>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
* {
  font-size: 3vmin;
}
.lab {
  background-color: #5bc0de;
}
</style>