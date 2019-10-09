<template>
  <!-- Contact Modal -->
  <div data-backdrop="static" class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="min-height:320px">
          <div v-if="this.errors.length > 0">
            <div class="alert alert-warning" role="alert">
                There were some validation errors.
                <li v-for="error in this.errors">
                  {{error}}
                </li>
            </div>
          </div>
          <form  v-if="!submitting">
            <div class="form-group">
              <label for="exampleInputPassword1">First Name</label>
              <input v-model="first_name" value="" type="name" name="firstname" class="form-control" id="" placeholder="First Name">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Last Name</label>
              <input v-model="last_name" value="" type="name" name="lastname" class="form-control" id="" placeholder="Last Name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input v-model="email" value="" type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="What's the best address to respond to?">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Message</label>
              <textarea v-model="msg" value="" name="msg" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
          </form>
          <div v-if="submitting">
              <div class="loader loader--style5 text-center" title="4">
                <h3>Email Sent</h3>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button v-on:click="submitMyForm" v-on:submit.prevent type="button" class="btn btn-primary">Send</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      data:function() {
        return {
            submitting: false,
            errors:{},
            first_name:'',
            last_name:'',
            email:'',
            msg:'',
            }
          },

          methods:{
            submitMyForm: function(){
              //Calc price.
              this.submitting = true;
              const dt = { first_name: this.first_name,last_name: this.last_name, email: this.email, msg: this.msg };
              self = this;
              axios
                .post('/api/contact', dt)
                .then(function (response) {

                  if(response.data.errors){
                    var d = '';
                    d = JSON.parse(response.request.responseText);

                    var errorMsgs = [];

                    for (var key in d) {
                      // skip loop if the property is from prototype
                      if (!d.hasOwnProperty(key)) continue;

                      var obj = d[key];
                      for (var prop in obj) {

                          if (!obj.hasOwnProperty(prop)) continue;
                          // your code
                          console.log(obj[prop][0]);
                          errorMsgs.push(obj[prop][0]);
                      }
                  }
                  self.errors = errorMsgs;
                    self.submitting = false;
                }
              });
            },
          },
          mounted: function () {},
              }
</script>
