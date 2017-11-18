<!DOCTYPE html>


<html>
    <head>
        <title>TODO supply a ti</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>Cursos oferecidos </div>

        <?php
        require('connect.php');
        $query = 'SELECT * FROM cursos where nome and descricao';
        $result = mysqli_query($con, $query);
        echo 'Resultado';
        ?>
    </body>
</html>



