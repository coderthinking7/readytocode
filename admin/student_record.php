<?php include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gravity</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>

<?php include 'include/header.php' ?>

<main class="main" style="padding: 100px 50px;">

    <style>
        .container{
            max-width: auto;
            width: 100%;
            background: #fff;
            border-radius: 7px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.3);
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
        .form input, select {
            height: 40px;
            width: 30%;
            display: inline;
            padding: 0 10px;
            font-size: 15px;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            outline: none;
            margin: 10px;
        }
        .form input:focus{
            box-shadow: 0 1px 0 rgba(0,0,0,0.2);
        }
        .form a{
            font-size: 15px;
            color: cornflowerblue;
            text-decoration: none;
        }
        .form a:hover{
            text-decoration: underline;
        }
        .form input.button{
            color: #fff;
            background: cornflowerblue;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: 0.4s;
            width: 30%;
        }
        .form input.button:hover{
            background: cornflowerblue;
            font-size: 20px;
        }
        h1{
            text-align: center;
            padding-bottom: 10px;
        }
    </style>

    <h1>Student Details</h1>

    <div class="container" style="margin-bottom: 30px;">
        <input type="checkbox" id="check">
        <div class="login form">
            <form action="" method="get">
                <input type="text" name="query" placeholder="Enter student id or name">
                <select name="std" id="standard">
                    <option value="" selected disabled>Select your standard</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="Other">Other</option>
                </select>
                <input type="submit" class="button" value="Search">
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
        h2 {
            text-align: center;
            padding-bottom: 10px;
        }
    </style>

    <h2>User Login</h2>

    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Parent Name</th>
                <th>Standard</th>
                <th>Contact No</th>
                <th>Button</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = isset($_GET['query']) ? $_GET['query'] : '';
            $std = isset($_GET['std']) ? $_GET['std'] : '';

            $sql = "SELECT * FROM student_details WHERE (name LIKE :query OR student_id LIKE :query)";
            if ($std) {
                $sql .= " AND std = :std";
            }

            $stmt = $conn->prepare($sql);
            $params = ['query' => '%' . $query . '%'];
            if ($std) {
                $params['std'] = $std;
            }
            $stmt->execute($params);

            if ($stmt->rowCount() > 0) {
                while ($fetch_accounts = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td>GM<?= $fetch_accounts['student_id']; ?></td>
                <td><?= $fetch_accounts['name']; ?></td>
                <td><?= $fetch_accounts['father']; ?></td>
                <td><?= $fetch_accounts['std']; ?></td>
                <td><?= $fetch_accounts['pcontact']; ?></td>
                <td><a href="student_profile.php?student_id=<?= $fetch_accounts['student_id'] ?>"><button>View</button></a></td>
            </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="6">No accounts available!</td></tr>';
            }
            ?>
        </tbody>
    </table>

</main>

<script src="script.js"></script>
</body>
</html>
