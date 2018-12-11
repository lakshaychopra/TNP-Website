<template>
	<div>
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Notice Maker</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                    <li class="breadcrumb-item active">Notice Maker</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                      <editor :init="{height: 350, paste_as_text: true, toolbar: 'print pagebreak | addpdf | insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link | code |preview | fullscreen',browser_spellcheck: true,preview:true, plugins: 'autolink,fullscreen,insertdatetime,searchreplace,preview,wordcount,paste,table,lists,link,code,print,addpdf,pagebreak'}"></editor>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Editor from '@tinymce/tinymce-vue';
    require('../../services/editor/addpdf.js');
    export default {
      components: {
          'editor': Editor
      }
    }
</script>
