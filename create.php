<!DOCTYPE HTML>
<html>

<head>
    <title>Dating User Profile</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>

<body>

    <!-- container -->
    <div class="container">

        <div class="page-header">
            <h1>Create User</h1>
        </div>

        <!-- PHP insert code will be here ---------------------------------------------------------------------------------->
        <?php
        if ($_POST) {

            // include database connection
            include 'config/database.php';


            // posted values
            $name = htmlspecialchars(strip_tags($_POST['name']));
            $description = htmlspecialchars(strip_tags($_POST['description']));
            $gender = htmlspecialchars(strip_tags($_POST['gender']));

            // insert query
            $query = "INSERT INTO users (name, gender, description) VALUES ('$name', '$gender', '$description')";


            // specify when this record was inserted to the database
            $created = date('Y-m-d H:i:s');


            // Execute the query
            if (mysqli_query($conn, $query)) {
                echo "<div class='alert alert-success'>Records inserted successfully.</div>";
            } else {
                echo "<div class='alert alert-danger'>Fail to insert records.</div>" . mysqli_error($conn);
            }
        }
        ?>

        <!-- html form to create user will be here ------------------------------------------------------------------------>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <a href='index.php' class='btn btn-danger' style="margin-bottom:20px">Back to user list</a>

            <table class='table table-hover table-responsive table-bordered ' >
                <tr>
                    <td>Name</td>
                    <td><input type='text' name='name' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <input type="radio" name="gender" value="male"> Male<br>
                        <input type="radio" name="gender" value="female"> Female<br>
                    </td>
                    <!-- <td><input type='text' name='price' class='form-control' /></td> -->
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name='description' class='form-control'></textarea></td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save' class='btn btn-primary' />
                        
                    </td>
                </tr>
            </table>
        </form>

    </div> <!-- end .container -->




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>