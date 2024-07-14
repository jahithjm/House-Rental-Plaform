<?php  
$server='localhost';
$db_name = 'home_db';
$db_user_name = 'root';
$db_user_pass = '';

$conn = mysqli_connect($server, $db_user_name, $db_user_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = isset($_COOKIE['user_id']) ? $_COOKIE['user_id'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- about section starts  -->

<section class="about">

   <div class="row">
      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>
      <div class="content">
         <h3>why choose us?</h3>
         <p>Our website is designed to be intuitive and easy to navigate, making your property search seamless and efficient.</p>
         <a href="contact.php" class="inline-btn">contact us</a>
      </div>
   </div>

</section>

<!-- about section ends -->

<!-- steps section starts  -->

<section class="steps">

   <h1 class="heading">3 simple steps</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/step-1.png" alt="">
         <h3>search property</h3>
         <p>Browse a vast selection of rental properties to find the perfect home that fits your needs and budget.</p>
      </div>

      <div class="box">
         <img src="images/step-2.png" alt="">
         <h3>contact agents</h3>
         <p>Receive personalized recommendations and guidance based on your specific requirements and preferences.</p>
      </div>

      <div class="box">
         <img src="images/step-3.png" alt="">
         <h3>enjoy property</h3>
         <p>Experience a hassle-free move-in process with our streamlined procedures and support services.</p>
      </div>

   </div>

</section>

<!-- steps section ends -->

<!-- review section starts  -->

<section class="reviews">

   <h1 class="heading">client's reviews</h1>

   <div class="box-container">

      <?php
      $sql = "SELECT * FROM messages";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
         while ($row = mysqli_fetch_assoc($result)) {
      ?>

            <div class="box">
               <div class="user">
             
                  <div>
                     <h3><?php echo $row['name']; ?></h3>
                     <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                     </div>
                     <br>
                     <h2><?php echo $row['email']; ?></h2>
                  </div>
               </div>
               <p><?php echo $row['message']; ?></p>
            </div>

      <?php
         }
      } else {
         echo "No reviews yet.";
      }
      ?>

   </div>

</section>

<!-- review section ends -->

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
