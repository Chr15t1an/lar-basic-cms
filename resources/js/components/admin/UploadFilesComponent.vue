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
          <form v-on:submit.prevent method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleFormControlFile1">Example file input</label>
              <input @change="previewFiles" ref="myFile" type="file" class="form-control-file" name="file" id="uploadfiles">
              <!-- //multiple -->
            </div>
            <input v-on:click="uploadImg" class="btn btn-lg" value="Upload Image" name="submit">
          </form>


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



          },

          methods:{
            previewFiles() {
                this.files = this.$refs.myFile.files[0];//$('#uploadfiles')[0].files
                console.log('this.$refs.myFile.files');
                console.log(this.$refs.myFile.files);
                console.log('this.$refs.myFile');
                console.log(this.$refs.myFile);
              },

            uploadImg: function(){




              console.log('Up');
              // var attributes = {
              //   'file':this.$refs.myFile.files,
              // };

              var self = this;

              //Works !
              var formData = new FormData();
              var imagefile = document.querySelector('#uploadfiles');
              // formData.append("file", imagefile.files[0]);
              formData.append("file", this.files);

              axios.post('/api/file/store', formData, {
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  }
              }).then(function (response) {


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
