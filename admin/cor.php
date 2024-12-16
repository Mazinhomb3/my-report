<?php

require '../conexao.php';

$sql = "SELECT lider_cel_rede FROM tbl_redes WHERE cor_rede='verde laguna' AND area_rede='bruno' AND setor_rede='bruno'";

$result = $conexao->query($sql);

echo "<table border='1'>";
while ($row = $result->fetch_assoc()) {
    $sql_verificar = "SELECT id_rede FROM tbl_dados WHERE nome_lider = '" . $row["lider_cel_rede"] . "' AND data_Lider>='2024-12-02'";
    $result_verificar = $conexao->query($sql_verificar);
    $quantidade = mysqli_fetch_assoc($result_verificar);
    
    if ($quantidade > 1) {
        echo "<tr style='background-color: #FFC080;'>"; // Cor de fundo para repetidas
    } else {
        echo "<tr>";
    }
    
    echo "<td>" . $row["lider_cel_rede"] . "</td></tr>";
}
echo "</table>";

?>