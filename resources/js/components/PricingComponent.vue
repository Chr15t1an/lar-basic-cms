<template>
  <div class="">
    <form id="pricing-calculator">
       <div class="form-group">
          <label for="">Number of Users +5/user</label><br/>
          <div id="pricing-buttons" v-on:click="setUsers" class="btn-group" role="group" aria-label="Basic example">
             <!-- If you click a button in this (class="btn-group") set as active
                then map the selected one to the uses number -->
             <button type="button" class="btn active-pricing">1</button>
             <button type="button" class="btn">2</button>
             <button type="button" class="btn">5</button>
             <button type="button" class="btn">10</button>
             <button type="button" class="btn">25</button>
             <button type="button" class="btn">100</button>
             <button type="button" class="btn">1000</button>
          </div>
       </div>
       <div class="form-group">
          <label for="customRange1">Call Time Minutes: {{callTimeMinutes}}</label><br/>
          <input type="range" min="0" max="10000" step="1" v-model:value="callTimeMinutes" class="custom-range callTimeMinutes"  >
       </div>
       <div class="form-group">
          <label for="customRange1">SMS Messages: {{smsMessages}}</label><br/>
          <input type="range" min="0" max="10000" step="1" v-model:value="smsMessages" class="custom-range smsMessage" >
       </div>
    </form>
    <!-- output table -->
    <table class="table">
       <thead>
          <tr>
             <th scope="col">Basic</th>
             <th scope="col">Premium</th>
             <th scope="col">Ultimate</th>
          </tr>
       </thead>
       <tbody>
          <tr>
             <td>${{calculatedBasicPrice}}</td>
                <td>${{calculatedPremiumPrice}}</td>
                <td>${{calculatedUltimatePrice}}</td>
          </tr>
       </tbody>
    </table>
  </div>
</template>

<script>
    export default {
      data:function() {
        return {

            numberOfUsers: 1,
            callTimeMinutes: 1,
            smsMessages: 1,

            basicPrice: 0,
            premiumPrice: 39,
            ultimatePrice: 99,

            calculatedBasicPrice: 0,
            calculatedPremiumPrice: 39,
            calculatedUltimatePrice: 99,

            }
          },

          watch: {
            numberOfUsers: function () {
              this.calcPrice();
            },
            callTimeMinutes: function () {
              this.callTimeMinutes = parseInt(this.callTimeMinutes);
              this.calcPrice();
            },
            smsMessages: function () {
              this.smsMessages = parseInt(this.smsMessages);
              this.calcPrice();
            }
          },
          methods:{
            calcPrice: function(){
              //Calc price.
              var users, sms, minutes ='';
              users = this.numberOfUsers;
              sms = this.smsMessages;
              minutes = this.callTimeMinutes;

              this.calculatedBasicPrice = Math.round(this.basicPrice + (5 * users) + (.05 * sms) + (.05 * minutes));
              this.calculatedPremiumPrice = Math.round(this.premiumPrice + (5 * users) + (.03 * sms) + (.03 * minutes));
              this.calculatedUltimatePrice = Math.round(this.ultimatePrice + (5 * users) + (.02 * sms) + (.02 * minutes));



            },
            setUsers: function() {
              var usersText,usersInt ='';

              usersText = $('#pricing-buttons .active-pricing');
              usersInt = parseInt(usersText[0].innerText);
              this.numberOfUsers = usersInt;
            }
          },
          mounted: function () {
              $(".btn-group > .btn").click(function(){
                  $(".btn-group > .btn").removeClass("active-pricing");
                  $(this).addClass("active-pricing");
              });


                $('[data-toggle="tooltip"]').tooltip();
            },

              }



</script>
