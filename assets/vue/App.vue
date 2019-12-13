<template>
    <div class="application">
        <headerComponent></headerComponent>
        <router-view></router-view>
        <footerComponent></footerComponent>
    </div>
</template>

<script>
import HeaderComponent from "./components/Header";
import FooterComponent from "./components/Footer";

export default {
    name: "App",
    components: {HeaderComponent, FooterComponent},
    methods: {
    },
    created() {

    }
};
</script>