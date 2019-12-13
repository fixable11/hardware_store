<template>
    <section class="slider">
        <div class="container">
            <div class="row no-gutters">
                <div class="offset-lg-3 col-lg-9">
                    <div class="headerSlider">
                        <div class="headerSlider__item"
                             :style="{ backgroundImage: 'url(' + slide.image + ')' }"
                             v-for="slide in slides"
                        >
                            <div class="headerSlider__inner">
                                <h2 class="headerSlider__title">{{ slide.title }}</h2>
                                <p class="headerSlider__p">{{ slide.p }}</p>
                                <button class="headerSlider__btn">Shop Now</button>
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
        name: "Slider",
        data() {
            return {
                slides: [
                    {
                        image: require('../../assets/images/slides/slide-1-full.jpg'),
                        title: "Big choice of Plumbing products",
                        p: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui veritatis, fuga dolores voluptate exercitationem distinctio!",
                    },
                    {
                        image: require('../../assets/images/slides/slide-2-full.jpg'),
                        title: "Big choice of Plumbing products",
                        p: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui veritatis, fuga dolores voluptate exercitationem distinctio!",
                    },
                ],
            }
        },
        mounted() {
            $('.headerSlider').slick({
                arrows: false,
                dots: true,
            });
        }
    }
</script>

<style lang="scss">
    .headerSlider {
        position: relative;
        &__item {
            position: relative;
            height: 395px;
            width: 100%;
            background: #fff no-repeat center;
        }
        &__inner {
            margin-left: 40px;
            max-width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }
        &__title {

        }
        &__p {

        }
        &__btn {
            color: #3d464d;
            padding: 7px 30px;
            font-weight: 500;
            font-size: 1.2rem;
            border: none;
            background-color: #ffd333;
        }

        .slick-dots {
            position: absolute;
            left: 50%;
            background-color: #fff;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-content: center;
            width: auto;
            bottom: 25px;
            transform: translateX(-50%);
            li {
                margin: 0;
            }
            .slick-active {
                button {
                    &:before {
                        color: #ffd333;
                    }
                }
            }
            button {
                border-radius: 50%;
                &:before {
                    font-size: 12px;
                    color: gray;
                    opacity: 1;
                }
            }
        }
    }
</style>