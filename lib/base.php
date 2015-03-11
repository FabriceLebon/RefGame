<?php

function connect()
{
    $host = "h8lwqxb5tn.database.windows.net,1433";
    $user = "game_read@h8lwqxb5tn";
    $pwd = "ReaAzu13";
    $db = "Game";

    try{
        $conn = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch(PDOException $e){
        print( "Error connecting to SQL Server. <br />" );
        die(print_r($e));
    }
    return $conn;
}

function listeTousLesJeux($conn)
{
//    $conn = connect();
    $sql = "SELECT NameGame, YearGame, PEGI FROM Jeux ORDER BY NameGame";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function listeUtilisateurs($conn)
{
    $sql = "SELECT ID_Utilisateur AS id, NomUtilisateur AS nom";
    $sql .= " FROM dbo.Ref_Utilisateurs";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
