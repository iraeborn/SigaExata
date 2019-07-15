<?php
include '../conn.php';

$query = "SELECT
		cliente.*, user.cliente_id
		FROM
		cliente
		INNER JOIN
		user ON user.tipo = '2'
		WHERE user.cliente_id = cliente.id";

$query_run = mysqli_query($connection, $query);
	
if(mysqli_num_rows($query_run) > 0){

$std = new stdClass();
$json_str = '[';
while($row = mysqli_fetch_assoc($query_run)){

	// {"name": "Afghanistan", "code": "AF"}, 
	
$json_str = $json_str."{'nome':'".$row["nome"]."','sobrenome':'".$row["sobrenome"]."','bairro':'".$row["bairro"]."','cep':'".$row["cep"]."','cidade':'".$row["cidade"]."','cnpj':'".$row["cnpj"]."','complemento':'".$row["complemento"]."','email1':'".$row["email1"]."','email2':'".$row["email2"]."','endereco':'".$row["endereco"]."','id':'".$row["id"]."','mapa':'".$row["mapa"]."','nomefantasia':'".$row["nomefantasia"]."','nr':'".$row["nr"]."','pub':'".$row["pub"]."','razaosocial':'".$row["razaosocial"]."','setor':'".$row["setor"]."','sigla':'".$row["sigla"]."','site':'".$row["site"]."','situacao':'".$row["situacao"]."','telefone1':'".$row["telefone1"]."','telefone2':'".$row["telefone2"]."','uf':'".$row["uf"]."'}";

}
$json_str = $json_str .']';
}

$string = $json_str;//json_encode($json_str);
//echo $string;
$fp = fopen('empresas.json', 'w');
fwrite($fp, str_replace("'",'"', $string));
fclose($fp);

	
?>