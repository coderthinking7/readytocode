<?php

@include 'connect.php';

session_start();

if(isset($_POST['submit'])){

   
   $phone_no =$_POST['phone_no'];
   $pass = md5($_POST['password']);
   

   $select = "SELECT * FROM admin WHERE phone_no = '$phone_no' && password = '$pass'" ;
 
   $result = mysqli_query($conn, $select);
   

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['role'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:index.php');

      }elseif($row['role'] == 'teacher'){

         $_SESSION['user_name'] = $row['name'];
         header('location:student_profile.php');

      }
    
     
   }else{
      echo "incorrect phone_no or password!";
 
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form</title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="style.css">
</head>
<body>

    <style>
        /* Import Google font - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 100vh;
  width: 100%;
  background:  cornflowerblue;
}
.container{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  max-width: 320px;
  width: 100%;
  background: #fff;
  border-radius: 7px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.3);
}

#check:checked ~ .registration{
  display: block;
}
#check:checked ~ .login{
  display: none;
}
#check{
  display: none;
}
.container .form{
  padding: 1rem;
}
.form header{
  font-size: 1.5rem;
  font-weight: 500;
  text-align: center;
  margin-bottom: 1rem;
}
 .form input{
   height: 40px;
   width: 100%;
   padding: 0 10px;
   font-size: 15px;
   margin-bottom: 1rem;
   border: 1px solid #ddd;
   border-radius: 6px;
   outline: none;
 }
 .form input:focus{
   box-shadow: 0 1px 0 rgba(0,0,0,0.2);
 }
.form a{
  font-size: 15px;
  color:  cornflowerblue;
  text-decoration: none;
}
.form a:hover{
  text-decoration: underline;
}
.form input.button{
  color: #fff;
  background:  cornflowerblue;
  font-size: 1rem;
  font-weight: 500;
  letter-spacing: 1px;
  margin-top: 1.4rem;
  cursor: pointer;
  transition: 0.4s;
}
.form input.button:hover{
  background:  cornflowerblue;
  font-size: 20px;
}

    </style>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form action="" method="post">
        <input  type="number" name="phone_no" placeholder="Enter your phone number" maxlength="10">
        <input type="password" name="password" placeholder="Enter your password">
        <a href="#">Forgot password?</a>
        <input type="submit" name="submit" class="button" value="Login">
      </form>
     
      </div>
    </div>
   
</body>
</html>