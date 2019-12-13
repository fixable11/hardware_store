<template>
    <div>
        <slider></slider>
        <services></services>
        <featured-products></featured-products>
    </div>
</template>

<script>

import Slider from "./Slider";
import Services from "./Services";
import FeaturedProducts from "./FeaturedProducts";

export default {
    components: {Slider, Services, FeaturedProducts},
    name: "Index",
    data() {
        return {

        }
    }
};

</script>
