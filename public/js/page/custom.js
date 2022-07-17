import $ from 'jquery';
import 'slick-carousel';

window.$ = window.jQuery = $;
import StickySidebar from 'sticky-sidebar';
import './rateit';

$(window).on('load', function(){
    "use strict";
    /*=========================================================================
            Preloader
    =========================================================================*/
    $("#preloader").delay(750).fadeOut('slow');
});

/*=========================================================================
            Home Slider
=========================================================================*/
$(document).ready(function() {
    "use strict";

    /*=========================================================================
            Slick sliders
    =========================================================================*/
    $('.post-carousel-lg').slick({
      dots: true,
      arrows: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      cssEase: 'linear',
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
          }
        }
      ]
    });

    $('.post-carousel-featured').slick({
      dots: true,
      arrows: false,
      slidesToShow: 5,
      slidesToScroll: 2,
      responsive: [
        {
          breakpoint: 1440,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
            dots: true,
            arrows: false,
          }
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: true,
            arrows: false,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: true,
            arrows: false,
          }
        }
        ,
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
          }
        }
      ]
    });

    $('.post-carousel-twoCol').slick({
      dots: false,
      arrows: false,
      slidesToShow: 2,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: false,
            arrows: false,
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: false,
          }
        }
      ]
    });
    // Custom carousel nav
    $('.carousel-topNav-prev').click(function(){ 
      $('.post-carousel-twoCol').slick('slickPrev');
    } );
    $('.carousel-topNav-next').click(function(){ 
      $('.post-carousel-twoCol').slick('slickNext');
    } );


    $('.post-carousel-widget').slick({
      dots: false,
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            centerMode: true,
            slidesToScroll: 1,
          }
        }
      ]
    });
    // Custom carousel nav
    $('.carousel-botNav-prev').click(function(){ 
      $('.post-carousel-widget').slick('slickPrev');
    } );
    $('.carousel-botNav-next').click(function(){ 
      $('.post-carousel-widget').slick('slickNext');
    } );

    /*=========================================================================
            Sticky header
    =========================================================================*/
    var $header = $(".header-default, .header-personal nav, .header-classic .header-bottom"),
      $clone = $header.before($header.clone().addClass("clone"));

    $(window).on("scroll", function() {
      var fromTop = $(window).scrollTop();
      $('body').toggleClass("down", (fromTop > 300));
    });

});

$(function(){
    "use strict";

    /*=========================================================================
            Sticky Sidebar
    =========================================================================*/

    var sidebar = new StickySidebar('.sidebar', {
        containerSelector: '.main-content',
        topSpacing: 60,
        bottomSpacing: 30,
    });

    /*=========================================================================
            Vertical Menu
    =========================================================================*/
    $( ".submenu" ).before( '<i class="icon-arrow-down switch"></i>' );

    $(".vertical-menu li i.switch").on( 'click', function() {
        var $submenu = $(this).next(".submenu");
        $submenu.slideToggle(300);
        $submenu.parent().toggleClass("openmenu");
    });

    /*=========================================================================
            Canvas Menu
    =========================================================================*/
    $("button.burger-menu").on( 'click', function() {
      $(".canvas-menu").toggleClass("open");
      $(".main-overlay").toggleClass("active");
    });

    $(".canvas-menu .btn-close, .main-overlay").on( 'click', function() {
      $(".canvas-menu").removeClass("open");
      $(".main-overlay").removeClass("active");
    });

    /*=========================================================================
            Popups
    =========================================================================*/
    $("button.search").on( 'click', function() {
      $(".search-popup").addClass("visible");
    });

    $(".search-popup .btn-close").on( 'click', function() {
      $(".search-popup").removeClass("visible");
    });

    $(document).keyup(function(e) {
          if (e.key === "Escape") { // escape key maps to keycode `27`
            $(".search-popup").removeClass("visible");
        }
    });

    /*=========================================================================
            Tabs loader
    =========================================================================*/
    $('button[data-bs-toggle="tab"]').on( 'click', function() {
      $(".tab-pane").addClass("loading");
      $('.lds-dual-ring').addClass("loading");
      setTimeout(function () {
          $(".tab-pane").removeClass("loading");
          $('.lds-dual-ring').removeClass("loading");
      }, 500);
    });
    
    /*=========================================================================
            Social share toggle
    =========================================================================*/
    $('.post button.toggle-button').each( function() {
      $(this).on( 'click', function(e) {
        $(this).next('.social-share .icons').toggleClass("visible");
        $(this).toggleClass('icon-close').toggleClass('icon-share');
      });
    });

    /*=========================================================================
    Spacer with Data Attribute
    =========================================================================*/
    var list = document.getElementsByClassName('spacer');

    for (var i = 0; i < list.length; i++) {
      var size = list[i].getAttribute('data-height');
      list[i].style.height = "" + size + "px";
    }

    /*=========================================================================
    Background Image with Data Attribute
    =========================================================================*/
    var list = document.getElementsByClassName('data-bg-image');

    for (var i = 0; i < list.length; i++) {
      var bgimage = list[i].getAttribute('data-bg-image');
      list[i].style.backgroundImage  = "url('" + bgimage + "')";
    }

});

