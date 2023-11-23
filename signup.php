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
                    <div class="row">
                        <div class="col-6">
                  <input type="text" name="txtfn" class="form-control _ge_de_ol " type="text" placeholder="Enter First Name" required="" aria-required="true">
                  </div>
                  <div class="col-6">
                  <input type="text" name="txtln" class="form-control _ge_de_ol" type="text" placeholder="Enter Last Name" required="" aria-required="true">
                  </div>
                </div>
                </div>
                <div class="form-group">
                  <input type="email" name="txte" class="form-control _ge_de_ol" id="checkmail" type="text" placeholder="Enter Email" required="" aria-required="true" oninput="checkemail()">
                 <small id="invalidmsg"></small>
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
                  <input type="file" name="txtf" class="form-control " type="text" required="" aria-required="true">
                </div>

                <div class="checkbox form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="">
                    <label class="form-check-label" for="">
                      Remember me
                    </label>
                  </div>
                
                </div>

                <div class="form-group">
                  <div class="_btn_04">
                    <input type="submit" value="Sign Up" class="btn btn-info" name="btnsignup">
                  </div>
                </div>

              <p>Already Sign Up Please<a href="login.php" class="text-info"> Login</a></p>
             
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>


<?php
if(isset($_POST['btnsignup'])){
    $fn=$_POST['txtfn'];
    $ln=$_POST['txtln'];
    $e=$_POST['txte'];
    $p=$_POST['txtp'];
    $cp=$_POST['txtcp'];


    $f=$_FILES['txtf']['name'];
    $tmp=$_FILES['txtf']['tmp_name'];
    move_uploaded_file($tmp,"pics/".$f);
    
   $select = mysqli_query($con,"select * from tblsignup");
   $fetch = mysqli_fetch_assoc($select);
   if($e==$fetch['Email']){
    echo "<script>alert('Email Already Sign Up')</script>";
    echo "<script>window.location.assign('login.php')</script>";
 }
    if($p==$cp){
     
       $insert=mysqli_query($con,"insert into tblsignup values('null','$fn $ln','$e','$p','$f')");
       echo "<script>window.location.assign('login.php')</script>";
    }
    else{
        echo "<script>document.getElementById('showmsg').innerHTML='Password Did not Match'</script>";
    }
   
}
?>
<script>
   function checkemail(){
     var email = document.getElementById('checkmail').value;
    
     if(email.match(/^[0-9a-z]{1,}[@]{1}[a-z]{1,}[.]{1}[a-z]{2,3}$/)){
      document.getElementById('invalidmsg').innerHTML = 'Email is Valid';
      document.getElementById('invalidmsg').style.color='green';
     }
     else{
       
      document.getElementById('invalidmsg').innerHTML = 'Email is Invalid';
      document.getElementById('invalidmsg').style.color = 'red';
  
     }  
   }
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