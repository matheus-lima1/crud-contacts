<template>
  <div class="list">
    <div class="top">
      <p> <strong>Clientes</strong> </p>
    </div>

    <div class="content">
      <table class="table table-striped my-table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telefone</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <th scope="row">{{ user.id }}</th>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.phone }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
    name: "IndexComponent",
    props: {
        users: Array
    }
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/_main";
.list{
    width: 100%;
    padding: 15px;
    border: 1px solid $gray;
}

</style>