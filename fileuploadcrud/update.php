<?php
$conn= mysqli_connect("localhost","root","","cruddatabase");
$Id=$_GET['Id'];

$res=mysqli_query($conn,"SELECT*from files where Id=$Id")
$row=mysqli_fetch_assoc($res);

if(isset($_POST['update'])){
    $Name=$_POST['Name'];
    mysqli_query($conn,"Update files set Name='$Name' where Id=$Id");
     header("Location: view.php");
    }
?>

 <h2>Update Form</h2>
        <form action="" method="post">
          <fieldset>
            <legend>information:</legend>
            Name:<br>
            <input type="text" name="Name" value="<?php $row['Name'] ?>">
            <button type="submit" name="update" >update</button>
   
          </fieldset>
        </form>
        </body>
        </html>