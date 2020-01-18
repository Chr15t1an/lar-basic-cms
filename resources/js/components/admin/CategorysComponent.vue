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

      <div v-if="categorys[0]">
        <a class="btn btn-success" href="/admin/leads/export">Export leads</a>
        <hr/>
      <table class="table table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(category, name, index) in categorys">
            <th scope="row">{{ index }}</th>
            <td>{{ category.name }}</td>
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

       <input v-model="newCatName" type="text" class="form-control" id="">
       <button v-on:click="add(newCatName)">Add Category</button>



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
                  // console.log(response.data);
                  sel.categorys = response.data;
                    });
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
            },
            mounted: function () {
                        }
      }



</script>
