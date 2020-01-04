<template>
    <section class="aboutUs">
        <div
            class="aboutUs__bg"
            :style="{'background-image': 'url(' + require('../assets/images/aboutus.jpg') + ')'}"
        ></div>
        <div class="aboutUs__content container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">
                    <div class="aboutUs__body text-center">
                        <h1 class="aboutUs__title h1">About Us</h1>
                        <p class="aboutUs__desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacus metus, convallis ut leo nec, tincidunt eleifend justo. Ut felis orci, hendrerit a pulvinar et, gravida ac lorem. Sed vitae molestie sapien, at sollicitudin tortor.</p>
                        <p class="aboutUs__desc">Duis id volutpat libero, id vestibulum purus.Donec euismod accumsan felis,egestas lobortis velit tempor vitae. Integer eget velit fermentum, dignissim odio non, bibendum velit.</p>

                        <h2 class="aboutUs__teamTitle h2">Meat Our Team</h2>
                        <div class="aboutUs__offer text-muted">
                            Want to work in our friendly team? <br>
                            <a href="" class="aboutUs__offerLink">Contact us </a>
                            and we will consider your candidacy.
                        </div>
                        <div class="aboutUs__teammates teammates">
                            <div class="teammates__item teammate" v-for="i in 5">
                                <div class="teammate__imgWrap">
                                    <img
                                        :src="require('../assets/images/teammates/teammate-1.jpg')"
                                        alt=""
                                        class="teammate__img"
                                    >
                                </div>
                                <div class="teammate__name">Michael Russo {{ i }}</div>
                                <div class="teammate__position text-muted">Chief Executive Officer</div>
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

    export default {
        name: "AboutUs",
        data() {
            return {

            }
        },
        mounted() {
            $('.aboutUs__teammates').slick({
                arrows: false,
                dots: true,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1200,
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
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        }
    }
</script>

<style scoped lang="scss">
    .aboutUs {
        &__bg {
            background-size: cover;
            background-position: bottom;
            height: 500px;
        }
        &__body {
            padding: 4.6rem 5.75rem;
            position: relative;
            margin-top: -425px;
            background-color: #fff;
        }
        &__title {
            margin-bottom: 3.125rem;

        }
        &__desc {
            margin-bottom: 1.5rem;
            text-align: center;
        }
        &__teamTitle {
            margin-top: 4.5rem;
        }
        &__teammates {
            margin-top: 30px;
        }
    }
    .teammates {
    }
    .teammate {
        padding: 10px;
        &__imgWrap {
            max-width: 100%;
        }
        &__img {
            max-width: 100%;
        }
        &__name {
            margin-top: 15px;
        }
    }
</style>
<style scoped lang="scss">
    @import '~bootstrap/scss/bootstrap-grid.scss';

    @include media-breakpoint-down(xs) {

    }
    @include media-breakpoint-down(sm) {

    }
    @include media-breakpoint-down(md) {
        .aboutUs {
            &__body {
                padding: 3rem 4rem;
            }
        }
    }
    @include media-breakpoint-down(lg) {
        .aboutUs {
            &__body {
                padding: 1rem 2rem;
            }
            &__title {
                margin-bottom: 2.5rem;
            }
            &__teamTitle {
                margin-top: 2.5rem;
            }
        }
    }
</style>