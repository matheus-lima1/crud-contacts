<template>
  <div class="sidebar">
    <div class="sidebar-header">
      <div class="avatar">
        <span><i class="fa fa-user icon"></i></span>
      </div>

      <div class="info">
        <p class="name">Matheus Lima</p>
        <span class="status">online</span>
      </div>
    </div>

    <div class="menu">
      <ul>
        <li>
          <router-link :to="{ name: 'index' }"
            ><i class="fa fa-list icon"></i> Listar</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'create' }"
            ><i class="fa fa-plus-circle icon"></i> Cadastar</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'edit' }"
            ><i class="fa fa-edit icon"></i> Editar</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'remove' }"
            ><i class="fa fa-trash icon"></i> Remover</router-link
          >
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "SideBar",
  methods: {
    logout() {
      this.$router.push({ name: "login" });
    },
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