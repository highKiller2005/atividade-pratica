<?php
require_once "../database.php";
$method = $_SERVER['REQUEST_METHOD'];
$clientes = [];

if ($method === 'GET') {
    global $clientes;
    $clientes = Database::listar('cliente', 0);

    require_once "../components/clientes/lista.php";
}

if ($method === 'DELETE') {
    if (isset($_GET["id"])) {
        global $clientes;
        $id = $_GET["id"];

        Database::deletar('cliente', $id);
        $clientes = Database::listar('cliente', 0);
        
        require_once "../components/clientes/lista.php";
    }
}

if ($method === 'POST') {
    if (
        isset($_POST["nome"]) &&
        isset($_POST["email"]) &&
        isset($_POST["telefone"])
    ) {
        try {

            global $clientes;
            Database::criar('cliente', $_POST);

            echo "<p>Sucesso!</p>";
        } catch(Error $err) {
            echo "<p>Erro</p>";
        }
    } else {
        echo "<p>Dados invalidos</p>";
    }
}

if ($method === 'PUT') {
    if (
        isset($_GET["nome"]) &&
        isset($_GET["email"]) &&
        isset($_GET["telefone"])
    ) {
        try {

            global $clientes;
            Database::criar('cliente', $_GET);
            
            echo "<p>Sucesso!</p>";
        } catch (Error $err) {
            echo "<p>Erro!</p>";
        }
    } else {
        echo "<p>Dados invalidos</p>";
    }
}