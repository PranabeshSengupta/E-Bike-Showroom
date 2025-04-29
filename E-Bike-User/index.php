<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    
  <!-- Linking SwiperJS CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="vehicle.css">
  <link rel="stylesheet" href="swiper-bundle.min.css" />
  <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
</head>

<body>



  <nav class="navbar">
    <div class="menu-toggle" id="menu-toggle">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </div>
    <div class="logo">
      <a href="#">Diamond E-Bike </a>
    </div>
    <ul class="menu">
      <li><a href="index.php">HOME</a></li>
      <li><a href="about.html">ABOUT</a></li>
      <li><a href="products.php">PRODUCTS</a></li>
      <li><a href="contact-us.html">CONTACT</a></li>
    </ul>
  </nav>

  <div class="sidebar" id="sidebar">
    <ul>
      <li><a href="index.php"><i class="icon-home"></i> HOME</a></li>
      <li><a href="about.html"><i class="icon-about"></i> ABOUT</a></li>
      <li><a href="products.php"><i class="icon-models"></i> PRODUCTS</a></li>
      <li><a href="contact-us.html"><i class="icon-contact"></i> CONTACT</a></li>
    </ul>
  </div>

  <div class="overlay" id="overlay"></div>

  <div class="bg-image">
    <div class="bg-image-heading">
        <!-- <h1>Diamond E-Bike</h1>
        <p id="dynamic-text">Ride the Future, Shine with Diamond!</p> -->
      
    </div>
