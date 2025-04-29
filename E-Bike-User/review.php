<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>review</title>
     <link rel="stylesheet" href="nav_footer.css">
     <link rel="stylesheet" href="review.css">
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

      <section class="review-form-container">
        <div class="review-form">
          <h1 style="text-align: center;">Review</h1>
        <form action="submit_review.php" method="POST" enctype="multipart/form-data">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
    
          <label for="email">Email :</label>
          <input type="email" id="email" name="email">
    
          <label for="rating">Rate Your Experience:</label>
          <div class="rating">
            <input type="radio" id="star5" name="rating" value="5">
            <label for="star5">&#9733;</label>
    
            <input type="radio" id="star4" name="rating" value="4">
            <label for="star4">&#9733;</label>
    
            <input type="radio" id="star3" name="rating" value="3">
            <label for="star3">&#9733;</label>
    
            <input type="radio" id="star2" name="rating" value="2">
            <label for="star2">&#9733;</label>
    
            <input type="radio" id="star1" name="rating" value="1">
            <label for="star1">&#9733;</label>
          </div>
          <label for="review">Your Review:</label>
          <textarea id="review" name="review" rows="4" required></textarea>
          <div class="custom-file-input-wrapper">
            <input type="file" id="image" name="image" class="custom-file-input" onchange="displayFileName()">
            <label for="image" class="custom-file-label">Choose File</label>
          </div>
          <div class="file-name-box">
            <p class="file-name" id="file-name">No file selected</p>
          </div>
          

          <input type="submit" name="submit" id="submit">
        </form>
        </div>
      </section>
      

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
      <script>
        // Display the image file name after selection
        const imageInput = document.getElementById('image');
        const fileNameDisplay = document.getElementById('file-name');
    
        imageInput.addEventListener('change', function () {
          const fileName = this.files[0].name;
          fileNameDisplay.textContent = `Selected file: ${fileName}`;
        });
      </script>
   <script src="js/script-1.js"></script>
</body>
</html>