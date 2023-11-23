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
                  <input type="email" name="txte" class="form-control _ge_de_ol" type="text" placeholder="Enter Email" required="" aria-required="true">
                </div>

                <div class="form-group">
                  <input type="password" name="txtp" class="form-control _ge_de_ol" id="checkpass" type="text" placeholder="Enter Password" required="" aria-required="true" oninput="checkpassw()">
                  <small id="invalidpmsg"></small>
                </div>
                <div class="form-group">
                  <input type="password" name="txtcp" class="form-control _ge_de_ol" type="text" placeholder="Confirm Password" required="" aria-required="true">
                  <small id="showmsg" class="text-danger"></small>
                </div>
            
                <div class="form-group">
                  <div class="_btn_04">
                    <input type="submit" value="Forget Password" class="btn btn-info" name="btnupdatepass" onclick="checkpassw()">
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

if(isset($_POST['btnupdatepass'])){
    $e = $_POST['txte'];
    $p=$_POST['txtp'];
    $cp=$_POST['txtcp'];

   $select = mysqli_query($con,"Select * from tblsignup");
   $fetch = mysqli_fetch_assoc($select);
    
   if($p!=$cp ){
    echo "<script>document.getElementById('showmsg').innerHTML='Password Did not Match'</script>";
   
}
else{
    if($e==$fetch['Email']){
        mysqli_query($con,"update tblsignup set Password='$p' where Email='$e'");
        echo "<script>alert('Password forget Successfully!!!')</script>";
     }
     else{
         echo "<script>alert('Email is Not Exists')</script>";
         echo "<script>window.location.assign('signup.php')</script>";
     }
}
    
 
    
    
   
}
?>
<script>
   
   function checkpassw(){

     var pass = document.getElementById('checkpass').value;
     if (pass.match(/^(?=.*[A-Z])(?=.*[!@#$%^&*])[0-9a-zA-Z~!@#$%^&*]{8,}$/)){
        document.getElementById('invalidpmsg').innerHTML = 'Password is Strong';
        document.getElementById('invalidpmsg').style.color = 'green';
    } else {
        document.getElementById('invalidpmsg').innerHTML = 'Password is Weak';
        document.getElementById('invalidpmsg').style.color = 'red';
    }  
   }
  
 </script>
<?php
include 'footer.php';
?>