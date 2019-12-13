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

import Slider from "./Slider";
import Services from "./Services";
import FeaturedProducts from "./FeaturedProducts";
import Banner from "./Banner";
import Bestsellers from "./Bestsellers";

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
