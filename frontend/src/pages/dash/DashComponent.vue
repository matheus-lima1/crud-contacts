<template>
    <div class="main">
        <div class="sidebar">
            <SideBar/>   
        </div>

        <div class="content-right">

            <div class="pages">
                <slot name="slot-pages"></slot>
            </div>
        </div>
    </div>
</template>


<script>

import SideBar from './components/SideBar.vue';
//import NavBar from './components/NavBar.vue';

export default {
    name: 'DashComponent',

    components: {
        SideBar
    }
}
</script>

<style lang="scss" src="./style.scss" scoped>

</style>