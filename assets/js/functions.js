var dataCount;
var urlCheck = window.location.search.substr(1).split('=');

/*document on load*/
jQuery(function(){
    sideSectionEventListener('.mobile-btn','.navigation');
    sideSectionEventListener('.mobile-btn.active','.navigation');
    popupListener();
    setElmHeight('.employee');
    loadMoreProjects('.highlights', 6);
    loadMoreProjects('.progress', 6);
    loadMoreProjects('.portfolio', 8);

    var windowScrollTopPos;
    var windowWdith;

    windowWdith = $(window).width();

    console.log(windowWdith);

    /*for any scroll event functions*/
    $(window).scroll(function (event) {
        windowScrollTopPos = $(window).scrollTop();

        if(windowWdith >= 800){
            if(windowScrollTopPos >= 400){

                $('.arp-header').addClass('animate-open');

                //animate the line
            }else{
                $('.arp-header').removeClass('animate-open');
                //$('.arp-header').addClass('animate-close');

            }
        }
    });


    // when main form is submitted
    $('#contactform').on('submit', function(e){
        e.preventDefault();
        do_contact();
    })

    if( urlCheck[0] == 'subject' ) {
      scrollForm();
    } else if( urlCheck[0] == 'cat' ) {
      scrollCat(urlCheck[1]);
    }

    $('.switch').on('click', function(e){
      e.preventDefault();
      var vm = $(this);
      $('.switch').each(function(){
        if( !$(this).hasClass('porti') ) {
          $(this).removeClass('active');
        }
      })
      vm.addClass('active');

      var rel = vm.data('type');

      $('.highlights').removeClass('hideMe');
      $('.progress').removeClass('hideMe');

      if( rel == 'highlights' ) {
        $('.progress').addClass('hideMe');
      } else {
        $('.highlights').addClass('hideMe');
      }

    })

    $('#portiChange').on('change', function(){
      var vm = $(this);
      if( vm.val() == '' ) {
        $('.porti').each(function(){
          $(this).removeClass('hideMe');
        })
      } else {
        $('.porti').each(function(){
          $(this).addClass('hideMe');
        })
        $('.porti').each(function(){
          if( $(this).data('id') == vm.val() ) {
            $(this).removeClass('hideMe');
          }

        })
      }

    })

    $('.catClick').on('click', function(e){
      e.preventDefault();
      var dataid = $(this).data('id');
$('#portiChange').val(dataid);
$('html, body').animate({
    scrollTop: $(".portfolio").offset().top
}, 1000);
      $('.porti').each(function(){
        $(this).addClass('hideMe');
      })
      $('.porti').each(function(){
        if( $(this).data('id') == dataid ) {
          $(this).removeClass('hideMe');
        }

      })
    })
});
//var animationState = true;
var animationTime = 800;

//close side section
function sideSectionEventListener(eventListener){
    jQuery(eventListener).on('click', function(e){
        e.preventDefault();

        var className = jQuery(this).attr('class');

        switch(className){
            case 'mobile-btn active':
                close('.navigation');
                jQuery('.mobile-btn.active').fadeOut(400,function(){
                    jQuery('.mobile-btn.active').removeClass('active');
                    jQuery('.mobile-btn').fadeIn();
                });
            break;
            case 'mobile-btn':
                open('.navigation');
                jQuery('.mobile-btn').fadeOut(400,function(){
                    jQuery('.mobile-btn').addClass('active');
                    jQuery('.mobile-btn').fadeIn();
                });
            break;
        }
    });

}

//to open the mobile menu/contact menu
function open(sideSection){

    jQuery(sideSection).stop().animate({
        right: 0
    }, animationTime);
}

//to close the mobile menu/contact menu
function close(sideSection){

    jQuery(sideSection).stop().animate({
        right: -500+'px'
    }, animationTime);
}

