<?php

@include 'connect.php';

if(isset($_POST['submit'])){

   $name =  $_POST['name'];
   $phone_no = $_POST['phone_no'];
   $email = $_POST['email'];
   $role = $_POST['role'];
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);


  

   $insert_admin = $conn->prepare("INSERT INTO `admin`(name,phone_no,email,role,password) VALUES(?,?,?,?,?)");
   $insert_admin->execute([$name,$phone_no,$email,$role,$cpass]);
   echo 'new admin registered successfully!';



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

  <?php include "include/header.php"; ?>
  
  <main class="main" style="padding: 100px 50px;" >

  <style>
          
.container{
  max-width: auto;
  width: 100%;
  background: #fff;
  border-radius: 7px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.3);
 
}


.container .form{
  padding: 1rem;
}

 .form input ,select {
   height: 40px;
   width: 30%;
   display: inline;
   padding: 0 10px;
   font-size: 15px;
   margin-bottom: 1rem;
   border: 1px solid #ddd;
   border-radius: 6px;
   outline: none;
   margin:10px;
 }

.form input.button{
  color: #fff;
  background:  cornflowerblue;
  font-size: 1rem;
  font-weight: 500;
  
  cursor: pointer;
  transition: 0.4s;
  width: 32%;
}

 h1{
    text-align: center;
    padding-bottom: 10px;
    }


          </style>
         
          <h1>add admin </h1>

          <div class="container">
            <!-- <input type="checkbox" id="check"> -->
            <div class="login form">
             
              <form action="" method="post" >

    
      
        
                <input type="text"
                name="name"
                placeholder="Enter your full name"> 
        
                <input  type="number"  placeholder="Enter your phone number" 
                name="phone_no"
                >

                <input  type="email"  placeholder="Enter your email" 
                name="email"
                >
        
               
        
        
                
                    <select id="role" name="role">
                      <option value="" selected disabled>Select your role</option>
                      <option value="teacher">teacher</option>
                      <option value="sub-admin">sub-admin</option>
                      <option value="admin">admin</option>
                    </select required>
                  
        
        
                <input type="password"
                name="password"
                placeholder="Enter your password">
        
                <input type="password"
                name="cpassword"
                placeholder="Confirm password">
              
                <input type="submit" class="button" name="submit" value="create "> 

              </form>
             
              </div>
            </div>


            <div class="container" style="margin-top: 1.5rem;">
              
              <div class="login form" >
                <div class="datailtable">
               
                <style>
                  table {
                    border-collapse: collapse;
                    width: 100%;
                    
                    
                  }
                
                  th, td {
                    border: 1px solid black;
                    padding: 8px;
                    text-align: center;
                  }
                
                  th {
                    background-color: #f2f2f2;
                  }
      
                  h1{
                      text-align: center;
                      padding-bottom: 10px;
                  }
                </style>









               
      
      <table>
          <thead>
            <tr>
              
              <th>admin ID</th>
              <th>admin Name</th>
              <th>role</th>
              <th>contact No</th>
              <th>button</th>
             
            </tr>
          </thead>
          <tbody>
            <!-- Add rows for each student below -->

            <?php
      $select_accounts = $conn->prepare("SELECT * FROM `admin`");
      $select_accounts->execute();
      if($select_accounts->rowCount() > 0){
         while($fetch_accounts = $select_accounts->fetch(PDO::FETCH_ASSOC)){   
   ?>
            <tr>
             
              <td>AM<?= $fetch_accounts['admin_id']; ?></td>
              <td><?= $fetch_accounts['name']; ?></td>
              <td><?= $fetch_accounts['role']; ?></td>
              <td><?= $fetch_accounts['phone_no']; ?></td>
              <td><button>modify</button> <button>delete</button></td>
      
            </tr>

            <?php
         }
      }else{
         echo '<p class="empty">no accounts available!</p>';
      }
   ?>

         
            <!-- Add more rows for other students if needed -->
          </tbody>
        </table>
                </div>
               
                </div>
              </div>
           

           
  
          
          
    
    </main>

                

    <script src="script.js"> </script>
  </body>
</html>