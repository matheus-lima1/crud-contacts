<template>
  <div>
      <DashComponent>
        <div slot="slot-pages" class="content-pages">
            <header class="title-pages">
                <p>Contatos</p>
               
            </header>
            <ListComponent/>
        </div>
    </DashComponent>
  </div>
</template>

<script>

import DashComponent from '../dash/DashComponent.vue';
import ListComponent from '../../components/ListComponent.vue';

export default {
    name: 'ContactsComponent',
    components: {
        DashComponent,
        ListComponent
    }
}
</script>

<style>

</style>