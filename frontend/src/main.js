import Vue from 'vue'
import App from './App.vue'
import VMask from 'v-mask'
Vue.use(VMask);
//import axios from 'axios'

import VueRouter from 'vue-router';

import LoginComponent from './pages/login/LoginComponent';
import RegisterComponent from './pages/login/RegisterComponent';
import HomeComponent from './pages/home/HomeComponent';
//import ContactsComponent from './pages/contacts/ContactsComponent';
import CreateComponent from './pages/contacts/CreateComponent';
import EditComponent from './pages/contacts/EditComponent';
import IndexComponent from './pages/contacts/IndexComponent';
import UsersComponent from './pages/users/UsersComponent';

import LogComponent from './pages/dash/components/LogComponent';

import 'bootstrap/dist/css/bootstrap.min.css';

import '@fortawesome/fontawesome-free/css/all.css';
import '@fortawesome/fontawesome-free/js/all.js';

Vue.config.productionTip = false
Vue.use(VueRouter);


// axios.defaults.baseURL = 'http:localhost:8000/api';

const routes = [
  {
    path: '/',
    component: LoginComponent,
    name: 'login'
  },
  {
    path: '/register',
    component: RegisterComponent,
    name: 'register'
  },
  {
    path: '/home',
    component: HomeComponent,
    name: 'home',
    meta: {
      requiredAuth: true
    }
  },
  {
    path: '/index',
    component: IndexComponent,
    name: 'contacts',
    meta: {
      requiredAuth: true
    }
  },
  {
    path: '/create',
    component: CreateComponent,
    name: 'create',
    meta: {
      requiredAuth: true
    }
  },
  {
    path: '/users',
    component: UsersComponent,
    name: 'users',
    meta: {
      requiredAuth: true
    }
  },
  {
    path: '/edit/:id',
    component: EditComponent,
    name: 'edit',
    params: 'id',
    meta: {
      requiredAuth: true
    }
  },
  {
    path: '/logs',
    component: LogComponent,
    name: 'logs',
  }
];

const router = new VueRouter({
  routes
});



new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
