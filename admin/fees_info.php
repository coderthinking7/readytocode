<?php  include 'connect.php';
$student_id = $_GET['student_id'];
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
  

    <main class="main" style="padding: 100px 50px;margin-bottom:200px;" >

  
       
        <style>
          body {
            font-family: Arial, sans-serif;
          }
          table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            /* background-color:white; */
            
          }
          th, td {
            border: 1px solid black;
            padding: 6px;text-align: center;
          }
          th {
            background-color: #f2f2f2;
          }
        
          img {
            max-width: 200px;
            max-height: 200px;
          }

            
       .submit-btn {
         margin-top: 30px;
         margin-left:45% ;
       }
       
       .submit-btn input {
         color: white;
         border: none;
         height: auto;
         font-size: 16px;
         padding: 13px 20px;
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
       
        </style>
        <title>Student Details</title>
        </head>
        <body>
          <h2>Student Details</h2>
            
  <?php
      $select_accounts = $conn->prepare("SELECT * FROM `student_details` where student_id = $student_id");
      $select_accounts->execute();
      if($select_accounts->rowCount() > 0){
         while($fetch_accounts = $select_accounts->fetch(PDO::FETCH_ASSOC)){   
   ?>
          <table>

            <tr>
              <td rowspan="4"><img src="57.png" alt=""></tdh>
              <th>name</th>
              <td colspan="5"><?= $fetch_accounts['name']; ?> <?= $fetch_accounts['surname']; ?></td>
             
            </tr>

            <tr>
                <th>gender</th>
                <td><?= $fetch_accounts['gender']; ?></td>
                <th>d.o.b</th>
                <td><?= $fetch_accounts['DOB']; ?></td>
                <th>Standard</th>
                <td><?= $fetch_accounts['std']; ?></td>
  
                
              </tr>

            <tr>
              <th>father</th>
              <td><?= $fetch_accounts['father']; ?></td>
              <th>mother</th>
              <td><?= $fetch_accounts['father']; ?></td>
              <th>parent no</th>
              <td><?= $fetch_accounts['pcontact']; ?></td>

              
            </tr>

            <tr>
                <th>contact no</th>
                <td><?= $fetch_accounts['contact']; ?></td>
                <th>email</th>
                <td colspan="3"><?= $fetch_accounts['email']; ?></td>
                
                
              </tr>

            <tr>
                <th>Address</th>
                <td colspan="6"><?= $fetch_accounts['address']; ?></td>
                
                
              </tr>


              <tr>
                <th>total fees</th>
                <td><?= $fetch_accounts['total_fees']; ?></td>
                <th>pending fees</th>
                <td><?= $fetch_accounts['pay']; ?></td>
                <th >pay fees</th>
                <td colspan="2"><?= $fetch_accounts['pay']; ?></td>
              </tr>

              <tr>
                <th>persent attendence</th>
                <td>50%</td>
                <th>last month attendence</th>
                <td>30%</td>
                <th >total</th>
                <td colspan="2">50%</td>
              </tr>

            <!-- Add more rows as needed -->
          </table>
        
          <?php
         }
        }
   ?>  
               <br>
               <h2>Fees transcation  <a href="addfees.php?student_id=<?= $student_id ?>">Add Fees  </a></h2>  
            
 
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
                <td><?= $fetch_trans['mode']; ?></td>
               
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