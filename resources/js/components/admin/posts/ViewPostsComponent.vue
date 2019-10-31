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

          <div v-for="item in posts">
            <p><a v-bind:href="'/admin/posts/edit/'+ item.id">{{item.title}}</a></p>
            <br/>
          </div>


      </div>
</template>

<script>
    export default {
      data:function() {
        return {
            errors:{},
            posts:[],
            }
          },
          created: function() {
          this.getPosts();
        },
          methods:{
            //Get CHECKLIST
            getPosts: function(){
              var sel = this;
              axios
                .get('/api/admin/posts')
                .then(function (response) {
                  console.log('console.log(response);');
                  console.log(response.data);
                  sel.posts = response.data;
            });

            },

          },
          mounted: function () {},

              }


</script>
