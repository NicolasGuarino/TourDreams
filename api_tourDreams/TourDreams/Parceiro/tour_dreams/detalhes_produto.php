<?php

	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
	ini_set('default_charset','UTF-8');
	header("Content-Type: text/html; charset=ISO-8859-1", true);
	header("Content-Type: text/html; charset=UTF-8", true);

	include_once 'conexao.php';

	$id_produto = $_POST['id_produto'];

	$sql = $dbcon->query("select * from view_produto
        where id_produto = $id_produto;");


	if(mysqli_num_rows($sql) > 0){

		$lista = [];

		while($dados = $sql->fetch_array()){

			$telefone = $dados['telefone'];

			$telefone = str_replace("(", "55", $telefone);
			$telefone = str_replace(")", "", $telefone);
			$telefone = str_replace("-", "", $telefone);



			$obj = array("id_produto" => $dados['id_produto'] ,
      "nome" => utf8_encode ($dados['nome_fantasia']),
			"telefone" => utf8_encode ($telefone),
      "status" => utf8_encode ($dados['status']),
      "tipo_viagem" =>utf8_encode ($dados['tipo_viagem']),
      "estilo_produto" => utf8_encode ($dados['estilo_produto']),
      "qtd_milhas" => utf8_encode ($dados['qtd_milhas']),
	  "preco" => "R$ ". number_format($dados['preco_diaria'], 2, "," , "."),
      "numero_cep" => utf8_encode ($dados['numero_cep']),
      "logradouro" => utf8_encode ($dados['logradouro']),
      "numero" => utf8_encode ($dados['numero']),
      "complemento" => utf8_encode ($dados['complemento']),
      "bairro" =>  utf8_encode ($dados['bairro']),
      "local" => utf8_encode ($dados['cidade'] . " - " .$dados['estado']),
      //"uf" => $dados['uf'],
      "img_produto" => utf8_encode ($dados['foto_principal']),
      "descricao" => utf8_encode ($dados['descricao_produto']));

			$lista[] = $obj;
		}

		echo json_encode($lista);

	} else {

		echo("erro");
	}


?>
