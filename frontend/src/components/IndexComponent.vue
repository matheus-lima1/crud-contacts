<template>
  <div class="list">
    <div class="top">
      <p>
        <strong>{{ description }}</strong>
      </p>
    </div>

    <div class="content">
      <table class="table table-striped my-table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">{{columns[0]}}</th>
            <th scope="col">{{columns[1]}}</th>
            <th scope="col">{{columns[2]}}</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in data" :key="user.id">
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
    data: Array,
    description: String,
    columns: []
  },
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/_main";
.list {
  width: 100%;
  padding: 15px;
  border: 1px solid $gray;
}
</style>