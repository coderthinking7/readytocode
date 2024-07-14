<?php  include 'connect.php'; ?>
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

  

    <main class="main" style="padding: 100px 50px;" >

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
          <h1>student fees record</h1>

<table>
    <thead>
      <tr>
        <th>date</th>
        <th>Student ID</th>
        <th>Student Name</th>
        <th>Standard</th>
        <th>contact No</th>
        <th>sender name</th>
        <th>mode </th>
        <th>amount </th>
       
      </tr>
    </thead>
    <tbody>
    <?php

$select_trans = $conn->prepare("
    SELECT fr.*, s.name AS student_name, s.std, s.contact
    FROM `fee_record` fr
    JOIN `student_details` s ON fr.student_id = s.student_id
    ORDER BY fr.date DESC
");
$select_trans->execute();

if($select_trans->rowCount() > 0) {
    while($fetch_trans = $select_trans->fetch(PDO::FETCH_ASSOC)) {
?>
      <tr>
      <td><?= $fetch_trans['date']; ?></td>
    <td><?= $fetch_trans['student_id']; ?></td>
    <td><?= $fetch_trans['student_name']; ?></td>
    <td><?= $fetch_trans['std']; ?></td>
    <td><?= $fetch_trans['contact']; ?></td>
    <td><?= $fetch_trans['paidby']; ?></td>
    <td><?= $fetch_trans['mode']; ?></td>
    <td><?= $fetch_trans['amount']; ?></td>
        
     

      </tr>
      <?php
                }
            } else {
                echo '<tr><td colspan="6">No Record available!</td></tr>';
            }
?>
    
    </tbody>
  </table>
  
          
    
    
    </main>

    <script src="script.js"> </script>
  </body>
</html>