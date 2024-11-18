<?php
$status = ["Aberto", "Em andamento", "Resolvido"];
$criticidade = ["Baixa", "Média", "Alta"];
?>

<table>
    <tr>
        <th>ID</th>
        <th>Clinete ID</th>
        <th>Descrição</th>
        <th>Criticidade</th>
        <th>Status</th>
        <th>Data de cobertura</th>
        <th>Colaborador Responsavel ID</th>
    </tr>
    <?php foreach ($chamados as $chamado): ?>
    <tr>
        <td><?= $chamado["id"] ?></td>
        <td><?= $chamado["cliente_id"] ?></td>
        <td><?= $chamado["descricao"] ?></td>
        <td><?= $criticidade[$chamado["criticidade"] - 1] ?></td>
        <td><?= $status[$chamado["status"] - 1] ?></td>
        <td><?= $chamado["data_abertura"] ?></td>
        <td><?= $chamado["colaborador_id"] ?></td>
        <td>
            <button hx-delete="/atividade-pratica/api/chamados.php?id=<?= $chamado["id"] ?>" hx-target="table" hx-swap="outerHTML">Deletar</button>
        </td>
    </tr>
    <?php endforeach ?>
</table>