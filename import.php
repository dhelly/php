<?php 

/*
* ETL Dados Telefonicos - Separar linhas do arquivo.
* Jaqueline Fernandes - 12/08/2014
*/

$caminho = "file/";

echo "<pre>";
$arrayArquivo = lerPasta($caminho);
// print_r($arrayArquivo);
echo "</pre>";

$tam = count($arrayArquivo);

for($i = 0; $i<$tam;$i++){
	lerArquivo($caminho.$arrayArquivo[$i]);
}


function salvaArquivo($texto, $nomeArquivo){
	// $handle = fopen($nomeArquivo."-T", "a+");
	$handle = fopen("resultado.txt", "a+");

	fwrite($handle, $texto);
	
	fclose($handle);
}

function lerArquivo($arquivo){
	$dados = file($arquivo);	

		if(strlen($dados[10]) == 35){

			$tam = count($dados);
			for($i = 11; $i<$tam-12;$i++){

				salvaArquivo($dados[$i],$arquivo);

			}
		}	
}

function lerPasta($caminho){

   	$diretorio = dir($caminho); 

   	$arquivos = array();
   	$count =0;
   
   	while($arquivo = $diretorio -> read()){

   		if($count>1){    		
    		array_push($arquivos, $arquivo);
    	}
    	$count++;
   	}

   	$diretorio -> close();

   	return $arquivos;
}

?>
