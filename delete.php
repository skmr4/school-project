<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="deleteDiv">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <label>Name:</label>
            <br>
            <input type="text" name="name">
            <br>
            <label>ID:</label>
            <br>
            <input type="number" name="id">
            <br>
            <input type="submit" value="Delete" name="del">
        </form>
    </div>
</body>
</html>
<?php
    require_once 'connection.php';
    if(isset($_POST['del'])){
        $s = "SELECT * FROM student WHERE name = :na AND id = :id";
        $stmt = $con->prepare($s);
        $name = htmlspecialchars( $_POST['name']);
        $id = htmlspecialchars($_POST['id']);
        $stmt->bindParam(' :na', $name);
        $stmt->bindParam(' :id', $id);
        $stmt->execute();
        $std = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($std){
            $sql = "DELETE FROM student WHERE name = :na AND id = :id";
            $stmt->execute()([
            ':na'=>$name,
            ':id'=>$id
        ]);
        $stmt->execute();
        echo 'Successfully!';
        echo "<script> setTimeout(function(){window.location.href = 'index.php';},200);) </script>";
    }else{
        echo 'Faild! you inter false data';
    }
    }
?>