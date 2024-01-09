
<?php

if (!function_exists('liga1')) {
    function liga1() {
        $liga1 = mysqli_connect("localhost", "root", "", "neoapp");

        // Verifica se a conexão foi estabelecida com sucesso
        if (!$liga1) {
            die("Erro na conexão: " . mysqli_connect_error());
        }

        return $liga1;
    }
}

if (!function_exists('liga2')) {
    function liga2() {
        $liga2 = mysqli_connect("localhost", "root", "", "neoapp");

        // Verifica se a conexão foi estabelecida com sucesso
        if (!$liga2) {
            die("Erro na conexão: " . mysqli_connect_error());
        }

        return $liga2;
    }
}
