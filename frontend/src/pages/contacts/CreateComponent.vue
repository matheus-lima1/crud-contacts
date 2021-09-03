<template>
  <DashComponent>
    <div slot="slot-pages" class="content-pages">
      <header class="title-pages">
        <p>Cadastrar</p>
      </header>

      <form class="m-5" @submit.prevent="create">
        <div class="form-group mb-4">
          <label for="name" class="">Nome do Contato</label>
          <input
            v-model="name"
            type="text"
            class="form-control"
            id="name"
            placeholder="João da Silva"
          />
        </div>

        <div class="form-group mb-4">
          <label for="phone" class="">Telefone</label>
          <input
            v-mask="'(##) #####-####'"
            v-model="phone"
            type="text"
            class="form-control"
            id="phone" 
            placeholder="(XX) XXXXX-XXXX"
          />
        </div>

        <div class="form-group mb-4">
          <label for="email" class="">E-mail</label>
          <input
            v-model="email"
            type="email"
            class="form-control"
            id="email"
            placeholder="joao@email.com"
          />
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
    </div>
  </DashComponent>
</template>

<script>
import DashComponent from "../dash/DashComponent.vue";
import VMask from 'v-mask';
import Vue from 'vue';
Vue.use(VMask);
const axios = require("axios");
import Cookie from "js-cookie";
export default {
  name: "CrateComponent",
  components: {
    DashComponent,
  },

  data() {
    return {
      name: '',
      email: '',
      phone: '',
      token: ''
    };
  },

  methods: {
    auth(){

      let token = Cookie.get('_bearer_token');

      if(token){
        this.token = token
      } else {
        this.$router.push({
          name: 'login'
      });
      }
    },
    create() {
      let contact = {
        name: this.name,
        phone: this.phone,
        email: this.email,
      };

      let self = this;

      let req = axios({
        method: "post",
        url: "http://localhost:8000/api/contacts/",
        data: contact,
        headers: {
          'Authorization': `Bearer ${this.token}`
        }
      });
      req
        .then(function () {
          //console.log(response);
          self.$router.push({
          name: 'contacts'
      });

        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },

  mounted(){
    this.auth();
  }
};
</script>

<style>
.btn {
  width: 100%;
}
</style>