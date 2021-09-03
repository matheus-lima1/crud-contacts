<template>
  <div class="main">
    <div class="login bg">
      <div class="content-login">
        <header>
          <h1>Painel de Controle</h1>
        </header>

        <div class="form">
          <form @submit.prevent="submit">
            <div class="form-group mb-3">
              <label for="email">E-mail</label>
              <input
                v-model="email"
                type="email"
                class="form-control mt-2"
                id="email"
                name="email"
                aria-describedby="emailHelp"
                placeholder="Enter email"
                required
              />
            </div>
            <div class="form-group">
              <label for="password">Senha</label>
              <input
                v-model="password"
                type="password"
                class="form-control mt-2"
                id="password"
                name="password"
                placeholder="Password"
                required
              />
            </div>
            <button type="submit" class="btn btn-primary mt-5">Entrar</button>
          </form>
          <button type="button" class="btn btn-secondary mt-2" @click.prevent="register">Registrar</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Cookie from "js-cookie";
const axios = require("axios");

export default {
  name: "LoginComponent",

  data() {
    return {
      email: "",
      password: "",
      token: "",
    };
  },

  created() {
    Cookie.remove("_bearer_token");
  },

  methods: {
    register() {
      this.$router.push({
          name: 'register'
      });
    },

    submit() {
      let credentials = {
        email: this.email,
        password: this.password,
      };

      let self = this;

      let test = axios({
        method: "post",
        url: "http://localhost:8000/api/login",
        data: credentials,
      });
      test
        .then(function (response) {
          console.log(response.data.access_token);
          Cookie.set("_bearer_token", response.data.access_token);

          self.$router.push({
            name: "home",
          });
        })
        .catch(function (error) {
          console.log(error);
          alert('Usuário e/ou senha incorretos');
        });
    },
  },
};
</script>

<style lang="scss" src="./style.scss" scoped/>
