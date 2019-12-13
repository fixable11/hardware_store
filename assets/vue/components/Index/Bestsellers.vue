<template>
    <section class="bestsellers products">
        <div class="container">

            <div class="row products__header">
                <div class="col-auto products__header__title">Bestsellers</div>
                <div class="col products__header__line"><hr></div>
            </div>

            <div class="products__items">
                <div
                    class="products__items__item"
                    data-type="new"
                    v-for="product in products"
                >
                    <div class="wrap" >
                        <div class="products__items__item__image"><img :src="product.image" alt=""></div>
                        <div class="products__items__item__info">
                            <div class="name"><a href="#">{{ product.name }}</a></div>
                            <div class="reviews">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="count">
                                    {{ product.reviewsCount }} Reviews
                                </div>
                            </div>
                            <div class="price">
                                <div class="salePrice"><span class="currency">$</span></div>
                                <div class="currentPrice">
                                    <span class="currency">$</span>
                                    {{ product.price }}
                                </div>
                            </div>
                        </div>
                        <div class="products__items__item__actions">
                            <div class="addToCart">Add To Cart</div>
                            <div class="rightSide">
                                <div class="like"><i class="fas fa-heart"></i></div>
                                <div class="stats"><i class="fas fa-chart-bar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</template>

<script>
    export default {
        name: "Bestsellers",
        data () {
            return {
                products: [
                    {
                        image: require('../../assets/images/products/product-1.jpg'),
                        name: "Electric Planer Brandix KL370090G 300 Watts",
                        reviewsCount: 7,
                        price: 749.00,
                    },
                    {
                        image: require('../../assets/images/products/product-2.jpg'),
                        name: "Electric Planer Brandix KL370090G 300 Watts",
                        reviewsCount: 7,
                        price: 749.00,
                    },
                    {
                        image: require('../../assets/images/products/product-3.jpg'),
                        name: "Electric Planer Brandix KL370090G 300 Watts",
                        reviewsCount: 7,
                        price: 749.00,
                    },
                    {
                        image: require('../../assets/images/products/product-4.jpg'),
                        name: "Electric Planer Brandix KL370090G 300 Watts",
                        reviewsCount: 7,
                        price: 749.00,
                    },
                    {
                        image: require('../../assets/images/products/product-5.jpg'),
                        name: "Electric Planer Brandix KL370090G 300 Watts",
                        reviewsCount: 7,
                        price: 749.00,
                    },
                    {
                        image: require('../../assets/images/products/product-6.jpg'),
                        name: "Electric Planer Brandix KL370090G 300 Watts",
                        reviewsCount: 7,
                        price: 749.00,
                    },
                    {
                        image: require('../../assets/images/products/product-7.jpg'),
                        name: "Electric Planer Brandix KL370090G 300 Watts",
                        reviewsCount: 7,
                        price: 749.00,
                    },
                    {
                        image: require('../../assets/images/products/product-8.jpg'),
                        name: "Electric Planer Brandix KL370090G 300 Watts",
                        reviewsCount: 7,
                        price: 749.00,
                    },
                ],
            }
        }
    }
</script>

<style scoped lang="scss">
    @import "../../assets/scss/vars";

    .bestsellers {
        padding: 50px 15px;
        .products__items {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 15px;
            &__item {
                .wrap {
                    min-height: 100%;
                    &:first-child {
                        grid-column: 1/3;
                        grid-row: 1/3;
                        .wrap {
                            min-height: 100%;
                            .products__items__item__actions {
                                position: relative;
                                top: auto;
                                display: flex;
                                display: -ms-flexbox;
                                justify-content: flex-start;
                                padding-left: 0;
                                border: none;
                                .addToCart {
                                    font-size: 1rem;
                                }
                                .rightSide {
                                    padding-left: 15px;
                                }
                            }
                        }
                    }
                    &__actions {
                        display: none;
                        position: absolute;
                        top: 100%;
                        left: -1px;
                        right: -1px;
                        padding: 0 15px 15px 15px;
                        background-color: #fff;
                        border: 1px solid $accent;
                        border-top: none;
                        z-index: 999;

                        .addToCart {
                            font-size: .75rem;
                        }
                    }
                }
            }
        }
    }
</style>