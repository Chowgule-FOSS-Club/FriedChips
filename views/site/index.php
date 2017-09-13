
 <div class="wrapper text-center">
    <div class="image-wrap"></div>
    <div class="image-wrap2"></div>
    <div class="image-overlay"></div>
    <div class="text">
    <h1>SALGAOCAR ENGINEERS PVT. LTD</h1>
    <a  href="?r=product/view-products" class="btn btn-outlined btn-theme btn-lg" data-wow-delay="0.7s">See Our Products</a>
    </div>
  </div>
 

  <!-- Container (About Section) -->
  <div id="about" class="container-fluid">
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
        <h2 class="text-center">About Company Page</h2><br>
        <h4>
          <p class="about">The Salgaocar Group of Companies, a leading multi crore conglomerate is engaged mainly in mining and export of
            iron ore to the different countries of the World (Japan, Korea, China, W. Europe, etc.) with its headquarter
            at Margao, Goa.</p>
        </h4>
        <h4>
          <p class="about">Besides mining and export of iron ore, the Group activities also include shipping, loading and unloading of iron
            ore, barge building, real estate, pharmaceuticals, newspaper publishing, etc. The entire Group consists of more
            than fifteen companies and is regarded as the pioneer in the mining and export of iron ore from Goa. Our reserves
            are the largest in Goa (approximately 300 million tonnes) and annual export turnover is approximately 3 million
            tonnes.
          </p>
        </h4><br>

      </div>
      <div class="col-sm-2"></div>
    </div>
  </div>

  <div id="services" class="container-fluid bg-grey">
    <div class="row">
      <div class="col-sm-4">
        <span class="glyphicon glyphicon-globe logo slideanim"></span>
      </div>
      <div class="col-sm-8">
        <h1>What we offer</h1><br>
        <h4> Salgaocar Engineers Pvt. Ltd. is an exclusive distributor in India for many world renowned manufacturers of Heavy
          Earthmoving, Mining and Construction Equipment.</h4><br>
        <p><strong><h4>Equipments we have distributed in the past:</h4>
        <ul>
          <li>Raise Climbers from Arkbro Industries(Canada)</li>
          <li>Rock Breaker Systems from BTI (Canada)</li>
          <li>Hydraulic Drilling & Piling Rigs from Beijing Sinovo International (China)</li>
        </ul>
      </strong>
          <ul>
        </p>
      </div>
    </div>
  </div>


  <!-- Container (Services Section) -->
  <div id="clients" class="container-fluid  text-center">
    <h2>OUR CLIENTS</h2>

    <br>
    <div class="row slideanim">
      <div class="col-sm-3">

        <h4 class="elegantshd">National Hydroelectric Power Corporation Ltd.</h4>

      </div>
      <div class="col-sm-3">

        <h4 class="elegantshd">Coal India Ltd.</h4>
      </div>
      <div class="col-sm-3">

        <h4 class="elegantshd">Western Coalfields Ltd</h4>

      </div>
      <div class="col-sm-3">

        <h4 class="elegantshd">South Eastern Coalfields Ltd</h4>

      </div>
    </div>
    <br><br>
    <div class="row slideanim">
      <div class="col-sm-3">

        <h4 class="elegantshd">Eastern Coalfields Ltd</h4>

      </div>
      <div class="col-sm-3">

        <h4 class="elegantshd">Hindustan Copper Ltd.</h4>

      </div>
      <div class="col-sm-3">

        <h4 class="elegantshd">Larsen & Toubro Ltd.</h4>

      </div>
      <div class="col-sm-3">

        <h4 class="elegantshd">Eastern Coalfields Ltd</h4>

      </div>
    </div>
  </div>
  <!-- Container (Contact Section) -->
  <div id="contact" class="container-fluid bg-grey" >

    <h2 class="text-center">CONTACT</h2>
    <div class="row">
      <div class="col-sm-5 ">
        <p class="contact">Here's a way to reach us.</p>
        <p class="addr"><span class="glyphicon glyphicon-map-marker"></span>1110, New Delhi House, 27, Barakhamba Road, New Delhi - 110 001</p>
        <p><span class="glyphicon glyphicon-phone"></span> 91-11-23315929/23312693</p>
        <p><span class="glyphicon glyphicon-envelope"></span> sepldel@gmail.com</p>
      </div>
      <div class="col-sm-7 slideanim">
        <div class="row">
          <div class="col-sm-6 form-group">
            <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
          </div>
          <div class="col-sm-6 form-group">
            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
          </div>
        </div>
        <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="10"></textarea><br>
        <div class="row">
        <div id="contact-validation"></div>
          <div class="col-sm-12 form-group">
            <button class="btn btn-default pull-right" type="submit" id="contact-send">Send</button>
          </div>
        </div>
      </div>
    </div>
    <div id="loading-img" style="display:none;width:50%;height:40%;position:fixed;top:30%;left:45%;padding:2px;z-index:105">
    <img src='images/loading.gif'/>
    </div>
  </div>

   <!-- scroll top -->
    <div class="scroll-top-wrapper ">
        <span class="scroll-top-inner">
    <i class="fa fa-2x fa-arrow-circle-up"></i>
  </span>
    </div>
    </div>

  <?php

$script = <<<JS
    $('document').ready(function(){
        $('#contact-send').click(function(){
          $('#contact-validation').css('display','block');
          var data = validate();
          if(data == 1 ){
            var name = $('#name').val();
            var email = $('#email').val();
            var comments = $('#comments').val();
            var answerJson = [];

            answerJson.push({
               name : name,
               email : email,
               comments : comments
            });

            $(document).ajaxStart(function(){
              $("#loading-img").css("display", "block");
            });

            $(document).ajaxComplete(function(){
              $("#loading-img").css("display", "none");
            });        

            $.post("index.php?r=site/contact" ,
                    {
                        data : JSON.stringify(answerJson),
                        contentType: 'application/json; charset=utf-8',
                        dataType: 'json',
                        _csrf: yii.getCsrfToken(),
                    } , function(data){
                            if(data == "Your data has been submitted") $('#contact-validation').attr('class','alert alert-success');
                            else $('#contact-validation').attr('class','alert alert-danger');
                            $('#contact-validation').html(data);
                            
                            contactDetails = [];
                        }) 
          }
          else if(data == 0){
            $('#contact-validation').html("Please enter all the details");
          }

          setTimeout(function() {
                 $('#contact-validation').css('display','none');
              }, 4000);
        });

        function validate()
        {
          var name = $('#name').val();
          var email = $('#email').val();
          var comments = $('#comments').val();
          var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          var nameRegex = /^[a-zA-Z]+$/;

          if(name!="" && nameRegex.test(name) && emailRegex.test(email) && email!="" && comments!="") {
              $('#contact-validation').attr('class' , 'alert alert-success');
              return 1;
            }
          else{
              $('#contact-validation').attr('class' , 'alert alert-danger');
              if(name!="" && !nameRegex.test(name)) $('#contact-validation').html("Please enter a valid name");
              else if (email!="" && !emailRegex.test(email)) $('#contact-validation').html("Please enter a valid email");
              else return 0;
          } 
        }
    });
JS;

$this->registerJS($script);
?>