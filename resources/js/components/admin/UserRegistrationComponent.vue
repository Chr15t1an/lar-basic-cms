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
          <div class="row">
          <form v-if="!submitting">
              <div class="col">
                <label for="exampleInputEmail1">Google Tag Manager</label>
                <input v-model="meta_value_meta" type="text" class="form-control" placeholder="GTM ID">
              </div>


              <input type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled">
          </form>

          <div v-if="submitting">

              <div class="loader loader--style5 text-center" title="4">
                <h3>Data Submitted</h3>
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
            meta_key:'publicRegistration',
            meta_value_gtm:'',
            value_set:false,

            }
          },
          created: function() {

            // /meta/get
          this.getMeta();


        },
          methods:{

            submitMyForm: function(){

              if (this.value_set) {
                this.updateMeta();

              }else {
                this.getMeta();
              }

            },
            getMeta: function(){
              const dt = { meta_key: this.meta_key };

              self = this;

              axios
                .post('/api/meta/get', dt)
                .then(function (response) {
                  console.log(response.data);
                  self.meta_value_gtm = response.data;
                  console.log('response');

                  console.log(response.data);

                  if(response.data)
                  {
                    console.log('full');
                    self.value_set = true;
                  }else {
                    console.log('empty');
                    self.value_set = false;
                  }

                  self.submitting = false;

            });

            // self.submitting = false;
            // return this.meta_value;

            this.submitting = false;
            },




            addMeta: function(){
              //Calc price.
              this.submitting = true;

              const dt = { meta_key: this.meta_key,meta_value: this.meta_value_gtm };


              //GTM-W5PBLZD
              console.log(dt);



              self = this;

              axios
                .post('/api/meta/add', dt)
                .then(function (response) {
                  console.log(response.data)


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

                }else {
                  self.getMeta();
                }




              });


              // Need to display Errors and have submitting animation.

            },


            updateMeta: function(){
              //Calc price.
              this.submitting = true;

              const dt = { meta_key: this.meta_key,meta_value: this.meta_value_gtm };


              //GTM-W5PBLZD
              console.log(dt);



              self = this;

              axios
                .post('/api/meta/update', dt)
                .then(function (response) {
                  console.log(response.data)


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

                }else {
                  self.getMeta();
                }




              });


              // Need to display Errors and have submitting animation.

            },


          },
          mounted: function () {



            },

              }



</script>
