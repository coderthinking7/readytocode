<?php

@include 'connect.php';

if(isset($_POST['submit'])){

   $note =  $_POST['note'];
   $std =  $_POST['std'];

   $insert_notice = $conn->prepare("INSERT INTO `notice` (note,std) VALUES(?,?)");
   $insert_notice->execute([$note,$std]);
   echo 'notice send successfully!';
  
   
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
  width: 18%;
  display: inline;
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
          <h1>send notification </h1>


          <div class="container">
            <input type="checkbox" id="check">
            <div class="login form">
             
              <form  action="" method="post" >
        
               <style>
                textarea{
                    width:78%;
                    height: 150px;
                  

                }

                .button{
                    float:right;
                  
                }
               </style>
                  
        
                <textarea type="text" id="note"  name="note" placeholder="write the message here !"  >

                </textarea>

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

              
              
    <input type="submit" name="submit" value="Submit">
              </form>
             
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
              <th>date</th>
              <th>time</th>
              <th>for</th>
              <th width='70%' ;>message</th>
              
             
            </tr>
          </thead>
          <tbody>
          <?php
      $select_accounts = $conn->prepare("SELECT * FROM `notice`");
      $select_accounts->execute();
      if($select_accounts->rowCount() > 0){
         while($fetch_accounts = $select_accounts->fetch(PDO::FETCH_ASSOC)){   
   ?>

            <!-- Add rows for each student below -->
            <tr>
              <td><?= $fetch_accounts['date']; ?></td></td>
              <td><?= substr($fetch_accounts['time'], 0, 5); ?></td></td>
              <td><?= $fetch_accounts['std']; ?></td></td>
              <td><?= $fetch_accounts['note']; ?></td></td>
              
             
      
            </tr>

            <?php
         }
      }else{
         echo '<p class="empty">no accounts available!</p>';
      }
   ?>
       
          </tbody>
        </table>
               
                </div>
              </div>
           

           
  
          
    
    
    </main>

    <script src="script.js"> </script>
  </body>
</html>