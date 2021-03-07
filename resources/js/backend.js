/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
try {
    window.$ = window.jQuery = require('jquery');
    window.iziToast = require('izitoast/dist/js/iziToast.min.js');
    window.Swal = require('sweetalert2');
    require('select2');
    // Dropify
    require('dropify/src/js/dropify');
    // Nestable
    require('nestable2/jquery.nestable');
} catch (e) {}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

window.Vue = require('vue');

import vuetify from './src/plugins/vuetify.js' // path to vuetify export

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const VueUploadComponent = require('vue-upload-component')
Vue.component('file-upload', VueUploadComponent).default

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('Chat', require('./components/Chat.vue').default);



new Vue({
    vuetify,
}).$mount('#app')

// Vue.component('PrivateChat', require('./components/PrivateChat.vue'));

// const app = new Vue({
//     el: '#app'
// });
