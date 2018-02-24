<?php
    session_start();
    include_once '../../config/config.php';
    $pdo = Database::getConnection();

    if (!$_SESSION['admin'])
        header ("Location:../../../index.php");

    if (isset ($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM registers WHERE id=$id";
        $query = $pdo->prepare ($sql);
        $query->execute ();

        $_SESSION['success_d'] = true;
        header('Location:/php/admin/team/list.php');
    }
?>
