<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show images</title>
</head>
<body>
    <center>
        <h2>Uploaded images</h2>
        <a href="index.php">Upload</a>
    </center>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "images_uploader");
    if($conn){
        printf("Connected successfully.");
        $sql = "SELECT * FROM images";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result))
        {
            echo "<center>";
            // echo "<div id = 'img_div'>";
            echo "<a target = _blank><img src = 'images/".$row['image']."'. alt='There is no image to show'></a>";
            echo "<br>";
            echo $row['id'];
            echo "<br>";
            echo $row['name'];
            echo "<br>";
            echo $row['email'];
            echo "<br>";
            echo $row['shift'];
            echo "<br>";
            echo "</center>";
            echo "<hr>";
            
        }
    }
    else{
        print("There was an error while connecting to database.");  
    }

    ?>

</body>
</html>