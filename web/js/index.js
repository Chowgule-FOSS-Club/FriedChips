$(document).ready(function () {
  $('#modal-1').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input,textarea,email")
      .val('')
      .end()

  });
  $('#modal-2').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input,textarea,email")
      .val('')
    $("#units,#value").prop('selectedIndex', 0)
      .end()

  });


  $(function () {

    $(document).on('scroll', function () {

      if ($(window).scrollTop() > 100) {
        $('.scroll-top-wrapper').addClass('show');
      } else {
        $('.scroll-top-wrapper').removeClass('show');
      }
    });

    $('.scroll-top-wrapper').on('click', scrollToTop);
  });

  function scrollToTop() {
    verticalOffset = typeof (verticalOffset) != 'undefined' ? verticalOffset : 0;
    element = $('body');
    offset = element.offset();
    offsetTop = offset.top;
    $('html, body').animate({
      scrollTop: offsetTop
    }, 300, 'linear');
  }
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function (event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function () {

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

  $(window).scroll(function () {
    $(".slideanim").each(function () {
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
      if (pos < winTop + 600) {
        $(this).addClass("slide");
      }
    });
  });
  // crads view
  var $cell = $('.card');
  
      //open and close card when clicked on card
      $cell.find('.js-expander').click(function () {
  
          var $thisCell = $(this).closest('.card');
  
          if ($thisCell.hasClass('is-collapsed')) {
              $cell.not($thisCell).removeClass('is-expanded').addClass('is-collapsed').addClass('is-inactive');
              $thisCell.removeClass('is-collapsed').addClass('is-expanded');
  
              if ($cell.not($thisCell).hasClass('is-inactive')) {
                  //do nothing
              } else {
                  $cell.not($thisCell).addClass('is-inactive');
              }
  
          } else {
              $thisCell.removeClass('is-expanded').addClass('is-collapsed');
              $cell.not($thisCell).removeClass('is-inactive');
          }
      });
  
      //close card when click on cross
      $cell.find('.js-collapser').click(function () {
  
          var $thisCell = $(this).closest('.card');
  
          $thisCell.removeClass('is-expanded').addClass('is-collapsed');
          $cell.not($thisCell).removeClass('is-inactive');
  
      });
});
 $(window).load(function () {
    setTimeout(function () {
      $('#enquirypopup').modal('show');
    }, 3000);

    var form = document.getElementById('login');
    var buttonE1 = document.getElementById('e1');
    
    buttonE1.addEventListener('click', function () {
      form.classList.add('error_1');
      setTimeout(function () {
        form.classList.remove('error_1');
      }, 3000);
    });
  });


  