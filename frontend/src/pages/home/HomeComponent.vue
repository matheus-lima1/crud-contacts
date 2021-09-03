<template>
  <div>
    <DashComponent>
      <div slot="slot-pages" class="content-pages">
        <header class="title-pages">
          <p>Home</p>
        </header>

        <div class="container">
          <div class="row">
            <div class="col-12 col-md-3" v-for="contacts in recentContacts" :key="contacts.id">
              <ListComponent
                :name="contacts.name"
                :number="contacts.phone"
                :icon="'fa-check'"
              />
            </div>
          </div>
        </div>
        <div class="container mt-5">
          <div class="row">
            <div class="col-md-6">
              <IndexComponent
                :data="users"
                description="Usuário"
                :columns="['Nome', 'E-mail']"
              />
            </div>

            <div class="col-md-6">
              <IndexComponent
                :data="contacts"
                description="Contatos"
                :columns="['Nome', 'E-mail','Telefone']"
              />
            </div>
          </div>
        </div>
      </div>
    </DashComponent>
  </div>
</template>
    
    

<script>
import DashComponent from "../dash/DashComponent.vue";
import ListComponent from "../../components/ListComponent.vue";
import IndexComponent from "../../components/IndexComponent.vue";

const axios = require("axios");
import Cookie from "js-cookie";

export default {
  name: "HomeComponent",
  components: {
    DashComponent,
    ListComponent,
    IndexComponent,
  },

  data() {
    return {
      users: [],
      contacts: [],
      token: '',
      recentContacts: []
    };
  },

  mounted() {
    this.auth();
    this.getUsers();
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

    async getUsers() {
      try {
        let response = await axios.get("http://localhost:8000/api");
        this.users = response.data.users;
        this.contacts = response.data.contacts;
        this.recentContacts = response.data.recentContacts;
      } catch (error) {
        alert(error.response);
      }
    },
  },
};
</script>

<style>
</style>