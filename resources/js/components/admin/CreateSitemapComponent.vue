<template>
  <!-- Create Sitemap Component -->
      <div>
        <div v-if="this.errors.length > 0">
          <div class="alert alert-warning" role="alert">

              <li v-for="error in this.errors">
                {{error}}
              </li>
          </div>
        </div>
<!-- A button to fire the api request -->
        <button v-on:click='makeSitemap' class="btn btn-dark">Generate Sitemap</button>

    </div>
</template>

<script>
    export default {
      data:function() {
        return {
            errors:{},
            }
          },
          created: function() {

          },

          methods:{
            makeSitemap: function() {
              self = this;
              //Api Request. 
              axios.get('/api/admin/settings/seo/gen-sitemap')
                    .then(function (response) {
                      // handle success

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
                    }

                    })
            },
            },
            mounted: function () {

          }

      }



</script>
