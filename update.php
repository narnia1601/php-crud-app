<?php 
    include('connect-db.php');
    if($_GET['id'] == null){
        $first = $_POST['firstname'];
        $last = $_POST['lastname'];
        $stmt = $mysqli->prepare("INSERT INTO users(firstname,lastname) VALUES (?,?)");
        $stmt->bind_param("ss", $first, $last);
        $stmt->execute();
        $stmt->close();
        header("Location: view.php");
    }else if($_GET['id'] != null){
        $first = $_POST['firstname'];
        $last = $_POST['lastname'];
        $id = $_GET['id'];
        $stmt = $mysqli->prepare("UPDATE users SET firstname=?, lastname=? WHERE id=?");
        $stmt->bind_param('ssi', $first, $last, $id);
        $stmt->execute();
        $stmt->close();
        header("Location: view.php");
    }
?>