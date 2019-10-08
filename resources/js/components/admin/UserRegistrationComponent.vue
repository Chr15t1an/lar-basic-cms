<template>
  <div>
  <!-- Toggle User Registration -->
          <div v-if="this.errors.length > 0">
            <div class="alert alert-warning" role="alert">
                There were some validation errors.
                <li v-for="error in this.errors">
                  {{error}}
                </li>
            </div>
          </div>
          <div class="row">
              <div class="col">
                <label for="">User Registration</label>
                <ul class="tg-list">
                <li class="tg-list-item">
                  <input v-model="meta_value_user" class="d-none tgl tgl-flat" id="cb4" type="checkbox"/>
                  <label class="tgl-btn" for="cb4"></label>
                </li>
              </ul>
              </div>
      </div>
      </div>
</template>

<script>
    export default {
      data:function() {
        return {
            errors:{},
            meta_key_userRegistration:'registration',
            meta_value_user:false,
            }
          },
          created: function() {

            // /meta/get
          this.getMeta();


        },
        watch: {
          meta_value_user: function () {
            this.updateMeta();
          }

        },
          methods:{

            getMeta: function(){
              var payload = { meta_key: this.meta_key_userRegistration };
              self = this;
              axios
                .post('/api/meta/get', payload)
                .then(function (response) {
                  self.meta_value_user = response.data;

            });


            },


            updateMeta: function(){

              var payload = { meta_key: this.meta_key_userRegistration,meta_value:this.meta_value_user };
              self = this;
              axios
                .post('/api/meta/update', payload)
                .then(function (response) {
                  // Errors
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
                      }else {
                        self.getMeta();
                      }
              });
            },
          },
          mounted: function () {},
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
