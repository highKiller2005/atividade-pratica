<?php
require_once "../database.php";
$colaboradores = Database::listar('colaborador', 0);

$options = [];

foreach ($colaboradores as $colaborador) {
    $options[] = [
        "id" => $colaborador['id'],
        "label" => $colaborador['nome'],
    ];
}

require_once "../components/options.php";