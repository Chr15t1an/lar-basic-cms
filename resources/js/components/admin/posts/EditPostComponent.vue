<template>

  <div class="row">
  <!-- Admin Todo Checklist -->
          <div v-if="this.errors.length > 0">
            <div class="alert alert-warning" role="alert">
                There were some validation errors.
                <div v-for="error in this.errors">
                  {{error}}
                </div>
            </div>
          </div>

      <div class="col-3 p-3">
        <div class="form-group">
             <label for="">Slug</label>
             <input v-model="post_slug" type="text" class="form-control" id="" required>
        </div>


        <div class="form-group">
             <label for="">Featured Image</label>
             <input v-model="featured_image" type="text" class="form-control" id="" >
        </div>

        <div class="form-group">
             <label for="">Category</label>
             <select class="form-control" v-model="selected">
              <option v-for="category in categorys"  v-bind:value="category.id" >{{category.name}}</option>
             </select>
        </div>


        <div class="form-group">
             <label for="">Tags</label>
             <span v-for="tag in tags" v-bind:class="'add-'+tag.name+' badge badge-secondary p-2 m-1'" v-bind:value="tag.id" >{{tag.name}}
               <a v-on:click="addTag(tag.id)">
                 <i>+</i>
               </a>
               </span>
<!-- v-model="addTag" -->
              <!-- <option v-for="category in categorys"  v-bind:value="category.id" >{{category.name}}</option> -->
            <span v-for="tag in postTags" v-bind:class="'remove-'+tag.name+' badge badge-primary p-2 m-1'" v-bind:value="tag.id" >{{tag.name}}
              <a v-on:click="removeTag(tag.id)">
                <i>X</i>
              </a>
              </span>

        </div>


        <div class="form-group">
             <label for="">Meta Title</label>
             <input v-model="meta_title" type="text" class="form-control" id="" >
        </div>

        <div class="form-group">
             <label for="">Meta Description</label>
             <input v-model="meta_description" type="text" class="form-control" id="" >
        </div>



      </div>

      <div class="col-9">

          <form class="col" v-on:submit.prevent id="">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Title</label>
                <input v-model="post_title" type="text" class="form-control" id="" aria-describedby="" placeholder="Title">
            </div>


            <!-- <div class="form-group">
                 <label for="">Published</label>
                 <input v-model="status" type="checkbox" class="form-control" id="" >
            </div> -->


            <div class="form-group">
            <div class="form-check">
              <input v-model="status" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                Published
              </label>
            </div>
          </div>
            <div v-if="status" class="form-group">
              <!-- <label for="">Public Path</label> -->
              <label class="form-check-label" for="">
                Public Path
              </label>
                <a target="_blank" v-bind:href="public_path"><p>{{public_path}}</p></a>

            </div>



            <div class="form-group">
               <label for="">Body</label>
                <textarea v-model="body" placeholder="add multiple lines" class="form-control" id="exampleFormControlTextarea1">{{body}}</textarea>
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
            public_path:'',
            categorys:{},
            tags:{}, // These are the available tags - less the tags already applied.
            postTags:{}, //Tags asscociated with the post
            selected:0, // Catagory Related.
            allAvailableTags:{},
            // meta_key_checklist:'checklist',
            // meta_value_checklist:{},
            }
          },
          created: function() {
          // window.location.href
          var id = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);
          this.post_id = id;
          this.getPost();


        // Get all Tags
        // List all tags as pills.
        // X remove from array
        // When you type it auto fills available options.

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

            addTag: function(tag){
            var self = this;
            // hide from listed tags and add to added tags

              // add to self.postTags
              self.tags.forEach(
              el =>{
                var found = self.tags.find( a => a.id === tag);
                if (found) {
                  self.postTags.push(el);
                  var index = self.tags.indexOf(found);
                  // console.log(index);
                  self.tags.splice(index, 1);
                }
              });



            },

            removeTag: function(tag){
            var self = this;

            console.log('Ran');

            // remove from self.postTags
            self.postTags.forEach(
            el =>{
              var found = self.postTags.find( a => a.id === tag);
              if (found) {
                // self.postTags.push(el);
                var index = self.postTags.indexOf(found);
                // console.log(index);
                self.postTags.splice(index, 1);

                self.tags.push(found);
              }
            });

            // // add to self.tags
            // self.allAvailableTags.forEach(
            // el =>{
            //   var found = self.tags.find( a => a.id === tag);
            //   console.log(found);
            //   if (!found) {
            //     self.tags.push(found);
            //     // var index = self.tags.indexOf(found);
            //     // console.log(index);
            //     // self.tags.splice(index, 1);
            //   }
            // });



            },

            //Get CHECKLIST
            getPost: function(){
              // var data = {id:this.post_id};
              var sel = this;

            // get Post
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
                  sel.selected = sel.post.category_id;
                  sel.postTags = sel.post.tag;
                  sel.public_path = '/posts/'+sel.post_slug;

                  //Get all Cats
                        axios
                          .get('/api/categories')
                          .then(function (response) {
                            // console.log(response.data);
                            sel.categorys = response.data;
                              });
                  //Get all Tags
                      axios
                        .get('/api/tags')
                        .then(function (response) {
                          sel.allAvailableTags = response.data;
                          var allTags = response.data;
                          var postTags = sel.postTags;
                          var unselectedTags = [];

                            allTags.forEach(
                              el => {
                              var found = postTags.find(e => e.id === el.id );
                              // console.log(found);
                              if(!found){
                                unselectedTags.push(el);
                              }
                            }
                          )
                          sel.tags = unselectedTags;
                        });

            });
            this.submitting = false;
            },
            //Update CHECKLIST
            updatePost: function(){

              //Prep Tag Ids For post.
              var tagIds = "";
              this.postTags.forEach( el =>{

                tagIds = tagIds+el.id+',';
              })
              tagIds = tagIds.substring(0, tagIds.length - 1);

              if(tagIds === ""){
                tagIds = 0;
              };

              var attributes = {
                'title':this.post_title,
                'body':this.body,
                'featured_image':this.featured_image,
                'template':'default',
                'meta_title':this.meta_title,
                'meta_description':this.meta_description,
                'slug':this.post_slug,
                'status':this.status,
                'category':this.selected,
                'tag':tagIds,
              };

              console.log(attributes);
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


</script>
