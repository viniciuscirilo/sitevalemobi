<!-- Início do Php -->
<?php
	include "conexao.inc";
	//Declarando as variaveis 
	if (( $_POST ) ) {
	$vcodigo_mercadoria=$_POST["codigo_mercadoria"];
    $vtipo_mercadoria=$_POST["tipo_mercadoria"];
    $vnome_mercadoria=$_POST["nome_mercadoria"];
    $vqtd_mercadoria=$_POST["qtd_mercadoria"];
    $vpreco_mercadoria=$_POST["preco_mercadoria"];
    $vtipo_negocio=$_POST["tipo_negocio"];
    
    //INSERINDO UMA MERCADORIA AO BANCO DE DADOS
    $sql="INSERT INTO tb_cadastro VALUES ($vcodigo_mercadoria, '$vtipo_mercadoria', '$vnome_mercadoria', $vqtd_mercadoria, $vpreco_mercadoria, '$vtipo_negocio  ')";
    $PDO->query( $sql );


  }

?>
<!-- Fim do Php -->



<!DOCTYPE html>
<html lang="pt-br">
  <!-- Início do Cabeçalho -->
  <head>
	<!-- Meta Tags Necessárias para o Web Site, como de exemplo: Autour, Descrição, Keyboard, Linguagem -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página onde o usuário do sistema consegui fazer a listagem dos dados">
    <meta name="author" content="Vinicius Cirilo Garcia Singolani">

    <title>Lista Cadastrada</title>

    <!-- Bootstrap  CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    
  </head>
  <!-- Fim do cabeçalho -->

  <!-- Início do corpo -->
  <body role="document">

    <!-- Início das DIVS do Menu -->
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="index.php">Negociação de Mercadorias</a>
            </div>
			<!-- Links Para navegação no Menu -->
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="cadastro.php">Cadastro de Mercadorias</a></li>
                <li><a href="">Lista de Mercadorias</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
	<!-- Fim das DIVS do Menu -->
    
	<!-- Início do conteúdo -->
    <div class="container theme-showcase" role="main">
      <div class="page-header">
        <h1>Lista de Produtos Cadastrados</h1>
      </div>
      <div class="row">
        <div class="col-md-6">
          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nome Mercadoria</th>
                <th>Tipo Mercadoria</th>
                <th>Qtd Mercadoria</th>
                <th>Preço Mercadoria</th>
                <th>Tipo de Negócio</th>
              </tr>
			</thead>
			<tbody>	
			  <?php
			  //BUSCANDO MERCADORIA BO BANCO DE DADOS
				$sql_mercadoria = $PDO->query( " SELECT * FROM cad_cadastro.tb_cadastro " );

        while ( $mercadoria = $sql_mercadoria->fetch(PDO::FETCH_OBJ) ) {
  
          echo '<tr>
            <th>' .  $mercadoria->codigo_mercadoria . '</th>
            <th>' .  $mercadoria->tipo_mercadoria . '</th>
            <th>' .  $mercadoria->nome_mercadoria . '</th>
            <th>' .  $mercadoria->qtd_mercadoria . '</th>
            <th>' .  $mercadoria->preco_mercadoria . '</th>
            <th>' .  $mercadoria->negocio . '</th>
          </tr>';
        }
			  ?>
            </tbody>
          </table>
        </div>
        

    </div>
	<!-- Fim do Conteúdo -->
  </body>
  <!-- Fim do corpo -->
</html>

