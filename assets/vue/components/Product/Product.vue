<template>
    <section class="product">
        <div class="container">
            <div class="row">

                <div class="col-12 breadcrumb">
                    <div class="breadcrumb__page">Home</div>
                    <div class="breadcrumb__page">Breadcrumb</div>
                    <div class="breadcrumb__page breadcrumb__page-current">{{ product.name }}</div>
                </div>

                <div class="col-12 col-md-6 product__galery">
                    <div class="row product__galery__slider">
                        <div class="item" v-for="photo in product.photos">
                            <img :src="photo" alt="">
                        </div>
                    </div>
                    <div class="row product__galery__buttons">
                        <div class="col item" v-for="photo in product.photos">
                            <img :src="photo" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 product__chars">
                    <div class="product__chars__name">{{ product.name }}</div>
                    <div class="product__chars__reviews">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="count">
                            <a href="#">7 Reviews</a> / <a href="#">Write A Review</a>
                        </div>
                    </div>
                    <div class="product__chars__desc">{{ product.description }}</div>
                    <div class="product__chars__status">
                        <div class="stock">
                            <span>Availability:</span>
                            <div class="inStock">In Stock</div>
                        </div>
                        <div class="brand">
                            <span>Brand:</span>
                            <div class="brandName">Wakita</div>
                        </div>
                        <div class="sku">
                            <span>SKU:</span>
                            <div class="id">83690/32</div>
                        </div>
                    </div>
                    <div class="product__chars__price">
                        <div class="salePrice active"><span class="currency">$</span>1,000.00</div>
                        <div class="currentPrice lastPrice"><span class="currency">$</span>1,499.00</div>
                    </div>
                    <div class="product__chars__colors">
                        <div class="title">Color</div>
                        <div
                            class="color"
                            :style="{backgroundColor: detail.color}"
                            v-for="detail in product.productDetail"
                            @click="$event.target.classList.toggle('active')"
                        >
                            <div class="color-active"></div>
                            <div class="color-active" style="background-color: #fff;"></div>
                        </div>
                        <div class="d-none color green disabled" style="background-color: #28a745;">
                            <div class="color-active"></div>
                            <div class="color-active" style="background-color: #28a745;"></div>
                        </div>
                    </div>
                    <div class="product__chars__materials">
                        <div class="title">Material</div>
                        <div class="material">Metal</div>
                        <div class="d-none material plastic disabled">Plastic</div>
                    </div>
                    <div class="product__chars__actions">
                        <div class="title">Quantity</div>
                        <div class="product__chars__actions__content">
                            <div class="quantity">
                                <input type="number" min="1" value="1">
                                <div class="quantity__button quantity__buttonUp">+</div>
                                <div class="quantity__button quantity__buttonDown">-</div>
                            </div>
                            <button @click="addProductToStore(product)" class="addToCart">Add To Cart</button>
                            <button class="like"><i class="fas fa-heart"></i></button>
                            <button class="stats"><i class="fas fa-chart-bar"></i></button>
                        </div>
                    </div>
                    <div class="row product__chars__tagsAndShare justify-content-between">
                        <div class="col-12 col-md-auto product__chars__tags">
                            <div class="item"><a href="#">Mounts</a></div>
                            <div class="item"><a href="#">Electrodes</a></div>
                            <div class="item"><a href="#">Chainsaws</a></div>
                        </div>
                        <div class="col-12 col-md-auto product__chars__share">
                            <div class="item facebook">Like</div>
                            <div class="item twiter">Tweet</div>
                            <div class="item pinterest">Pin It</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 product__aside">

                    <div class="product__aside__titles">
                        <div class="title desc active" data-name="desc">Descriprion</div>
                        <div class="title spec" data-name="spec">Specification</div>
                        <div class="title reviews" data-name="reviews">Reviews</div>
                    </div>

                    <div class="product__aside__contents">

                        <div class="content content_active desc" data-name="desc">
                            <h2 class="content__title">Product Full Description</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum, diam non iaculis finibus, ipsum arcu sollicitudin dolor, ut cursus sapien sem sed purus. Donec vitae fringilla tortor, sed fermentum nunc. Suspendisse sodales turpis dolor, at rutrum dolor tristique id. Quisque pellentesque ullamcorper felis, eget gravida mi elementum a. Maecenas consectetur volutpat ante, sit amet molestie urna luctus in. Nulla eget dolor semper urna malesuada dictum. Duis eleifend pellentesque dui et finibus. Pellentesque dapibus dignissim augue. Etiam odio est, sodales ac aliquam id, iaculis eget lacus. Aenean porta, ante vitae suscipit pulvinar, purus dui interdum tellus, sed dapibus mi mauris vitae tellus.</p>
                            <h2>Etiam lacus lacus mollis in mattis</h2>
                            <p>Praesent mattis eget augue ac elementum. Maecenas vel ante ut enim mollis accumsan. Vestibulum vel eros at mi suscipit feugiat. Sed tortor purus, vulputate et eros a, rhoncus laoreet orci. Proin sapien neque, commodo at porta in, vehicula eu elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur porta vulputate augue, at sollicitudin nisl molestie eget.</p>
                            <p>Nunc sollicitudin, nunc id accumsan semper, libero nunc aliquet nulla, nec pretium ipsum risus ac neque. Morbi eu facilisis purus. Quisque mi tortor, cursus in nulla ut, laoreet commodo quam. Pellentesque et ornare sapien. In ac est tempus urna tincidunt finibus. Integer erat ipsum, tristique ac lobortis sit amet, dapibus sit amet purus. Nam sed lorem nisi. Vestibulum ultrices tincidunt turpis, sit amet fringilla odio scelerisque non.</p>
                        </div>

                        <div class="content spec" data-name="spec">
                            <h2 class="content__title">Specification</h2>
                            <div class="spec__general">
                                <h3>General</h3>
                                <div class="name">Material</div>
                                <div class="value">Aluminium, Plastic</div>
                                <div class="name">Engine Type</div>
                                <div class="value">Brushless</div>
                                <div class="name">Battery Voltage</div>
                                <div class="value">18 V</div>
                                <div class="name">Battery Type</div>
                                <div class="value">Li-lon</div>
                                <div class="name">Number of Speeds</div>
                                <div class="value">2</div>
                                <div class="name">Charge Time</div>
                                <div class="value">1.08 h</div>
                                <div class="name">Weight</div>
                                <div class="value">1.5 kg</div>
                            </div>
                            <div class="spec__dimensions">
                                <h3>Dimensions</h3>
                                <div class="name">Length</div>
                                <div class="value">99 mm</div>
                                <div class="name">Width</div>
                                <div class="value">207 mm</div>
                                <div class="name">Height</div>
                                <div class="value">208 mm</div>
                            </div>
                            <div class="spec__additionalInfo">
                                <p>Information on technical characteristics, the delivery set, the country of manufacture and the appearance of the goods is for reference only and is based on the latest information available at the time of publication.</p>
                            </div>
                        </div>

                        <div class="content reviews" data-name="reviews">
                            <div class="content__title">Customer Reviews</div>
                            <div class="reviews__items">
                                <div class="item">
                                    <div class="item__image" style="background-image: url('img/avatars/avatar-1.jpg');"></div>
                                    <div class="item__content">
                                        <div class="item__content__userName">Samantha Smith</div>
                                        <div class="item__content__stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <p>Phasellus id mattis nulla. Mauris velit nisi, imperdiet vitae sodales in, maximus ut lectus. Vivamus commodo scelerisque lacus, at porttitor dui iaculis id. Curabitur imperdiet ultrices fermentum.</p>
                                        <div class="item__content__date">2 January, 2018</div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="item__image" style="background-image: url('img/avatars/avatar-2.jpg');"></div>
                                    <div class="item__content">
                                        <div class="item__content__userName">Adam Taylor</div>
                                        <div class="item__content__stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>Aenean non lorem nisl. Duis tempor sollicitudin orci, eget tincidunt ex semper sit amet. Nullam neque justo, sodales congue feugiat ac, facilisis a augue. Donec tempor sapien et fringilla facilisis. Nam maximus consectetur diam. Nulla ut ex mollis, volutpat tellus vitae, accumsan ligula.</p>
                                        <div class="item__content__date">12 April, 2018</div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="item__image" style="background-image: url('img/avatars/avatar-3.jpg');"></div>
                                    <div class="item__content">
                                        <div class="item__content__userName">Helena Garcia</div>
                                        <div class="item__content__stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>Duis ac lectus scelerisque quam blandit egestas. Pellentesque hendrerit eros laoreet suscipit ultrices.</p>
                                        <div class="item__content__date">27 May, 2018</div>
                                    </div>
                                </div>
                            </div>

                            <div class="pagination">
                                <div class="arrow prev disabled"><i class="fas fa-chevron-left"></i></div>

                                <div class="pageNumber">1</div>
                                <div class="pageNumber active">2</div>
                                <div class="pageNumber">3</div>

                                <div class="arrow next"><i class="fas fa-chevron-right"></i></div>
                            </div>

                            <div class="reviews__newReview">
                                <div class="content__title">Write A Review</div>
                                <form action="" method="">
                                    <div class="reviews__newReview__stars">
                                        <select>
                                            <option>5 Start Rating</option>
                                            <option>4 Start Rating</option>
                                            <option>3 Start Rating</option>
                                            <option>2 Start Rating</option>
                                            <option>1 Start Rating</option>
                                        </select>
                                    </div>
                                    <div class="reviews__newReview__name">
                                        <input type="text" placeholder="Your Name">
                                    </div>
                                    <div class="reviews__newReview__mail">
                                        <input type="text" placeholder="Email Address">
                                    </div>
                                    <div class="reviews__newReview__review">
                                        <input type="text">
                                    </div>
                                    <input type="submit" value="Post Your Review">
                                </form>
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
    import { mapState, mapGetters, mapActions, mapMutations } from 'vuex';

    export default {
        name: "Product",
        inject: ['productsRepository'],
        data() {
            return {
                product: {
                    description: '',
                    name: '',
                    photos: [],
                    productDetail: [{
                        version: '',
                        material: '',
                        quantity: '',
                        price: '',
                        color: '',
                        specification: '',
                    }],
                    sku: '',
                    status: '',
                }
            }
        },
        async mounted() {
            let sku = this.$route.params.sku;
            let {data: product} = await this.productsRepository.getProduct(sku).catch(err => {
                this.$router.push('/404')
            });

            this.product = product;
            setTimeout(() => this.makeSlider(), 1000);
        },
        computed: {
            ...mapGetters(['getProducts']),
        },
        methods: {
            ...mapMutations(['addProduct', 'removeProduct']),
            makeSlider() {
                $('.product .product__galery__slider').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    arrows: false,
                    asNavFor: $('.product .product__galery__buttons')
                });

                $('.product .product__galery__buttons').slick({
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    dots: false,
                    arrows: false,
                    asNavFor: $('.product .product__galery__slider'),
                    focusOnSelect: true,
                    //centerMode: true
                    responsive: [
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 3,
                            }
                        }
                    ]
                });
            },
            addProductToStore(product) {
                this.addProduct(product);
            }
        }
    }
</script>

<style scoped lang="scss">
    @import "../../assets/scss/product";
</style>