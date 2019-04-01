<style>
  .footer {
    padding: 1em;
    background-color: #555 !important;
    color: #f2ecec;
    letter-spacing: 1px;
  }
  .footer p {
    line-height: 48px;
    font-weight: 100;
  }
  #scroll {
    position: fixed;
    right: 1em;
    bottom: -3em;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    background-color: #f5f4f4;
    color: #3eac4f;
    z-index: 2;
    cursor: pointer;
    transition: all 0.5s ease;
  }
  #scroll:hover {
    background-color: #3eac4f;
    color: #fff;
  }
  .slide-text span {
    display: none;
  }

</style>

	<!-- Start Footer bottom Area -->
  <div class="container-fluid footer mt-3">
    <center>
      <p>&copy; Copyright 2019 <a href="http://if.upnyk.ac.id" target="_blank" title="IF UPNYK"><strong>IF UPNYK</strong></a>. All Right Reserved.</p>
    </center>
    <div id="scroll"><i class="fa fa-arrow-up"></i></div>
  </div>

</div>

<script>
  $(document).ready(function(){
    slideText();

    // Add smooth scrolling to all links
    $(".navbar-link").on('click', function(event) {
      var href = $(this).find('a').attr('href');

      if(href !== '' && href !== undefined) {
        event.preventDefault();

        $('.navbar-link').removeClass('active');
        $(this).addClass('active');

        $('html, body').animate({
          scrollTop: ($(href).offset().top - 100)
        }, 500);
        // window.location.hash = href;
      }
    });

    $('#scroll').on('click', function() {
      $('html, body').animate({
        scrollTop: 0
      }, 500);
    });

  });

  $(window).on("scroll", function() {
  	var scrollHeight = $(document).height();
  	var scrollPosition = $(window).height() + $(window).scrollTop();
  	if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
      // $('#scroll').fadeIn('slow', function() {
      //   $(".slide-text span").css('display', 'none');
      // });
      $('#scroll').css('bottom', '1.5em', function() {
        $(".slide-text span").css('display', 'none');
      });
  	} else {
      $('#scroll').css('bottom', '-3em');
      slideText();
    }
  });

  function slideText() {
    var slide = $('.slide-text span');
    for( var i = 0; i < slide.length; i++ ) {
      var time = i * 500;
      $(slide[i]).fadeIn(time);
    }
  }

</script>
</body>
</html>
