<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=pisquerito;charset=utf8', 'root', '');
$stmt = $db->query("SELECT * FROM suscriptor");
$suscriptores = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>lista de Suscriptores |Panel de Administracion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">

</head>
<body>
    <div class="todo">
        <?php include 'partes/cab.php'?>
        <div class="bloque-cuerpo">
                    <?php include 'partes/side.php'?>
            <div class="content">
                <p>Lista de Suscriptores</p>
                <table style="width: 100%; border-collapse: collapse;" border="1">
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>CORREO</th>
                        <th>ACCIONES</th>
                    </tr>
                    <?php if (count($suscriptores) == 0) { ?>
                    <tr>
                        <td colspan="5" style="text-align: center"> No se encontraron registros</td>
                    </tr>
                    <?php } ?>

                    <?php foreach ($suscriptores as $s) { ?>
                    <tr>
                        <td><?php echo $s["id_suscriptor"] ?></td>
                        <td><?php echo $s["nombre"] ?></td>
                        <td><?php echo $s["email"] ?></td>
                        <td style="text-align: center">            
                            <form action="borrar_usuario.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $u["id"] ?>">
                                <button type="submit"><i class="fas fa-trash-alt"></i></button>
                            </form> 
                            <form action="editar_usuario.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $u["id"] ?>">
                                <button type="submit"><i class="fas fa-edit"></i></button>
                            </form>  
                            <form action="editar_password.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $u["id"] ?>">
                                <button type="submit"> <i class="fas fa-user-edit"></i></button>
                            </form>         
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>