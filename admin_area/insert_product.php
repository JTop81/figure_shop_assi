<?php

if (!isset($_SESSION['admin_email'])) {

  echo "<script>window.open('login.php','_self')</script>";
} else {

?>
  <!DOCTYPE html>

  <html>

  <head>

    <title> Insert Products </title>


    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
      tinymce.init({
        selector: '#product_desc,#product_features'
      });
    </script>

  </head>

  <body>

    <div class="row">
      <!-- row Starts -->

      <div class="col-lg-12">
        <!-- col-lg-12 Starts -->

        <ol class="breadcrumb">
          <!-- breadcrumb Starts -->

          <li class="active">

            <i class="fa fa-dashboard"> </i> Dashboard / Insert Products

          </li>

        </ol><!-- breadcrumb Ends -->

      </div><!-- col-lg-12 Ends -->

    </div><!-- row Ends -->


    <div class="row">
      <!-- 2 row Starts -->

      <div class="col-lg-12">
        <!-- col-lg-12 Starts -->

        <div class="panel panel-default">
          <!-- panel panel-default Starts -->

          <div class="panel-heading">
            <!-- panel-heading Starts -->

            <h3 class="panel-title">

              <i class="fa fa-money fa-fw"></i> Insert Products

            </h3>

          </div><!-- panel-heading Ends -->

          <div class="panel-body">
            <!-- panel-body Starts -->

            <form class="form-horizontal" method="post" enctype="multipart/form-data">
              <!-- form-horizontal Starts -->

              <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Title </label>

                <div class="col-md-6">

                  <input type="text" name="product_title" class="form-control" required>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Url </label>

                <div class="col-md-6">

                  <input type="text" name="product_url" class="form-control" required>

                  <br>

                  <p style="font-size:15px; font-weight:bold;">

                    Product Url Example : nezu-xl

                  </p>

                </div>

              </div><!-- form-group Ends -->


              <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"> Select A Manufacturer </label>

                <div class="col-md-6">

                  <select class="form-control" name="manufacturer">
                    <!-- select manufacturer Starts -->

                    <option> Select A Manufacturer </option>

                    <?php

                    $get_manufacturer = "select * from manufacturers";
                    $run_manufacturer = mysqli_query($con, $get_manufacturer);
                    while ($row_manufacturer = mysqli_fetch_array($run_manufacturer)) {
                      $manufacturer_id = $row_manufacturer['manufacturer_id'];
                      $manufacturer_title = $row_manufacturer['manufacturer_title'];

                      echo "<option value='$manufacturer_id'>$manufacturer_title</option>";
                    }

                    ?>

                  </select><!-- select manufacturer Ends -->

                </div>

              </div><!-- form-group Ends -->


              <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Category </label>

                <div class="col-md-6">

                  <select name="product_cat" class="form-control">

                    <option> Select a Product Category </option>

                    <?php

                    $get_p_cats = "select * from product_categories";

                    $run_p_cats = mysqli_query($con, $get_p_cats);

                    while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

                      $p_cat_id = $row_p_cats['p_cat_id'];

                      $p_cat_title = $row_p_cats['p_cat_title'];

                      echo "<option value='$p_cat_id' >$p_cat_title</option>";
                    }

                    ?>


                  </select>

                </div>

              </div><!-- form-group Ends -->


              <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Image 1 </label>

                <div class="col-md-6">

                  <input type="file" name="product_img1" class="form-control" required>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Image 2 </label>

                <div class="col-md-6">

                  <input type="file" name="product_img2" class="form-control" required>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Image 3 </label>

                <div class="col-md-6">

                  <input type="file" name="product_img3" class="form-control" required>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Price </label>

                <div class="col-md-6">

                  <input type="text" name="product_price" class="form-control" required>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Sale Price </label>

                <div class="col-md-6">

                  <input type="text" name="psp_price" class="form-control" required>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Keywords </label>

                <div class="col-md-6">

                  <input type="text" name="product_keywords" class="form-control" required>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Info </label>

                <div class="col-md-6">

                  <textarea name="product_info" class="form-control" rows="15" id="product_desc">
                      </textarea>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"> Product Label </label>

                <div class="col-md-6">

                  <input type="text" name="product_label" class="form-control" required>

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group">
                <!-- form-group Starts -->

                <label class="col-md-3 control-label"></label>

                <div class="col-md-6">

                  <input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">

                </div>

              </div><!-- form-group Ends -->

            </form><!-- form-horizontal Ends -->

          </div><!-- panel-body Ends -->

        </div><!-- panel panel-default Ends -->

      </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->




  </body>

  </html>

  <?php

  if (isset($_POST['submit'])) {

    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $manufacturer_id = $_POST['manufacturer'];
    $product_url = $_POST['product_url'];
    $product_price = $_POST['product_price'];
    $product_info = $_POST['product_info'];
    $product_keywords = $_POST['product_keywords'];

    $psp_price = $_POST['psp_price'];

    $product_label = $_POST['product_label'];

    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];

    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];

    move_uploaded_file($temp_name1, "product_images/$product_img1");
    move_uploaded_file($temp_name2, "product_images/$product_img2");
    move_uploaded_file($temp_name3, "product_images/$product_img3");

    $insert_product = "insert into products (p_cat_id,manufacturer_id,date,product_title,product_url,product_img1,product_img2,product_img3,product_price,product_psp_price,product_info,product_keywords,product_label) values ('$product_cat','$manufacturer_id',NOW(),'$product_title','$product_url','$product_img1','$product_img2','$product_img3','$product_price','$psp_price','$product_info','$product_keywords','$product_label')";

    $run_product = mysqli_query($con, $insert_product);

    if ($run_product) {

      echo "<script>alert('Insert product successfully')</script>";

      echo "<script>window.open('index.php?view_products','_self')</script>";
    }
  }

  ?>

<?php } ?>