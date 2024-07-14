<?php  include 'connect.php' ?>

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


  

    <main class="main" >
      <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 100%;
            margin: 0 auto;
            padding: 50px;
            padding-top: 100px;

        }
        .box {
            width: calc(33% - 10px);
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 20px;
            border-radius: 10px;
            text-align: center;
        }

        p{
          font-size: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <h3>number of student</h3>
            <?php 
                 $select_accounts = $conn->prepare("SELECT * FROM `student_details`");
                 $select_accounts->execute();
                 $no_std = $select_accounts->rowCount(); 
            ?>
            <p><?php echo $no_std ?></p>
        </div>
        <div class="box">
            <h3>total admin</h3>
            <?php 
                 $select_admin = $conn->prepare("SELECT * FROM `admin`");
                 $select_admin->execute();
                 $no_admin = $select_admin->rowCount(); 
            ?>
            <p><?php echo $no_admin?></p>
            
        </div>
        <div class="box">
            <h3>parents login</h3>
            <?php 
                 $select_user = $conn->prepare("SELECT * FROM `parent`");
                 $select_user->execute();
                 $no_user = $select_user->rowCount(); 
            ?>
            <p><?php echo $no_user ?></p>
        </div>

      
        

    
    </main>

    <script src="script.js"> </script>
  </body>
</html>