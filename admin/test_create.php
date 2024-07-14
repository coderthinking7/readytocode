<?php

@include 'connect.php';

if(isset($_POST['submit'])){

   $date =  $_POST['date'];
   $std = $_POST['std'];
   $time = $_POST['time'];
   $subject = $_POST['subject'];
   $lesson = $_POST['lesson'];
   $outoff = $_POST['outoff'];
  
   $insert_test = $conn->prepare("INSERT INTO `test_date`(date,std,time,subject,lesson,out_off) VALUES(?,?,?,?,?,?)");
   $insert_test->execute([$date,$std,$time,$subject,$lesson,$outoff]);

   echo 'test schedule successfully!';
   
}
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

  

    <main class="main" style="padding: 100px 50px;" >

        <style>
          
.container{
  max-width: auto;
  width: 100%;
  background: #fff;
  border-radius: 7px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.3);
  /* display: inline-block; */
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
  
  cursor: pointer;
  transition: 0.4s;
  width: 30%;
}
.form input.button:hover{
  background:  cornflowerblue;
  font-size: 20px;
}

            h1{
                text-align: center;
                padding-bottom: 10px;
            }
          </style>
   


            <div class="container" style="margin-top: 1.5rem;">
              <input type="checkbox" id="check">
              <div class="login form" >
               
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
              <th>test_id</th>
              <th>date</th>
              <th>time</th>
              <th>standard</th>
              <th>subject</th>
              <th>lesson</th>
              <th>outoff</th>
              <th>Add Marks</th>
              
             
            </tr>
          </thead>
          <tbody>
                     
  <?php
      $select_test = $conn->prepare("SELECT * FROM `test_date` where result='no' ORDER BY `date` DESC" );
      $select_test->execute();
      if($select_test->rowCount() > 0){
         while($fetch_test = $select_test->fetch(PDO::FETCH_ASSOC)){   
   ?>
            <tr>
              <td><?= $fetch_test['test_id']; ?></td>
              <td><?= $fetch_test['date']; ?></td>
              <td><?= $fetch_test['time']; ?></td>
              <td><?= $fetch_test['std']; ?></td>
              <td><?= $fetch_test['subject']; ?></td>
              <td><?= $fetch_test['lesson']; ?></td>
              <td><?= $fetch_test['out_off']; ?></td>
              <td><a href="add_marks.php?test_id=<?= $fetch_test['test_id'] ?>"><button>add marks</button> </a></td>
      
            </tr>

            <?php
                }
            } else {
                echo '<tr><td colspan="6">No Record available!</td></tr>';
            }
?>
           
            <!-- Add more rows for other students if needed -->
          </tbody>
        </table>
               
                </div>
              </div>
           

           
  
          
    
    
    </main>

    <script src="script.js"> </script>
  </body>
</html>