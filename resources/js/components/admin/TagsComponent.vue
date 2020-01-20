<template>
  <!-- Leads Table -->
  <div>
      <div v-if="this.errors.length > 0">
        <div class="alert alert-warning" role="alert">
            There were some validation errors.
            <li v-for="error in this.errors">
              {{error}}
            </li>
        </div>
      </div>


      <div v-if="tags[0]">

        <hr/>
      <table class="table table-responsive">
        <thead>
          <tr>
            <th scope="col">Edit</th>
            <th scope="col">Name</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(tag, name, index) in tags">
            <th scope="row">
              <a v-on:click="edit(tag.name)">
                <i v-bind:class="tag.name" class="material-icons">
                build
                </i>
              </a>
              <a  v-on:click="save(tag.name)">
                <i  v-bind:class="tag.name+'-editing d-none'" class="material-icons">
                  done
                </i>
              </a>

            </th>
            <td v-bind:class="tag.name">{{ tag.name }}</td>
            <td v-bind:class="tag.name+'-editing d-none'">
              <input v-bind:value="tag.name" type="text" class="form-control" v-bind:id="tag.name">
            <a>

            </a>
            </td>

            <td><a href="#" v-on:click="destroy(tag.name)">Delete</a></td>
          </tr>

        </tbody>
      </table>
      </div>
      <div v-else>
        <p>No leads yet.</p>
      </div>
      <div>
          <label for="">Add Tags</label>

       <input v-model="newTagName" type="text" class="form-control" id="">
       <button v-on:click="add(newTagName)">Add Tag</button>



      </div>
    </div>
</template>

<script>
    export default {
      data:function() {
        return {
            errors:{},
            tags:{},
            newTagName:"",
            editing:false,
            }
          },

          created: function() {
            self = this;
            //Get all leads.
            this.getTags();
          },

          methods:{
            //Delete a lead.
            destroy: function(name) {

              self = this;

              axios.post('/api/tag/delete/'+name)
                    .then(function (response) {
                      // handle success
                      self.read = response.data;
                      location.reload();
                    })
            },
            getTags: function() {

              var sel = this;
              axios
                .get('/api/tags')
                .then(function (response) {
                  // console.log(response.data);
                  sel.tags = response.data;
                    });
            },
            save: function(name) {
              // console.log(name);
              var input = $("#"+name).val();
              var sel = this;

              var attributes = {
                'name':input,
              };

              axios.post('/api/tag/edit/'+name,attributes)
                    .then(function (response) {
                      sel.newTagName = "",
                      sel.getTags();
                    })
            },

            add: function(name) {

              var self = this;

              var attributes = {
                'name':this.newTagName,
              };

              axios.post('/api/tag/create',attributes)
                    .then(function (response) {
                      self.newTagName = "",
                      self.getTags();
                    })
            },
            edit: function(name) {

              console.log(name);
              // Show Editing window
              $('.'+name+'-editing').removeClass( "d-none");
              // Hide Basic
              $('.'+name).addClass( "d-none");


              console.log('.'+name+'-editing');
            },
            },
            mounted: function () {
                        }
      }



</script>
