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
                  <h1>attendence details </h1>
        
        
                  <div class="container" style="margin-bottom: 30px;">
                    <input type="checkbox" id="check">
                    <div class="login form">
                     
                      <form action="#">
                
                    <input type="text"
                        name="name"
                        placeholder="Enter student id"> 
        
                    
        
                        
        
                        <select id="role">
                          <option value="" selected disabled>Select your std</option>
                          <option value="teacher">teacher</option>
                          <option value="sub-admin">sub-admin</option>
                          <option value="admin">admin</option>
                        </select required>
        
                     
                    
        
        
                      
                        <input type="button" class="button" value="submit ">
                      </form>
                     
                      </div>
                    </div>
        

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
        
        <th>Student ID</th>
        <th>Student Name</th>
        <th>Standard</th>
        <th>contact No</th>
        <th>this months persent</th>
        <th>this months absent</th>
        <th>last month attendence % </th>
        <th>total attendence %</th>
        <th>action</th>

        
       
      </tr>
    </thead>
    <tbody>
      <!-- Add rows for each student below -->
      <tr>
        
        <td>GA456</td>
        <td>John Doe</td>
        <td>10th</td>
        <td>9769459795</td>
        <td>21</td>
        <td>9</td>
        <td>89%</td>
        <td>70%</td>
        <td><a href="student_profile.php"><button>view</button> </a> </td>

      </tr>
      <tr>
      
      <td>GA456</td>
      <td>John Doe</td>
      <td>10th</td>
      <td>9769459795</td>
      <td>21</td>
      <td>9</td>
      <td>89%</td>
      <td>70%</td>
      <td><a href="student_profile.php"><button>view</button> </a> </td>
      </tr>
      <!-- Add more rows for other students if needed -->
    </tbody>
  </table>
  
          
    
    
    </main>

    <script src="script.js"> </script>
  </body>
</html>