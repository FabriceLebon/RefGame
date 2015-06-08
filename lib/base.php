<?php

function connect()
{
    $host = "h8lwqxb5tn.database.windows.net,1433";
    $user = "game_read@h8lwqxb5tn";
    $pwd = "ReaAzu13";
    $db = "Game";

    try{
        $conn = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
        //$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        return $conn;
    }
    catch(PDOException $e){
        print( "Error connecting to SQL Server. <br />" );
        die(print_r($e));
    }   
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

function controleUtilisateur( $conn, $login, $mdp)
{
    $query = $conn->prepare('
        SELECT TOP 1 ID_Utilisateur FROM Ref_Utilisateurs WHERE NomUtilisateur = :login and Pwd = :pwd
    ');
    $count = $query->execute(array(
        'login' => $login,
        'pwd' => sha1($mdp)
    ));
    $data = $query->fetchColumn();
    $query->closeCursor();
    if ($data != FALSE)
        return $data;
    else    
        return -1 ;
}

function modifierPwd($db, $user, $pwd) {
    $query = $db->prepare('
        UPDATE Ref_Utilisateurs SET Pwd = :pwd WHERE NomUtilisateur = :user
    ');
    $query->execute(array(
        'pwd' => $pwd,
        'user' => $user
    ));
    $count = $query->rowCount();
    if ($count != 0)
        $data = $count;
    else    
        $data = -1;
    $query->closeCursor();
    return $data;
}
