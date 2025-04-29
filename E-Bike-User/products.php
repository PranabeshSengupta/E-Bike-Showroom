<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="nav_footer.css?v=1.0">
    <link rel="stylesheet" href="data_fetch.css?v=1.0">
    
</head>

<body>
    <!-- navbar  -->

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
            <li><a href="products.php"><i class="icon-models"></i>PRODUCTS</a></li>
            <li><a href="contact-us.html"><i class="icon-contact"></i> CONTACT</a></li>
        </ul>
    </div>

    <div class="overlay" id="overlay"></div>

    <!-- navbar -->

    <!-- product section -->
    
    <?php
    include("product_fetch.php")
    ?>

    <!-- product section -->



    <!-- footer -->

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


     <!-- footer -->
    <script src="js/script-1.js"></script>
    <script src="js/data_fetch.js"></script>
</body>

</html>