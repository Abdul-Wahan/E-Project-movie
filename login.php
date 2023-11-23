<?php
include 'header.php';
include 'config.php';

?>
<link rel="stylesheet" href="css/login.css">




<section class="form-02-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="_lk_de">
                <form action="" method="post" enctype="multipart/form-data">
              <div class="form-03-main">
                <div class="logo">
                  <img src="img/download.png">
                </div>
                <div class="form-group">
                
              
                <div class="form-group">
                  <input type="email" name="txte" class="form-control _ge_de_ol" type="text" placeholder="Enter Email" required="" aria-required="true">
                </div>

                <div class="form-group">
                  <input type="password" name="txtp" class="form-control _ge_de_ol" type="text" placeholder="Enter Password" required="" aria-required="true">
                </div>
               
                <div class="checkbox form-group">
                  <div class="form-check">
                    <?php
                    $select = mysqli_query($con,"select * from tblsignup");
                    $fetch = mysqli_fetch_assoc($select);
                    echo "<i class='fas fa-key' style='--fa-primary-color: #511f1f; --fa-secondary-color: #511f1f;'></i><a href='upadatepass.php' class='text-info'>Forget Password</a>";
                    ?>
                    
                  </div>
                
                </div>

                <div class="form-group">
                  <div class="_btn_04">
                    <input type="submit" value="Log In" class="btn btn-info" name="btnlogin">
                  </div>
                </div>

                <div class="form-group nm_lk"><p>Or Login With</p></div>

                <div class="form-group pt-0">
                  <div class="_social_04">
                    <ol>
                      <li><i class="fa fa-facebook"></i></li>
                      <li><i class="fa fa-twitter"></i></li>
                      <li><i class="fa fa-google-plus"></i></li>
                      <li><i class="fa fa-instagram"></i></li>
                      <li><i class="fa fa-linkedin"></i></li>
                    </ol>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>


<?php
if(isset($_POST['btnlogin'])){
   
    $e=$_POST['txte'];
    $p=$_POST['txtp'];
 

   $select = mysqli_query($con,"select * from tblsignup where Email='$e' AND Password='$p'");
   $fetech = mysqli_fetch_assoc($select);
   if(mysqli_num_rows($select)){
      echo "<script>alert('Login Successfully!!!')</script>";
   }
   else{
    echo "<script>alert('Error in Login')</script>";
    echo "<script>window.location.assign('signup.php')</script>";
   }
}
?>

<?php
include 'footer.php';
?>