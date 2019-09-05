<template>
  <!-- Contact Modal -->
  <div data-backdrop="static" class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="min-height:320px">
          <form v-if="!submitting">
            <div class="form-group">
              <label for="exampleInputPassword1">Name</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="What should we call you?">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="What's the best address to respond to?">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea1">Message</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
          </form>

          <div v-if="submitting">

              <div class="loader loader--style5 text-center" title="4">
                <h3>Email Sent</h3>
              </div>
          </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button v-on:click="submit" type="button" class="btn btn-primary">Send</button>
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

            }
          },

          methods:{
            submit: function(){
              //Calc price.
              this.submitting = true;


            },

          },
          mounted: function () {

            },

              }



</script>
