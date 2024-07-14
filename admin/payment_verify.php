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
        <th>screenshot </th>
        <th>transfer</th>
       
      </tr>
    </thead>
    <tbody>
      <!-- Add rows for each student below -->
      <tr>
        <td>23/03/2023</td>
        <td>GA456</td>
        <td>John Doe</td>
        <td>10th</td>
        <td>9769459795</td>
        <td>rajesh </td>
        <td>Gpay</td>
        <td>6000 </td>
        <td>view.png </td>
        <td>recevied </td>
     

      </tr>
      <tr>
        <td>26/09/2023</td>
        <td>GA456</td>
        <td>John Doe</td>
        <td>10th</td>
        <td>9769459795</td>
        <td>rajesh </td>
        <td>Gpay</td>
        <td>6000 </td>
        <td>view.png </td>
        <td>recevied </td>

      </tr>
      <!-- Add more rows for other students if needed -->
    </tbody>
  </table>
  
          
    
    
    </main>

    <script src="script.js"> </script>
  </body>
</html>