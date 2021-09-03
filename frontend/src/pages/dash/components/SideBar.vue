<template>
  <div class="sidebar">
    <div class="sidebar-header">
      <div class="avatar">
        <span><i class="fa fa-user icon"></i></span>
      </div>

      <div class="info">
        <p class="name">{{ this.user.name.split(' ')[0] }}</p>
        <span class="status">online</span>
      </div>
    </div>

    <div class="menu">
      <ul>
        <li>
          <router-link :to="{ name: 'home' }"
            ><i class="fa fa-home icon"></i> Home</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'create' }"
            ><i class="fa fa-plus-circle icon"></i> Cadastar</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'contacts' }"
            ><i class="fa fa-calendar icon"></i> Contatos</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'users' }"
            ><i class="fa fa-users icon"></i> Usuários</router-link
          >
        </li>

        <li>
          <router-link :to="{ name: 'logs' }"
            ><i class="fa fa-bug icon"></i> Logs</router-link
          >
        </li>

        <li>
          <router-link :to="{ name: 'login' }"
            ><i class="fa fa-door-closed icon"></i> Sair</router-link
          >
        </li>

      </ul>
    </div>
  </div>
</template>

<script>
const axios = require("axios");
import Cookie from "js-cookie";
export default {
  name: "SideBar",

  data() {
    return {
      user: [],
    };
  },
  methods: {
    logout() {
      this.$router.push({ name: "login" });
    },

    async me() {
      let self = this;
      let token = Cookie.get("_bearer_token");
      let req = axios({
        method: "get",
        url: "http://localhost:8000/api/me/",
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });
      req
        .then(function (response) {
          console.log(response.data.user.name);
          self.user = response.data.user;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },

  mounted() {
    this.me();
  },
};
</script>

<style lang="scss">
.sidebar {
  text-decoration: none;
  .sidebar-header {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 25px 5px;
    margin-top: 50px;

    .avatar {
      margin-right: 10px;

      span {
        //display: block;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 30px;
      }
    }
    .info {
      .name {
        margin: 0;
        font-size: 18px;
      }

      .status {
        margin: 0;
        font-size: 12px;
      }
    }
  }
  .menu {
    padding: 10px;
    margin-top: 15px;

    ul li {
      margin: 15px 0;
      font-size: 22px;
      list-style: none;
      font-weight: 200;

      a {
        color: white;
        text-decoration: none;
      }
    }
  }
}
</style>