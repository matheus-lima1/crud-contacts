<template>
  <DashComponent>
    <div slot="slot-pages" class="content-pages">
      <header class="title-pages">
        <p>{{ test }}</p>
      </header>

      <form class="m-5" @submit.prevent="update">
        <div class="form-group mb-4">
          <label for="name" class="">Nome do Contato</label>
          <input
            @input="name = $event.target.value"
            type="text"
            class="form-control"
            id="name"
            :value="this.contact.name"
          />
        </div>

        <div class="form-group mb-4">
          <label for="phone" class="">Telefone</label>
          <input
            @input="phone = $event.target.value"
            type="text"
            class="form-control"
            id="phone"
            :value="this.contact.phone"
            placeholder="(XX) XXXXX-XXXX"
          />
        </div>

        <div class="form-group mb-4">
          <label for="email" class="">E-mail</label>
          <input
            @input="email = $event.target.value"
            type="email"
            class="form-control"
            id="email"
            :value="this.contact.email"
            placeholder="joao@email.com"
          />
        </div>

        <button type="submit" class="btn btn-primary">Editar</button>
      </form>
    </div>
  </DashComponent>
</template>

<script>
import DashComponent from "../dash/DashComponent.vue";
// import ListComponent from "../../components/ListComponent.vue";
// import IndexComponent from "../../components/IndexComponent.vue";
const axios = require("axios");
export default {
  name: "CrateComponent",
  components: {
    DashComponent,
  },

  data() {
    return {
      test: "",
      contact: [],
      name: "",
      email: "",
      phone: "",
      token: ''
    };
  },

  methods: {
    async getContact() {
      let id = this.$route.params.id;
      

      try {
        let response = await axios.get(
          `http://localhost:8000/api/contacts/${id}` 
        );
        this.contact = response.data.contact;
        this.name = this.contact.name;
        this.phone = this.contact.phone;
        this.email = this.contact.email;
      } catch (error) {
        console.log(error.response);
      }
    },

    async update() {
      let id = this.$route.params.id;

      let contact = {
        name: this.name,
        email: this.email,
        phone: this.phone,
      };


      let self = this;

      let test = axios({
        method: "put",
        url: "http://localhost:8000/api/contacts/" + id,
        data: contact,
        headers: {
          'Authorization': `Bearer ${this.token}`
        }
      });
      test
        .then(function (response) {
          console.log(response.data.contact);

          self.$router.push({
            name: "contacts",
          });
        })
        .catch(function (error) {
          console.log(error);
          alert("Erro de requisição");
        });
    },
  },
  mounted() {
    this.getContact();
  },
};
</script>

<style>
.btn {
  width: 100%;
}
</style>