<?php
require_once "../database.php";
$clientes = Database::listar('cliente', 0);

$options = [];

foreach ($clientes as $cliente) {
    $options[] = [
        "id" => $cliente['id'],
        "label" => $cliente['nome'],

    ];
}

require_once "../components/options.php";