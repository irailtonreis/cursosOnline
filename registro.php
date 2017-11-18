<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <form class="form" method="POST">
            <h1>Página de registro</h1>
            <div>
                <label>Nome:<input name="login" type="text" required ></label><br><br>
                <label>Senha:<input name="senha" type="password" required ></label><br><br>
            </div>
            <div>
                <input type="submit" value="Registrar"><br><br><br>
            </div>
        </form>

        <?php
        require ('connect.php');
        if (isset($_POST['login']) and isset($_POST['senha'])) {
            $usuario = $_POST['login'];
            $senha = hash("sha512", $_POST['senha']);
            //'783e2ec5d95cdc32ea3bdb087516244b3c5dec86a371ca66b21c0d
            //aa7292b3142c9456509686abfc2e000765cbb63cf253e177b789b87
            //dcec40e0e9d4e6f4fd1'
            $query = "SELECT * FROM conta where email='$usuario'";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "Esse usuário já existe";
            } else {
                $query = "INSERT INTO conta(email,senha)"
                        . "VALUES ('$usuario', '$senha')";
                echo 'Cadastrado com sucesso!';

                if (mysqli_query($con, $query)) {
                    header('Location: index.php');
                } else {
                    echo "Erro  " . mysqli_errno($con);
                }
            }
        }
        ?>
    </body>
</html>