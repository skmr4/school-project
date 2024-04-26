<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heroes School</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    require_once 'connection.php';
    //$_POST['id']
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['add'])){
        $name = $_POST['sname'];
        $add = $_POST['sadd'];
        $num = $_POST['snum'];
        $deg = $_POST['sdeg'];
        $sql = "INSERT INTO student (name, address, number, degree) VALUE (:name, :add, :num, :deg)";
        $stmt = $con->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':add', $add);
            $stmt->bindParam(':num', $num);
            $stmt->bindParam(':deg', $deg);
                $id = $con->lastInsertId();
                $stmt->execute();
                // if($stmt->execute()){
                //     header('location:success.php');
                // }
                // else{
                //     echo 'ERROR, FAILD INSERT'; 
                // }
        }
    }
    ?>
    <div id="mainDiv">
        <h3>Welcome to the School of Heroes control page</h3>
        <form method="POST">
            <aside>
                <div id="aside">
                    <label for="sname">Student Name:</label>
                    <br>
                    <input type="text" id="sname" name="sname">
                    <br>
                    <label for="sadd">Student Adress:</label>
                    <br>
                    <input type="text" id="sadd" name="sadd">
                    <br>
                    <label for="snum">Student Number Phone:</label>
                    <br>
                    <input type="text" id="snum" name="snum">
                    <br>
                    <label for="snum">Student Degree:</label>
                    <br>
                    <input type="text" id="sdeg" name="sdeg">
                    <br>
                    <button name="add">Add Student</button>
                    <br>
                    <a href="delete.php" name="dellink">Delete Student</a>
                </div>
            </aside>
            <main>
                <table width = 100%>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Degree</th>
                    </tr>
                        <?php
                        $sql = "SELECT * FROM student";
                        $stmt = $con->prepare($sql);
                        $stmt->execute();
                        $std = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if($std){
                            foreach($std as $s){
                                echo '<tr><td>' . $s['id'];
                                echo '</td><td>' . $s['name'];
                                echo '</td><td>' . $s['address'];
                                echo '</td><td>' . $s['number'];
                                echo '</td><td>' . $s['degree'] . '</td></tr>';
                            }
                        }
                        ?>
                </table>
            </main>
        </form>
    </div>
</body>
</html>