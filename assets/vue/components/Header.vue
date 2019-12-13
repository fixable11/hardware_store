<template>
    <header>
        <div class="secondaryHeader">
            <div class="container">
                <div class="row d-none d-lg-flex">
                    <div class="col-md-6 secondaryHeader__leftSide">
                        <div class="items">
                            <div class="item"><a href="#">About Us</a></div>
                            <div class="item"><a href="#">Contacts</a></div>
                            <div class="item"><a href="#">Store Location</a></div>
                            <div class="item"><a href="#">Track Order</a></div>
                            <div class="item"><a href="#">Blog</a></div>
                        </div>
                    </div>
                    <div class="col-md-6 secondaryHeader__rightSide">
                        <div class="items">
                            <div class="item">
                                <div class="title">My Account <i class="fas fa-angle-down"></i></div>
                                <div class="subItems">
                                    <div class="subItems__wrap">
                                        <div class="subItems__item"><a href="#">Dashboard</a></div>
                                        <div class="subItems__item"><a href="#">Edit Profile</a></div>
                                        <div class="subItems__item"><a href="#">Order History</a></div>
                                        <div class="subItems__item"><a href="#">Addresses</a></div>
                                        <div class="subItems__item"><a href="#">Password</a></div>
                                        <div class="subItems__item"><a href="#">Logout</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mainHeader align-items-center justify-content-between">

                <div class="mainHeader__bars">
                    <i class="fas fa-bars"></i>
                </div>

                <div class="col-auto mainHeader__logo">
                    <img :src="require('../assets/images/logo.png')" alt="Logo">
                </div>

                <div class="col d-none d-md-block mainHeader__search">
                    <input type="text" placeholder="Search over 10,000 products">
                </div>

                <div class="col-auto d-none d-lg-block mainHeader__number">
                    Customer Service
                    <strong>(800) 060-0730</strong>
                </div>

                <div class="col-md-2 d-flex d-lg-none mainHeader__user">
                    <div class="favorites"><i class="far fa-heart"></i>
                        <div class="favorites__count">2</div>
                    </div>
                    <div class="cart"><i class="fas fa-shopping-cart"></i>
                        <div class="cart__count">7</div>
                    </div>
                </div>

            </div>
        </div>

        <nav class="menuBar d-none d-lg-flex">
            <div class="container">
                <div class="row menuBar__menu">
                    <div class="offset-md-3 col-md-8 menuBar__menu__items">
                        <div class="item withSub">
                            <div class="item__title">Home <i class="fas fa-angle-down"></i></div>
                            <div class="item__subMenu">
                                <a href="#" class="category">Home 1 Slideshow</a>
                                <a href="#" class="category">Home 2 Slideshow</a>
                                <a href="#" class="category">Home 1 Finder</a>
                                <a href="#" class="category">Home 2 Finder</a>
                                <a href="#" class="category">Offcanvas Cart</a>
                            </div>
                        </div>
                        <div class="item withSub">
                            <div class="item__title">Megamenu <i class="fas fa-angle-down"></i></div>
                            <div class="row item__megamenu">
                                <div class="col-6 mainCategory">
                                    <div class="mainCategory__title">Power Tools</div>
                                    <div class="mainCategory__items">
                                        <div class="subCats">
                                            <a href="#">Engravers</a>
                                            <a href="#">Wrenches</a>
                                            <a href="#">Wall Chaser</a>
                                            <a href="#">Pneumatic Tools</a>
                                        </div>
                                    </div>
                                    <div class="mainCategory__title">Machine Tools</div>
                                    <div class="mainCategory__items">
                                        <div class="subCats">
                                            <a href="#">Thread Cutting</a>
                                            <a href="#">Chip Blowers</a>
                                            <a href="#">Sharpening Machines</a>
                                            <a href="#">Pipe Cutters</a>
                                            <a href="#">Slotting Machines</a>
                                            <a href="#">Lathes</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mainCategory">
                                    <div class="mainCategory__title">Hand Tools</div>
                                    <div class="mainCategory__items">
                                        <div class="subCats">
                                            <a href="#">Screwdrivers</a>
                                            <a href="#">Handsaws</a>
                                            <a href="#">Knives</a>
                                            <a href="#">Axes</a>
                                            <a href="#">Multitools</a>
                                            <a href="#">Paint Tools</a>
                                        </div>
                                    </div>
                                    <div class="mainCategory__title">Garden Equipment</div>
                                    <div class="mainCategory__items">
                                        <div class="subCats">
                                            <a href="#">Motor Pumps</a>
                                            <a href="#">Chainsaws</a>
                                            <a href="#">Electic Saws</a>
                                            <a href="#">Brush Cutters</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item withSub">
                            <div class="item__title">Shop <i class="fas fa-angle-down"></i></div>
                            <div class="item__subMenu">
                                <div class="category">
                                    <div class="item__title"><a href="#">Shop Grid</a></div>
                                    <div class="subCategories">
                                        <a href="#" class="category">3 Columns Sidebar</a>
                                        <a href="#" class="category">4 Columns Full</a>
                                        <a href="#" class="category">5 Columns Full</a>
                                    </div>
                                </div>
                                <a href="#" class="category">Shop List</a>
                                <a href="#" class="category">Shop Right Sidebar</a>
                                <div class="category">
                                    <div class="item__title"><a href="#">Product</a></div>
                                    <div class="subCategories">
                                        <a href="#" class="category">Product</a>
                                        <a href="#" class="category">Product Alt</a>
                                        <a href="#" class="category">Product Sidebar</a>
                                    </div>
                                </div>
                                <a href="#" class="category">Cart</a>
                                <a href="#" class="category">Cart Empty</a>
                                <a href="#" class="category">Checkout</a>
                                <a href="#" class="category">Wishlist</a>
                                <a href="#" class="category">Compare</a>
                                <a href="#" class="category">Track Order</a>
                            </div>
                        </div>
                        <div class="item withSub">
                            <div class="item__title">Account <i class="fas fa-angle-down"></i></div>
                            <div class="item__subMenu">
                                <a href="#" class="category">Login</a>
                                <a href="#" class="category">Dashboard</a>
                                <a href="#" class="category">Edit Profile</a>
                                <a href="#" class="category">Order History</a>
                                <a href="#" class="category">Address Book</a>
                                <a href="#" class="category">Change Password</a>
                            </div>
                        </div>
                        <div class="item withSub">
                            <div class="item__title">Blog <i class="fas fa-angle-down"></i></div>
                            <div class="item__subMenu">
                                <a href="#" class="category">Blog Classic</a>
                                <a href="#" class="category">Blog Grid</a>
                                <a href="#" class="category">Blog List</a>
                                <a href="#" class="category">Blog Left Sidebar</a>
                                <a href="#" class="category">Post Page</a>
                                <a href="#" class="category">Post Without Sidebar</a>
                            </div>
                        </div>
                        <div class="item withSub">
                            <div class="item__title">Pages <i class="fas fa-angle-down"></i></div>
                            <div class="item__subMenu">
                                <a href="#" class="category">AboutUs</a>
                                <a href="#" class="category">Contact Us</a>
                                <a href="#" class="category">Contact Us Alt</a>
                                <a href="#" class="category">404</a>
                                <a href="#" class="category">Terms and Conditions</a>
                                <a href="#" class="category">FAQ</a>
                                <a href="#" class="category">Components</a>
                                <a href="#" class="category">Typography</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="title">Buy Theme</div>
                        </div>
                    </div>
                    <div class="col-md-1 menuBar__user">
                        <div class="favorites"><i class="far fa-heart"></i>
                            <div class="favorites__count">2</div>
                        </div>
                        <div class="cart"><i class="fas fa-shopping-cart"></i>
                            <div class="cart__count">7</div>
                        </div>
                        <div class="account"><i class="far fa-user"></i></div>
                    </div>
                </div>
            </div>
        </nav>
        <section class="mainNav">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 d-none d-lg-block mainNav__menu">
                        <div class="title" @click="showMenu = !showMenu"><i class="fas fa-bars"></i> Shop By Category</div>
                        <transition name="slide">
                            <div v-if="showMenu" class="mainNav__menu__items">
                            <div class="item withSub">
                                <div class="item__title">Power Tools</div>
                                <div class="row item__megamenu" style="background-image: url('img/megamenu/megamenu-1.jpg');">
                                    <div class="col-3 mainCategory">
                                        <div class="mainCategory__title">Power Tools</div>
                                        <div class="mainCategory__items">
                                            <div class="subCats">
                                                <a href="#">Engravers</a>
                                                <a href="#">Drills</a>
                                                <a href="#">Wrenches</a>
                                                <a href="#">Plumbing</a>
                                                <a href="#">Wall Chaser</a>
                                                <a href="#">Pneumatic Tools</a>
                                                <a href="#">Millimg Cutters</a>
                                            </div>
                                            <div class="mainCats">
                                                <a href="#">Workbenches</a>
                                                <a href="#">Presses</a>
                                                <a href="#">Spray Guns</a>
                                                <a href="#">Riveters</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 mainCategory">
                                        <div class="mainCategory__title">Hand Tools</div>
                                        <div class="mainCategory__items">
                                            <div class="subCats">
                                                <a href="#">Screwdrivers</a>
                                                <a href="#">Handsaws</a>
                                                <a href="#">Knives</a>
                                                <a href="#">Axes</a>
                                                <a href="#">Multitools</a>
                                                <a href="#">Paint Tools</a>
                                            </div>
                                        </div>
                                        <div class="mainCategory__title">Garden Equipment</div>
                                        <div class="mainCategory__items">
                                            <div class="subCats">
                                                <a href="#">Motor Pumps</a>
                                                <a href="#">Chainsaws</a>
                                                <a href="#">Electic Saws</a>
                                                <a href="#">Brush Cutters</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 mainCategory">
                                        <div class="mainCategory__title">Machine Tools</div>
                                        <div class="mainCategory__items">
                                            <div class="subCats">
                                                <a href="#">Thread Cutting</a>
                                                <a href="#">Chip Blowers</a>
                                                <a href="#">Sharpening Machines</a>
                                                <a href="#">Pipe Cutters</a>
                                                <a href="#">Slotting Machines</a>
                                                <a href="#">Lathes</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 mainCategory">
                                        <div class="mainCategory__title">Instruments</div>
                                        <div class="mainCategory__items">
                                            <div class="subCats">
                                                <a href="#">Welding Equipment</a>
                                                <a href="#">Power Tools</a>
                                                <a href="#">Hand Tools</a>
                                                <a href="#">Measuring Tool</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item withSub">
                                <div class="item__title">Hand Tools</div>
                                <div class="row item__megamenu" style="background-image: url('img/megamenu/megamenu-2.jpg');">
                                    <div class="col-4 mainCategory">
                                        <div class="mainCategory__title">Hand Tools</div>
                                        <div class="mainCategory__items">
                                            <div class="subCats">
                                                <a href="#">Screwdrivers</a>
                                                <a href="#">Handsaws</a>
                                                <a href="#">Knives</a>
                                                <a href="#">Axes</a>
                                                <a href="#">Multitools</a>
                                                <a href="#">Paint Tools</a>
                                            </div>
                                        </div>
                                        <div class="mainCategory__title">Garden Equipment</div>
                                        <div class="mainCategory__items">
                                            <div class="subCats">
                                                <a href="#">Motor Pumps</a>
                                                <a href="#">Chainsaws</a>
                                                <a href="#">Electic Saws</a>
                                                <a href="#">Brush Cutters</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 mainCategory">
                                        <div class="mainCategory__title">Machine Tools</div>
                                        <div class="mainCategory__items">
                                            <div class="subCats">
                                                <a href="#">Thread Cutting</a>
                                                <a href="#">Chip Blowers</a>
                                                <a href="#">Sharpening Machines</a>
                                                <a href="#">Pipe Cutters</a>
                                                <a href="#">Slotting Machines</a>
                                                <a href="#">Lathes</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 mainCategory">
                                        <div class="mainCategory__title">Instruments</div>
                                        <div class="mainCategory__items">
                                            <div class="subCats">
                                                <a href="#">Welding Equipment</a>
                                                <a href="#">Power Tools</a>
                                                <a href="#">Hand Tools</a>
                                                <a href="#">Measuring Tool</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item withSub">
                                <div class="item__title">Machine Tools</div>
                                <div class="row item__megamenu" style="background-image: url('img/megamenu/megamenu-3.jpg');">
                                    <div class="col-6 mainCategory">
                                        <div class="mainCategory__title">Hand Tools</div>
                                        <div class="mainCategory__items">
                                            <div class="subCats">
                                                <a href="#">Screwdrivers</a>
                                                <a href="#">Handsaws</a>
                                                <a href="#">Knives</a>
                                                <a href="#">Axes</a>
                                                <a href="#">Multitools</a>
                                                <a href="#">Paint Tools</a>
                                            </div>
                                        </div>
                                        <div class="mainCategory__title">Garden Equipment</div>
                                        <div class="mainCategory__items">
                                            <div class="subCats">
                                                <a href="#">Motor Pumps</a>
                                                <a href="#">Chainsaws</a>
                                                <a href="#">Electic Saws</a>
                                                <a href="#">Brush Cutters</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mainCategory">
                                        <div class="mainCategory__title">Instruments</div>
                                        <div class="mainCategory__items">
                                            <div class="subCats">
                                                <a href="#">Welding Equipment</a>
                                                <a href="#">Power Tools</a>
                                                <a href="#">Hand Tools</a>
                                                <a href="#">Measuring Tool</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item withSub">
                                <div class="item__title">Building Supplies</div>
                                <div class="row item__megamenu">
                                    <div class="col-12 mainCategory">
                                        <div class="mainCategory__title">Hand Tools</div>
                                        <div class="mainCategory__items">
                                            <div class="subCats">
                                                <a href="#">Screwdrivers</a>
                                                <a href="#">Handsaws</a>
                                                <a href="#">Knives</a>
                                                <a href="#">Axes</a>
                                                <a href="#">Multitools</a>
                                                <a href="#">Paint Tools</a>
                                            </div>
                                        </div>
                                        <div class="mainCategory__title">Garden Equipment</div>
                                        <div class="mainCategory__items">
                                            <div class="subCats">
                                                <a href="#">Motor Pumps</a>
                                                <a href="#">Chainsaws</a>
                                                <a href="#">Electic Saws</a>
                                                <a href="#">Brush Cutters</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item withSub item_relative">
                                <div class="item__title">Electrical</div>
                                <div class="item__subMenu">
                                    <div class="category">
                                        <div class="item__title"><a href="#">Soldering Equipment</a></div>
                                        <div class="subCategories">
                                            <a href="#" class="category">Soldering Station</a>
                                            <a href="#" class="category">Soldering Dryers</a>
                                            <a href="#" class="category">Gas Soldering Iron</a>
                                            <a href="#" class="category">Electric Soldering Iron</a>
                                        </div>
                                    </div>
                                    <a href="#" class="category">Light Bulds</a>
                                    <a href="#" class="category">Batteries</a>
                                    <a href="#" class="category">Light Fixtures</a>
                                    <a href="#" class="category">Warm Floor</a>
                                    <a href="#" class="category">Generators</a>
                                    <a href="#" class="category">UPS</a>
                                </div>
                            </div>
                            <div class="item">Power Machiney</div>
                            <div class="item">Measurement</div>
                            <div class="item">Clothes & PPE</div>
                            <div class="item">Plumbing</div>
                            <div class="item">Storege & Organization</div>
                            <div class="item">Welding & Soldering</div>
                        </div>
                        </transition>
                    </div>
                </div>
            </div>
        </section>
    </header>
</template>

<script>

    export default {
        name: "Header",
        data() {
            return {
                showMenu: true,
            }
        },

        methods: {
            toggleMenu() {
                this.showMenu = !this.showMenu
            }
        }
    };
</script>

<style scoped lang="css">

    .slide-enter-active {
        transition-duration: 1s;
        transition-timing-function: ease;
    }

    .slide-enter-to, .slide-leave {
        overflow: hidden;
    }

    .slide-enter, .slide-leave-to {
        overflow: hidden;
        max-height: 0;
    }

    .slide-leave-active {
        transition-duration: 0s;
        transition-timing-function: ease;
    }
</style>
<style scoped lang="scss">
    @import "../assets/scss/header";
</style>