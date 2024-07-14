<?php

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

   $stmt = $conn->prepare("SHOW TABLE STATUS LIKE 'student_details'");
   $stmt->execute();
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $next_id = $row['Auto_increment'];
   
    // Generate the student ID using the next auto-increment value
    $student_id =  str_pad($next_id, STR_PAD_LEFT);

    // Generate the transaction number using the next auto-increment value
    $random_number = random_int(1000, 9999);
    $transaction_number =  $random_number;

  //  $insert_admin = $conn->prepare("INSERT INTO `student_details`(name,father,surname,gender,DOB,contact,pcontact,address,std,email,pay,total_fees) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
  //  $insert_admin->execute([$name,$father,$surname,$gender,$dob,$contact,$pcontact,$address,$std,$email,$pay,$total_fees]);
  $insert_admin = $conn->prepare("INSERT INTO student_details (student_id, name, father, surname, gender, DOB, contact, pcontact, address, std, email, pay, total_fees) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $insert_admin->execute([$student_id, $name, $father, $surname, $gender, $dob, $contact, $pcontact, $address, $std, $email, $pay, $total_fees]);

   $insert_trans = $conn->prepare("INSERT INTO `fee_record`(tans_id,student_id,amount) VALUES(?,?,?)");
   $insert_trans->execute([$transaction_number,$student_id,$pay]);

   echo 'student registered successfully!';
  
   
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
  <div class="form-group fullname">
    <label for="fullname">Name<span>*</span></label>
    <input type="text" id="fullname"  name="name" placeholder="Enter your full name"   required>
  </div>
  <div class="form-group fathername">
    <label for="fathername">Father Name<span>*</span></label>
    <input type="text" name="father" id="fathername" placeholder="Enter your father name" required>
  </div>

  <div class="form-group surname">
    <label for="surname">Surname Name<span>*</span></label>
    <input type="text" name="surname" id="surname" placeholder="Enter your surname" required>
  </div>

  <div class="form-group gender">
    <label for="gender">Gender<span>*</span></label>
    <select name="gender" id="gender">
      <option value="" selected disabled>Select your gender</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>
    </select required>
  </div>
  
  <div class="form-group DOB">
    <label for="DOB">DOB<span>*</span></label>
    <input type="date" name="dob" id="DOB" placeholder="Enter your DOB" required>
  </div>

  <div class="form-group contact number">
    <label for="contact number">contact number<span></span></label>
    <input type="text" maxlength="10"  pattern="\d*" name="contact" id="contact number"  placeholder="Enter your contact number" >
  </div>


  <div class="form-group parentno">
    <label for="parentno"> parent contact number<span>*</span></label>
    <input type="text" name="pcontact" id="parentno" maxlength="10"  pattern="\d*" placeholder="Enter your parent contact number" required>
  </div>



  <div class="form-group address">
    <label for="address">address<span>*</span></label>
    <input type="text" name="address" id="address" placeholder="Enter your address" required>
  </div>

  <div class="form-group standard">
    <label for="standard">standard<span>*</span></label>
    <select name="std" id="standard">
      <option value="" selected disabled>Select your standard</option>
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
    <input type="text" name="" id="surname" placeholder="Enter your surname" required>
  </div> -->



  <div class="form-group email">
    <label for="email">Email Address<span></span></label>
    <input type="text" name="email" id="email" placeholder="Enter your email address" >
  </div>
  
  <div class="form-group totalfees">
    <label for="totalfees">total fees <span>*</span></label>
    <input type="text" name="total_pay" id="totalfees" placeholder="Enter your totalfees" required>
  </div>

  <div class="form-group pay_fees">
    <label for="pay_fees">pay_fees <span>*</span></label>
    <input type="text" name="pay" id="pay_fees" placeholder="Enter your pay_fees " required>
  </div>
 
  

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


   

    <!-- <script >
        // Selecting form and input elements
const form = document.querySelector("form");
const passwordInput = document.getElementById("password");
const passToggleBtn = document.getElementById("pass-toggle-btn");

// // Function to display error messages
// const showError = (field, errorText) => {
//     field.classList.add("error");
//     const errorElement = document.createElement("small");
//     errorElement.classList.add("error-text");
//     errorElement.innerText = errorText;
//     field.closest(".form-group").appendChild(errorElement);
// }

// // Function to handle form submission
// const handleFormData = (e) => {
//     e.preventDefault();

//     // Retrieving input elements
//     const fullnameInput = document.getElementById("fullname");
//     const emailInput = document.getElementById("email");
//     const dateInput = document.getElementById("date");
//     const genderInput = document.getElementById("gender");

//     // Getting trimmed values from input fields
//     const fullname = fullnameInput.value.trim();
//     const email = emailInput.value.trim();
//     const password = passwordInput.value.trim();
//     const date = dateInput.value;
//     const gender = genderInput.value;

//     // Regular expression pattern for email validation
//     const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

//     // Clearing previous error messages
//     document.querySelectorAll(".form-group .error").forEach(field => field.classList.remove("error"));
//     document.querySelectorAll(".error-text").forEach(errorText => errorText.remove());

//     // Performing validation checks
//     if (fullname === "") {
//         showError(fullnameInput, "Enter your full name");
//     }
//     if (!emailPattern.test(email)) {
//         showError(emailInput, "Enter a valid email address");
//     }
//     if (password === "") {
//         showError(passwordInput, "Enter your password");
//     }
//     if (date === "") {
//         showError(dateInput, "Select your date of birth");
//     }
//     if (gender === "") {
//         showError(genderInput, "Select your gender");
//     }

//     // Checking for any remaining errors before form submission
//     const errorInputs = document.querySelectorAll(".form-group .error");
//     if (errorInputs.length > 0) return;

//     // Submitting the form
//     form.submit();
// }

// Toggling password visibility
// passToggleBtn.addEventListener('click', () => {
//     passToggleBtn.className = passwordInput.type === "password" ? "fa-solid fa-eye-slash" : "fa-solid fa-eye";
//     passwordInput.type = passwordInput.type === "password" ? "text" : "password";
// });

// // Handling form submission event
// form.addEventListener("submit", handleFormData);
    </script> -->
  