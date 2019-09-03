@extends('layouts.main')

@section('title', 'Handle Inbound App Pricing')
@section('content')


<!-- section 1 -->
  <section class="row align-items-center">
  <div class="col-md-10 col-12">
    <h1>All Accounts Have All Features. Different Subscriptions Have Different Rates.</h1>
  </div>


  </section>

<!-- end section 1 -->


<!-- section 2 -->
  <section class="row">

    <!-- <div class="container"> -->
      <!-- Pricing Option     -->
      <div class="pricing-card col-lg-3 col-6 text-center">
        <!-- icon -->
        <div class="col-12">
          <img src="imgs/svg/undraw_email_capture_x8kv.svg" class="img-fluid" alt="...">
        </div>
        <!-- end-icon -->
        <!-- Subscription title -->
        <h3>Basic</h3>
        <!-- Subscription description -->
        <p class="pricing-sub-description">Support Email</p>
        <span class="price">$0</span><span class="price-term">/ Month</span>
        <hr/>
        <ul>
          <li>+ $5 / aditional user / month</li>
          <li>+ ¢5 per SMS</li>
          <li>+ ¢5 per min phone</li>
          <li>+ $10 / month Phone number</li>
          <li>Includes 1 phone number </li>
        </ul>
        <a href="#allFeatures"><p>See All Features</p></a>
        <a class="" href="?"><button type="button" class="btn btn-lg btn-outline-dark">Sign Up</button></a>
      </div>
      <!-- Pricing Option -->

      <!-- Pricing Option     -->
      <div class="pricing-card col-lg-3 col-6 text-center">
        <!-- icon -->
        <div class="col-12">
          <img src="imgs/svg/undraw_contact_us_15o2.svg" class="img-fluid" alt="...">
        </div>
        <!-- end-icon -->
        <!-- Subscription title -->
        <h3>Premium</h3>
        <!-- Subscription description -->
        <p class="pricing-sub-description">Business</p>
        <span class="price">$39</span><span class="price-term">/ Month</span>
        <hr/>
        <ul>
          <li>+ $5 / aditional user / month</li>
          <li>+ ¢3 per SMS</li>
          <li>+ ¢3 per min phone</li>
          <li>+ $10 / month Phone number</li>
          <li>Includes 1 phone number </li>
        </ul>
        <a href="#allFeatures"><p>See All Features</p></a>
        <a class="" href="?"><button type="button" class="btn btn-lg btn-outline-dark">Sign Up</button></a>
      </div>
      <!-- Pricing Option -->

      <!-- Pricing Option     -->
      <div class="pricing-card col-lg-3 col-6 text-center">
        <!-- icon -->
        <div class="col-12">
          <img src="imgs/svg/undraw_interaction_design_odgc.svg" class="img-fluid" alt="...">
        </div>
        <!-- end-icon -->
        <!-- Subscription title -->
        <h3>Ultimate</h3>
        <!-- Subscription description -->
        <p class="pricing-sub-description">Enterprise</p>
        <span class="price">$99</span><span class="price-term">/ Month</span>
        <hr/>
        <ul>
          <li>+ $5 / aditional user / month</li>
          <li>+ ¢2 per SMS</li>
          <li>+ ¢2 per min phone</li>
          <li>+ $10 / month Phone number</li>
          <li>Includes 1 phone number </li>
        </ul>
        <a href="#allFeatures"><p>See All Features</p></a>
        <a class="" href="?"><button type="button" class="btn btn-lg btn-outline-dark">Sign Up</button></a>
      </div>
      <!-- Pricing Option -->


      <!-- Pricing Option     -->
      <div class="pricing-card col-lg-3 col-6 text-center">
        <!-- icon -->
        <div class="col-12">
          <img src="imgs/svg/undraw_setup_wizard_r6mr.svg" class="img-fluid" alt="...">
        </div>
        <!-- end-icon -->
        <!-- Subscription title -->
        <h3>Onboard</h3>
        <!-- Subscription description -->
        <p class="pricing-sub-description">Set it up and train your team</p>
        <span class="price">$5000</span><span class="price-term"></span>
        <hr/>
        <ul>
          <li>Set Up Google Apps For Business</li>
          <li>Set up process & rules</li>
          <li>Set it up and train your team.</li>
          <li>Train & walk through </li>
          <li>30/day phone support  Set up AWS account</li>
        </ul>
        <!-- <a href=""><p>See All Features</p></a> -->
        <a class="" href="?"><button type="button" class="btn btn-lg btn-outline-dark">Sign Up</button></a>
      </div>
      <!-- Pricing Option -->

<!-- </div> -->


  </section>

<!-- end section 2 -->



