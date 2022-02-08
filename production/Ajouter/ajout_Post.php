
<?php
    $vPost= $_POST['Post'];

    require_once('../Post.php');
    $post = new Post();
    $pst= $post->edit();
    if($pst['1'] == $vPost || $vPost=="" )
    {
       echo "<center><b><span style='color:red'>Ce Post est deja exist </span></b></center>";
    }else{
        $post->setPost($vPost);
        $pst= $post->ajouter();
        header("location:../liste_Post.php?");
    }

?>