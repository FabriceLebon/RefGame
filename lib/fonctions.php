<?php
function user_verified() {
    if( isset($_SESSION['id']) && ($_SESSION['id'] > 0)) {
        return TRUE;
    } else return FALSE;
}

function verifChampRempli($champ) {
    if (isset($champ) and !preg_match("#^[-. ]+$#", $champ) and !empty($champ)) {
        return 1;
    } else {
        return 0;
    }
}

