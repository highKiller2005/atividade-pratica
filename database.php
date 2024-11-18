<?php

class Database {
    static function query($raw) {
        $db = new mysqli("localhost","root","root","atividade_um");
        $result = $db->query($raw);
        return $result;
    }
    static function criar(string $entidade, array $data) {
        $raw = "INSERT INTO $entidade (";
        $values = "VALUES (";
        $count = 0;
        foreach($data as $key => $value) {
            $raw.= "$key, ";
            $values.= "'$value', ";
            $count++;
        }
        $raw = rtrim($raw, ", ");
        $values = rtrim($values, ", ");
        $values.= ")";
        $raw.= ")";
        self::query($raw." ".$values);
    }
    static function listar(string $entidade, $filter): array {
        $response = [];
        if ($filter == 0) {
            $response = self::query("SELECT * FROM $entidade");
        } elseif ($filter == 1) {
            $response = self::query("SELECT * FROM $entidade WHERE status='1'");
        } elseif ($filter == 2) {
            $response = self::query("SELECT * FROM $entidade WHERE status='2'");
        } elseif ($filter == 3) {
            $response = self::query("SELECT * FROM $entidade WHERE status='3'");
        }
        
        $data = [];

        while($row = $response->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    static function ler_um(string $entidade, $id) {
        $response = self::query("SELECT * FROM $entidade WHERE $id = id");

        return $response->fetch_assoc();
    }

    static function atualizar(string $entidade, $data, $id) {
        $raw = "UPDATE $entidade SET ";
        foreach($data as $key => $value) {
            $raw.= "$key = '$value', ";
        }
        $raw = rtrim($raw, ", ");
        $raw .= "WHERE id = $id";
        self::query($raw);
    }

    static function deletar(string $entidade, $id) {
        $raw = "DELETE FROM $entidade WHERE id = $id";
        self::query($raw);
    }
}