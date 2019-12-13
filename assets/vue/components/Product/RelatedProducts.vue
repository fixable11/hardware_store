<template>
    <section class="relatedProducts products">
        <div class="container">
            <div class="row products__header">
                <div class="col-auto products__header__title">Related Products</div>
                <div class="col products__header__line"><hr></div>
                <div class="col-auto products__header__arrows">
                </div>
            </div>

            <div class="row products__items">
                <div
                    class="col-md-3 products__items__item"
                    data-type="new"
                    v-for="product in products"
                >
                    <div class="wrap">
                        <div class="products__items__item__image"><img :src="product.image" alt=""></div>
                        <div class="products__items__item__info">
                            <div class="name"><a href="#">{{ product.title }}</a></div>
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
        name: "RelatedProducts",
        data() {
            return {
                products: [
                    {
                        title: "Electric Planer Brandix KL370090G 300 Watts",
                        image: require('../../assets/images/products/product-1.jpg'),
                        reviewsCount: 11,
                        price: 749.00
                    },
                    {
                        title: "Electric Planer Brandix KL370090G 300 Watts",
                        image: require('../../assets/images/products/product-1.jpg'),
                        reviewsCount: 11,
                        price: 749.00
                    },
                    {
                        title: "Electric Planer Brandix KL370090G 300 Watts",
                        image: require('../../assets/images/products/product-1.jpg'),
                        reviewsCount: 11,
                        price: 749.00
                    },
                    {
                        title: "Electric Planer Brandix KL370090G 300 Watts",
                        image: require('../../assets/images/products/product-1.jpg'),
                        reviewsCount: 11,
                        price: 749.00
                    },
                ]
            }
        }
    }
</script>

<style scoped>

</style>