<?php
include "config.php";
    if (isset($_POST['update'])) {
        $Id = $_POST['Id'];
        $Name = $_POST['Name'];
        $File_name = $_POST['File_name'];
        
        $sql = "UPDATE `files` SET `Name`='$Name',`File_name`='$File_name WHERE `Id`='$Id'";
        $result = $conn->query($sql);
        if ($result == TRUE) {
            echo "Record updated successfully.";
            header('Location: view.php');
        }else{
            echo "Error:" . $sql . "<br>" . $conn->error;
        }

    }

if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];
    $sql = "SELECT * FROM files WHERE Id='$Id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $Id = $row['Id'];
            $Name = $row['Name'];
            $File_name = $row['File_name'];
        
        }
    ?>

        <h2>Update Form</h2>
        <form action="" method="post">
          <fieldset>
            <legend>information:</legend>
            Name:<br>
            <input type="text" name="Name" value="<?php echo $Name; ?>">
            <input type="hidden" name="Id" value="<?php echo $Id; ?>">
            <br>
            File_name:<br>
            <input type="file" name="age" value="<?php echo $File_name; ?>">
            <br>
            
            <br><br>
            <input type="submit" value="Update" name="update">
          </fieldset>
        </form>
        </body>
        </html>


    <?php
    } else{
        header('Location: view.php');
    }
}
?>