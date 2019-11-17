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

      <div v-if="leads[0]">
        <a class="btn btn-success" href="/admin/leads/export">Export leads</a>
        <hr/>
      <table class="table table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Email</th>
            <th scope="col">Plan</th>
            <th scope="col">Created At</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(lead, name, index) in leads">
            <th scope="row">{{ index }}</th>
            <td>{{ lead.first_name }}</td>
            <td>{{ lead.last_name }} </td>
            <td>{{ lead.email }}</td>
            <td>{{ lead.plan }}</td>
            <td>{{ lead.created_at }}</td>
            <td><a href="#" v-on:click="destroy(lead.id )">Delete</a></td>
          </tr>

        </tbody>
      </table>
      </div>
      <div v-else>
        <p>No leads yet.</p>
      </div>

    </div>
</template>

<script>
    export default {
      data:function() {
        return {
            errors:{},
            leads:{},
            }
          },

          created: function() {
            self = this;
            //Get all leads.
            axios.get('/api/admin/leads')
                  .then(function (response) {
                    self.leads = response.data;
                    if (response.data) {
                  }else {
                    self.noemail = true;
                  }
                  })
          },

          methods:{
            //Delete a lead.
            destroy: function(itemId) {

              self = this;

              axios.post('/api/admin/leads/'+itemId+'/delete')
                    .then(function (response) {
                      // handle success
                      self.read = response.data;
                      location.reload();
                    })
            },
            },
            mounted: function () {
                        }
      }



</script>
