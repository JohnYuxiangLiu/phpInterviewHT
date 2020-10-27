<?php

@include 'config/database.php';

$id=isset($_GET['id']) ? $_GET['id'] : die('Record ID not found.');

$query="DELETE FROM users WHERE id=$id";

if($conn->query($query)){
    // echo "<div class='primary primary-success>Record deleted sucessfully.</div>";
    header('Location: index.php?action=deleted');
}else{
    // echo "<div class='primary primary-danger'>Fail to delete record.</div>";
    die('Unable to delete record.');
}


?>