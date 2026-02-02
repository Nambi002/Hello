
<?php
$conn= mysqli_connect("localhost","root","","cruddatabase");
$msg="";

if(isset($_POST['upload'])){
    $Name = $_POST['name'];
    $File_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $unique_name = uniqid();
    $folders = "uploads/".$unique_name;

    if(move_uploaded_file($tmp_name,$folders)){
        $sql = "INSERT INTO files(name, Unique_id, File_name) VALUES('$Name','$unique_name','$folders')";

        if(mysqli_query($conn,$sql)){
             $msg="Success";
        }else{
             $msg="db_error";
        }
    }else{
            $msg="fail";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .main{
            width:600px;
            display:flex;
            
            
          

        }
        </style>
</head>
<body>
    <div class="main">
    <div class="container-sm m-5">
          <div class="container-fluid">
    <h2>File Upload System</h2>

    <p style="color:green"><?php if($msg) echo "<p>$msg</p>"?></p>
  


    <form method="POST" enctype="multipart/form-data">

    <div class="input-group input-group-sm mb-3">
        <input type="text" name="name" placeholder="Enter Name" class="form-control"  required>
    </div>
    <div class="input-group input-group-sm mb-3">
        <input type="file" name="file" class="form-control" id="inputGroupFile02" required>
</div>
        <button type="submit" name="upload" class="btn btn-dark">Upload</button>

    </form>

   <br>
    
    <p><a href="view.php" class="link-secondary">Views</a></p>
   
    </div>

</div>
</div>
</body>
</html>