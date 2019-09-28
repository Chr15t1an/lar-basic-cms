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
                <label for="exampleInputEmail1">Site Checklist</label>
                <input v-model="meta_value_checklist" type="text" class="form-control" placeholder="Checklist ID">
              </div>



            <button  v-on:click="submitMyForm" v-on:submit.prevent type="submit" class="btn btn-primary">Save</button>
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


//           Data Format
//           {
//   "CHECKLIST": {
//     "ID": "1",
//     "NAME": "Some Checklist",
//     "Items": [
//       {
//         "NAME": "Qualify Form and Correct Approvals",
//         "STATE": false
//       },
//       {
//         "NAME": "Qualify Form and Correct Approvals",
//         "STATE": false
//       }
//     ]
//     }
// }


            submitting: false,
            errors:{},
            meta_key:'site_checklist',
            meta_value_checklist:'yo',
            value_set:true,

            }
          },
          created: function() {

            // /meta/get
          this.getChecklist();


        },
          methods:{

            submitMyForm: function(){

              if (this.value_set) {
                this.updateChecklist();

              }else {
                this.addChecklist();
              }

            },
            getChecklist: function(){
              var data = { meta_key: this.meta_key };
            //
              var sel = this;
            //
              axios
                .post('/api/meta/get', data)
                .then(function (response) {
                  // console.log(response.data);
                  sel.meta_value_checklist = response.data;
                  // console.log('response');

                  console.log(response.data);

                  if(response.data)
                  {
                    console.log('full');
                    sel.value_set = true;
                  }else {
                    console.log('empty');
                    sel.value_set = false;
                  }

                  sel.submitting = false;

            });

            // self.submitting = false;
            // return this.meta_value;

            this.submitting = false;
            },




            addChecklist: function(){
              //Calc price.
              this.submitting = true;

              var dt = { meta_key: this.meta_key,meta_value: this.meta_value };


              //GTM-W5PBLZD
              console.log(dt);



              sel = this;

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


                  sel.errors = errorMsgs;



                    sel.submitting = false;

                    console.log( response.request.response );
                    console.log( d );

                }else {
                  this.getChecklist();
                }




              });


              // Need to display Errors and have submitting animation.

            },


            updateChecklist: function(){
              //Calc price.
              this.submitting = true;

              var dt = { meta_key: this.meta_key,meta_value: this.meta_value };


              //GTM-W5PBLZD
              console.log(dt);



              var self = this;

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
                  self.getChecklist();
                }




              });


              // Need to display Errors and have submitting animation.

            },


          },
          mounted: function () {



            },

              }



</script>