//to show the popup and mask
function popupListener(){
    var projectSlide = jQuery('.individual-project-slider .slide');
    var closePopup = jQuery('.close-popup');
    var counter = 0;
    var popupSlider = jQuery('.project-popup-slider');

    projectSlide.each(function(){
        var slideImg = jQuery(this).children();
        var backgroundImageUri = slideImg.css('background-image').replace('url(','').replace(')','').replace(/\"/gi, "");

        /*if(jQuery(this).parent().hasClass('active')){*/
            jQuery(this).attr('data-count', counter);
            counter++;
        /*}*/

    });

    projectSlide.on('click', function(){

        if(jQuery(this).parent().hasClass('active')){

            var dataIndex = jQuery(this).attr('data-count');

            popupSlider.owlCarousel({
                items: 1,
                loop: true,
                margin: 0,
                autoHeight: false,
                nav: true,
                dots: false,
                startPosition: dataIndex
            });
            popupSlider.trigger('refresh.owl.carousel');

            setTimeout(function(){
                jQuery('.image-slider-popup').fadeIn(500);
            },400)
        }
    });

    closePopup.on('click', function(e){
        e.preventDefault();

        jQuery('.image-slider-popup').stop().fadeOut(500, function(){
            jQuery('.project-popup-slider').trigger('destroy.owl.carousel');
        });
    });
}

//give the employees details all the same height
//to set the height of the element
function setElmHeight(elm){
    var selector = jQuery(elm);
    var breakpoint = 700;
    var currHeight = 0;
    var largestHeight = 0;

    if(jQuery(window).width() >= breakpoint){
        selector.each(function(){
            currHeight = jQuery(this).height();

            if(currHeight > largestHeight){
                largestHeight = currHeight;
            }
        });

        selector.css('height', largestHeight);
    }
}

//this is to display 6 projects at a time

function loadMoreProjects(parent, amountToShow){
    var amountShowing = amountToShow;
    var count = 0;
    var amountToShow = amountToShow;
    var parent = jQuery(parent);
    var elm = parent.find('.individual-project');
    var totalAmountOfProjects = checkAmountofProjects(parent);

    elm.each(function(){
        count++;
       jQuery(this).attr('data-index',count);
    });

    if(totalAmountOfProjects <= amountToShow){
        parent.find('.btn.primary').hide();
    }else{

        if(totalAmountOfProjects > amountToShow){

            amountShowing = amountToShow;

            elm.each(function(){

                var dataCount = jQuery(this).attr('data-index');

                if(dataCount > amountToShow){
                    jQuery(this).hide();
                }
            });

            parent.find('.btn.primary').show();
            loadMoreListener(parent, elm, amountToShow ,totalAmountOfProjects, amountShowing);
        }else{
            parent.find('.btn.primary').hide();
        }
    }
}

//check the data count
function loadMoreListener(parent, elm, amountToShow , totalAmountOfProjects, amountShowing){
    parent.find('.btn.primary').on('click', function(e){
        e.preventDefault();

        if(totalAmountOfProjects > amountShowing){

            amountShowing += amountToShow;

            $(this).parent().find('.individual-project').each(function(){

                var dataCount = jQuery(this).attr('data-index');

                if(dataCount <= amountShowing){
                    jQuery(this).fadeIn(600)
                }
            });
        }else{
            jQuery(this).fadeOut(600);
        }

        if(amountShowing >= totalAmountOfProjects){
            jQuery(this).fadeOut(600);
        }

    })
}

//to check the amount of projects that are shown
function checkAmountofProjects(parent, elm){

    var total = parent.find('.individual-project').length;
    return total;
}

function do_contact() {

    // get form data
    form_data = $('#contactform').serializeArray();

    $('#contactform').attr('disabled','disabled');

    $('.error_box').remove();

    $('#contactform input').removeClass('error');
    $('#contactform textarea').removeClass('error');

    $('button.btn').html('Sending...Please wait');
    $('button.btn').attr('disabled', 'disabled');

    // do ajax request to app
    jQuery.ajax({
        url: arp.template_url + '/application/app.form.php',
        type: "POST",
        data: form_data,
        dataType: "json",
        async: true
    }).done(function(response){

        $('html, body').animate({
            scrollTop: $("#contactform").offset().top
        }, 500);

        $('button.btn').html('SEND MESSAGE');
        $('button.btn').removeAttr('disabled');

        if( response == true ) {

            $('#contactform input').val('');
            $('#contactform textarea').val('');

            $('#contactform p').after('<p class="success_box" style="color: #fff;"><strong>Your enquiry has been sent.</strong></p>');

            setTimeout(function(){ $('.success_box').fadeOut(); $('.success_box').remove(); }, 5000);

        } else {

            $('#contactform p').after('<p class="error_box" style="color:white;"><strong>ALL FIELDS ARE REQUIRED.</strong></p>');

            $.each(response, function(key, value) {
                $('#'+value).addClass('error');
            });

        }

    }).error(function(error){

        console.log( 'Getting here' );

    });

}

function scrollForm() {
  $('html, body').animate({
      scrollTop: $("#contactform").offset().top
  }, 1000);

}

function scrollCat(cat) {
    var id = cat;
    $('#portiChange').val(id);
    $('.porti').each(function(){
      $(this).addClass('hideMe');
    })
    $('.porti').each(function(){
      if( $(this).data('id') == id ) {
        $(this).removeClass('hideMe');
      }

    })

    $('html, body').animate({
        scrollTop: $(".portfolio").offset().top
    }, 1000);
}