<!--section 3 -->
<section id="app" class="pricing-calculator row container-fluid">
  <h2 class="mx-auto">Pricing Calculator</h2>
  <div class="col-8">

    <pricing-component></pricing-component>

  </div>

  <div class="col-4">
    <img src="imgs/svg/undraw_Calculator_0evy.svg" class="img-fluid" alt="...">
  </div>

</section>
<!-- end section 3 -->

<!--section 4 -->

<section class="justify-content-around row">
  <div class="">
    <button type="button" class="btn btn-primary btn-lg">Sign Up</button>
    <button type="button" class="btn btn-outline-dark btn-lg">Pricing</button>
  </div>

</section>

<!-- end section 4 -->

<!--section 5 -->

<section id="allFeatures" class="row">
  <h2 class="mx-auto">All Product Features</h2>

<div class="row container-fluid">
    <div id="accordion" class="col-12">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Send & Receive Texts, emails, & Calls.
            </button>
          </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
            <p>Handle inbound acts as a communication facilitator. You are able to set up a business phone line and manage your email inboxes.</p>

          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Track all email and phone engagements
            </button>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
            <p>Share requests and issues with your team. Make internal notes, and tag team members.</p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingThree">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Message and phone call routing rules.
            </button>
          </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
          <div class="card-body">
            <p>Route calls and emails based on rules that fit your business.</p>

          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingFour">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              Voicemail, & Call Ques
            </button>
          </h5>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
          <div class="card-body">
            <p>Standard phone features. If multiple people call at once, they can weight on hold. If they hang up, a ticket is created to call them back. If someone leave a voicemail, listening and responding to that voicemail is a task that is assigned.</p>

          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header" id="headingFive">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              Contact records, custom properties, & hubspot integration
            </button>
          </h5>
        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
          <div class="card-body">
          <p>  Reps can have better context with all customer information at their fingertips when responding.</p>

          </div>
        </div>
      </div>


      <div class="card">
        <div class="card-header" id="headingSix">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
              Call Recording & Email Search.
            </button>
          </h5>
        </div>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
          <div class="card-body">
            <p>Go back and understand what happened and what was said between your team and a customer. Store these calls and emails for 30days on our system and as long as you want in your personal Amazon S3 Storage account. </p>

          </div>
        </div>
      </div>
    </div>
<!-- End acordian -->
</div>
</section>

<!-- end section 5 -->


<!--section 6 -->

<section class="row">
  <h2 class="mx-auto">FAQ</h2>

<div class="row container-fluid">
    <div id="faqaccordion" class="col-12">
      <div class="card">
        <div class="card-header" id="faqheadingOne">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#faqcollapseOne" aria-expanded="true" aria-controls="faqcollapseOne">
              Capture Track and followup with email
            </button>
          </h5>
        </div>

        <div id="faqcollapseOne" class="collapse show" aria-labelledby="faqheadingOne" data-parent="#faqaccordion">
          <div class="card-body">
            <p>Our system connects to a gmail inbox. When  someone emails that address our system reads the email and creates a ticket. That ticket is assigned based on your accounts assignment rules. If that email address is attached to a customer record, that record will be available when responding to the email. Team members are able to leave internal notes and change the owner of the ticket.</p>

          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="faqheadingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#faqcollapseTwo" aria-expanded="false" aria-controls="faqcollapseTwo">
              Capture Track and followup with phone calls.
            </button>
          </h5>
        </div>
        <div id="faqcollapseTwo" class="collapse" aria-labelledby="faqheadingTwo" data-parent="#faqaccordion">
          <div class="card-body">
            <p>You can sign up for a phone number in the app. When someone calls that phone number our system attempts to route it based on your rules. If a team member is unavailable
The caller will have an opportunity to leave a voicemail. If the call was unanswered a ticket will be created. That ticket is assigned based on your accounts assignment rules. If that phone number is attached to a customer record, that record will be available in the ticket. Team members are able to leave internal notes and change the owner of the ticket.</p>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="faqheadingThree">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#faqcollapseThree" aria-expanded="false" aria-controls="faqcollapseThree">
              What happens to my data if I cancel?
            </button>
          </h5>
        </div>
        <div id="faqcollapseThree" class="collapse" aria-labelledby="faqheadingThree" data-parent="#faqaccordion">
          <div class="card-body">
            <p>We support integrations with Gmail, Amazon S3 storage, and Hubspot CRM.
Your emails are all stored in Gmail, all call recordings & SMS can be backed up in Amazon S3, and you can sync your contact records with Hubspot to keep all customer data.</p>

          </div>
        </div>
      </div>


    </div>
<!-- End acordian -->
</div>
</section>

<!-- end section 6 -->







@endsection
