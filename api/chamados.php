<?php
require_once "../database.php";
$method = $_SERVER['REQUEST_METHOD'];
$chamados = [];

if ($method === 'GET') {
    global $chamados;
    $filter = 0;
    if (isset($_GET["filter"])) {
        $filter = $_GET["filter"];
    }

    $chamados = Database::listar('chamado', $filter);

    require_once "../components/chamados/lista.php";
}

if ($method === 'DELETE') {
    if (isset($_GET["id"])) {
        global $chamados;
        $id = $_GET["id"];

        Database::deletar('chamado', $id);
        $chamados = Database::listar('chamado', 0);
        
        require_once "../components/chamados/lista.php";
    }
}

if ($method === 'POST') {
    if (
        isset($_POST["cliente_id"]) &&
        isset($_POST["colaborador_id"]) &&
        isset($_POST["data_abertura"]) &&
        isset($_POST["status"]) &&
        isset($_POST["criticidade"]) &&
        isset($_POST["descricao"])
    ) {
        try {

            global $chamados;
            Database::criar('chamado', $_POST);

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
        isset($_POST["cliente_id"]) &&
        isset($_POST["colaborador_id"]) &&
        isset($_POST["data_abertura"]) &&
        isset($_POST["status"]) &&
        isset($_POST["criticidade"]) &&
        isset($_POST["descricao"])
    ) {
        try {
            global $chamados;
            Database::criar('chamado', $_GET);
            
            echo "<p>Sucesso!</p>";
        } catch (Error $err) {
            echo "<p>Erro!</p>";
        }
    } else {
        echo "<p>Dados invalidos</p>";
    }
}