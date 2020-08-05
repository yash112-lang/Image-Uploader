<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Images</title>
</head>
<body>
<center>
    <h1>Please select an image to Upload</h1>
<form action="index.php" method="post" enctype = "multipart/form-data">

<label for="id">Id:</label>
<input type="text" name = "id" id = "id">
<br>
<br>
<br>
<label for="name">Name</label>
<input type="text" name="name" id="name">



<br>
<br>
<br>
<label for="email">email</label>
<input type="email" name="email" id="email">


<br>
<br>
<br>
<label for="shift">shift</label>
<input type="text" name="shift" id="shift">


<br>
<br>
<br>
<label for="image_upload"><h2>Select Image</h2></label>
<input type="file" name="image" id="image">
<br>
<br>
<br>
<input type="submit" value="submit" name = "submit">
</center>
</form>












<?php
if(isset($_POST['submit']))
{
    $image = $_FILES['image']['name'];
    $target = "images/".basename($_FILES['image']['name']);
    
    
    
    
    
    $conn = mysqli_connect("localhost", "root", "", "images_uploader");
    $msg = "";

if( $conn)
{
    echo "Connected Successfully";
}
else
{
    echo "There was an error while connecting to database".mysqli_connect_error($conn);
}

if($conn)
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $shift = $_POST['shift'];
    $image = $_FILES['image']['name'];
    
    $sql = "INSERT INTO images(id, name, email, image, shift) VALUES('$id', '$name', '$email', '$image', '$shift')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        echo "Query Fired successfully";
    }
    else
    {
        echo "There was an error while executing the query". mysqli_error($conn);
    }
    if(move_uploaded_file($_FILES['image'] ['tmp_name'], $target))
    {
        $msg = "File uploaded successfully.";
    }
    else
    {
        $msg = "There was an error while uploading the files.".mysqli_error($conn);
    }
    echo $msg;
}
}

?>


<a href="show.php" style="color: black; font-size: larger; text-decoration: none; border: 2px solid black;">Show images</a>
















</body>
</html>