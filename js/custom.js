(function ($) {
    'use strict';

    $(document).on('ready', function () {
        // -----------------------------
        //  Screenshot Slider
        // -----------------------------
        $('.speaker-slider').slick({
            slidesToShow: 3,
            centerMode: true,
            infinite: true,
            autoplay: true,
            arrows:true,
            responsive: [
                {
                    breakpoint: 1440,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
         });
        // -----------------------------
        //  Count Down JS
        // -----------------------------
        $('.timer').syotimer({
            year: 2017,
            month: 12,
            day: 9,
            hour: 20,
            minute: 30
        });
        // -----------------------------
        // To Top Init
        // -----------------------------
        $('.to-top').click(function() {
          $('html, body').animate({ scrollTop: 0 }, 'slow');
          return false;
        });
        
        // -----------------------------
        // Magnific Popup
        // -----------------------------
        $('.image-popup').magnificPopup({
            type: 'image',
            removalDelay: 160, //delay removal by X to allow out-animation
            callbacks: {
                beforeOpen: function () {
                    // just a hack that adds mfp-anim class to markup
                    this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                    this.st.mainClass = this.st.el.attr('data-effect');
                }
            },
            closeOnContentClick: true,
            midClick: true,
            fixedContentPos: false,
            fixedBgPos: true

        });
        // -----------------------------
        // Mixitup
        // -----------------------------
        var containerEl = document.querySelector('.gallery-wrapper');
        var mixer;
        if (containerEl) {
            mixer = mixitup(containerEl);
        }
    });

    /*==================================================================
        [ Daterangepicker ]*/
    try {
        $('.js-datepicker').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "autoUpdateInput": false,
            locale: {
                format: 'DD/MM/YYYY'
            },
        });
    
        var myCalendar = $('.js-datepicker');
        var isClick = 0;
    
        $(window).on('click',function(){
            isClick = 0;
        });
    
        $(myCalendar).on('apply.daterangepicker',function(ev, picker){
            isClick = 0;
            $(this).val(picker.startDate.format('DD/MM/YYYY'));
    
        });
    
        $('.js-btn-calendar').on('click',function(e){
            e.stopPropagation();
    
            if(isClick === 1) isClick = 0;
            else if(isClick === 0) isClick = 1;
    
            if (isClick === 1) {
                myCalendar.focus();
            }
        });
    
        $(myCalendar).on('click',function(e){
            e.stopPropagation();
            isClick = 1;
        });
    
        $('.daterangepicker').on('click',function(e){
            e.stopPropagation();
        });
    
    
    } catch(er) {console.log(er);}
    /*[ Select 2 Config ]
        ===========================================================*/
    
    try {
        var selectSimple = $('.js-select-simple');
    
        selectSimple.each(function () {
            var that = $(this);
            var selectBox = that.find('select');
            var selectDropdown = that.find('.select-dropdown');
            selectBox.select2({
                dropdownParent: selectDropdown
            });
        });
    
    } catch (err) {
        console.log(err);
    }

})(jQuery);