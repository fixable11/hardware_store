<template>
    <footer class="footer">
        <div class="container">
            <div class="row footer__content">

                <div class="col-12 col-md-6 col-lg-4 footer__content__contactUs">
                    <div class="title">Contact Us</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in feugiat lorem. Pellentque ac placerat tellus.</p>
                    <p><i class="fas fa-globe-europe"></i> 715 Fake Street, New York 10021 USA</p>
                    <p><i class="far fa-envelope"></i> stroyka@example.com</p>
                    <p><i class="fas fa-phone"></i> (800) 060-0730, (800) 060-0730</p>
                    <p><i class="far fa-clock"></i> Mon-Sat 10:00pm - 7:00pm</p>
                </div>

                <div class="col-6 col-md-3 col-lg-2 footer__content__information">
                    <div class="title">Information</div>
                    <a href="#">About Us</a>
                    <a href="#">Delivery Information</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Brands</a>
                    <a href="#">Contact Us</a>
                    <a href="#">Returns</a>
                    <a href="#">Site Map</a>
                </div>

                <div class="col-6 col-md-3 col-lg-2 footer__content__myAccount">
                    <div class="title">My Account</div>
                    <a href="#">Store Location</a>
                    <a href="#">Order History</a>
                    <a href="#">Wish List</a>
                    <a href="#">Newsletter</a>
                    <a href="#">Specials</a>
                    <a href="#">Gift Certificater</a>
                    <a href="#">Affiliate</a>
                </div>

                <div class="col-12 col-lg-4 footer__content__newsletter">
                    <div class="title">Newsletter</div>
                    <p>Praesent pellentesque volutpat ex, vitae auctor lorem pulvinar mollis felis at lacinia.</p>
                    <input type="text" placeholder="Email Address...">
                    <button class="button">Subscribe</button>
                    <div class="social">
                        <p>Follow us on social networks</p>
                        <div class="icons">
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-youtube"></i>
                            <i class="fab fa-instagram"></i>
                            <i class="fab fa-google-plus-g"></i>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row footer__sub justify-content-between">
                <div class="col-auto footer__sub__author">
                    <p>Powered by Siges & Fixable - Design by <a href="https://themeforest.net/user/kos9">Kos</a></p>
                </div>
                <div class="col-auto footer__sub__payments">
                    <img src="img/payments.png" alt="Payments">
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: "Footer"
};
</script>

<style scoped lang="sass">

    @import "../assets/scss/vars"

    .footer
        font-size: .95rem
        color: $text
        border-top: 1px solid #e4e4e4
        &__content
            padding: 35px 0
            border-bottom: 1px solid #e4e4e4
        .title
            padding-bottom: 20px
            font-size: 1.3rem
            font-weight: 600

        &__contactUs
            p
                padding-bottom: 5px

            i
                padding-right: 5px

        &__myAccount
            display: flex
            display: -ms-flexbox
            flex-direction: column

            a
                display: block

                &:hover
                    color: $link

        &__information
            display: flex
            display: -ms-flexbox
            flex-direction: column

            a
                display: block

                &:hover
                    color: $link

        &__newsletter
            > *
                border-radius: 2px

            input
                padding: 5px 15px
                font-size: 1rem
                border: 1px solid #c4c4c4

                &::placeholder
                    color: #999

            button
                padding: 7px 25px
                color: $text
                font-size: 1rem
                font-weight: 500
                border: none
                background-color: $accent

            .social
                margin-top: 20px

                .icons
                    i
                        display: inline-block
                        margin: auto
                        width: 35px
                        height: 35px
                        color: #fff
                        border-radius: 50%
                        cursor: pointer

                        &:before
                            display: flex
                            display: -ms-flexbox
                            justify-content: center
                            align-items: center
                            height: 100%

                        &.fa-facebook-f
                            background-color: #3C5A99

                        &.fa-twitter
                            background-color: #00A2E8

                        &.fa-youtube
                            background-color: #E52E2E

                        &.fa-instagram
                            background-color: #815DC7

                        &.fa-google-plus-g
                            background-color: #FFC338

        &__sub
            padding: 25px 0

            &__author
                a
                    color: $link

            &__payments

        .slider_hidden
            .mainNav
                .container
                    > .row
                        position: relative

                &__menu
                    position: absolute
                    z-index: 999

                    &:hover
                        .mainNav__menu__items
                            display: block !important

                    .title

                    &__items
                        display: none

                .slider
                    display: none

        .hasBreadcrumb

            .breadcrumb
                display: flex
                display: -ms-flexbox
                padding: 25px 0

                &__page
                    position: relative
                    padding: 0 20px 0 10px

                    &-current
                        color: #b3b3b3

                    &:not(:last-child)
                        cursor: pointer

                        &:hover
                            color: $link

                        &:before
                            content: '\f054'
                            position: absolute
                            bottom: 4px
                            right: 0
                            font-family: FontAwesome
                            color: #b3b3b3
                            font-size: .6rem

</style>