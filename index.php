<?php
include "valida_cpf_cnpj/class/class-valida-cpf-cnpj.php";

if(isset($_POST['enviarcpfoucnpj'])){
  //$cpforcnpj = filter_input(INPUT_POST, 'cpfoucnpj');
  $cpforcnpj = $_POST['cpfoucnpj'];

  $err = array();
  if(empty($cpforcnpj)){ $err[] = "Campo vazio, mano!"; }else{
    // Cria um objeto sobre a classe
    $cpf_cnpj = new ValidaCPFCNPJ($cpforcnpj);

    // Opção de CPF ou CNPJ formatado no padrão
    $formatado = $cpf_cnpj->formata();

    // Verifica se o CPF ou CNPJ é válido
    if ( $formatado ) {
      echo $formatado; // 71.569.042/0001-96
    } else {
      $err[] = "*CPF ou CNPJ Inválido.";
    }

    #
    # Opção sem formatação, apenas validação
    #

    // Cria um objeto sobre a classe
    $cpf_cnpj = new ValidaCPFCNPJ($cpforcnpj);   //'675.401.298-67'

    // Verifica se o CPF ou CNPJ é válido
    if ( $cpf_cnpj->valida() ) {
      echo 'CPF ou CNPJ válido'; // Retornará este valor
    } else {
      $err[] = "*CPF ou CNPJ Inválido.";
    }
  }

  if(!$err){
	echo "Tudo certo!";
  }else{
    echo '<script>alert("';
    foreach($err as $value){
      echo $value."\n";
    }
    echo '");</script>';
  }
}

?>
<form enctype="multipart/form-data" method="post" action="">
  <input type="text" placeholder="CPF ou CNPJ aqui" name="cpfoucnpj" />
  <input type="submit" value="Enviar" name="enviarcpfoucnpj" />
</form>
