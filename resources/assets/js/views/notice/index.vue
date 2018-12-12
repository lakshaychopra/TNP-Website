<template>
  <div>
    <div class="row page-titles">
      <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Notice Maker</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <router-link to="/home">Home</router-link>
          </li>
          <li class="breadcrumb-item active">Notice Maker</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="card mx-auto">
          <div class="card-body">
            <page size="A4">
              <editor :init="{height: 500, paste_as_text: true, toolbar: 'print pagebreak | header | undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link',browser_spellcheck: true,preview:true, plugins: 'autolink,fullscreen,insertdatetime,searchreplace,preview,wordcount,paste,table,lists,link,code,print,pagebreak,header'}"></editor>
            </page>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Editor from '@tinymce/tinymce-vue';
  require('../../services/editor/notice.js');
  export default {
    components: {
      'editor': Editor
    }
  }

</script>

<style scoped>
  .card-body {
    background: rgb(204, 204, 204);
  }

  page {
    background: white;
    display: block;
    margin: 0 auto;
    margin-bottom: 0.5cm;
    box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
  }

  page[size="A4"] {
    width: 21cm;
  }

  @media only screen and (max-width: 768px) {
    page[size="A4"] {
      width: 100%;
    }
  }

</style>
