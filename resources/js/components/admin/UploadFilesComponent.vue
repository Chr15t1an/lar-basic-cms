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
          <!-- <form v-on:submit.prevent method="post" enctype="multipart/form-data"> -->
            <div id="dropzone" class="dropzone">
            <!-- <div class="form-group dropzone">   -->
              <label for="exampleFormControlFile1">Drag Files Here</label>
              <!-- <input @change="previewFiles" ref="myFile" type="file" class="form-control-file" name="file" id="uploadfiles"> -->
              <!-- //multiple -->
            </div>
            <!-- <input v-on:click="uploadImg" class="btn btn-lg" value="Upload Image" name="submit"> -->
          <!-- </form> -->


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

            uxEvents: function() {

              var self = this;

              var dropzone = document.getElementById('dropzone');
              dropzone.ondragover = function(){
                this.className = "dropzone dragover";
                return false;
              }

              dropzone.ondragleave = function(){
                this.className = "dropzone";
                return false;
              }



              dropzone.ondrop = function(e) {

                e.preventDefault();
                this.className = "dropzone";
                // console.log(e.dataTransfer.files);
                self.upload(e.dataTransfer.files)
                // this.className = "dropzone dragover";
                // return false;
              }



            },
            upload: function(files){
              console.log(files);

              var self = this;

              var i;
              for (i = 0; i < files.length; i++) {

              console.log(files[i]);

              //Works !
              var formData = new FormData();
              var imagefile = files[i];
              // formData.append("file", imagefile.files[0]);
              formData.append("file", imagefile);

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


                var event = new Event('fileUploaded');
                // Dispatch the event.
                window.dispatchEvent(event);


              // this.$emit('fileupload');//getFilelist();
              // vm.$emit('test', 'hi')


            },


            previewFiles() {
                this.files = this.$refs.myFile.files[0];//$('#uploadfiles')[0].files
                console.log('this.$refs.myFile.files');
                console.log(this.$refs.myFile.files);
                console.log('this.$refs.myFile');
                console.log(this.$refs.myFile);
              },

            uploadImg: function(){
              console.log('Up');
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
              this.uxEvents();
          }

      }



</script>

<style>

.dropzone {
  width: 100%;
  height: 200px;
  border: 2px dashed #ccc;
  color: #ccc;
  line-height: 300px;
  text-align: center;
}

.dropzone.dragover{
  color: black;
  border-color: black;
}


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
