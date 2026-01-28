<?php
$conn= mysqli_connect("localhost","root","","cruddatabase");
$result=mysqli_query($conn,"SELECT * FROM files");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     <style>
        table{
            width:100%;
            margin-top:3%;        
        }       
        button a{
            color:#fff;
        }
        button{
            background-color:black;
            margin:0;
            display:flex;
            padding:0px 5px;          
        }
        .container{
            width:100%;
        }
        table tr td:last-child{
            width: 2px;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2>File Location</h2>
    <button class="btn btn-dark">
    <a href="main.php" >Back</a>
    </button>

    <table border="1" cellpadding="10">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Unique_id</th>
            <th>Files</th>
            <th>Action</th>
        </tr>

        <?php while($row=mysqli_fetch_assoc($result)) {?>

        <tr>
            <td><?=$row['Id']?></td>
            <td><?=$row['Name']?></td>
            <td><?=$row['Unique_id']?></td>       
            <td><a href="uploads/<?=basename($row['File_name'])?>" target="_blank">View <span class="fa fa-eye"></span></a></td>

        <td>
        <a href="edit.php?id=<?=($row['Id'])?>" class="mr-3" title="Update Record" ><span class="fa fa-pencil"></span></a>
        <a href="delete.php?id=<?=($row['Id'])?>" class="mr-3" title="delete Record" ><span class="fa fa-trash"></span></a>
</td>                                                               
        </tr>
        <?php }?>
    </table>
</div>
  
</body>
</html>