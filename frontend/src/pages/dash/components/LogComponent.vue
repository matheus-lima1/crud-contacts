<template>
  <DashComponent>
    <div slot="slot-pages" class="content-pages">
      <header class="title-pages">
        <p>Logs</p>
      </header>

      <div class="content-log">
        <iframe
          class="iframe"
          src="http://localhost:8000/log-viewer"
          frameborder="0"
        ></iframe>
      </div>
    </div>
  </DashComponent>
</template>

  

<script>
import DashComponent from "../DashComponent.vue";
export default {
  name: "LogComponent",
  components: {
    DashComponent,
  },
};
</script>

<style>

.content-log{
  width: 100%;
  height: 100vh;
}

.iframe{
  width: 100%;
  height: 100%;
}

</style>