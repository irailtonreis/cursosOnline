<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <form class="form" method="POST">
            <h1>Página de login</h1>
            <div>
                <label>Nome:<input name="login" type="text" ></label><br><br>
                <label>Senha:<input name="senha" type="password" required></label><br><br>
                <?php
                session_start();
                require('connect.php');

                if (isset($_POST['login'])) {
                    $email = $_POST['login'];
                    $senha = hash("sha512", $_POST['senha']);

                    $query = "SELECT * FROM tentativas where email='$email'"
                            . "and datahora between "
                            . "current_timestamp-30 and current_timestamp";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) < 5) {

                        $query = "SELECT * from conta where email='$email'"
                                . "and senha='$senha'";

                        $result = mysqli_query($con, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = $result->fetch_assoc()) {
                                header('location:index.html');
                            }
                        } else {
                            $query = "INSERT INTO tentativas(email) values ('$email')";
                            mysqli_query($con, $query);
                            $query = "SELECT * FROM tentativas where email='$email'"
                                    . "and datahora between "
                                    . "current_timestamp-30 and current_timestamp";
                            $result = mysqli_query($con, $query);
                            echo mysqli_num_rows($result) . " tentativas "
                            . "realizadas nos ultimos 30s";
                        }
                    } else {
                        echo "Número de tentativas excedido";
                    }
                }
                ?>
            </div>
            <div>
                <input type="submit" value="Login"><br><br>
                <a href="registro.php"><h3>Cadastre-se</h3></a><br>
            </div>
        </form>


    </body>
</html>
