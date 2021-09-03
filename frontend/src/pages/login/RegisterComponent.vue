<template>
  <div class="main">
    <div class="login bg">
      <div class="content-login">
        <header>
          <h1>Cadastro de Usuário</h1>
        </header>

        <div class="form">
          <form @submit.prevent="register">
            <div class="form-group mb-3">
              <label for="name">Nome</label>
              <input
                v-model="name"
                type="name"
                class="form-control mt-2"
                id="name"
                name="name"
                aria-describedby="namelHelp"
                placeholder="João da Silva"
                required
              />
            </div>

            <div class="form-group mb-3">
              <label for="email">E-mail</label>
              <input
                v-model="email"
                type="email"
                class="form-control mt-2"
                id="email"
                name="email"
                aria-describedby="emailHelp"
                placeholder="joao@silva.com"
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
            <button type="submit" class="btn btn-primary mt-5" >Registrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

const axios = require("axios");

export default {
  name: "RegisterComponent",

  data() {
    return {
      email: "",
      password: "",
      name: "",
    };
  },


  methods: {
    register() {
      let credentials = {
        name: this.name,
        email: this.email,
        password: this.password,
      };

      let self = this;

      let test = axios({
        method: "post",
        url: "http://localhost:8000/api/register",
        data: credentials,
      });
      test
        .then(function (response) {
          console.log(response);

          self.$router.push({
            name: "login",
          });
        })
        .catch(function (error) {
          console.log(error);
          alert("Erro no cadastro!");
        });
    },
  },
};
</script>

<style lang="scss" src="./style.scss" scoped/>
