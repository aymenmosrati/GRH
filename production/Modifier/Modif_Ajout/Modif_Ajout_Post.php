<?php
    $vid = $_POST['id'];          
    $vPost= $_POST['Nom_Post'];
    require_once('../../Post.php');
    $post = new Post();
    $post->setPost($vPost);
    $post->Modification($vid);
    header("location:../../liste_Post.php");

?>