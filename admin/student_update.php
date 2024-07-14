<?php
$student_id = $_GET['student_id'];
@include 'connect.php';

if(isset($_POST['submit'])){

   $name =  $_POST['name'];
   $father = $_POST['father'];
   $surname = $_POST['surname'];
   $gender = $_POST['gender'];
   $dob = $_POST['dob'];
   $contact =  $_POST['contact'];
   $pcontact = $_POST['pcontact'];
   $address = $_POST['address'];
   $std = $_POST['std'];
   $email = $_POST['email'];
   $total_fees =  $_POST['total_pay'];
   $pay =  $_POST['pay'];

  $update_admin = $conn->prepare(" UPDATE `student_details` SET name=?, father=?, surname=?, gender=?, DOB=?, contact=?, pcontact=?, address=?, std=?, pay=?, total_fees=? ,email=? WHERE student_id= $student_id ");
$update_admin->execute([$name, $father, $surname, $gender, $dob, $contact, $pcontact, $address, $std, $pay, $total_fees, $email]);
   echo 'student update successfully!';
  
   
}
;


?>


<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gravity</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  </head>
  <body>
  
    
<?php include  'include/header.php' ?>

  

    <main class="main">

      <style>

       form {
      
         padding: 25px;
         background: #fff;
         
         width: 100%;
         border-radius: 7px;
         box-shadow: 0 10px 15px rgba(0, 0, 0, 0.05);
      
       }
       
       form h2 {
         font-size: 27px;
         text-align: center;
         margin: 0px 0 30px;
         padding-top: 80px;
       }
       
       form .form-group {
         margin-bottom: 15px;
         position: relative;
       }
       
       form label {
         display: block;
         font-size: 15px;
         margin-bottom: 7px;
       }
       
       form input,
       form select {
         height: 45px;
         padding: 10px;
         width: 100%;
         font-size: 15px;
         
         outline: none;
         background: #fff;
         border-radius: 3px;
         border: 1px solid #bfbfbf;
       }
       
       form input:focus,
       form select:focus {
         border-color: #9a9a9a;
       }
       
       form input.error,
       form select.error {
         border-color: #f91919;
         background: #f9f0f1;
       }
       
       form small {
         font-size: 14px;
         margin-top: 5px;
         display: block;
         color: #f91919;
       }
       
       form .password i {
         position: absolute;
         right: 0px;
         height: 45px;
         top: 28px;
         font-size: 13px;
         line-height: 45px;
         width: 45px;
         cursor: pointer;
         color: #939393;
         text-align: center;
       }
       
       .submit-btn {
         margin-top: 30px;
       }
       
       .submit-btn input {
         color: white;
         border: none;
         height: auto;
         font-size: 16px;
         padding: 13px 0;
         border-radius: 5px;
         cursor: pointer;
         font-weight: 500;
         text-align: center;
         background: cornflowerblue;
         transition: 0.2s ease;
       }
       
       .submit-btn input:hover {
         background: #179b81;
       }  
       
       
       form span{
           color: #f91919;
       }
           </style>

<form action="" method="post" >
  <h2>student registration</h2>

    <?php
      $select_accounts = $conn->prepare("SELECT * FROM `student_details` where student_id = $student_id");
      $select_accounts->execute();
      if($select_accounts->rowCount() > 0){
         while($fetch_accounts = $select_accounts->fetch(PDO::FETCH_ASSOC)){   
   ?>

  <div class="form-group fullname">
    <label for="fullname">Name<span>*</span></label>
    <input type="text" name="name" id="fullname" value="<?= $fetch_accounts['name']; ?>"   required>
  </div>
  <div class="form-group fathername">
    <label for="fathername">Father Name<span>*</span></label>
    <input type="text" name="father" id="fathername" value="<?= $fetch_accounts['father']; ?>" required>
  </div>

  <div class="form-group surname">
    <label for="surname">Surname Name<span>*</span></label>
    <input type="text" name="surname" id="surname" value="<?= $fetch_accounts['surname']; ?>" required>
  </div>

  <div class="form-group gender">
    <label for="gender">Gender<span>*</span></label>
    <select name="gender" id="gender">
      <option value="<?= $fetch_accounts['gender']; ?>" selected ><?= $fetch_accounts['gender']; ?></option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>
    </select required>
  </div>
  
  <div class="form-group DOB">
    <label for="DOB">DOB<span>*</span></label>
    <input type="date" name="dob" id="DOB" value="<?= $fetch_accounts['DOB']; ?>" required>
  </div>

  <div class="form-group contact number">
    <label for="contact number">contact number<span></span></label>
    <input type="text" maxlength="10"  pattern="\d*" name="contact" id="contact number" value="<?= $fetch_accounts['contact']; ?>" >
  </div>


  <div class="form-group parentno">
    <label for="parentno"> parent contact number<span>*</span></label>
    <input type="text" name="pcontact" id="parentno" maxlength="10"  pattern="\d*" value="<?= $fetch_accounts['pcontact']; ?>" required>
  </div>



  <div class="form-group address">
    <label for="address">address<span>*</span></label>
    <input type="text" name="address" id="address" value="<?= $fetch_accounts['address']; ?>" required>
  </div>

  <div class="form-group standard">
    <label for="standard">standard<span>*</span></label>
    <select name="std" id="standard">
      <option value="<?= $fetch_accounts['std']; ?>" selected ><?= $fetch_accounts['std']; ?></option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">9</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>

      <option value="Other">Other</option>
    </select required>
  </div>



  <!-- <div class="form-group surname">
    <label for="surname">Surname<span>*</span></label>
    <input type="text" name="" id="surname" value="Enter your surname" required>
  </div> -->



  <div class="form-group email">
    <label for="email">Email Address<span></span></label>
    <input type="text" name="email" id="email" value="<?= $fetch_accounts['email']; ?>" >
  </div>
  
  <div class="form-group totalfees">
    <label for="totalfees">total fees <span>*</span></label>
    <input type="text" name="total_pay" id="totalfees" value="<?= $fetch_accounts['total_fees']; ?>" required>
  </div>

  <div class="form-group pay_fees">
    <label for="pay_fees">pay_fees <span>*</span></label>
    <input type="text" name="pay" id="pay_fees" value="<?= $fetch_accounts['pay']; ?>" required>
  </div>
 
   
          <?php
         }
      }else{
         echo '<p class="empty">no accounts available!</p>';
      }
   ?>  

  

  <div class="form-group submit-btn">
   <input type="submit" name="submit" value="Submit"> 
  </div>
</form>



     <div>

     </div>
  
    </main>

    <script src="script.js"> </script>
  </body>
</html>


