<?php
include('conecta.php');
if ($conn) {
    echo "Conexão OK!\n";
    echo "Database atual: " . mysqli_get_server_info($conn) . "\n";
    $result = mysqli_query($conn, "SELECT DATABASE() as db");
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo "Database conectado: " . $row['db'] . "\n";
    }
    // Tentar listar bancos
    $result = mysqli_query($conn, "SHOW DATABASES");
    if ($result) {
        echo "\nBancos disponíveis:\n";
        while ($row = mysqli_fetch_array($result)) {
            if (strpos($row[0], 'clinic') !== false || strpos($row[0], 'u451023057') !== false) {
                echo "- " . $row[0] . "\n";
            }
        }
    }
} else {
    echo "Erro de conexão: " . mysqli_connect_error() . "\n";
}
?>
