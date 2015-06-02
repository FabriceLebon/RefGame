<?php
function user_verified() {
        return isset($_SESSION['id']);
}

function verifChampRempli($champ) {
    if (isset($champ) and !preg_match("#^[-. ]+$#", $champ) and !empty($champ)) {
        return 1;
    } else {
        return 0;
    }
}
?>
