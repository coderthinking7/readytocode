<?php
$test_id = $_GET['test_id'];
@include 'connect.php';


if (isset($_POST['submit'])) {
    $student_ids = $_POST['student_id'];
    $marks = $_POST['marks'];
    $test_id = $_POST['test_id']; // Get the test_id from the hidden input

    for ($i = 0; $i < count($student_ids); $i++) {
        $student_id = $student_ids[$i];
        $mark = $marks[$i];

        // Insert/update the marks in the table named 'student_marks'
        $stmt = $conn->prepare("INSERT INTO student_marks (student_id, test_id, marks) VALUES (:student_id, :test_id, :marks) 
                                ON DUPLICATE KEY UPDATE marks = :marks");
        $stmt->bindParam(':student_id', $student_id);
        $stmt->bindParam(':test_id', $test_id);
        $stmt->bindParam(':marks', $mark);
        $stmt->execute();
    }
    
    $result="yes";
    $update_test = $conn->prepare("UPDATE `test_date` SET result = ? WHERE test_id = $test_id ");
    $update_test->execute([$result]);
    
    


    echo "Marks submitted successfully!";
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
          <h1>test record Add </h1>
          <?php
      $select_test = $conn->prepare("SELECT * FROM `test_date` where test_id = $test_id");
      $select_test->execute();
      if($select_test->rowCount() > 0){
         while($fetch_test = $select_test->fetch(PDO::FETCH_ASSOC)){   
   ?>

          <div class="container">
            <input type="checkbox" id="check">
            <div class="login form">
             
              <form action="" method="post">
        
                <input type="date"  name="date"  value="<?= $fetch_test['date']; ?>" > 
                <input type="time"  name="time" value="<?= $fetch_test['time']; ?>"  > 
        
      <select name="std" id="standard">
      <option value="<?= $fetch_test['std']; ?>" selected><?= $fetch_test['std']; ?></option>
    
    </select required>
   

                <input type="text "
                name="subject" value="<?= $fetch_test['subject']; ?>"> 

                <input type="number"
                name="outoff"  value="<?= $fetch_test['out_off']; ?>"> 
            
                <input type="text"
                name="lesson" value="<?= $fetch_test['lesson']; ?>"> 

                
      
           
             
              </div>
            </div>


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
              <th>student_id</th>
              <th>student name</th>
              <th>marks obtained</th>
              <th>out off</th>
             
              
             
            </tr>
          </thead>
          <tbody>
          <form action="" method="post">
          <input type="hidden" name="test_id" value="<?= $fetch_test['test_id']; ?>"> 
  <?php
  $standard=$fetch_test['std'];
  $select_name = $conn->prepare("SELECT * FROM `student_details` WHERE std=$standard ");
  $select_name->execute();
  if ($select_name->rowCount() > 0) {
      while ($fetch_name = $select_name->fetch(PDO::FETCH_ASSOC)) {
  ?>
          <tr> 
              <td><input type="text" name="student_id[]" value="<?= $fetch_name['student_id']; ?>" readonly></td>
              <td><?= $fetch_name['name']; ?> <?= $fetch_name['father']; ?> <?= $fetch_name['surname']; ?></td>
              <td><input type="text" name="marks[]" placeholder="mark"></td>
              <td><?= $fetch_test['out_off']; ?></td>
          </tr>
  <?php
      }
  } else {
      echo '<tr><td colspan="6">No Record available!</td></tr>';
  }
  ?>

<?php
      }
  } else {
      echo '<tr><td colspan="6">No Record available!</td></tr>';
  }
  ?>
  <tr>
      <td colspan="4"><button type="submit" name="submit">Submit</button></td>
  </tr>
</form>
            <!-- Add more rows for other students if needed -->
          </tbody>
        </table>
               
                </div>
              </div>
           

           
  
          
    
    
    </main>

    <script src="script.js"> </script>
  </body>
</html>