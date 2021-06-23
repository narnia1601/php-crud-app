<?php 
    function renderForm($first=null,$last=null,$id=null){ ?>
        <!DOCTYPE html>
        <html lang="en">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="jquery.js"></script>
        <link rel="stylesheet" href="style.css">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php if(isset($id)){ echo "Edit Record ";} else{ echo "New Record"; } ?></title>
        </head>
        <body>
            <h1><?php if(isset($id)){ echo "Edit Record ";} else{ echo "New Record"; } ?></h1>
            <form action="update.php?id=<?php echo $id ?>" method="POST" id="form">
                <strong>First Name: *</strong><input type="text" class="required" name="firstname" value="<?php echo $first ?>">
                <strong>Last Name: *</strong><input type="text" class="required" name="lastname" value="<?php  echo $last ?>">
                <input type="submit" name="submit">
            </form>
            <p style="color:red;">* required</p>
            <script src="script.js"></script>
        </body>
        </html>
    <?php }
    include('connect-db.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = $mysqli->prepare("SELECT id, firstname, lastname FROM users WHERE id = ?");
        $result->bind_param('i',$id);
        $result->execute();
        $stmt = $result->get_result();
        while($user = $stmt->fetch_assoc()){
            $first = $user['firstname'];
            $last = $user['lastname'];
        }
        renderForm($first,$last,$id);
    }else{
        renderForm();
    }
    $mysqli->close();
?>