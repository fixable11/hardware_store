<template>
    <section class="container cart">

        <div class="cartTitle">
            <h1 class="cartTitle__title">Shopping cart</h1>
        </div>

        <table class="cartTable">
            <thead class="cartTable__thead">
                <tr class="cartTable__tr">
                    <th class="cartTable__th">Image</th>
                    <th class="cartTable__th">Product</th>
                    <th class="cartTable__th">Price</th>
                    <th class="cartTable__th">Quantity</th>
                    <th class="cartTable__th">Total</th>
                    <th class="cartTable__th"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, index) in getProducts" :key="index">
                    <td class="cartTable__td">
                        <img :src="product.photos[0]" alt="">
                    </td>
                    <td class="cartTable__td">{{ product.name }}</td>
                    <td class="cartTable__td"></td>
                </tr>
            </tbody>
        </table>

    </section>
</template>

<script>
    import { mapGetters, mapMutations} from "vuex";

    export default {
        name: "Shopping cart",
        computed: {
            ...mapGetters(['getProducts']),
        },
        methods: {
            ...mapMutations(['removeProduct']),
        }
    }
</script>

<style scoped lang="scss">
    .cartTitle {
        padding: 32px 0;
        width: 100%;
    }
    .cartTable {
        width: 100%;
        &__thead {
            width: 100%;
            background-color: #f7f7f7;
        }
        &__th {
            padding: 12px 18px;
            font-weight: 400;
        }
        &__tr {
            width: 100%;
        }
        &__td {

        }
    }
</style>