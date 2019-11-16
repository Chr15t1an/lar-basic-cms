<template>
  <!-- Create Sitemap Component -->
      <div>
        <div v-if="this.errors.length > 0">
          <div class="alert alert-warning" role="alert">

              <li v-for="error in this.errors">
                {{error}}
              </li>
          </div>
        </div>
          <div v-for="file in files" >
            <div v-bind:id="file.id" class="card" style="width: 18rem;">
              <img v-bind:src="file.path"  class="card-img-top" alt="">
              <div class="card-body">
                <h5 class="card-title">
                  <label for="titleInput1">Title</label>
                  <input type="text" class="form-control" id="" placeholder="" v-bind:value="file.title">
                </h5>
                <p class="card-text">Path:{{file.path}}</p>
                <a v-on:click="saveFile(file.id)" href="#" class="btn btn-success">Save</a>
                <a v-on:click="deleteFile(file.id)" href="#" class="btn btn-danger">Delete</a>
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

          },

          methods:{
            saveFile(id) {


              var titleVal = $('#'+id+' input[type=text]').val();
              // var pathVal = $('#'+id+' .card-text').text();
              // $('#20 .card-text').text()
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

            });
            },

            deleteFile: function(id){

              // var data = { meta_key: this.meta_key_checklist };


              $('#'+id).hide();

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

              }

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
