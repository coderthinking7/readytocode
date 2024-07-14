<?php include 'connect.php';



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
                  <h1>student details </h1>
        
        
                  <div class="container" style="margin-bottom: 30px;">
                    <div class="login form">


                     
                      <form action="" method= POST>
                
                        <input type="text" name="search_phone"  placeholder="Enter parent phone number"> OR
                        <input type="text" name="search_id"  placeholder="Enter student id">
                        <input type="submit" class="button" value="search ">
                        </form>
                        </div>
                  </div>

                  <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search_phone = $_POST['search_phone'];
        $search_id = $_POST['search_id'];

        if (!empty($search_name)) {
            $sql = "SELECT * FROM students WHERE phone_no ='$search_phone' ";
            
        } elseif (!empty($search_id)) {
            $sql = "SELECT * FROM students WHERE id='$search_id'";
        }  
      }



        ?>

                  <div class="container" style="margin-bottom: 30px;">
                        <div class="login form">

                        <form action="" method= POST>
                
                        <input type="text" name="name"  placeholder="Enter name ">
                        <input type="text" name="remaining amount"  placeholder="Enter remaining amount ">
                        <input type="text" name="total fees"  placeholder="Enter total fees ">
                        <input type="text" name="paid"  placeholder="Enter amount ">
        
                    
        
                        
        
                        <select id="mode">
                          <option value="" selected disabled>Select your mode</option>
                          <option value="cash">cash</option>
                          <option value="online">online</option>
                        
                        </select required>
        
                        <input type="submit" class="button" value="submit ">
                        </form>
        
        
                      
                       
                     
                     
                      </div>
                    </div>
        


        
  
  
          
    
    
    </main>

    <script src="script.js"> </script>
  </body>
</html>