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
              border: 1px solid #ddd;
            }
          
            th, td {
              padding: 8px;
              text-align: center;
              border-bottom: 1px solid #ddd;
            }
          
            th {
              background-color: #f2f2f2;
            }
          
            input {
              width: 100%;
              padding: 5px;
              box-sizing: border-box;
            }
          
            #submit-btn {
              margin-top: 10px;
              text-align: right;
            }
          </style>
          </head>
          <body>
          
          <table>


            <tr>
                <th>  <label for="standard">standard<span>*</span></label>
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
    </select required> </th>
                
                <th> <input type="submit" value="Add timetable"> </th>
                <!-- Add more columns if needed -->
              </tr>
              
            <tr>
              <th>Days</th>
              <th>Teacher</th>
              <th>subject</th>
             
              <!-- Add more columns if needed -->
            </tr>
            <tr>
              <td>Monday</td>
              <td><input type="text" name="" ></td>
              <td><input type="text" name=""></td>
        
            </tr>
            <tr>
              <td>Tuesday</td>
              <td><input type="text" name=""></td>
              <td><input type="text" name=""></td>
            
            </tr>

            <tr>
                <td>Wednesday</td>
                <td><input type="text" name=""></td>
                <td><input type="text" name=""></td>
              
              </tr>


              <tr>
                <td>Thursday</td>
                <td><input type="text" name=""></td>
                <td><input type="text" name=""></td>
              
              </tr>


              <tr>
                <td>Friday</td>
                <td><input type="text" name=""></td>
                <td><input type="text" name=""></td>
              
              </tr>



              <tr>
                <td>saturday</td>
                <td><input type="text" name=""></td>
                <td><input type="text" name=""></td>
              
              </tr>


              <tr>
                <td>sunday</td>
                <td><input type="text" name=""></td>
                <td><input type="text" name=""></td>
              
              </tr>
            <!-- Add more rows for other days -->
          </table>
          
          <div id="submit-btn">
            <button type="button">Submit</button>
          </div>
          
           
               
                </div>
              </div>
           

           
  
          
    
    
    </main>

    <script src="script.js"> </script>
  </body>
</html>