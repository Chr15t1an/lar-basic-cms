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
                 <input v-model="this.post.title" type="text" class="form-control" id="" required>
            </div>

            <div class="form-group">
                 <label for="">Slug</label>
                 <input v-model="this.post.slug" type="text" class="form-control" id="" required>
            </div>

              <div class="form-group">
                   <label for="exampleFormControlTextarea1">Body</label>
                   <div id="summernote">New Post</div>
              </div>
          <button v-on:click="updatePost" class="btn btn-primary mb-2">Update</button>
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

            }
          },
          created: function() {
        },
          methods:{

            //Update CHECKLIST
            updatePost: function(){

              this.post.body = $('#summernote').summernote('code');


              // console.log(myJSON);
              var attributes = {
                'title':this.post.title,
                'body':this.post.body,
                'featured_image':this.post.featured_image,
                'template':this.post.template,
                'meta_title':this.post.meta_title,
                'meta_description':this.post.meta_description,
                'slug':this.post.slug,
                'status':this.post.status,
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


            var attributes = {
              'title':'this.post.title',
              'body':'this.post.body',
              'featured_image':'this.post.featured_image',
              'template':'this.post.template',
              'meta_title':'this.post.meta_title',
              'meta_description':'this.post.meta_description',
              'slug':'this.post.slug',
              'status':'this.post.status',
            };
            this.post = attributes;


            $(document).ready(function() {
              // $('#summernote').summernote({
              //   // placeholder: this.post.body,
              // });https://summernote.org/
              // console.log(sel.post.body);
              // $('#summernote').summernote();
              $('#summernote').summernote('code', '<h6>Start..<h6/>');
              // $('#summernote').summernote({tabsize: 2,height: 100});
            });


          },

              }
              //  Example Checklist
              // { "CHECKLIST": { "Items": [ { "NAME": "Uptime Robot", "STATE": false }, { "NAME": "Cloudflare", "STATE": false }, { "NAME": "Google Tag Manager", "STATE": false }, { "NAME": "Google Analitics", "STATE": false }, { "NAME": "Turn on ecommerce tracking | Google Analitics", "STATE": false }, { "NAME": "Bugsnag", "STATE": false }, { "NAME": "Generate Sitemap", "STATE": false }, { "NAME": "Robot.txt", "STATE": false }, { "NAME": "Check H1s and Metas", "STATE": false }, { "NAME": "Set up Conversions Events", "STATE": false }, { "NAME": "FavIcon - https://favicon.io/favicon-converter/", "STATE": false }, { "NAME": "Mixpanel.com", "STATE": false }, { "NAME": "Disable Public Registration", "STATE": false } ] } }


</script>
