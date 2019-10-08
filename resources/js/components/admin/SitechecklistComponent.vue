<template>

  <div class="container">
  <!-- Contact Modal -->


          <div v-if="this.errors.length > 0">

            <div class="alert alert-warning" role="alert">
                There were some validation errors.



                <div v-for="error in this.errors">

                  {{error}}


                </div>

            </div>

          </div>
          <div class="row">
          <form id="checklistForm">
            <div v-for="item in meta_value_checklist">

              <div v-if="item.STATE">

              <input v-on:click="submitMyChecklist" type="checkbox" v-bind:value="item.NAME" checked>{{item.NAME}} | {{item.STATE}}<br>

              </div>
              <div v-else>

              <input v-on:click="submitMyChecklist" type="checkbox" v-bind:value="item.NAME">{{item.NAME}} | {{item.STATE}}<br>

              </div>


            </div>



          </form>


      </div>
      </div>

</template>

<script>
    export default {
      data:function() {
        return {

//Need to update still

// Data Format -- checklist
// {
//   "CHECKLIST": {
//     "Items": [
//       {
//         "NAME": "Qualify Form and Correct Approvals",
//         "STATE": true
//       },
//       {
//         "NAME": "Qualify Form and Correct Approvals",
//         "STATE": false
//       }
//     ]
//     }
// }
//Post Json
//Pull Json from api
//Display Checklist
// Allow the form to change state
//
// When I check an item collect the current state of the whole list
//  pull form - get all inputs from form.
// check value - .elements[0].value
//  is checked?
// - temp1.elements[0].checked
//
//

//On click Resubmit form



            submitting: false,
            errors:{},
            meta_key_checklist:'checklist',
            meta_value_checklist:{},
            value_set:true,

            }
          },
          created: function() {

            // /meta/get
          this.getChecklist();


        },
          methods:{

            submitMyChecklist: function(){

              // if (this.value_set) {
              //   this.updateChecklist();
              //
              // }else {
              //   this.addChecklist();
              // }

              var formElements = $('#checklistForm')[0].elements;
              var obToArray = Object.values(formElements);
              var listItems = [];
              obToArray.forEach(function(element) {
                listItems.push({"NAME":element.value,"STATE":element.checked});
                // console.log({"NAME":element.value,"STATE":element.checked});
              });

              this.meta_value_checklist = listItems;

              // var payload = '{"CHECKLIST": {"Items": ['+listItems+']}}';
              // var payload = {"CHECKLIST": {"Items": [listItems]}};

              // console.log(payload);

              this.updateChecklist();

              // meta_value_checklist = listItems

              // console.log($('#checklistForm')[0].elements);

            },
            getChecklist: function(){
              var data = { meta_key: this.meta_key_checklist };
            //
              var sel = this;
            //
              axios
                .post('/api/meta/get', data)
                .then(function (response) {
                  // console.log(response.data);
                  sel.meta_value_checklist = response.data.CHECKLIST.Items;
                  // console.log(sel.meta_value_checklist);

                  // console.log(response.data);

                  if(response.data)
                  {
                    // console.log('full');
                    sel.value_set = true;
                  }else {
                    // console.log('empty');
                    sel.value_set = false;
                  }

                  sel.submitting = false;

            });

            // self.submitting = false;
            // return this.meta_value;

            this.submitting = false;
            },


            updateChecklist: function(){
              //Calc price.
              // this.submitting = true;

              var payload = {"CHECKLIST": {"Items": this.meta_value_checklist}};

              var myJSON = JSON.stringify(payload);

              console.log(myJSON);
              console.log(typeof(myJSON));

              var dt = { meta_key: this.meta_key_checklist, meta_value: myJSON };


              //GTM-W5PBLZD
              // console.log(dt);

              // exit;

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
                          // console.log(obj[prop][0]);
                          errorMsgs.push(obj[prop][0]);


                      }
                  }


                  self.errors = errorMsgs;



                    self.submitting = false;

                    // console.log( response.request.response );
                    // console.log( d );

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


              // {
              //   "CHECKLIST": {
              //     "Items": [
              //       {
              //         "NAME": "Uptime Robot",
              //         "STATE": false
              //       },
              //       {
              //         "NAME": "Cloudflare",
              //         "STATE": false
              //       },
              //       {
              //         "NAME": "Google Tag Manager",
              //         "STATE": false
              //       },
              //       {
              //         "NAME": "Google Analitics",
              //         "STATE": false
              //       },
              //       {
              //         "NAME": "Turn on ecommerce tracking | Google Analitics",
              //         "STATE": false
              //       },
              //       {
              //         "NAME": "Bugsnag",
              //         "STATE": false
              //       },
              //       {
              //         "NAME": "Generate Sitemap",
              //         "STATE": false
              //       },
              //       {
              //         "NAME": "Robot.txt",
              //         "STATE": false
              //       },
              //       {
              //         "NAME": "Check H1s and Metas",
              //         "STATE": false
              //       },
              //       {
              //         "NAME": "Set up Conversions Events",
              //         "STATE": false
              //       },
              //       {
              //         "NAME": "FavIcon - https://favicon.io/favicon-converter/",
              //         "STATE": false
              //       },
              //       {
              //         "NAME": "Mixpanel.com",
              //         "STATE": false
              //       },
              //       {
              //         "NAME": "Disable Public Registration",
              //         "STATE": false
              //       }
              //     ]
              //     }
              // }
              // { "CHECKLIST": { "Items": [ { "NAME": "Uptime Robot", "STATE": false }, { "NAME": "Cloudflare", "STATE": false }, { "NAME": "Google Tag Manager", "STATE": false }, { "NAME": "Google Analitics", "STATE": false }, { "NAME": "Turn on ecommerce tracking | Google Analitics", "STATE": false }, { "NAME": "Bugsnag", "STATE": false }, { "NAME": "Generate Sitemap", "STATE": false }, { "NAME": "Robot.txt", "STATE": false }, { "NAME": "Check H1s and Metas", "STATE": false }, { "NAME": "Set up Conversions Events", "STATE": false }, { "NAME": "FavIcon - https://favicon.io/favicon-converter/", "STATE": false }, { "NAME": "Mixpanel.com", "STATE": false }, { "NAME": "Disable Public Registration", "STATE": false } ] } }


</script>
