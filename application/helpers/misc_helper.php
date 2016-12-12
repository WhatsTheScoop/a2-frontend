<?php 

function moneyFormat($amt) {
    return "$" . number_format($amt, 2);
}

function dd($object) {
    var_dump($object);
    die();
}

?>