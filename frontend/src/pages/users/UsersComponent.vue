<template>
  <div>
    <DashComponent>
      <div slot="slot-pages" class="content-pages">
        <header class="title-pages">
          <p>Usuários</p>
        </header>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users" :key="user.id">
              <th scope="row">{{ user.id }}</th>
              <td>{{ user.name }}</td>
              <td>{{ user.email }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </DashComponent>
  </div>
</template>

<script>
import DashComponent from "../dash/DashComponent.vue";

const axios = require("axios");
import Cookie from "js-cookie";
export default {
  name: "UserComponent",
  components: {
    DashComponent,
  },

  data() {
    return {
      users: [],
      token: "",
    };
  },

  methods: {
    auth() {
      let token = Cookie.get("_bearer_token");

      if (token) {
        this.token = token;
      } else {
        this.$router.push({
          name: "login",
        });
      }
    },
    async getUsers() {
      let self = this;
      let req = axios({
        method: "get",
        url: "http://localhost:8000/api/users/",
        headers: {
          Authorization: `Bearer ${this.token}`,
        },
      });
      req
        .then(function (response) {
          console.log(response.data.users);
          self.users = response.data.users;
        })
        .catch(function (error) {
          console.log(error);
        });
    }
  },

  mounted() {
    this.auth();
    this.getUsers();
  },

  created() {
    this.getUsers();
  },
};
</script>

<style>
</style>