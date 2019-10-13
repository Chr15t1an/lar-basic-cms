/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('./siteCustom.js');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */



 //


// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('pricing-component', require('./components/PricingComponent.vue').default);
Vue.component('contact-component', require('./components/default/ContactComponent.vue').default);
Vue.component('signup-component', require('./components/default/SignupComponent.vue').default);

Vue.component('email-component', require('./components/admin/EmailComponent.vue').default);
Vue.component('leads-component', require('./components/admin/LeadsComponent.vue').default);

Vue.component('gtm-component', require('./components/admin/GtmComponent.vue').default);

Vue.component('user-reg-component', require('./components/admin/UserRegistrationComponent.vue').default);

Vue.component('sitechecklist-component', require('./components/admin/SitechecklistComponent.vue').default);


Vue.component('createsitemap-component', require('./components/admin/CreateSitemapComponent.vue').default);

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
