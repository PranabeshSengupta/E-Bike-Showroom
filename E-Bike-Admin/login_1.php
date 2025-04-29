<?php
  include("connect.php");
  if(isset($_POST['Login']))
  {
     $email=$_POST['email'];
     $password=$_POST['password'];
     $query="SELECT * from admins where a_email='$email' && a_password='$password'";
     $data=mysqli_query($conn,$query);
     $total=mysqli_num_rows($data);
     if($total==1)
     {
         $_SESSION["hello"]=$email;
         header('location:index.php');
     }
     else
     {
       echo "<script> alert('Sorry! Login failed')</script>"."<br>";
     }
  }
  ?>
