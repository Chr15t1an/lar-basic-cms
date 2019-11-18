<template>

  <div class="container">

    <a class="btn btn-primary" href="/admin/posts/create">Create New</a>

    <hr/>

  <!-- Admin Todo Checklist -->
          <div v-if="this.errors.length > 0">
            <div class="alert alert-warning" role="alert">
                There were some validation errors.
                <div v-for="error in this.errors">
                  {{error}}
                </div>
            </div>
          </div>


          <h1 v-if="!posts.length">Empty</h1>


          <div class="post" v-for="item in posts">
            <span v-if="item.status"></span>
            <a v-bind:href="'/admin/posts/edit/'+ item.id"><p>{{item.title}}</p></a>
            <!-- <i v-on:click="archiveToggle(email.id)" v-if="!email.archived" class="material-icons">archive</i>
            <i v-on:click="archiveToggle(email.id)" v-else class="material-icons">unarchive</i> -->
            <!-- <i v-on:click="archiveToggle(email.id)" class="material-icons">unarchive</i> -->
            <!-- <i v-on:click="destroy(email.id)" class="material-icons">delete</i> -->
          </div>


          <!-- <div v-if="posts[0]" v-for="item in posts">
            <p><a v-bind:href="'/admin/posts/edit/'+ item.id">{{item.title}}</a></p>
            <br/>
          </div> -->
          <!-- <div v-else>
            <h1>No Posts Yet</h1>
          </div> -->


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

<style>
.post {
  border: 1px #00000026 solid;
  padding: 10px;
  position: relative;
}

.post span{
    position: absolute;
    background-color: #a1afe026;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    color: black;
    text-align: center;
    overflow:visible;
    pointer-events:none;

}


.post:first-of-type{
    border-radius: 6px 6px 0px 0px;
}

.post:last-of-type{
    border-radius: 0px 0px 6px 6px;
}
</style>
