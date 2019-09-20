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
                <input v-model="meta_value" type="text" class="form-control" placeholder="GTM ID">
              </div>

              <!-- <input v-model="meta_key" type="text" class="d-none" name="plan" value="gtm"> -->

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
            meta_key:'gtm',
            meta_value:'',
            value_set:false,

            }
          },
          created: function() {

            // /meta/get
            const dt = { meta_key: this.meta_key };
            axios
              .post('/meta/get', dt)
              .then(function (response) {

          }
          methods:{

            submitMyForm: function(){
              //Calc price.
              this.submitting = true;

              const dt = { meta_key: this.meta_key,meta_value: this.meta_value };

              // const dt = { firstname: "gdfg1df2g2121dgfdg",lastname: "gdfg1df2g2121dgfdg", email: "gdfg1df2g2121dgfdg", msg: "gdfg1d9995   <>f2g2121dgfdg" };

//GTM-W5PBLZD



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



                    self.submitting = false;

                    console.log( response.request.response );
                    console.log( d );

                }


              });


              // Need to display Errors and have submitting animation.



            },


          },
          mounted: function () {




            },

              }



</script>
