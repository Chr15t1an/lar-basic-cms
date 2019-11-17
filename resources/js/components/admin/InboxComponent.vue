<template>
  <!-- Read Email Component -->
    <div>
            <div class="email" v-for="email in emails">
              <span v-if="email.archived"></span>
              <a href="#" v-on:click="openEmail(email.id)"><p>{{email.first_name}} {{email.last_name}}</p></a>
              <i v-on:click="archiveToggle(email.id)" v-if="!email.archived" class="material-icons">archive</i>
              <i v-on:click="archiveToggle(email.id)" v-else class="material-icons">unarchive</i>
              <!-- <i v-on:click="archiveToggle(email.id)" class="material-icons">unarchive</i> -->
              <i v-on:click="destroy(email.id)" class="material-icons">delete</i>
            </div>
    </div>
</template>

<script>
    export default {
      data:function() {
        return {
            errors:{},
            emails:{},
            }
          },
          created: function() {
            //Get All emails.
              this.getEmaillist();
          },

          methods:{
            //Archive or unarchive email
            archiveToggle: function(id) {
              console.log(id);
              self = this;
              axios.get('/api/email/archive/'+id)
                    .then(function (response) {
                      // handle success
                      // self.archive = response.data;
                      self.getEmaillist();
                    })
            },

            //Mark read & unread email
            readToggle: function() {
              self = this;
              axios.get('/api/email/read/'+this.id)
                    .then(function (response) {
                      // handle success
                      self.read = response.data;
                    })
            },
            //delete the email
            destroy: function(id) {
              self = this;
              axios.post('/api/email/archive/'+id+'/delete')
                    .then(function (response) {
                      // handle success
                      self.read = response.data;
                      // location.reload();
                      self.getEmaillist();
                    })
            },
            getEmaillist: function() {
              var self = this;
              axios
                .get('/api/emails')
                .then(function (response) {
                  self.emails = response.data;
                  console.log(self.emails);
            });
            },
            openEmail:function(id) {

              window.location.replace("/admin/contacts/"+id);
            },

            },
                      mounted: function () {
                    this.emailid =   window.location.href.substring(window.location.href.lastIndexOf('/')+ 1);
          }
      }
</script>
<style>
.email {
  border: 1px #00000026 solid;
  padding: 10px;
  position: relative;
}

.email span{
    position: absolute;
    background-color: #00000026;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    color: black;
    text-align: center;
    overflow:visible;
    pointer-events:none;

}


.email:first-of-type{
    border-radius: 6px 6px 0px 0px;
}

.email:last-of-type{
    border-radius: 0px 0px 6px 6px;
}
</style>
