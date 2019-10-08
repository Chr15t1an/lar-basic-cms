<template>
  <!-- Contact Modal -->


      <div>
          <h1 v-if="noemail">No EMail Found</h1>
            <strong>From:</strong><br/>{{ first_name }} {{ last_name }}<br/>
            <strong>From email:</strong><br/>{{ email }}<br/>
          <strong> Messages:</strong><br/>
          {{ msg }}<br/>


          <button v-if="!archive" v-on:click="archiveToggle" type="button" class="btn btn-primary">Archive</button>
          <button v-if="archive" v-on:click="archiveToggle" type="button" class="btn btn-default">unAchive</button>

          <button v-if="!read" v-on:click="readToggle" type="button" class="btn btn-primary">Mark Read</button>
          <button v-if="read" v-on:click="readToggle" type="button" class="btn btn-default">Mark UnRead</button>


          <button v-on:click="destroy" type="button" class="btn btn-default">Delete</button>

    </div>



</template>

<script>
    export default {
      data:function() {
        return {

            // submitting: false,
            errors:{},
            first_name:'',
            last_name:'',
            email:'',
            msg:'',
            emailid:'',
            read:true,
            archive:true,
            id:0,
            noemail:false,

            }
          },

          created: function() {

            var pathArray = window.location.pathname.split('/');
            console.log(pathArray[3]);

            var emailid = pathArray[3];
            this.id = emailid;

            self = this;
            axios.get('/api/admin/contacts/'+emailid)
                  .then(function (response) {
                    // handle success
                    console.log(response.data);
                    console.log('data');
                    if (response.data) {


                    var payload = response.data;

                    self.first_name = payload.first_name;
                    self.last_name = payload.last_name;
                    self.email = payload.email;
                    self.msg = payload.msg;
                    self.read = payload.read;
                    self.archive = payload.archived;
                  }else {
                    console.log('no data');
                    self.noemail = true;
                  }

                  })



            // axios
            //   .get('/api/admin/contacts/1')
            //   .then(function (response) {
            //
            //   }


          },

          methods:{


            archiveToggle: function() {

              // /email/read/{id}
              // Route::post('/email/archive/{id}','ContactController@archive');
              // Route::post('/email/read/{id}','ContactController@read');

              // self = this;
              //
              // axios
              //   .post('/email/read/'+this, dt)
              //   .then(function (response) {
              //
              //   }
              self = this;
              axios.get('/api/email/archive/'+this.id)
                    .then(function (response) {
                      // handle success
                      // console.log(response.data);
                      self.archive = response.data;

                    })



            },

            readToggle: function() {
              // /email/read/{id}
              // Route::post('/email/archive/{id}','ContactController@archive');
              // Route::post('/email/read/{id}','ContactController@read');


              self = this;
              axios.get('/api/email/read/'+this.id)
                    .then(function (response) {
                      // handle success
                      // console.log(response.data);
                      self.read = response.data;
                    })

            },


            destroy: function() {
              // /email/read/{id}
              // Route::post('/email/archive/{id}','ContactController@archive');
              // Route::post('/email/read/{id}','ContactController@read');

              // add a confirmation.


              self = this;
              axios.post('/api/email/archive/'+this.id+'/delete')
                    .then(function (response) {
                      // handle success
                      // console.log(response.data);
                      self.read = response.data;
                      location.reload();
                    })

            },


            },
                      mounted: function () {

                      this.emailid =   window.location.href.substring(window.location.href.lastIndexOf('/')+ 1);



                        }

      }



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



// http://handleinbound.test/api/email/archive/5/delete

            // submitMyForm: function(){
            //   //Calc price.
            //   this.submitting = true;
            //
            //   const dt = { firstname: this.first_name,lastname: this.last_name, email: this.email, msg: this.msg };
            //
            //   // const dt = { firstname: "gdfg1df2g2121dgfdg",lastname: "gdfg1df2g2121dgfdg", email: "gdfg1df2g2121dgfdg", msg: "gdfg1d9995   <>f2g2121dgfdg" };
            //
            //   self = this;
            //
            //   axios
            //     .post('/api/contact', dt)
            //     .then(function (response) {
            //       // console.log(response.data)
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


                    // parce errors

                    // loop through errors


                    // self.errors = response.data.errors;
                  // self.errors =  response.request.response;
                  // b = response.request.response;
                  // self.errors = Object.keys(b.errors).map(i => b.errors[i])

                  // d = response.request.response;


                    // self.errors = Object.entries(response.request.response);


                    // a = response.data.errors;
                    //
                    // self.submitting = false;
                    //  // Object.values(b.errors)
                    //  // const peopleArray = Object.keys(peopleObj).map(i => peopleObj[i])
                    //  //
                    //  // const peopleArray = Object.keys(b.errors).map(i => b.errors[i])
                    //  //
                    //  //
                    //  // peopleArray = Object.keys(b.errors).map(i => b.errors[i])
                    //  //
                    //
                    // console.log( response.request.response );
                    // console.log( d );
                //
                // }

              //
              // });


              // Need to display Errors and have submitting animation.



</script>
