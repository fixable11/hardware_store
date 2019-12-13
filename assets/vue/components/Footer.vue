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
                    <img :src="require('../assets/images/payments.png')" alt="Payments">
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

<style scoped lang="scss">
    @import "../assets/scss/footer";
</style>