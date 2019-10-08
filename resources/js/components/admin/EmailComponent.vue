<template>
  <!-- Read Email Component -->
      <div>
          <h1 v-if="noemail">No EMail Found</h1>
            <strong>From:</strong><br/>{{ first_name }} {{ last_name }}<br/>
            <strong>From email:</strong><br/>{{ email }}<br/>
            <strong> Messages:</strong><br/>
            {{ msg }}<br/>


          <button v-if="!archive" v-on:click="archiveToggle" type="button" class="btn btn-primary">Archive</button>
          <button v-if="archive" v-on:click="archiveToggle" type="button" class="btn btn-default">unAchive</button>

          <button v-if="!read" v-on:click="readToggle" type="button" class="btn btn-primary">Mark Read</button>
          <button v-if="read" v-on:click="readToggle" type="button" class="btn btn-default">Mark UnRead</button>


          <button v-on:click="destroy" type="button" class="btn btn-default">Delete</button>

    </div>
</template>

<script>
    export default {
      data:function() {
        return {
            errors:{},
            first_name:'',
            last_name:'',
            email:'',
            msg:'',
            emailid:'',
            read:true,
            archive:true,
            id:0,
            noemail:false,
            }
          },
          created: function() {
            var pathArray = window.location.pathname.split('/');
            var emailid = pathArray[3];
            this.id = emailid;
            self = this;
            axios.get('/api/admin/contacts/'+emailid)
                  .then(function (response) {
                    // handle success
                    if (response.data) {
                    var payload = response.data;
                    self.first_name = payload.first_name;
                    self.last_name = payload.last_name;
                    self.email = payload.email;
                    self.msg = payload.msg;
                    self.read = payload.read;
                    self.archive = payload.archived;
                  }else {
                    self.noemail = true;
                  }
                  })
          },

          methods:{
            archiveToggle: function() {
              self = this;
              axios.get('/api/email/archive/'+this.id)
                    .then(function (response) {
                      // handle success
                      self.archive = response.data;
                    })
            },

            readToggle: function() {
              self = this;
              axios.get('/api/email/read/'+this.id)
                    .then(function (response) {
                      // handle success
                      self.read = response.data;
                    })
            },
            destroy: function() {
              self = this;
              axios.post('/api/email/archive/'+this.id+'/delete')
                    .then(function (response) {
                      // handle success
                      self.read = response.data;
                      location.reload();
                    })
            },
            },
                      mounted: function () {
                      this.emailid =   window.location.href.substring(window.location.href.lastIndexOf('/')+ 1);
          }

      }



</script>
