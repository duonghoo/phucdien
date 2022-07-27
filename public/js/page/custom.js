import $ from 'jquery';
import 'slick-carousel';

window.$ = window.jQuery = $;
import './rateit';
import './easyResponsiveTabs';
import './jquery.flexslider';
import './owl.carousel';
import './toast.jquery'

$(window).on('load', function(){
    "use strict";
    /*=========================================================================
            Preloader
    =========================================================================*/
    // $("#preloader").delay(750).fadeOut('slow');
});

function collapseNavbar() {
  if ($(window).scrollTop() > 50) {
      $(".navbar-fixed-top").addClass("top-nav-collapse");
  } else {
      $(".navbar-fixed-top").removeClass("top-nav-collapse");
  }
}

$(window).scroll(collapseNavbar);
$(document).ready(collapseNavbar);


// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
if ($(this).attr('class') != 'dropdown-toggle active' && $(this).attr('class') != 'dropdown-toggle') {
  $('.navbar-toggle:visible').click();
}
});



$(window).on('load', function(){
  
// defalt show testimonial tab
$('.testimonial-tab .testimonial-con').fadeOut();
$('.testimonial-tab #testimonial-tab3').fadeIn();
  $('.testimonials-tab-content #testimonial-tab3').addClass('active');

  
// Flex Slider
$('.flexslider').flexslider({
  animation: "fade",
  start: function(slider){
    $('body').removeClass('loading');
  }
});
  
  
  // Owl Slider
  var owl = $(".partner-slider");
owl.owlCarousel({
  items : 3, //10 items above 1000px browser width
  itemsDesktop : [1190,3], //5 items between 1900px and 591px
      itemsDesktopSmall : [1024,3], // 3 items betweem 1020px and 861px
  itemsTablet: [980,2], //2 items between 860 and 0;
      itemsTabletSmall:[767,1], //2 items between 860 and 0;
  itemsMobile : [428,1], // itemsMobile disabled - inherit from itemsTablet option
  paginationNumbers : false,
  navigation  : true,
  navigationText : false,
  rewindNav:false,
  scrollPerPage : true
});
  
  
});

/*=========================================================================
            Home Slider
=========================================================================*/
$(document).ready(function() {
    "use strict";

    function close_accordion_section() {
      $('.accordion .accordion-section-title').removeClass('active');
      $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
    };
  
    $('.accordion-section-title').click(function(e) {
      // Grab current anchor value
      var currentAttrValue = $(this).attr('href');
  
      if($(e.target).is('.active')) {
        close_accordion_section();
      }else {
        close_accordion_section();
  
        // Add active class to section title
        $(this).addClass('active');
        // Open up the hidden content panel
        $('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
      }
  
      e.preventDefault();
    });
      
      $('#parentVerticalTab').easyResponsiveTabs({
          type: 'vertical', //Types: default, vertical, accordion
          width: 'auto', //auto or any width like 600px
          fit: true, // 100% fit in a container
          closed: 'accordion', // Start closed if in accordion view
          tabidentify: 'hor_1', // The tab groups identifier
          activate: function(event) { // Callback function if tab is switched
              var $tab = $(this);
              var $info = $('#nested-tabInfo2');
              var $name = $('span', $info);
              $name.text($tab.text());
              $info.show();
          }
      });
    
    // show testimonial tab
    $('.testimonials-tab-list ul li a').click(function() {
      $('.testimonials-tab-list ul li').removeClass('active');
          $('.testimonials-tab-content .testimonial-con').removeClass('active');
      $('.testimonials-tab-content .testimonial-con').fadeOut('fast');
      $(this).parent().addClass('active');
      $('.testimonial-tab #testimonial-'+$(this).attr('data-tab')).fadeIn(1000).addClass('active');
    });
      
    load_product_form();
    

});

const load_product_form = () => {
  $.ajax({
    url: '/product-list-ajax',
    type: 'GET'
  }).done((res)=> {
    let tmp = '<option value="">Sản phẩm</option>';
    $(res).each((i, v)=>{
      tmp += `<option value="${v.id}">${v.title}</option>`;
    })
    $('#get-quote .product').html(tmp);
  })
}


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

// $(document).ready(function () {
//   FUNC.init();
//   FUNC.post_table();
//   setTimeout(()=>{
//       $('.rate-fake').addClass('d-none');
//       $('.rateit').removeClass('opa-0');
//   },1);
//   voteStar();
// });

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

lazyReplaceLoad('.img-responsive');


$('.img-product').on('click', function(){
  let src = $(this).attr('src');
  $('.thumbnail-root').attr('src', src);
  $('.img-product').attr('class', 'img-responsive img-product');
  $(this).attr('class', 'img-responsive img-product img-product-active');
});


$('#get-quote').on('submit', function(e){
  e.preventDefault();
  let form_data = {};
  $('#get-quote input, #get-quote select, #get-quote textarea').each((i, item)=>{
    form_data[$(item).attr('name')] = $(item).val();
  });
  console.log(form_data);
  $.ajax({
      url: '/send_mail',
      data: form_data,
      type: 'POST',
  }).done((res) => {
      console.log(res);
        $.Toast("Thành công", "Cảm ơn bạn đã liên hệ. Chung tôi sẽ liên hệ với bạn trong thời gian sớm nhất", "success", {
          has_icon:true,
          has_close_btn:true,
          stack: true,
          fullscreen:true,
          timeout:8000,
          sticky:false,
          has_progress:true,
          rtl:false,
      });

  }).fail((e) => {
    $.Toast("Lỗi", "Vui lòng kiểm tra thông tin đã nhập hoặc lỗi của chúng tôi!", "danger", {
      has_icon:true,
      has_close_btn:true,
      stack: true,
      fullscreen:true,
      timeout:8000,
      sticky:false,
      has_progress:true,
      rtl:false,
  });
  });
});
