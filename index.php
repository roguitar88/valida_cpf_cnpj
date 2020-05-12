<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
 
include "valida_cpf_cnpj/class/class-valida-cpf-cnpj.php";

if(isset($_POST['enviarcpfoucnpj'])){
	$err = array();

	if(!empty($_POST['cpfoucnpj'])) {
		$cpforcnpj = $_POST['cpfoucnpj'];
			
		// Cria um objeto sobre a classe
		$cpf_cnpj = new ValidaCPFCNPJ($cpforcnpj);   //'675.401.298-67'

		// Verifica se o CPF ou CNPJ é válido
		if ( $cpf_cnpj->valida() ){
		  echo 'CPF ou CNPJ válido<br/>'; // Retornará este valor
		}else{
		  $err[] = "*CPF ou CNPJ Inválido.";
		}	 
	}else{
		$err[] = "Campo vazio, mano bro.";
	}
	
	if(!$err) {
		echo "Tudo certo!<br/>";
	} else{
		echo '<script>alert("';
		foreach($err as $value){
		  echo $value.'\n';
		}
		echo '");</script>';
	}
}
?>
<form enctype="multipart/form-data" method="post" action="">
  <input type="text" placeholder="CPF ou CNPJ aqui" name="cpfoucnpj" />
  <input type="submit" value="Enviar" name="enviarcpfoucnpj" />
</form>
