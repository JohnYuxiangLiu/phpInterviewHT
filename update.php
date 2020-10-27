<!DOCTYPE HTML>
<html>

<head>
    <title>Update User</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>

<body>

    <!-- container -->
    <div class="container">

        <div class="page-header">
            <h1>Update User</h1>
        </div>

        <a href='index.php' class='btn btn-danger'>Back to list users</a>

        <!-- PHP read record by ID will be here -->
        <?php
        // get passed parameter value, in this case, the record ID
        // isset() is a PHP function used to verify if a value is there or not
        $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

        //include database connection
        include 'config/database.php';

        // read current record's data
        $query = "SELECT id, name, gender, description FROM users WHERE id = $id LIMIT 0,1";
        if ($stmt = $conn->query($query)) {
            if (mysqli_num_rows($stmt) > 0) {
                while ($row = $stmt->fetch_array()) {

                    // values to fill up our form
                    $name = $row['name'];
                    $description = $row['description'];
                    $gender = $row['gender'];
                }
            }
        } else {
            echo "ERROR: Could not able to execute $conn. " . $mysqli->error;
            
        }

        ?>

        <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <!-- php update record code------------------------------------------------------------------------- -->
        <?php
        if ($_POST) {
            $name_post = htmlspecialchars(strip_tags($_POST['name']));
            // $gender_post = htmlspecialchars(strip_tags($_POST['gender']));
            $gender_post=$_POST['gender'];
            $description_post = htmlspecialchars(strip_tags($_POST['description']));

            $query = "UPDATE users SET name='$name_post', gender='$gender_post', description='$description_post' WHERE id='$id'  ";

            if ($conn->query($query)) {
                echo "<div class='alert alert-success'>Record were updated sucessfully.</div>";
            } else {
                echo "<div class='alert alert-danger'> Fail to update record.</div>";
            }
        }
        ?>

        <!--we have our html form here where new record information can be updated-->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>Name</td>
                    <td><input type='text' name='name' value="<?php echo htmlspecialchars($name, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <input type="radio" name="gender" value="male" > Male<br>
                        <input type="radio" name="gender" value="female" > Female<br>
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name='description' class='form-control'><?php echo htmlspecialchars($description, ENT_QUOTES);  ?></textarea></td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save Changes' class='btn btn-primary' />
                        
                    </td>
                </tr>
            </table>
        </form>



    </div> <!-- end .container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- gender radio button checked check------------------------------- -->
    <script type='text/javascript'>
        function gender_checked(){
            if($gender=='male'){
                return true;
            }
            else{
                return false;
            }
        }
    
    </script>
<!-- -------------------------------------------------------------------------- -->


</body>

</html>