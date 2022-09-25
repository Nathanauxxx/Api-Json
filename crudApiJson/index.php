<?php 
$con = mysqli_connect("localhost","root","","api_php");

$dados = array();
$dados['erro'] = false;
$dados['message'] = "";



$sql = "SELECT * FROM usuarios";

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0){
    while($user = mysqli_fetch_array($result)){
        $dados['users'] []= array(
            'id' =>intval($user['id']),
            'name' =>$user['name'],
            'email'=>$user['email'],
        );
    }
}else{
    $dados['erro'] = true;
    $dados['message']= "nenhum usuário encontrado!";
}
echo json_encode($dados);
