<template>
  <!-- Leads Table -->
  <div class="col-10">
      <div v-if="this.errors.length > 0">
        <div class="alert alert-warning" role="alert">
            There were some validation errors.
            <li v-for="error in this.errors">
              {{error}}
            </li>
        </div>
      </div>

      <div v-if="categorys[0]">

      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Edit</th>
            <th scope="col">Name</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(category, name, index) in categorys">
            <th scope="row">
              <a v-on:click="edit(category.name)">
                <i v-bind:class="category.name" class="material-icons">
                build
                </i>
              </a>
              <a  v-on:click="save(category.name)">
                <i  v-bind:class="category.name+'-editing d-none'" class="material-icons">
                  done
                </i>
              </a>

            </th>
            <td v-bind:class="category.name">{{ category.name }}</td>
            <td v-bind:class="category.name+'-editing d-none'">
              <input v-bind:value="category.name" type="text" class="form-control" v-bind:id="category.name">
            <a>

            </a>
            </td>

            <td><a href="#" v-on:click="destroy(category.name)">Delete</a></td>
          </tr>

        </tbody>
      </table>
      </div>
      <div v-else>
        <p>No leads yet.</p>
      </div>
      <div>
          <label for="">Add Categories</label>
          <div class="col-sm-7">
            <input v-model="newCatName" type="text" class="col-sm-4 float-left form-control" id="">
            <button class="btn btn-primary" v-on:click="add(newCatName)">Add Category</button>

          </div>

      </div>
    </div>
</template>

<script>
    export default {
      data:function() {
        return {
            errors:{},
            categorys:{},
            newCatName:"",
            editing:false,
            }
          },

          created: function() {
            self = this;
            //Get all leads.
            this.getCats();
          },

          methods:{
            //Delete a lead.
            destroy: function(name) {

              self = this;

              axios.post('/api/categories/delete/'+name)
                    .then(function (response) {
                      // handle success
                      self.read = response.data;
                      location.reload();
                    })
            },
            getCats: function() {

              var sel = this;
              axios
                .get('/api/categories')
                .then(function (response) {
                  sel.categorys = response.data;
                    });
            },
            save: function(name) {
              // console.log(name);
              var input = $("#"+name).val();
              var sel = this;

              var attributes = {
                'name':input,
              };

              axios.post('/api/categories/edit/'+name,attributes)
                    .then(function (response) {
                      sel.newCatName = "",
                      sel.getCats();
                    })
            },

            add: function(name) {

              var self = this;

              var attributes = {
                'name':this.newCatName,
              };

              axios.post('/api/categories/create',attributes)
                    .then(function (response) {
                      self.newCatName = "",
                      self.getCats();
                    })
            },
            edit: function(name) {

              // Show Editing window
              $('.'+name+'-editing').removeClass( "d-none");
              // Hide Basic
              $('.'+name).addClass( "d-none");
            },
            },
            mounted: function () {
                        }
      }



</script>
