<?php 

function moneyFormat($amt) {
    return "$" . number_format($amt, 2);
}

?>