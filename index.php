<!DOCTYPE HTML>
<html>

<head>
    <title>User List</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">

        <div class="page-header">
            <h1>Read Users</h1>
        </div>

        <!-- // link to create record form -->
        <a href='create.php' class='btn btn-primary m-b-1em'>Create New User</a>


        <!-- PHP code to read records will be here -->
        <?php
        // include database connection
        include 'config/database.php';



        // select all data
        $query = "SELECT id, name, gender, description FROM users ORDER BY id DESC";
        $stmt = $conn->query($query);


        // this is how to get number of rows returned
        $num = $stmt->num_rows;



        //check if more than 0 record found
        if ($num > 0) {

            // data from database will be here
            echo "<table class='table table-hover table-responsive table-bordered'>"; //start table

            //creating our table heading
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Picture</th>";
            echo "<th>Name</th>";
            echo "<th>Gender</th>";
            echo "<th>Description</th>";

            echo "<th>Action</th>";
            echo "</tr>";

            // table body will be here
            // retrieve our table contents
            // fetch() is faster than fetchAll()
            // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
            while ($row = $stmt->fetch_array()) {

                // creating new table row per record
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                // echo "<td><img src='https://www.flaticon.com/svg/static/icons/svg/403/403554.svg'/></td>";
                echo "<td><img src='asset/picture.svg'/></td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['gender']}</td>";
                echo "<td>{$row['description']}</td>";

                echo "<td>";
                // read one record 
                echo "<a href='read_one.php?id={$row['id']}' class='btn btn-info m-r-1em'>Read</a>";

                // we will use this links on next part of this post
                echo "<a href='update.php?id={$row['id']}' class='btn btn-primary m-r-1em'>Edit</a>";

                // we will use this links on next part of this post
                echo "<a href='#' onclick='delete_user({$row['id']});'  class='btn btn-danger'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }

            // end table
            echo "</table>";

            // ////////////////////////////////////////////////////////////////////////////////////////////////////



        }

        // if no records found
        else {
            echo "<div class='alert alert-danger'>No records found.</div>";
        }
        ?>

    </div> <!-- end .container -->

    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->


<?php
    // delete message prompt will be here
        //if action param in the url, set it to $action
        $action=isset($_GET['action']) ? $_GET['action'] : '';
        if($action=='deleted'){
            // header("Location: index.php");
            echo "<div class='primary primary-success>Record deleted sucessfully.</div>";
        }
?>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->
    <script text='text/javascript'>
        function delete_user(id){
            var answer=confirm('Are you sure?');
            if(answer){
                window.location.assign('delete.php?id='+id);
            }
        }
    </script>

</body>

</html>