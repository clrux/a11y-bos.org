// JavaScript functions for a11ybos
runOnLoad(Dropdown.initialise);

$(function() {

    // listener for mobile main navigation dropdown
    $('.js-main-navigation').on('change', function(event) {
        document.location = $(event.currentTarget).val();
    });

    // listener for search toggle
    $('.main-navigation').on('click', '.open-search', function(event) {
        event.preventDefault();

        $('.main-navigation')
            .addClass('is-searching');

        $('.header-search-form')
            .addClass('is-opened')
            .find('.input-text')
            .focus();

    });

    $('.header-search-form').on('click', '.close-search', function(event) {
        event.preventDefault();

        $('.header-search-form')
            .removeClass('is-opened');

        $('.main-navigation')
            .removeClass('is-searching');

        $('.header')
            .find('.open-search')
            .focus();
    });

    // slick carousel

    // $('.sponsors-widget ul').slick({
    //     dots: false,
    //     slidesToShow: 3,
    //     accessibility: false
    // });
});
