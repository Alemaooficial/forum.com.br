<?php
session_start();

if (isset($_SESSION['usuario'])) {
    echo "Você precisa estar logado.";
    exit;
}
$topicos = simplexml_load_file("topicos.xml");
$id = intval($_GET['id']);
$comentarios = intval($_GET['comentario']);
if ($_SESSION['usuario'] == $topicos->topico[$id]->autor) {
    unset($topicos->topico[$id]->comentarios->comentario[$comentarios_id]);
    $topicos->asXML("topicos.xml");
    }
    header("Location: login.php");
?>

