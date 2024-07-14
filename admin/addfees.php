<?php
$student_id = $_GET['student_id'];

@include 'connect.php';

if(isset($_POST['submit'])){

   $mode = $_POST['mode'];
   $paid = $_POST['paid'];
   $pay = $_POST['pay'];
   $payer = $_POST['payer'];
   $transaction_number = random_int(1000, 9999);

  

   $insert_trans = $conn->prepare("INSERT INTO `fee_record`(student_id,tans_id,amount,mode,paidby) VALUES(?,?,?,?,?)");
   $insert_trans->execute([$student_id,$transaction_number,$paid,$mode,$payer]);
    

   $update_total = $paid + $pay ;

   
  $update_trans = $conn->prepare(" UPDATE `student_details` SET  pay=? WHERE student_id= $student_id ");
  $update_trans->execute([$update_total]);
  echo 'new trans registered successfully!';

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
              
    <?php
      $select_accounts = $conn->prepare("SELECT * FROM `student_details` where student_id = $student_id");
      $select_accounts->execute();
      if($select_accounts->rowCount() > 0){
         while($fetch_accounts = $select_accounts->fetch(PDO::FETCH_ASSOC)){   
   ?>

              <form action="" method="post" >

                <input type="text"  name="name" value="<?= $fetch_accounts['name']; ?>"> 
                <input  type="number"  name="phone_no"  value="<?= $fetch_accounts['contact']; ?>" >
                <input  type="email"   name="email" value="<?= $fetch_accounts['email']; ?>"  >
                <input type="text" name="std" value="<?= $fetch_accounts['std']; ?>"> 
                <input  type="number"   name="totalfees" value="<?= $fetch_accounts['total_fees']; ?>" >
                <input  type="number"   name="pay" value="<?= $fetch_accounts['pay']; ?>" >
                <input  type="number"  name="pending" value="<?= $fetch_accounts['pay']; ?>" >
                <input  type="number"  name="paid" placeholder="enter amount of pay" >
                <input  type="text"  name="payer" placeholder="enter payer name " >
        
                    <select id="mode" name="mode">
                      <option value="" selected disabled>Select payment mode</option>
                      <option value="online">online</option>
                      <option value="cash">cash</option>
                    </select required>
                  
        
        
          <?php
         }
      }  ?>
               
              
                <input type="submit" class="button" name="submit" value="pay "> 

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









               
      
<h2>Fees transcation </h2>  
            
 
            <table>
            <thead>
              <tr>
                  <th>Date</th>
                  <th>trans Id</th>
                  <th>amount</th>
                  <th>mode</th>
                  <th>paid by</th>
                  
               
              </tr>
          </thead>
          <?php
      //   $select_trans = $conn->prepare("SELECT * FROM `fee_record where student_id = $student_id");
      //   $select_trans->execute();
      //   if($select_trans->rowCount() > 0){
      //      while($fetch_trans = $select_trans->fetch(PDO::FETCH_ASSOC)){   
  
      $select_trans = $conn->prepare("SELECT * FROM `fee_record` WHERE student_id = ?");
      $select_trans->execute([$student_id]);
      
      if($select_trans->rowCount() > 0) {
          while($fetch_trans = $select_trans->fetch(PDO::FETCH_ASSOC)) {
              // Process each row of fee record data here
  
  
     ?>
          <tr>
                  <td><?= $fetch_trans['date']; ?></td>
                  <td><?= $fetch_trans['tans_id']; ?></td>
                  <td><?= $fetch_trans['amount']; ?></td>
                  <td><?= $fetch_trans['mode']; ?></td>
                  <td><?= $fetch_trans['paidby']; ?></td>
                 
              </tr>
              <?php
                  }
              } else {
                  echo '<tr><td colspan="6">No Record available!</td></tr>';
              }
  ?>
            </table>
          
                </div>
               
                </div>
              </div>
           

           
  
          
          
    
    </main>

                

    <script src="script.js"> </script>
  </body>
</html>