<template>

  <div class="container ">
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
          <form class="col" v-on:submit.prevent id="">

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Title</label>
                <input v-model="post_title" type="text" class="form-control" id="" aria-describedby="" placeholder="Title">
            </div>

            <!-- <div class="form-group">
                 <label for="">Slug</label>
                 <input v-model="post_slug" type="text" class="form-control" id="" required>
            </div> -->

            <!-- <div class="form-group">
                 <label for="">Featured Image</label>
                 <input v-model="featured_image" type="text" class="form-control" id="" >
            </div> -->

            <!-- <div class="form-group">
                 <label for="">Meta Title</label>
                 <input v-model="meta_title" type="text" class="form-control" id="" >
            </div>

            <div class="form-group">
                 <label for="">Meta Description</label>
                 <input v-model="meta_description" type="text" class="form-control" id="" >
            </div> -->

            <!-- <div class="form-group">
                 <label for="">Published</label>
                 <input v-model="status" type="checkbox" class="form-control" id="" >
            </div> -->



            <!-- <div class="form-group">
               <label for="">Body</label>
                <textarea v-model="body" placeholder="add multiple lines" class="form-control" id="exampleFormControlTextarea1">{{body}}</textarea>
          </div> -->
          <button v-on:click="createPost" class="btn btn-primary mb-2">Create</button>
          </form>
      </div>
      </div>
</template>

<script>
    export default {
      data:function() {
        return {
            errors:{},
            post_title:"",
            status:0,
            }
          },

          methods:{

            //Update CHECKLIST
            createPost: function(){

              var slug = this.post_title;
              slug = slug.toLowerCase();
              slug = slug.replace(/[^a-z0-9+ ]+/gi, '');
              slug = slug.replace(/\s/g, "-");

              var attributes = {
                'title':this.post_title,
                'template':'default',
                'slug':slug,
                'status':this.status,
              };

              var self = this;
              axios
                .post('/api/admin/posts/store', attributes)
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
                  var new_post_id = response.data.id;
                  // console.log(new_post_id);
                  window.location.replace("/admin/posts/edit/"+new_post_id);
                  // self.getPost();
                }
              });
            },
          },


              }

</script>
