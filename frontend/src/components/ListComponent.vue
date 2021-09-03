<template>
  <div class="my-cards">
    <div class="content top">
      <h3>{{ name }}</h3>
      <p class="status"><i :class="['px-2 fa',icone]"></i>OK</p>
    </div>

    <div class="content footer">
      <i class="fa fa-phone icon"></i>
      <p class="phone">{{ number }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "ListComponent",

  props: {
    name: String,
    number: String,
    icone: String

  }

};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/_main";

.my-cards {
  display: flex;
  flex-direction: column;
  width: 100%;
  background-color: $purple;
  color: white;
  padding: 15px;
  border-radius: 7px;

  .content {
    display: flex;
    justify-content: space-between;
  }

  .top {
  }

  .footer {
    .icon {
      font-size: 22px;
    }

    .number{
      font-size: 18px;
      margin: 0;
    }
  }
}
</style>