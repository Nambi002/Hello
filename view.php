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
   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
     <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body{  
            padding:30px;
            font-family:"poppins",sans-serif;
            background:#E7E9EB;
            display:flex;
            justify-content:center;
            align-items:center;
      
        }
        table{
            border-collapse: collapse;
            width:100%;
            margin-top:3%;  
            color:#000404;
            background:#fff;   
            text-align: center;        
        }       
     /*   tr:hover {background-color: #E7E9EB;} */

        tr:nth-child(even) {background-color:  #F2F2F2;}
  
        button a{
             color:#fff;
            text-decoration:none;
        }
        button{
             font-size:16px;
          
            margin-top:10px;
            padding:10px;
            background:#000404;
             color:#F4F4F4;
            opacity:1px;
            border-radius:40px;
        }
        .container{
            width:100%;
            color:#000404;
     
        }
        h2{
            font-weight:600;
            margin-bottom:20px;
            margin-top:50px;
            color:#000404;
            font-size:30px;

        }
        td a{
            color:#000404;
            padding:1px;            
        }
        td{
             padding:8px;
        }
        tr th{
            background:#1f1f1f;  
             color:#fff;   
             padding:8px;
        }
       #ss{
        padding-right:20px;
       
}





.top-bar{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.back-btn{
    background:#2c2c2c;
    color:white;
    padding:8px 16px;
    text-decoration:none;
    border-radius:6px;
}

       
    
    </style>
</head>
<body>
    <div class="container">
    
   

    <div class="top-bar">
    <h1>File Location</h1>
    <a href="main.php" class="back-btn">Back</a>
    </div>
    

    <table border="1" cellpadding="5">               
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Unique_id</th>
            <th>Action</th>
            <th>Download</th>
        </tr>

        <?php while($row=mysqli_fetch_assoc($result)) {?>

        <tr>
            <td><?=$row['Id']?></td>
            <td><?=$row['Name']?></td>
            <td><?=$row['Unique_id']?></td>       
            <td><a href="uploads/<?=basename($row['File_name'])?>" target="_blank"> <span class="fa fa-eye" id="ss"> </span></a>

      

     
        <a href="edit.php?id=<?=($row['Id'])?>" ><span class="fa fa-pen-to-square" id="ss"></span></a>

        <a href="delete.php?id=<?=($row['Id'])?>"  ><span class="fa fa-trash" id="ss"> </span></a>
         </td>  
         <td>

        <a href="download.php?id=<?=($row['Id'])?>" ><span class="fa-solid fa-download" id="ss"></span></a></td>
      </td>                                                               
        </tr>
        <?php }?>
    </table>
</div>
  
</body>
</html>