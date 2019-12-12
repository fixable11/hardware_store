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
                        <div class="title"><i class="fas fa-bars"></i> Shop By Category</div>
                        <div class="mainNav__menu__items">
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
                    </div>
                </div>
            </div>
        </section>
    </header>
</template>

<script>

    export default {
        name: "Header"
    };
</script>

<style scoped lang="sass">

@import "../assets/scss/vars"

header
    .secondaryHeader
        background-color: #f7f7f7
        color: #737373
        box-sizing: border-box

        .item
            padding: 5px 0
            cursor: pointer

        &__leftSide
        .items
            display: inline-flex
            .item
                padding-right: 20px
                &:hover
                    color: $link
        &__rightSide
            display: flex
            display: -ms-flexbox
            justify-content: flex-end
            .items
                display: inline-flex

                .item
                    position: relative

                    &:hover
                        background-color: #ebebeb

                        .subItems
                            transition: all .5s
                            height: auto

                    .title
                        padding: 0 10px

                        span
                            color: $link

                        i
                            font-size: .8rem
                            opacity: .5

                    .subItems
                        position: absolute
                        min-width: 9vw
                        background-color: #fff
                        right: 0
                        height: 0
                        z-index: 999
                        overflow: hidden
                        margin-top: 5px
                        transition: all .5s
                        -webkit-box-shadow: 0px 0px 18px -10px rgba(0, 0, 0, 0.75)
                        -moz-box-shadow: 0px 0px 18px -10px rgba(0, 0, 0, 0.75)
                        box-shadow: 0px 0px 18px -10px rgba(0, 0, 0, 0.75)

                        &__wrap
                            padding: 10px 0

                        &__item
                            color: $text
                            font-weight: 500
                            white-space: nowrap
                            padding: 5px 15px

                            img
                                padding-right: 5px

                            &:hover
                                background-color: #ebebeb

    .mainHeader
        flex-wrap: nowrap
        padding: 1.5vw

        &__bars
            padding: 5px 15px
            font-size: 1.2rem
            border-radius: 2px
            cursor: pointer

            &:hover
                background-color: rgba(255, 255, 255, .5)

        &__logo
            svg
                max-width: 196px
                max-height: 26px

        &__search
            padding: 0 20px

            input
                min-width: 100%
                padding: 5px 15px
                border-radius: 2px
                border: 2px solid #e2e0e0

                &::placeholder
                    color: #999

        &__number
            color: #999
            text-align: right

            strong
                color: $text
                font-size: 1.2rem
                display: block

        &__user
            display: flex
            display: -ms-flexbox
            align-items: center
            justify-content: flex-end
            font-size: 1.2rem

            > *
                border-radius: 3px
                padding: 5px 15px

                &:hover
                    background-color: rgba(255, 255, 255, .5)

            .favorites, .cart
                position: relative

                &__count
                    position: absolute
                    font-size: .65rem
                    font-weight: 600
                    display: flex
                    display: -ms-flexbox
                    align-items: center
                    justify-content: center
                    top: 10%
                    right: 15%
                    width: 15px
                    height: 15px
                    background-color: #fff
                    border-radius: 50%

.menuBar
    padding: 5px 0
    position: relative
    background-color: $accent
    font-weight: 500

    &__menu
        padding: 8px 0
        height: max-content
        border-radius: 2px

        &__items
            display: flex
            display: -ms-flexbox

            &-relative
                position: relative

            .item
                position: relative
                cursor: pointer
                padding: 10px 15px
                border-radius: 3px

                &:hover
                    background-color: rgba(255, 255, 255, .5)

                &__megamenu
                    display: none
                    position: absolute
                    color: $text
                    top: 100%
                    left: 0
                    width: max-content
                    height: min-content
                    border-radius: 2px
                    background-color: #fff
                    z-index: 999
                    background-position: bottom right
                    background-repeat: no-repeat
                    padding: 25px
                    -webkit-box-shadow: 5px 5px 15px -5px rgba(0, 0, 0, 0.3)
                    -moz-box-shadow: 5px 5px 15px -5px rgba(0, 0, 0, 0.3)
                    box-shadow: 5px 5px 15px -5px rgba(0, 0, 0, 0.3)

                    &::visible
                        display: flex
                        display: -ms-flexbox

                    .mainCategory
                        min-width: 12vw

                        &__title
                            white-space: nowrap
                            font-size: 1rem
                            font-weight: 500
                            padding-bottom: 5px
                            border-bottom: 1px solid #ebebeb

                        &__items
                            padding-top: 10px

                            a
                                display: block

                                &:hover
                                    color: $link

                            .subCats
                                white-space: nowrap
                                color: $lightText
                                margin-bottom: 15px

                                a
                                    padding-bottom: 2px

                            .mainCats
                                font-size: 1rem
                                font-weight: 500
                                color: $text

                &__subMenu
                    display: none
                    position: absolute
                    top: 100%
                    left: 0
                    width: max-content
                    background-color: #fff
                    color: $text
                    padding: 10px 0
                    z-index: 999
                    -webkit-box-shadow: 5px 5px 15px -5px rgba(0, 0, 0, 0.3)
                    -moz-box-shadow: 5px 5px 15px -5px rgba(0, 0, 0, 0.3)
                    box-shadow: 5px 5px 15px -5px rgba(0, 0, 0, 0.3)

                    .category
                        position: relative
                        display: block
                        padding: 3px 25px
                        font-weight: 500

                        &:hover
                            background-color: #ebebeb

                            .subCategories
                                display: block

                        .item__title
                            font-weight: 500
                            min-width: 160px
                            position: relative

                            &:before
                                content: "\f054"
                                font-family: FontAwesome
                                font-weight: 900
                                font-size: .7rem
                                opacity: .5
                                position: absolute
                                top: 2px
                                bottom: 0
                                right: 0

                        .subCategories
                            display: none
                            position: absolute
                            top: -10px
                            left: 100%
                            padding: 10px 0
                            background-color: #fff
                            white-space: nowrap
                            -webkit-box-shadow: 5px 5px 15px -5px rgba(0, 0, 0, 0.3)
                            -moz-box-shadow: 5px 5px 15px -5px rgba(0, 0, 0, 0.3)
                            box-shadow: 5px 5px 15px -5px rgba(0, 0, 0, 0.3)

                &__title
                    font-weight: 600
                    white-space: nowrap

                    i
                        color: rgba(58, 58, 58, .5)

    &__user
        display: flex
        display: -ms-flexbox
        align-items: center
        justify-content: flex-end
        font-size: 1.2rem

        > *
            border-radius: 3px
            padding: 5px 15px

            &:hover
                background-color: rgba(255, 255, 255, .5)

        .favorites, .cart
            position: relative

            &__count
                position: absolute
                font-size: .65rem
                font-weight: 600
                display: flex
                display: -ms-flexbox
                align-items: center
                justify-content: center
                top: 10%
                right: 15%
                width: 15px
                height: 15px
                background-color: #fff
                border-radius: 50%

            &:before
                content: ''
                position: absolute
                top: 0
                right: 0
                width: 10px
                height: 10px

