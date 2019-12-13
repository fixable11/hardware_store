<template>
    <section class="featuredProducts products">
        <div class="container">
            <div class="row products__header">
                <div class="col-auto products__header__title">Featured Products</div>
                <div class="col products__header__line"><hr></div>
                <div class="col-auto products__header__arrows">
                </div>
                <div class="col-auto products__header__filters">
                    <div class="item">All</div>
                    <div class="item item_active">Power Tools</div>
                    <div class="item">Hand Tools</div>
                    <div class="item">Plumbing</div>
                </div>
            </div>

            <div class="products__items">
                <div v-for="product in featuredProducts"
                     class="products__items__item"
                     :data-type="product.status"
                >
                    <div class="wrap">
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
    import $ from "jquery";
    import "slick-carousel";

    export default {
        name: "FeaturedProducts",
        data() {
            return {
                featuredProducts: [
                    {
                        status: 'new',
                        name: 'Electric Planer Brandix KL370090G 300 Watts',
                        reviewsCount: 11,
                        price: 749.00,
                        image: require('../../assets/images/products/product-1.jpg'),
                    },
                    {
                        status: 'new',
                        name: 'Electric Planer Brandix KL370090G 300 Watts',
                        reviewsCount: 11,
                        price: 749.00,
                        image: require('../../assets/images/products/product-2.jpg'),
                    },
                    {
                        status: 'new',
                        name: 'Electric Planer Brandix KL370090G 300 Watts',
                        reviewsCount: 11,
                        price: 749.00,
                        image: require('../../assets/images/products/product-3.jpg'),
                    },
                    {
                        status: 'sale',
                        name: 'Electric Planer Brandix KL370090G 300 Watts',
                        reviewsCount: 11,
                        price: 749.00,
                        image: require('../../assets/images/products/product-4.jpg'),
                    },
                    {
                        status: 'sale',
                        name: 'Electric Planer Brandix KL370090G 300 Watts',
                        reviewsCount: 11,
                        price: 749.00,
                        image: require('../../assets/images/products/product-5.jpg'),
                    },
                ],
            }
        },
        mounted() {
            $('.featuredProducts .products__items').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: false,
                paralax: true,
                appendArrows: $('.featuredProducts .products__header .products__header__arrows'),
                prevArrow: '<div class="leftArrow arrow"><i class="fas fa-chevron-left"></i></div>',
                nextArrow: '<div class="rightArrow arrow"><i class="fas fa-chevron-right"></i></div>',
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });

        }
    }
</script>

<style lang="scss">
    @import "../../assets/scss/products";
</style>