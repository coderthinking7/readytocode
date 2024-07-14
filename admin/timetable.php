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
  width: 32%;
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
          <h1>time-tables </h1>


            <div class="container" style="margin-top: 1 rem;">
              <input type="checkbox" id="check">
              <div class="login form" >
               
                <style>
                  table {
                    border-collapse: collapse;
                    width: 50%; 
                    display: inline;
                   margin: 30px;
                  }
                
                  th, td {
                    border: 1px solid black;
                    padding: 5px;
                    text-align: center;
                  }
                
                  th {
                    background-color: #f2f2f2;
                  }
      
                
                </style>
               
      
               <table class="table1">

               


                <thead>

                    <tr>
                        <th colspan="3">9th  <button>modify</button> <button>delete</button> </th>
                    </tr>

                  <tr>
                    
                    <th>Day</th>
                    <th>Teacher Name</th>
                    <th>Subject</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    
                    <td>Monday</td>
                    <td> raj</td>
                    <td>Mathematics</td>
              

                    
                  </tr>
                  <tr>
                    
                    <td>Tuesday</td>
                    <td>Jane Smith</td>
                    <td>Science</td>
                  </tr>
                  <tr>
                    <td>Wednesday</td>
                    <td>David </td>
                    <td>English</td>
                  </tr>
        
                  <tr>
                    <td>Monday</td>
                    <td> raj</td>
                    <td>Mathematics</td>
                    
                  </tr>
                  <tr>
                    <td>Tuesday</td>
                    <td>Jane </td>
                    <td>Science</td>
                  </tr>
                  <tr>
                    <td>Wednesday</td>
                    <td>David </td>
                    <td>English</td>
                  </tr>
                  <tr>
                    <td>Wednesday</td>
                    <td>David </td>
                    <td>English</td>
                  </tr>
                
                
                </tbody>
              </table>
           

              
              <table class="table">
               
                <thead>

                    <tr>
                        <th colspan="3">9th  <button>modify</button> <button>delete</button> </th>
                    </tr>
                  <tr>


                  
                    <th>Day</th>
                    <th>Teacher Name</th>
                    <th>Subject</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                   
                    <td>Monday</td>
                    <td> raj</td>
                    <td>Mathematics</td>
                    
                  </tr>
                  <tr>
                    
                    <td>Tuesday</td>
                    <td>Jane Smith</td>
                    <td>Science</td>
                  </tr>
                  <tr>
                    <td>Wednesday</td>
                    <td>David </td>
                    <td>English</td>
                  </tr>
        
                  <tr>
                    <td>Monday</td>
                    <td> raj</td>
                    <td>Mathematics</td>
                    
                  </tr>
                  <tr>
                    <td>Tuesday</td>
                    <td>Jane </td>
                    <td>Science</td>
                  </tr>
                  <tr>
                    <td>Wednesday</td>
                    <td>David </td>
                    <td>English</td>
                  </tr>
                  <tr>
                    <td>Wednesday</td>
                    <td>David </td>
                    <td>English</td>
                  </tr>
                
                
                </tbody>
              </table>
           
               
                </div>
              </div>
           

           
  
          
    
    
    </main>

    <script src="script.js"> </script>
  </body>
</html>