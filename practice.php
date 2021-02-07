<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <?php require_once 'process.php'; ?>
    <?php 
        if(isset($_SESSION['message'])):
    ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif; ?>
    <?php
        $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
        $result = $mysqli -> query("SELECT * FROM data") or die($mysqli->error);
        // function pre_r($arr) {
        //     echo "<pre>";
        //     print_r($arr);
        //     echo "</pre>";
        // }
        // pre_r($result);
        // pre_r($result -> fetch_assoc());
        // pre_r($result -> fetch_assoc());
        // pre_r($result -> fetch_assoc());
        // pre_r($result -> fetch_assoc());

    ?>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = $result-> fetch_assoc()):
                    ?>
                    <tr>
                        <td><?php echo  $row['name']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td>
                            <a href="process.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                            <a href="process.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="row justify-content-center">
            <form action="process.php" method="post">
                <div class="form-group">
                    <label for="name">Name :</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" value="<?php echo $name;?>"/>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" class="form-control" id="location" placeholder="Enter your location" value="<?php echo $location;?>"/>
                </div>
                <div class="form-group">
                    <?php
                        // if($update == true): 
                    ?>
                    <button type="submit" class="btn btn-info" name="update">Update</button>
                    <?php 
                        // else: 
                    ?>
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                    <?php 
                        // endif; 
                    ?>
                </div>
            </form>
        </div>
    </div>
</body>
</html>