<?php
include "config.php";
$id=$_GET['id'] ?? 0;

$result=mysqli_query($conn,"SELECT*from files where Id='$id'");
$row=mysqli_fetch_assoc($result);


if(isset($_POST['update'])){
   
    $name=$_POST['name'];
    $old_file=$_POST['file_name'];

    if($_FILES['file']['name'] != ""){
    $new_file = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];

    move_uploaded_file($tmp_name,"uploads/".$new_file);
    

    
    if(file_exists("uploads/".$old_file)){
    unlink("uploads/".$old_file);}

    mysqli_query($conn,"UPDATE files set Name='$name',file_name='$new_file' where Id='$id'");
    header("Location: view.php");
    }else{
          mysqli_query($conn,"UPDATE files set Name='$name', where Id='$id'");
    }
    header("Location: view.php");
    exit();

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body{
            margin:0;
            font-family:"poppins",sans-serif;
           
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            

            background:#E7E9EB;
             background-repeat: no-repeat;
            background-position: center;
            background-size: cover;

            
        }
        .card{
         background-color:transparent;
            backdrop-filter: blur(20px);
          
             width:500px;
            padding:30px 45px;
             border-radius:40px;
            box-shadow:40px 40px 40px rgba(0,0,0,0.2);
            border:1px solid black;
        
        }
        .card h2{
          font-weight:600;
            margin-bottom:20px;
          
             display:flex;
            justify-content:center;
            align-items:center;
        }
        label{
            font-size:16px;
            display:block;
            margin-bottom:1px;
            margin-top:18px;
            font-weight:600;
           
        }
        input[type="text"],input[type="file"]{
             background:transparent;
            width:100%;
            padding:10px;
            font-size:16px;
            border:1px solid #ccc;
            border-radius:6px;
            margin-bottom:1px;
            margin-top:10px;
            
        }

        button{
            width:100%;
            margin-top:40px;
            padding:13px;
             background:#000404;
             color:#F4F4F4;
            opacity:1px;
            border-radius:40px;
             margin-bottom:20px;
             cursor:pointer;
             font-size:18px;
             

        }
        p{
            color: #4AB1D4;
            font-size:18px;
            margin-bottom:20px;
            background-color:#000404;
            padding:20px;
            border-radius:40px;
            
      
            
        }
        input[type="file"]{
            padding:8px;
        }
        .error{
               color:red;
               font-size:16px;
                margin-top:40px;

        }
        input{
             display:block;
             padding:8px;
             margin-top:40px;
        }

       
    </style>

</head>
<body>
    
    

    <div class="card">
        <h2>Edit</h2>
        <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <label>Enter Name :</label>
                <input type="text" name="name" id="name" values="<?php echo $name ?>"  required>
                <small id="nameError" class="error"></small><br>
        
             <label>Your Previous File :</label>
            <p > <?php echo $row['File_name']?><br></p>
                   
             <label>New File Upload:</label>
                <input type="file" name="file" id="file">
                 <small id="fileError" class="error"></small>

            <button type="submit" name="update"   > Update </button>

            
</form>


    </div>

      <script>
function validateForm(){

    let name = document.getElementById("name").value.trim();
    let fileInput = document.getElementById("file");
    let file = fileInput.files[0];

    let nameError = document.getElementById("nameError");
    let fileError = document.getElementById("fileError");

    nameError.textContent = "";
    fileError.textContent = "";

    let isValid = true;

    // Name validation (letters only)
    let namePattern = /^[A-Za-z ]+$/;
    if(name === ""){
        nameError.textContent = "Name is required";
        isValid = false;
    }
    else if(!namePattern.test(name)){
        nameError.textContent = "Only letters allowed";
        isValid = false;
    }

    // File validation
    if(file){

        let maxSize = 5 * 1024 * 1024; // 5MB
        if(file.size > maxSize){
            fileError.textContent = "File must be less than 5MB";
            isValid = false;
        }

        let allowedTypes = ["application/pdf","image/jpeg","image/png"];
        if(!allowedTypes.includes(file.type)){
            fileError.textContent = "Only PDF, JPG, PNG allowed";
            isValid = false;
        }
    }

    return isValid;
}
</script>
</body>
</html>