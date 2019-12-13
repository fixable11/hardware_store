<template>
    <section class="services">
        <div class="container">
            <div class="row services__items">
                <div class="col-12 col-sm-6 col-md-3 item">
                    <div class="icon"><i class="fas fa-shipping-fast"></i></div>
                    <div class="title"><span>Free Shipping</span><p>For orders from $50</p></div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 item">
                    <div class="icon"><i class="fas fa-headset"></i></div>
                    <div class="title"><span>Support 24/7</span><p>Call us anytime</p></div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 item">
                    <div class="icon"><i class="far fa-credit-card"></i></div>
                    <div class="title"><span>100% Safety</span><p>Only secure payments</p></div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 item">
                    <div class="icon"><i class="fas fa-tags"></i></div>
                    <div class="title"><span>Hot Offers</span><p>Discounts up to 90%</p></div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Services"
    }
</script>

<style lang="scss" scoped>
    @import "../../assets/scss/vars";

    .services {
        padding: 50px 15px;
        &__items {
            border: 1px solid #ebebeb;
            .item {
                padding: 15px 15px 15px 25px;
                display: flex;
                display: -ms-flexbox;
                border: 1px solid #ebebeb;
                .icon {
                    padding-right: 20px;
                    color: $accent;
                    font-size: 2.8rem;
                    display: flex;
                    display: -ms-flexbox;
                    flex-direction: column;
                    justify-content: center;
                }
                span {
                    font-size: 1.1rem;
                    font-weight: 600;
                }
                p {
                    margin: 0;
                }
            }
        }
    }
</style>