const FUNC = {
  ajax_load_more: function() {
      $(document).on('click', '.load-more', function (e) {
          e.preventDefault();
          let page = $(this).data('page');
          let url = $(this).data('url');
          let category_id = typeof $(this).data('category') === 'undefined' ? '' : ($(this).data('category'))+'/';
          if (!page) page = 2;
          $.ajax({
              type: 'get',
              url: '/'+url+'/'+category_id + page,
              dataType: 'html',
              data: {
                  page: page,
              },
              success: function (res) {
                  let selector_show_content = '#ajax_content';
                  console.log(res);
                  if(res != null && res != ''){
                    console.log('true');
                      // let resultFind = $(res).find('#ajax_content').html();
                      $(selector_show_content).append(res);
                      $('.load-more').data('page', page + 1);
                  }else{
                    console.log('false');
                      $(selector_show_content).append(`<p class="text-center" id="empty_data" style="display: none">Hết dữ liệu</p>`);
                      $('#empty_data').show().fadeOut();
                      setTimeout(()=>{
                          $('#empty_data').hide();
                      },3000)
                  }
                  
              }
          })
      })
  },
  init: function () {
      FUNC.ajax_load_more();
  },
  post_table: ()=>{
      let container = $("#table-of-content");
      if (container.length > 0) {
          let header = container.find(':header:not(h1,h4,h5,h6,h3.title-related)');
          if (header.length > 0) {
              let trick = '<div class="bg-grey32 p-3 my-2 muc-luc"> <h4 class="text-red1 text-uppercase fs-18 fw-normal">Nội dung chính </h4> <ul class="nav flex-column">';
              $.each(header, function(k, i) {
                  let id = 'trick' + k;
                  let title = $(i).text();
                  if (title !== '') {
                      let patt = new RegExp('\\d*\\.\\s', 'mi');
                      title.replace(patt, '');
                      $(i).attr('id', id);
                      trick += '<li class="item-muc-luc"><a href="#' + id + '" rel="nofollow" class="text-news-link font-9375rem">' + title + '</a></li>';
                  }
              });
              trick += '</ul></div>';
              container.prepend(trick);
          }
      }
      container.on('click', 'a', function() {
          let hash = $(this).attr('href');
          $('html, body').animate({
              scrollTop: $(hash).offset().top
          }, 1500, 'swing');
      })
  }
};


// rate
let voteStar = () => {
  let selector = $(".rateit");
  if (selector.length > 0) {
      selector.bind('rated', function(e) {
          e.preventDefault();
          let ri = $(this);
          let value = ri.rateit('value');
          let slug = ri.data('slug');
          let voteStart = 0;
          let url = 'post/ajax_rate';
          let request = {
              slug: slug,
              star: value,
              voteStart: voteStart
          };
          $.ajax({
              url: url,
              type: 'POST',
              data: request,
              dataType: 'json',
              success: function(data) {
                  if (data.type === 'success') {
                      let container = ri.closest('.allRate');
                      container.find('.avg-rate').text(parseFloat(data.vote.avg).toFixed(1));
                      container.find('.count-rate').text(data.vote.count_vote);
                      selector.addClass('voted');
                      // toastr.success(data.message);
                  } else {
                      // toastr.warning(data.message);
                  }
              }
          });
      });
  }
};

$(document).ready(function () {
  FUNC.init();
  FUNC.post_table();
  setTimeout(()=>{
      $('.rate-fake').addClass('d-none');
      $('.rateit').removeClass('opa-0');
  },1);
  voteStar();
});

function lazyReplaceLoad(selected, image_replace = null){
  if(image_replace == null) image_replace = 'https://forextradingvn.top/images/posts/inspiration-2.jpg';
  $(selected).each(function(){
    var src = $(this).attr('src');
    var that = this;
    if(src == '' || src == null){
      $(this).attr('src', image_replace);
    }
    if($(this).attr('width') != null &&  $(this).attr('height') != null){
      let width = parseInt($(this).attr('width'));
      let height = parseInt($(this).attr('height'));
      var img = new Image(width, height);
    }else{
      var img = new Image();
    }
    img.src = $(this).attr('src');
    $(this).attr('src', image_replace);
    $(img).on('load', function(){
        $(that).attr('src',img.src);
    })
  
  });  
}

lazyReplaceLoad('.img-fluid');
