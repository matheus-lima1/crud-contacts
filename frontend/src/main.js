import Vue from 'vue'
import App from './App.vue'

import VueRouter from 'vue-router';

import LoginComponent from './pages/login/LoginComponent';
import HomeComponent from './pages/home/HomeComponent';
import ContactsComponent from './pages/contacts/ContactsComponent';

import 'bootstrap/dist/css/bootstrap.min.css';

import '@fortawesome/fontawesome-free/css/all.css';
import '@fortawesome/fontawesome-free/js/all.js';

Vue.config.productionTip = false
Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    component: LoginComponent,
    name: 'login'
  },
  {
    path: '/home',
    component: HomeComponent,
    name: 'home'
  },
  {
    path: '/index',
    component: ContactsComponent,
    name: 'index'
  },
  {
    path: '/create',
    component: HomeComponent,
    name: 'home'
  }
];

const router = new VueRouter({
  routes
});



new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
