/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./boot');

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
