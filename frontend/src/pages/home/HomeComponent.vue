<template>
  <div>
    <DashComponent>
      <div slot="slot-pages" class="content-pages">
        <header class="title-pages">
          <p>Home</p>
        </header>

        <div class="container">
          <div class="row">
            <div class="col-12 col-md-3">
              <ListComponent
                :name="'Matheus Lima'"
                :number="'(35) 99877-5277'"
                :icon="'fa-check'"
              />
            </div>

            <div class="col-12 col-md-3">
              <ListComponent
                :name="'Matheus Rezende'"
                :number="'(35) 99720-4692'"
                :icon="'fa-check'"
              />
            </div>

            <div class="col-12 col-md-3">
              <ListComponent
                :name="'Matheus Brandão'"
                :number="'(35) 99902-9787'"
                :icon="'fa-check'"
              />
            </div>

            <div class="col-12 col-md-3">
              <ListComponent
                :name="'Liminha Math'"
                :number="'(35) 4002-8922'"
                :icon="'fa-check'"
              />
            </div>
          </div>
        </div>
        <div class="container mt-5">
          <div class="row">
            <div class="col-md-6">
              <IndexComponent :users="users"/>
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

const axios = require('axios').default;

export default {
  name: "HomeComponent",
  components: {
    DashComponent,
    ListComponent,
    IndexComponent,
  },

  data() {
    return {
      users: []
    }
  },

  methods: {
    async getUsers(){
      const response = await axios.get('https://jsonplaceholder.typicode.com/users');

      if(response.status == 200){
        this.users = response.data
      } else {
        alert('erro')
      }
      
    }
  },

  mounted(){
    this.getUsers();
  }
};
</script>

<style>
</style>