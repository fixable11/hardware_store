<template>
    <div>
        <product-component></product-component>
        <related-products></related-products>
    </div>
</template>

<script>
    import ProductComponent from "../components/Product/Product";
    import RelatedProducts from "../components/Product/RelatedProducts";

    export default {
        components: {ProductComponent, RelatedProducts},
        name: "Product"
    }
</script>

<style scoped>

</style>