<template>
  <div>
  <!-- Signup Component -->
          <div v-if="this.errors.length > 0">
            <div class="alert alert-warning" role="alert">
                There were some validation errors.
                <li v-for="error in this.errors">
                  {{error}}
                </li>
            </div>
          </div>
          <form v-if="!submitting">
            <div class="row">
              <div class="col">
                <label for="exampleInputEmail1">First Name</label>
                <input v-model="first_name" type="text" class="form-control" placeholder="First name">
              </div>
              <div class="col">
                <label for="exampleInputEmail1">Last Name</label>
                <input v-model="last_name" type="text" class="form-control" placeholder="Last name">
              </div>
            </div>
            <div class="form-group">
               <label for="exampleInputEmail1">Email address</label>
               <input v-model="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
               <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
             </div>
              <input v-model="plan" type="text" class="d-none" name="plan" value="none">
            <button  v-on:click="submitMyForm" v-on:submit.prevent type="submit" class="btn btn-primary">Sign up</button>
          </form>
          <div v-if="submitting">
              <div class="loader loader--style5 text-center" title="4">
                <h3>Signup Request Sent</h3>
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
            plan:'none',
            }
          },

          methods:{
          getUrlVars: function() {
                  var vars = {};
                  var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
                      vars[key] = value;
                  });
                  return vars;
              },

            getUrlParam: function(parameter, defaultvalue){
                var urlparameter = defaultvalue;
                if(window.location.href.indexOf(parameter) > -1){
                    urlparameter = this.getUrlVars()[parameter];
                    }
                return urlparameter;
            },

            submitMyForm: function(){
              //Calc price.
              this.submitting = true;
              const dt = { first_name: this.first_name,last_name: this.last_name, email: this.email, plan: this.plan };
              self = this;
              axios
                .post('/api/signup', dt)
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
                          errorMsgs.push(obj[prop][0]);
                      }
                  }
                  self.errors = errorMsgs;
                    self.submitting = false;
                }
              });
            },

          },
          mounted: function () {
            this.plan = this.getUrlParam('plan','none');
            },

              }



</script>
