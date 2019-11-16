<template>
  <div>
  <!-- GTM Compnent -->
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
            <div class="form-group">
              <input v-model="meta_value_gtm" type="text" class="form-control" placeholder="GTM ID">
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
            submitting: false,
            errors:{},
            meta_key_gtm:'gtm',
            meta_value_gtm:'',
            value_set:false,
            }
          },
          created: function() {
          this.getGTM();
        },
          methods:{
            //Submit my GTM form.
            submitMyForm: function(){
              if (this.value_set) {
                this.updateGTM();
              }else {
                this.addGTM();
              }
            },
            //Get GTM data.
            getGTM: function(){
              var dt = { meta_key: this.meta_key_gtm };
              var self = this;
              axios
                .post('/api/meta/get', dt)
                .then(function (response) {
                  self.meta_value_gtm = response.data;
                  if(response.data)
                  {
                    self.value_set = true;
                  }else {
                    self.value_set = false;
                  }
            });

            this.submitting = false;
            },
            //Add initial GTM data.
            addGTM: function(){
              this.submitting = true;
              var dt = { meta_key: this.meta_key,meta_value: this.meta_value_gtm };
              self = this;
              axios
                .post('/api/meta/add', dt)
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
                          // skip loop if the property is from prototype
                          if (!obj.hasOwnProperty(prop)) continue;
                          errorMsgs.push(obj[prop][0]);
                      }
                  }
                  self.errors = errorMsgs;
                    self.submitting = false;
                }else {
                  self.getGTM();
                }
              });
            },
            //Update GTM data.
            updateGTM: function(){
              this.submitting = true;
              const dt = { meta_key: this.meta_key,meta_value: this.meta_value_gtm };
              self = this;
              axios
                .post('/api/meta/update', dt)
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
                          // skip loop if the property is from prototype
                          if (!obj.hasOwnProperty(prop)) continue;
                          errorMsgs.push(obj[prop][0]);
                      }
                  }
                  self.errors = errorMsgs;
                    self.submitting = false;
                }else {
                  self.getGTM();
                }
              });
            },
          },
          mounted: function () {},
          }

</script>