.mainNav
    &__menu
        margin-top: -55px
        color: #fff
        padding: 8px 0
        height: max-content
        //min-width: 16vw
        border-radius: 2px
        background-color: $text
        .title
            padding: 0 15px
            font-size: 1rem
            i
                padding-right: 15px
                color: #859ba6
        &__items
            position: relative
            padding-top: 21px
            .item
                cursor: pointer
                padding: 6px 15px
                font-weight: 400
                &_relative
                    position: relative
                &:hover
                    background-color: #525D66
                    .item__megamenu
                        display: flex
                        display: -ms-flexbox
                    .item__subMenu
                        display: block
                &__title
                &__megamenu
                    display: none
                    position: absolute
                    color: $text
                    margin: 0
                    top: 21px
                    bottom: -10px
                    left: 100%
                    width: max-content
                    border-radius: 2px
                    background-color: #fff
                    z-index: 999
                    background-position: bottom right
                    background-repeat: no-repeat
                    padding: 25px
                    -webkit-box-shadow: 5px 5px 15px -5px rgba(0,0,0,0.3)
                    -moz-box-shadow: 5px 5px 15px -5px rgba(0,0,0,0.3)
                    box-shadow: 5px 5px 15px -5px rgba(0,0,0,0.3)
                    .mainCategory
                        min-width: 12vw
                        &__title
                            white-space: nowrap
                            font-size: 1rem
                            font-weight: 500
                            padding-bottom: 5px
                            border-bottom: 1px solid #ebebeb
                        &__items
                            padding-top: 10px
                            a
                                display: block
                                &:hover
                                    color: $link
                            .subCats
                                color: $lightText
                                margin-bottom: 15px
                                a
                                    padding-bottom: 2px
                            .mainCats
                                font-size: 1rem
                                font-weight: 500
                                color: $text
                &__subMenu
                    display: none
                    position: absolute
                    top: 0
                    left: 100%
                    width: max-content
                    background-color: #fff
                    color: $text
                    padding: 10px 0
                    z-index: 999
                    -webkit-box-shadow: 5px 5px 15px -5px rgba(0,0,0,0.3)
                    -moz-box-shadow: 5px 5px 15px -5px rgba(0,0,0,0.3)
                    box-shadow: 5px 5px 15px -5px rgba(0,0,0,0.3)
                    .category
                        position: relative
                        display: block
                        padding: 3px 25px
                        font-weight: 500
                        &:hover
                            background-color: #ebebeb
                            .subCategories
                                display: block
                        .item__title
                            min-width: 160px
                        .subCategories
                            display: none
                            position: absolute
                            top: -10px
                            left: 100%
                            padding: 10px 0
                            background-color: #fff
                            white-space: nowrap
                            -webkit-box-shadow: 5px 5px 15px -5px rgba(0,0,0,0.3)
                            -moz-box-shadow: 5px 5px 15px -5px rgba(0,0,0,0.3)
                            box-shadow: 5px 5px 15px -5px rgba(0,0,0,0.3)
                &.withSub
                    .item__title
                        position: relative
                        &:before
                            content: "\f054"
                            font-family: FontAwesome
                            font-weight: 900
                            font-size: .7rem
                            opacity: .5
                            position: absolute
                            top: 2px
                            bottom: 0
                            right: 0

</style>