</div>




  <div class="welcome">
    <h2>Welcome to Diamond Electric Bikes</h2>
    <p id="p1">Be Environment Friendly With Our innovative Product Range, Diamond : The Clean & Green Initiative</p>
    <p id="p2">Diamond Electric Vehicle Our sole motto is Promoting green technologies and ecosystem based solutions to
      mitigate and manage pollution, We bring you an opportunity to start your own business, start a new way of working
      combining life and work into an integrated existence.</p>
    <p id="p3">To Reduce Emissions, Shift To Cleaner And Alternative Technologies, Help Create A Better Environment
      Pollution Free, Lets Move To The Clean & Green Initiative of ADMS eBikes.</p>
  </div>

     
      
  <?php include 'fetch-vehicles.php';?> 
       


  <div class="makeiteasy">
    <div class="text">
      <h1>We Make It Easy</h1>
      <p>How It Works</p>
    </div>
    <div class="steps">
      <div class="box">
        <img src="icons/motorcycle (2).png" alt="">
        <p>Pick a Ride</p>
      </div>
      <div class="box">
        <img src="icons/motorcycle (3).png" alt="">
        <p>Ride Safely</p>
      </div>
      <div class="box">
        <img src="icons/accounting (1).png" alt="">
        <p>Track Expenses</p>
      </div>
      <div class="box">
        <img src="icons/cashless-payment.png" alt="">
        <p>Make Payment</p>
      </div>
    </div>
  </div>




  <div class="offer">
    <div class="offer-heading">
      <h1>What We Offer</h1>
      <p>our featured services</p>
    </div>
    <div class="offer-box-container">
      <div class="offer-box">
        <div class="offer-box-text">
          <h2>Pre-Sale Preparation</h2>
          <p>Before you buy your EV, visit our dealer showroom to get a first hand experience, we can help you make you
            an informed decision by providing you all the details.</p>
        </div>
        <div class="offer-box-img">
          <div class="circle">
            <img src="icons/vespa.png">
          </div>
        </div>
      </div>
      <div class="offer-box">
        <div class="offer-box-text">
          <h2>Financing</h2>
          <p>Diamond EBikes has formed close relationships with several local and national lenders, so we're able to
            offer financing rates that are the most competitive.</p>
        </div>
        <div class="offer-box-img">
          <div class="circle">
            <img src="icons/accounting (1).png">
          </div>
        </div>
      </div>
    </div>
    <div class="offer-box-container">
      <div class="offer-box">
        <div class="offer-box-text">
          <h2>Trade-In Service</h2>
          <p>Make the most of our simple and hassle-free trade-in program! Our service allows you to purchase a new EV
            at an attractive price, while saving you all the trouble of handling your old vehicle.</p>
        </div>
        <div class="offer-box-img">
          <div class="circle">
            <img src="icons/delivery-man.png">
          </div>
        </div>
      </div>
      <div class="offer-box">
        <div class="offer-box-text">
          <h2>Test Drive Any Model</h2>
          <p>We welcome you to stop by and take a look at the pristine inventory we offer. Most importantly, if you have
            any questions or concerns, speak to the dealer immediately.</p>
        </div>
        <div class="offer-box-img">
          <div class="circle">
            <img src="icons/test-drive.png">
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="achive">
    <div class="achive-heading">
      <h1>What Have We Achieved</h1>
      <p>Real Figures</p>
    </div>
    <div class="achive-box-container">
      <div class="achive-box">
        <div class="achive-box-circle" id="achive-img-1">
          <img src="icons/motorcycle (3).png">
          <p>100</p>
        </div>
        <p id="achive-p">Vehicles In Stock</p>
      </div>
      <div class="achive-box">
        <div class="achive-box-circle" id="achive-img-1">
          <img src="icons/award.png">
          <p>60</p>
        </div>
        <p id="achive-p">Accolades</p>
      </div>
      <div class="achive-box">
        <div class="achive-box-circle" id="achive-img-1">
          <img src="icons/costumer.png">
          <p>100%</p>
        </div>
        <p id="achive-p">Happy Customers</p>
      </div>
      <div class="achive-box">
        <div class="achive-box-circle" id="achive-img-1">
          <img src="icons/qualification.png">
          <p>20+</p>
        </div>
        <p id="achive-p">Qualified Staff</p>
      </div>
    </div>
  </div>




  <?php include('fetch_video.php') ?>
  
  <?php include('fetch_review.php') ?>



  
  <section class="footer">
    <div class="footer-list-1">
      <ul>
        <li>
          <img  src="icons/placeholder.png">
          <p>SULTANPUR, MEMARI,
          PURBA BARDHAMAN, WEST BENGAL - 713146</p>
        </li>
        <li>
          <img src="icons/clock (1).png">
          <h4>SALES DEPARTMENT</h4>
         <p>MON-SAT : 9:30 AM - 6:00 PM</p>
         <p>SUNDAY IS CLOSED</p>
        </li>
        <li>
          <img src="icons/clock (1).png">
          <h4>SERVICE DEPARTMENT</h4>
         <p>MON-SAT : 9:30 AM - 6:00 PM</p>
         <p>SUNDAY IS CLOSED</p>
        </li>
      </ul>
    </div>

    <div class="footer-list-2">
      <ul>
        <li>
          <img src="icons/phone.png">
          <h4>+91 9647938735</h4>
        </li>
        <li>
          <img src="icons/mail.png">
          <h4>5566tahirul@gmail.com</h4>
        </li>
        <li>
          <img src="icons/mail.png">
          <h4>QUICK LINKS</h4>
          <ul class="quick-links">
            <li><a href="terms_and_condition.html"><img src="icons/arrow.png">TERMS AND CONDITIONS</a></li>
            <li><a href="refund.html"><img src="icons/arrow.png">CANCELLATION AND REFUND</a></li>
            <li><a href="review.php"><img src="icons/arrow.png">FEEDBACK</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="social-media-links">
      <ul>
        <li><a href="#"><img src="icons/icons8-facebook-50.png"></a></li>
        <li><a href="#"><img src="icons/icons8-instagram-50.png"></a></li>
        <li><a href="#"><img src="icons/icons8-whatsapp-50.png"></a></li>
      </ul>
    </div>
  </section>

  



  <!-- Linking SwiperJS script -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Linking custom script -->
  <script src="js/script.js"></script>
  <script src="js/script-1.js"></script>
  <script src="js/script-2.js"></script>
  <script src="js/script-3.js"></script>
  <script src="js/vehicle-slider.js"></script>
</body>
</html>