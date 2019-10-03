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
          <form>
              <div class="col">
                <label for="">User Registration</label>

                <ul class="tg-list">
                <li class="tg-list-item">
                  <!-- <h4>Flat</h4> checked> is true-->
                  <input v-model="meta_value_user" class="d-none tgl tgl-flat" id="cb4" type="checkbox"/>
                  <label class="tgl-btn" for="cb4"></label>
                </li>
              </ul>

              </div>



          </form>




      </div>
      </div>

</template>

<script>
    export default {
      data:function() {
        return {

            // submitting: false,
            errors:{},
            meta_key:'registration',
            meta_value_user:false,
            // value_set:false,

            }
          },
          created: function() {

            // /meta/get
          this.getMeta();


        },
        watch: {
          meta_value: function () {
            this.updateMeta();
          }

        },
          methods:{

            // submitMyForm: function(){
            //
            //   if (this.value_set) {
            //     this.updateMeta();
            //
            //   }else {
            //     this.getMeta();
            //   }
            //
            // },
            getMeta: function(){
              const dt = { meta_key: this.meta_key };

              self = this;

              axios
                .post('/api/meta/get', dt)
                .then(function (response) {
                  console.log(response.data);
                  self.meta_value = response.data;
                  console.log('response');

                  console.log(response.data);

                  // if(response.data)
                  // {
                  //   console.log('full');
                  //   self.value_set = true;
                  // }else {
                  //   console.log('empty');
                  //   self.value_set = false;
                  // }
                  //
                  // self.submitting = false;

            });

            // self.submitting = false;
            // return this.meta_value;

            // this.submitting = false;
            },

            //meta_value - watcher?


            // addMeta: function(){
            //   //Calc price.
            //   this.submitting = true;
            //
            //   const dt = { meta_key: this.meta_key,meta_value: this.meta_value_gtm };
            //
            //
            //   //GTM-W5PBLZD
            //   console.log(dt);
            //
            //
            //
            //   self = this;
            //
            //   axios
            //     .post('/api/meta/add', dt)
            //     .then(function (response) {
            //       console.log(response.data)
            //
            //
            //       if(response.data.errors){
            //
            //         var d = '';
            //
            //
            //         d = JSON.parse(response.request.responseText);
            //         // console.log(d);
            //         var errorMsgs = [];
            //
            //         for (var key in d) {
            //           // skip loop if the property is from prototype
            //           if (!d.hasOwnProperty(key)) continue;
            //
            //           var obj = d[key];
            //           for (var prop in obj) {
            //               // skip loop if the property is from prototype
            //               if (!obj.hasOwnProperty(prop)) continue;
            //
            //               // your code
            //               console.log(obj[prop][0]);
            //               errorMsgs.push(obj[prop][0]);
            //
            //
            //           }
            //       }
            //
            //
            //       self.errors = errorMsgs;
            //
            //
            //
            //         self.submitting = false;
            //
            //         console.log( response.request.response );
            //         console.log( d );
            //
            //     }else {
            //       self.getMeta();
            //     }
            //
            //
            //
            //
            //   });
            //
            //
            //   // Need to display Errors and have submitting animation.
            //
            // },


            updateMeta: function(){
              //Calc price.
              // this.submitting = true;

              const dt = { meta_key: this.meta_key,meta_value:true  };//this.meta_value_user


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



                    // self.submitting = false;

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


<style>
ul,
li {
  list-style: none;
  margin: 0;
  padding: 0;
}
.tgl, .tgl:after, .tgl:before, .tgl *, .tgl *:after, .tgl *:before, .tgl + .tgl-btn {
  box-sizing: border-box;
}
.tgl::-moz-selection, .tgl:after::-moz-selection, .tgl:before::-moz-selection, .tgl *::-moz-selection, .tgl *:after::-moz-selection, .tgl *:before::-moz-selection, .tgl + .tgl-btn::-moz-selection {
  background: none;
}
.tgl::selection, .tgl:after::selection, .tgl:before::selection, .tgl *::selection, .tgl *:after::selection, .tgl *:before::selection, .tgl + .tgl-btn::selection {
  background: none;
}
.tgl + .tgl-btn {
  outline: 0;
  display: block;
  width: 4em;
  height: 2em;
  position: relative;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.tgl + .tgl-btn:after, .tgl + .tgl-btn:before {
  position: relative;
  display: block;
  content: "";
  width: 50%;
  height: 100%;
}
.tgl + .tgl-btn:after {
  left: 0;
}
.tgl + .tgl-btn:before {
  display: none;
}
.tgl:checked + .tgl-btn:after {
  left: 50%;
}

.tgl-flat + .tgl-btn {
  padding: 2px;
  transition: all 0.2s ease;
  background: #fff;
  border: 4px solid #f2f2f2;
  border-radius: 2em;
}
.tgl-flat + .tgl-btn:after {
  transition: all 0.2s ease;
  background: #f2f2f2;
  content: "";
  border-radius: 1em;
}
.tgl-flat:checked + .tgl-btn {
  border: 4px solid #7fc6a6;
}
.tgl-flat:checked + .tgl-btn:after {
  left: 50%;
  background: #7fc6a6;
}



</style>
