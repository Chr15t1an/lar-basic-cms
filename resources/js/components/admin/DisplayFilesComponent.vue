<template>
  <!-- Create Sitemap Component -->
      <div class="row" id='filecontainer'>
        <div v-if="this.errors.length > 0">
          <div class="alert alert-warning" role="alert">

              <li v-for="error in this.errors">
                {{error}}
              </li>
          </div>
        </div>

        <!-- <span @fileupload="getFilelist">A</span> -->

          <div class="col-4" v-for="file in files" >
            <div v-bind:id="file.id" class="card" style="width: 18rem;">
              <img v-bind:src="file.path"  class="card-img-top" alt="">
              <div class="card-body">
                <h5 class="card-title">
                  <label for="titleInput1">Title</label>
                  <input type="text" class="form-control" id="" placeholder="" v-bind:value="file.title">
                </h5>
                <p class="card-text">Path:{{file.path}}</p>
                <a v-on:click="saveFile(file.id)" class="btn btn-success">Save</a>
                <a v-on:click="deleteFile(file.id)" class="btn btn-danger">Delete</a>
              </div>
            </div>

          </div>
    </div>
</template>

<script>
    export default {
      data:function() {
        return {
            errors:{},
            files:{},
            }
          },
          created: function() {

              this.getFilelist();


            // this.$on('fileupload', function(value){
            //     console.log('WORKING');
            // });


            var self = this;

            // Listen for the event.
            window.addEventListener('fileUploaded', function (e) {
            /* Give the file a second to upload.*/
            setTimeout(function(){ self.getFilelist(); }, 1000);
          }, false);


          },

          methods:{
            saveFile(id) {


              var titleVal = $('#'+id+' input[type=text]').val();

              console.log(titleVal);
              // var data = { title: titleVal, path: };
              var data = {title: titleVal};
              axios.post('/api/file/edit/'+id, data).then(function (response) {
                  console.log(response.data);

                });


              },

            getFilelist: function(){

              var self = this;

              axios
                .get('/api/files')
                .then(function (response) {

                  self.files = response.data;
                  console.log(self.files);
                  console.log('GetFileList ');

            });
            },

            deleteFile: function(id){
              // e.preventDefault();
              // var data = { meta_key: this.meta_key_checklist };

              self = this;
              // $('#'+id).hide();

              // var container = document.getElementById('filecontainer');
              // container.setAttribute("style", "position: fixed");
              // $('#'+id).fadeOut();
              // container.removeAttribute("style", "position: fixed");

              axios.post('/api/file/delete/'+id).then(function (response) {


                if(response.data.errors){
                  var d = '';
                  d = JSON.parse(response.request.responseText);
                  // console.log(d);
                  var errorMsgs = [];

                  for (var key in d) {
                    // skip loop if the property is from prototype
                    if (!d.hasOwnProperty(key)) continue;
                    var obj = d[key];
                    for (var prop in obj) {
                        // skip loop if the property is from prototype
                        if (!obj.hasOwnProperty(prop)) continue;
                        errorMsgs.push(obj[prop][0]);
                    }
                }
                self.errors = errorMsgs;

              }else {
                console.log(response.data);
                self.getFilelist();


              }
              return false;

              });
            }
            },
            mounted: function () {



          }

      }



</script>

<style>
.box__dragndrop,
.box__uploading,
.box__success,
.box__error {
  display: none;
}

.box.is-dragover {
  background-color: grey;
}

.box.is-uploading .box__input {
  visibility: none;
}
.box.is-uploading .box__uploading {
  display: block;
}
</style>
