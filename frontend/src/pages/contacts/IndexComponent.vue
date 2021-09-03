<template>
  <DashComponent>
    <div slot="slot-pages" class="content-pages">
      <header class="title-pages">
        <p>Contatos</p>
      </header>

      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telefone</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="contact in contacts" :key="contact.id">
            <th scope="row">{{ contact.id }}</th>
            <td>{{ contact.name }}</td>
            <td>{{ contact.email }}</td>
            <td>{{ contact.phone }}</td>
            <td>
              <div class="btn-group">
                <a @click.prevent="edit(contact.id)" class="btn btn-primary">
                  <i class="fa fa-edit"></i>
                </a>
                <a @click.prevent="destroy(contact.id)" class="btn btn-danger">
                  <i class="fa fa-trash"></i>
                </a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </DashComponent>
</template>

<script>
import DashComponent from "../dash/DashComponent.vue";
// import ListComponent from "../../components/ListComponent.vue";
// import IndexComponent from "../../components/IndexComponent.vue";
const axios = require("axios");
import Cookie from "js-cookie";
export default {
  name: "IndexComponent",
  components: {
    DashComponent,
  },

  data() {
    return {
      contacts: [],
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
    async getContacts() {
      let self = this;
      let req = axios({
        method: "get",
        url: "http://localhost:8000/api/contacts/",
        headers: {
          Authorization: `Bearer ${this.token}`,
        },
      });
      req
        .then(function (response) {
          console.log(response.data.contacts);
          self.contacts = response.data.contacts;
        })
        .catch(function (error) {
          console.log(error);
        });
    },

    async edit(id) {
      this.$router.push({
        name: "edit",
        params: { id: id },
      });
    },

    async destroy(id) {
      let self = this;
      if (confirm("Tem certeza que deseja excluir?")) {
        try {
          let response = await axios.delete(
            "http://localhost:8000/api/contacts/" + id
          );
          console.log(response);
          self.$router.go();
        } catch (error) {
          alert("Erro ao excluir, tente novamente!");
        }
      }
    },
  },

  mounted() {
    this.auth();
    this.getContacts();
  },

  created() {
    this.getContacts();
  },
};
</script>

<style>
.btn {
  width: 100%;
}
</style>