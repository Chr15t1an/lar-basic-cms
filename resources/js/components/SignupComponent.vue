<template>

  <div>
  <!-- Contact Modal -->


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

              const dt = { firstname: this.first_name,lastname: this.last_name, email: this.email, plan: this.plan };

              // const dt = { firstname: "gdfg1df2g2121dgfdg",lastname: "gdfg1df2g2121dgfdg", email: "gdfg1df2g2121dgfdg", msg: "gdfg1d9995   <>f2g2121dgfdg" };

              self = this;

              axios
                .post('/api/signup', dt)
                .then(function (response) {
                  // console.log(response.data)


                  if(response.data.errors){

                    var d = '';


                    d = JSON.parse(response.request.responseText);
                    // console.log(d);
                    var errorMsgs = [];

                    for (var key in d) {
                      // skip loop if the property is from prototype
                      if (!d.hasOwnProperty(key)) continue;

                      var obj = d[key];
                      for (var prop in obj) {
                          // skip loop if the property is from prototype
                          if (!obj.hasOwnProperty(prop)) continue;

                          // your code
                          console.log(obj[prop][0]);
                          errorMsgs.push(obj[prop][0]);


                      }
                  }


                  self.errors = errorMsgs;



                    // parce errors

                    // loop through errors


                    // self.errors = response.data.errors;
                  // self.errors =  response.request.response;
                  // b = response.request.response;
                  // self.errors = Object.keys(b.errors).map(i => b.errors[i])

                  // d = response.request.response;


                    // self.errors = Object.entries(response.request.response);


                    // a = response.data.errors;

                    self.submitting = false;
                     // Object.values(b.errors)
                     // const peopleArray = Object.keys(peopleObj).map(i => peopleObj[i])
                     //
                     // const peopleArray = Object.keys(b.errors).map(i => b.errors[i])
                     //
                     //
                     // peopleArray = Object.keys(b.errors).map(i => b.errors[i])
                     //

                    console.log( response.request.response );
                    console.log( d );

                }


              });


              // Need to display Errors and have submitting animation.



            },


          },
          mounted: function () {

            this.plan = this.getUrlParam('plan','none');


            },

              }



</script>
