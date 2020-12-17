<?php
    session_start();
    include 'db_connect_forfileupload.php';
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>file upload</title>
</head>    
<body>

<form action="script_forprofile.php" method="POST" enctype="multipart/form-data" >
    <input type="file" name="file"><br><br>
    <button type="submit" name="send">UPLOAD</button>
</form>

</body>
</html>