document.addEventListener("DOMContentLoaded", function() {

    // Выпадающие списки в главном меню START

    var menuItems = $('.menuBar__menu__items .item');

    menuItems.hover(function(){

        $( this ).children('.item__megamenu').stop().stop().animate({
            height: "toggle",
            opacity: "toggle"
        }, 75, function(){
            if($( this ).is(':visible')) {
                $( this ).css('display','flex');
            }
        });

        $( this ).children('.item__subMenu').stop().animate({
            height: "toggle",
            opacity: "toggle"
        }, 75);

    });

    // Выпадающие списки в главном меню END

    // Выбор цвета товара START

    var colors =  $('.product__chars__colors .color');

    colors.on('click', function(){

        if($( this ).hasClass('disabled')){
            return;
        } else {
            $.each(colors, function(){
                $( this ).css({'transform':'scale(1)'});
                $( this ).children('.color-active').css({'transform':'scale(0)'});
                $( this ).removeClass('active');
            });

            $( this ).css({'transform':'scale(1.2)'});
            $( this ).children('.color-active').css({'transform':'scale(1.2)'});
            $( this ).addClass('active');
        }

    });

    // Выбор цвета товара END

    // Выбор материала товара START

    var materials = $('.product__chars__materials .material');

    materials.on('click', function(){

        if($( this ).hasClass('material-active')){
            return;
        } else if ($( this ).hasClass('disabled')){
            return;
        } else {

            $.each(materials, function(){
                $( this ).removeClass('material-active');
            });

            $( this ).addClass('material-active');

        }
    });

    // Выбор материала товара END


    // Колличество товара START

    var buttons = $('.product__chars__actions .quantity__button');
    var input = $('.product__chars__actions input[type=number]');

    buttons.on('click', function(){

        var currentValue = input.val();

        if($( this ).hasClass('quantity__buttonUp')){

            if(currentValue <= 0) {
                newValue = 1;

                input.val(newValue);

                currentValue = 1;
            } else {

                var newValue = eval(currentValue) + 1;

                input.val(newValue);

            }

        } else if ($( this ).hasClass('quantity__buttonDown')) {

            if(currentValue <= 1) {
                newValue = 1;

                input.val(newValue);
            } else {

                var newValue = eval(currentValue) - 1;

                input.val(newValue);

            }

        }

    });

    // Колличество товара END

    // Дополнительная информация о продукте START

    var asideTitles = $('.product__aside__titles .title');
    var asideContents = $('.product__aside__contents .content');

    asideTitles.on('click', function(){

        var titleName = $( this ).attr('data-name');

        $.each(asideTitles, function(){

            $( this ).removeClass('active');
            asideContents.removeClass('content_active');

        });

        $( this ).addClass('active');

        $('.product__aside__contents .content.' + titleName).addClass('content_active');

    });

    // Дополнительная информация о продукте END


    // Shop list тип отображения START

    var displayTypeButtons = $('.displayTypes div.displayType');

    displayTypeButtons.on('click', function(){

        var displayTypeName = $( this ).attr('data-type');

        $.each(displayTypeButtons, function(){
            $( this ).removeClass('active');
        });

        $( this ).addClass('active');

        $('div.shop__list__products').removeClass('displayType_list').removeClass('displayType_features');
        $('div.shop__list__products').addClass('displayType_' + displayTypeName);

    });

    // Shop list тип отображения END

});