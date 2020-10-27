<!DOCTYPE HTML>
<html>

<head>
    <title>Read User Details</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <!-- container -->
    <div class="container">

        <div class="page-header">
            <h1>Read User</h1>
        </div>

        <a href='index.php' class='btn btn-danger' style="margin-bottom:20px">Back to user list</a>

        <!-- PHP read one record will be here -->
        <?php
        // get passed parameter value, in this case, the record ID
        // isset() is a PHP function used to verify if a value is there or not
        $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

        //include database connection
        include 'config/database.php';

        $query = "SELECT id, name, gender, description FROM users WHERE id = $id LIMIT 0,1";
        // read current record's data
        if ($stmt = $conn->query($query)) {
            if ($stmt->num_rows > 0) {



                // store retrieved row to a variable
                while ($row = $stmt->fetch_array()) {

                    // values to fill up our form
                    $name = $row['name'];
                    $description = $row['description'];
                    $gender = $row['gender'];





                    // ///////////////////////////////////////////////////////////////////////
                    echo "

                        <div class='card-container'>
                            <div class='card ' style='width: 20rem;'>
                                <img href='#' class='card-img-top img-card' src='asset/picture.svg' alt='Card image cap'>

                                <div style='margin-bottom:20px' >
                                    <h1 style='text-align:center'>$name</h1>
                                    <h4 style='text-align:center; color:grey; font-size:10px'>$gender</h4>
                                </div>

                                <div style='text-align:center; font-size:20px; margin-bottom: 50px;'>
                                    <bold>$description</bold>

                                </div>
 
            
                                <div class='card-button'>
                                <a href='update.php?id={$id}' class='btn btn-primary button'>Edit</a>
                                <a href='#' class='btn btn-danger button' onclick='delete_user($id);'>Delete</a>
                            </div>
                            </div>
                        </div>

                        ";
                }
            }
        }
        ?>



    </div> <!-- end .container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- ///////////////////////////////////////////////////////// -->
    <script type='text/javascript'>
        function delete_user(id){
            var answer=confirm('Are you sure?');
            if(answer){
                window.location.href='delete.php?id='+id;
            }
        }

    </script>

</body>

</html>