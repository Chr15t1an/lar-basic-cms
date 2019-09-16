<template>
  <!-- Contact Modal -->

      <div>
            {{ first_name }} {{ last_name }}<br/>
            {{ email }}<br/>

    <hr/>
          {{ msg }}


          <button v-if="!archive" v-on:click="archive" type="button" class="btn btn-primary">Archive</button>
          <button v-if="archive" v-on:click="archive" type="button" class="btn btn-primary">unAchive</button>


          <button v-if="!read" v-on:click="archive" type="button" class="btn btn-primary">Mark Read</button>
          <button v-if="read" type="button" class="btn btn-primary">Mark UnRead</button>

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
            emailid:'',

            }
          },

          methods:{
            // getUrlParam: function(parameter, defaultvalue){
            //       var urlparameter = defaultvalue;
            //       if(window.location.href.indexOf(parameter) > -1){
            //           urlparameter = this.getUrlVars()[parameter];
            //           }
            //       return urlparameter;
            //   },
            //
            //
            //   getUrlVars: function() {
            //       var vars = {};
            //       var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            //           vars[key] = value;
            //       });
            //       return vars;
            //   },





            submitMyForm: function(){
              //Calc price.
              this.submitting = true;

              const dt = { firstname: this.first_name,lastname: this.last_name, email: this.email, msg: this.msg };

              // const dt = { firstname: "gdfg1df2g2121dgfdg",lastname: "gdfg1df2g2121dgfdg", email: "gdfg1df2g2121dgfdg", msg: "gdfg1d9995   <>f2g2121dgfdg" };

              self = this;

              axios
                .post('/api/contact', dt)
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

          this.emailid =   window.location.href.substring(window.location.href.lastIndexOf('/')+ 1);



            },

              }



</script>
