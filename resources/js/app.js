

require('./bootstrap');

window.Vue = require('vue');

Vue.config.devtools=true;
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('Add', require('./components/Add.vue').default);
Vue.component('Mod', require('./components/Mod.vue').default);
const app = new Vue({
    el: '#app'
});
