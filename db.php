<?php
session_start();
    function conectar(){
    $connexion = mysqli_connect('localhost','root','','biblioteca');
    $connexion->set_charset('utf8');
    return $connexion;
}
function desconectar($conn){
    mysqli_close($conn);
}
?>