​<?php
include "config.php";
if (isset($_GET['id'])) {
    $Id = $_GET['id'];
    $sql = "DELETE FROM files WHERE id ='$Id'";
     $result = $conn->query($sql);
     if ($result == TRUE) {
        echo "Record deleted successfully.";
        header('Location: view.php');
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}
?>