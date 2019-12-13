<template>
    <div>
        <slider></slider>
        <services></services>
        <featured-products></featured-products>
        <banner></banner>
        <bestsellers></bestsellers>
    </div>
</template>

<script>

import Slider from "../components/Index/Slider";
import Services from "../components/Index/Services";
import FeaturedProducts from "../components/Index/FeaturedProducts";
import Banner from "../components/Index/Banner";
import Bestsellers from "../components/Index/Bestsellers";

export default {
    components: {
        Slider,
        Services,
        FeaturedProducts,
        Banner,
        Bestsellers
    },
    name: "Index",
    data() {
        return {

        }
    }
};

</script>
