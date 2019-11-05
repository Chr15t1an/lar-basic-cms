<template>

  <div class="container">
  <!-- Admin Todo Checklist -->
          <div v-if="this.errors.length > 0">
            <div class="alert alert-warning" role="alert">
                There were some validation errors.
                <div v-for="error in this.errors">
                  {{error}}
                </div>
            </div>
          </div>
      <div class="row">
          <form v-on:submit.prevent id="">

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Title</label>
                <input v-model="post_title" type="text" class="form-control" id="" aria-describedby="" placeholder="Title">
            </div>

            <div class="form-group">
                 <label for="">Slug</label>
                 <input v-model="post_slug" type="text" class="form-control" id="" required>
            </div>

            <div class="form-group">
                 <label for="">Featured Image</label>
                 <input v-model="featured_image" type="text" class="form-control" id="" >
            </div>

            <div class="form-group">
                 <label for="">Meta Title</label>
                 <input v-model="meta_title" type="text" class="form-control" id="" >
            </div>

            <div class="form-group">
                 <label for="">Meta Description</label>
                 <input v-model="meta_description" type="text" class="form-control" id="" >
            </div>

            <div class="form-group">
                 <label for="">Published</label>
                 <input v-model="status" type="checkbox" class="form-control" id="" >
            </div>



              <div class="form-group">
                   <label for="exampleFormControlTextarea1">Body</label>
                   <div id="summernote"></div>
              </div>
          <button v-on:click="updatePost" class="btn btn-primary mb-2">Update</button>
          <button v-on:click="deletePost" class="btn btn-danger mb-2">Delete</button>
          </form>
      </div>
      </div>
</template>

<script>
    export default {
      data:function() {
        return {
            errors:{},
            post_id:0,
            post:{},
            post_title:"",
            post_slug:"",
            featured_image:"",
            meta_description:"",
            meta_title:"",
            status:"",
            template:"",
            body:"",
            // postBody:"",
            // meta_key_checklist:'checklist',
            // meta_value_checklist:{},
            }
          },
          created: function() {
          // window.location.href
          var id = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);
          this.post_id = id;
          this.getPost();
        },
          methods:{
            // Submit checklist
            deletePost: function(){


            var self = this;
            axios
              .post('/api/admin/posts/delete/'+this.post_id)
              .then(function (response) {
                  window.location.replace("/admin/posts");
              });
            },
            //Get CHECKLIST
            getPost: function(){
              // var data = {id:this.post_id};
              var sel = this;
              axios
                .get('/api/admin/posts/edit/'+this.post_id)
                .then(function (response) {
                  // console.log(response.data);
                  sel.post = response.data;

                  sel.post_title = sel.post.title;
                  sel.post_slug = sel.post.slug;

                  sel.post_title = sel.post.title;
                  sel.post_slug = sel.post.slug;
                  sel.featured_image = sel.post.featured_image;
                  sel.meta_description = sel.post.meta_description;
                  sel.meta_title = sel.post.meta_title;
                  sel.status = sel.post.status;
                  sel.template = sel.post.template;
                  sel.body = sel.post.body;

                  $(document).ready(function() {
                    // $('#summernote').summernote({
                    //   // placeholder: this.post.body,
                    // });https://summernote.org/
                    console.log(sel.post.body);
                    $('#summernote').summernote('code', sel.post.body);
                    // $('#summernote').summernote({tabsize: 2,height: 100});
                  });



            });
            this.submitting = false;
            },
            //Update CHECKLIST
            updatePost: function(){

              // var myJSON = JSON.stringify(this.post);


              this.post.body = $('#summernote').summernote('code');
              this.body = $('#summernote').summernote('code');



              // console.log(myJSON);
              var attributes = {
                'title':this.post_title,
                'body':this.body,
                'featured_image':this.featured_image,
                'template':'default',
                'meta_title':this.meta_title,
                'meta_description':this.meta_description,
                'slug':this.post_slug,
                'status':this.status,
              };


              // var dt = { myJSON };
              var self = this;
              axios
                .post('/api/admin/posts/edit/'+this.post_id, attributes)
                .then(function (response) {
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
                    self.submitting = false;
                }else {


                  self.getPost();
                }
              });
            },
          },
          mounted: function () {


          },

              }
              //  Example Checklist
              // { "CHECKLIST": { "Items": [ { "NAME": "Uptime Robot", "STATE": false }, { "NAME": "Cloudflare", "STATE": false }, { "NAME": "Google Tag Manager", "STATE": false }, { "NAME": "Google Analitics", "STATE": false }, { "NAME": "Turn on ecommerce tracking | Google Analitics", "STATE": false }, { "NAME": "Bugsnag", "STATE": false }, { "NAME": "Generate Sitemap", "STATE": false }, { "NAME": "Robot.txt", "STATE": false }, { "NAME": "Check H1s and Metas", "STATE": false }, { "NAME": "Set up Conversions Events", "STATE": false }, { "NAME": "FavIcon - https://favicon.io/favicon-converter/", "STATE": false }, { "NAME": "Mixpanel.com", "STATE": false }, { "NAME": "Disable Public Registration", "STATE": false } ] } }


</script>
