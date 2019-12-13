<template>
    <section class="banner">
        <div class="container banner__content"  :style="{ backgroundImage: 'url(' + image + ')' }">
            <h2>HundredsHand Tools</h2>
            <p>Hammers, Chisels, Universal Pliers, Nippers, Jugsaws, Saws</p>
            <a href="#" class="button">Shop Now</a>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Banner",
        data () {
            return {
                image: require('../../assets/images/banners/banner-1.jpg'),
            }
        }
    }
</script>

<style scoped lang="scss">
    @import "../../assets/scss/vars";

    .banner {
        padding-top: 50px;

        &__content {
            display: flex;
            display: -ms-flexbox;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 25px 10px;
            text-align: center;
            background-position: center;
            background-size: cover;
            h2 {
                font-size: 1.7rem;
            }
            p {
                font-size: 1rem;
            }
            a {
                margin-top: 10px;
                padding: 5px 20px;
                font-weight: 500;
                border-radius: 2px;
                background-color: $accent;
            }
        }
    }
</style>