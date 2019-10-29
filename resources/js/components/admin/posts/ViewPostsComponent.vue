<template>

  <div class="container">
  <!-- Admin Todo Checklist -->
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
            errors:{},
            meta_key_checklist:'checklist',
            meta_value_checklist:{},
            }
          },
          created: function() {
          this.getChecklist();
        },
          methods:{
            // Submit checklist
            submitMyChecklist: function(){
              var formElements = $('#checklistForm')[0].elements;
              var obToArray = Object.values(formElements);
              var listItems = [];
              obToArray.forEach(function(element) {
                listItems.push({"NAME":element.value,"STATE":element.checked});
              });
              this.meta_value_checklist = listItems;
              this.updateChecklist();
            },
            //Get CHECKLIST
            getChecklist: function(){
              var data = { meta_key: this.meta_key_checklist };
              var sel = this;
              axios
                .post('/api/meta/get', data)
                .then(function (response) {

                  sel.meta_value_checklist = response.data.CHECKLIST.Items;

                  if(response.data)
                  {
                    sel.value_set = true;
                  }else {
                    sel.value_set = false;
                  }
                  sel.submitting = false;
            });
            this.submitting = false;
            },
            //Update CHECKLIST
            updateChecklist: function(){
              var payload = {"CHECKLIST": {"Items": this.meta_value_checklist}};
              var myJSON = JSON.stringify(payload);
              var dt = { meta_key: this.meta_key_checklist, meta_value: myJSON };
              var self = this;
              axios
                .post('/api/meta/update', dt)
                .then(function (response) {
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
                          errorMsgs.push(obj[prop][0]);
                      }
                  }
                  self.errors = errorMsgs;
                    self.submitting = false;
                }else {
                  self.getChecklist();
                }
              });
            },
          },
          mounted: function () {},

              }
            

</script>
