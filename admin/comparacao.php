<?php

require '../conexao.php';

$sql = "SELECT DISTINCT lider_cel_rede, cod_lider_rede FROM tbl_redes WHERE setor_rede='bruno' and cor_rede = 'verde laguna' ORDER BY cod_lider_rede asc ";

$result = $conexao->query($sql);



?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="shortcut icon" href="../img/logo_paz.ico" type="image/x-icon">
    <title>Paz Santarém</title>
</head>

<body>
    <div class="logo">
        <img src="../img/logo_paz.png" alt="" class="img">
    </div>
    <section>
        <table border="1" align="center">
            <?php while ($row = $result->fetch_assoc()) {
             
            ?>
                <tr>
                    <td>
                        <?php echo "<p style='color: $cor'>" . $row["lider_cel_rede"] . "</p>"; ?>
                    </td>
                    <td>
                      
                    </td>
                <?php } ?>
              
               
                </tr>

        </table>
    </section>
</body>

</html>
<?php $conn->close(); ?>