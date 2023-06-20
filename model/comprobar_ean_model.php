<?php


function getModel($model): int
{
    include_once "./db.php";

    $query = "SELECT codigo_interno FROM producto WHERE codigo_interno = $model";
    $stm = $pdo->query($query);
    $stm->execute();

    $MODEL =  $stm->rowCount();
    return $MODEL;
}

function getEAN($ean): int
{
    include_once "./db.php";

    $query = "SELECT codigo_barra FROM producto WHERE codigo_barra = $ean";
    $stm = $pdo->query($query);
    $stm->execute();

    $EAN =  $stm->rowCount();
    return $EAN;
}
