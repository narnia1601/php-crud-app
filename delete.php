<?php
    include('connect-db.php');
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $id = $_GET['id'];
        if($stmt = $mysqli->prepare("DELETE FROM users WHERE id = ?")){
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $stmt->close();
        }else{
            echo "ERROR: ".$stmt->error;
        }
        header("Location: view.php");
        $mysqli->close();
    }else{
        header("Location: view.php");
    }
?>