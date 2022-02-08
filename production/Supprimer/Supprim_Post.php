<?php
$id =$_REQUEST['dd'];

require_once('../Post.php');
$post = new Post();
$stmt = $post ->supprimer($id);
if(!$stmt){
    echo('echec de suppprition'.$this->connexion()->errorInfo());
}else{
    header("location:../liste_Post.php");
}

?>
