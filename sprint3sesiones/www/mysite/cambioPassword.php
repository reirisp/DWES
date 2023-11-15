<?php
    $db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail');
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if (empty($password1) || empty($password2)) {
        die('No puede haber campos vacios');
    }

    if ($password1 != $password2 ) {
        die('No coinciden las contraseñas'); 
    }

    $new_pass = password_hash($password1,PASSWORD_DEFAULT);
    session_start();
    if (!empty($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        die ('Inicia la sesión para poder cambiar la contraseña');
    }

    $query = 'SELECT contraseña FROM tUsuarios WHERE id='.$user_id;
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
    if (!password_verify($password,$row[0])) {
        die('Contraseña incorrecta');
    }
    
    $query2 = $db -> prepare("UPDATE tUsuarios SET contraseña=? where id=?;");
    $query2 -> bind_param("si",$new_pass,$user_id);
    $query2 -> execute();
    echo "<h1>Contraseña cambiada correctamente</h1>";
    echo "<a href=/main.php>Volver</a>";
    
    $query2 -> close();

    mysqli_close($db)
?>
