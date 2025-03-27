<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>
<!-- MAIN -->
<main>
  <!-- HERO -->
  <div class="nero">
    <div class="nero__heading">
      <span class="nero__bold">Local </span>Stores
    </div>
    <p class="nero__text">
    </p>
  </div>
</main>


<div id="content">
  <!-- content Starts -->

  <div class="container-fluid">
    <!-- container Starts -->

    <div class="col-md-12 col-sm-6 box">
      <!-- col-md-12 Starts -->

            <div align="center">
            <img src="admin_area/other_images/image1.jpg ?>" class="img-responsive" align="center">
            </div>
            <h2 align="center"> Hai Bà Trưng </h2>

            <p align="center">
              Shop chuyên cung cấp các mặt hàng chính hàng. <br>
              Hàng chất lượng cao - Uy tín - Thân thiện
            </p>


    </div><!-- col-md-12 Ends -->

  </div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

</body>

</html>