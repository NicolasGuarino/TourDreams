<?php

session_start();

include("conexao_banco.php");

if(isset($_POST['btnRegistrar_parceiro']))
{
  $empresa = $_POST['empresa'];
  $nome_parceiro = $_POST['nome_parceiro'];
  $cnpj = $_POST['cnpj'];
  $senha = $_POST['senha'];
  $gerente = $_POST['gerente'];
  $telefone = $_POST['telefone'];
  $celular = $_POST['celular'];
  $email = $_POST['email'];



  $sql="insert into tbl_parceiros(nome_empresa, nome_fantasia, cnpj, senha, nome_gerente, telefone, celular, email)";
  $sql=$sql."values('".$empresa."', '".$nome_parceiro."', '".$cnpj."', '".$senha."', '".$gerente."', '".$celular."', '".$telefone."', '".$email."')";

  mysql_query($sql);

  echo "<script type='text/javascript'>
	window.alert('Obrigado pela preferencia')
	</script>";

}

 ?>

<?php



	if(isset($_POST['btn_logar_parceiro']))
	{
		$cnpj=$_POST['cnpj'];
		$senha=$_POST['senha'];


		include("conexao_banco.php");

		$sql = "SELECT * FROM tbl_parceiros where cnpj = '".$cnpj."' AND senha= '".$senha."'";
		$sqlResult = mysql_query($sql);

		if(mysql_num_rows ($sqlResult) > 0){
			$_SESSION['cnpj'] = $cnpj;
			$_SESSION['senha'] = $senha;

			if($consulta=mysql_fetch_array($sqlResult)){
				header("location:Parceiro/index.php");
			}

		}else{
			echo "<script type='text/javascript'>
			window.alert('Login ou Senha inválidos')
			</script>";
		}
	}
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TourDreams | Home</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link  rel='stylesheet' type='text/css'>



        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/fontello.css">
        <link href="assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
        <link href="assets/fonts/icon-7-stroke/css/helper.css" rel="stylesheet">
        <link href="assets/css/animate.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/icheck.min_all.css">
        <link rel="stylesheet" href="assets/css/price-range.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <link rel="stylesheet" href="assets/css/owl.theme.css">
        <link rel="stylesheet" href="assets/css/owl.transitions.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
    </head>
    <body>




        <div class="header-connect">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-8  col-xs-12">
                        <div class="header-half header-call">
                            <p>
                                <span><i class="pe-7s-call"></i> (11) 4222-2020</span>
                                <span><i class="pe-7s-mail"></i> tour_dreams@tour.com</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-12">
                        <div class="header-half header-social">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <nav class="navbar navbar-default ">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="assets/img/logo_tourdreams.png" alt=""></a>
                </div>


                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        <a class="navbar-brand" href="registrar_user.php"><button class="navbar-btn nav-button wow bounceInRight login" data-wow-delay="0.45s">Cliente</button></a>
                    </div>
					<div class="button navbar-right" data-toggle="modal" data-target="#myModal">
                        <a class="navbar-brand" href="#"><button class="navbar-btn nav-button wow bounceInRight login" data-wow-delay="0.45s">Parceiro</button></a>
                    </div>
                    <ul class="main-nav nav navbar-nav navbar-right">
					    <li class="wow fadeInDown" data-wow-delay="0.1s"><a class="" href="index.php">Home</a></li>
						<li class="wow fadeInDown" data-wow-delay="0.5s"><a href="melhores_destinos.php">Destinos</a></li>
						<li class="wow fadeInDown" data-wow-delay="0.5s"><a href="blog.php">Blog</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="fale_conosco.php">Fale Conosco</a></li>
						<li class="wow fadeInDown" data-wow-delay="0.5s"><a href="sobre.php">Sobre</a></li>
						<li class="wow fadeInDown" data-wow-delay="0.5s"><a href="promocao.php">Promoções</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    			<div class="modal-dialog modal-lg">
    				<div class="modal-content">
    					<div class="modal-header">
    						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    						<h4 class="modal-title" id="myModalLabel">Seja nosso Parceiro</h4>
    					</div>
    					<div class="modal-body">
    						<div class="row">
    							<div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
    								<ul class="nav nav-tabs">
    									<li class="active"><a href="#Login" data-toggle="tab">Parceiro</a></li>
    									<li><a href="#Registration" data-toggle="tab">Registrar</a></li>
    								</ul>
    								<div class="tab-content">
    									<div class="tab-pane active" id="Login">
    										<form role="form" class="form-horizontal" action="reserva.php" method="post">
    										<div class="form-group">
    											<label for="email" class="col-sm-2 control-label">
    												CNPJ</label>
    											<div class="col-sm-10">
    												<input name="cnpj" type="text" class="form-control" id="email1" placeholder="CNPJ" maxlength="8" />
    											</div>
    										</div>
    										<div class="form-group">
    											<label for="exampleInputPassword1" class="col-sm-2 control-label">Senha</label>
    											<div class="col-sm-10">
    												<input name="senha" type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" />
    											</div>
    										</div>
    										<div class="row">
    											<div class="col-sm-2">
    											</div>
    											<div class="col-sm-10">
    												<button name="btn_logar_parceiro" type="submit" class="btn btn-primary btn-sm">Logar como Parceiro</button>
    											</div>
    										</div>
    										</form>
    									</div>

    									<div class="tab-pane" id="Registration">
    										<form method="post" role="form" class="form-horizontal" action="reserva.php">
    										<div class="form-group">
    											<label for="email" class="col-sm-2 control-label">Empresa</label>
    											<div class="col-sm-10">
    												<input name="empresa" type="text" class="form-control" id="email" placeholder="Empresa" />
    											</div>
    										</div>
    										<div class="form-group">
    											<label for="email" class="col-sm-2 control-label">Nome</label>
    											<div class="col-sm-10">
    												<input name="nome_parceiro" type="text" class="form-control" id="email" placeholder="Nome Fantasia" />
    											</div>
    										</div>
    										<div class="form-group">
    											<label for="mobile" class="col-sm-2 control-label">CNPJ</label>
    											<div class="col-sm-10">
    												<input name="cnpj" type="text" class="form-control" id="mobile" placeholder="CNPJ da empresa" />
    											</div>
    										</div>
    										<div class="form-group">
    											<label for="password" class="col-sm-2 control-label">Senha</label>
    											<div class="col-sm-10">
    												<input name="senha" type="password" class="form-control" id="password" placeholder="Senha de acesso" />
    											</div>
    										</div>
    										<div class="form-group">
    											<label for="password" class="col-sm-2 control-label">Gerente</label>
    											<div class="col-sm-10">
    												<input name="gerente" type="text" class="form-control" id="password" placeholder="Gerente do hotel/pousada/resort"/>
    											</div>
    										</div>
                        <div class="form-group">
    											<label for="password" class="col-sm-2 control-label">Celular</label>
    											<div class="col-sm-10">
    												<input name="celular" type="text" class="form-control" id="password" onkeyup="mascaraCelular( this, mtel );" placeholder="Celular do gerente" maxlength="15" />
    											</div>
    										</div>
    										<div class="form-group">
    											<label for="password" class="col-sm-2 control-label">Telefone</label>
    											<div class="col-sm-10">
    												<input name="telefone" type="text" class="form-control" onkeyup="mascaraCelular( this, mtel );"  id="password" placeholder="Telefone da empresa" maxlength="14" />
    											</div>
    										</div>
    										<div class="form-group">
    											<label for="password" class="col-sm-2 control-label">Email</label>
    											<div class="col-sm-10">
    												<input name="email" type="email" class="form-control" id="password" placeholder="Email do gerente" />
    											</div>
    										</div>
    										<div class="row">
    											<div class="col-sm-2">
    											</div>
    											<div class="col-sm-10">
    												<button name="btnRegistrar_parceiro" type="submit" class="btn btn-primary btn-sm">Quero ser um parceiro</button>
    											</div>
    										</div>
    										</form>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>





        <div class="content-area home-area-1 recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">
                <div class="row">
                    <div class="proerty-th">

						<div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="detalhes_produto.php" ><img src="assets/img/demo/produto1.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="detalhes_produto.php" >Nome Produto</a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><i class="fa fa-binoculars"></i>  <b>Milhas :</b> 580 </span>
                                    <span class="proerty-price pull-right">R$300,00</span>
                                </div>
								<div class="vote">
									<label>
										<input  name="fb" value="1" />
										<i class="fa"></i>
									</label>
									<label>
										<input name="fb" value="2" />
										<i class="fa"></i>
									</label>
									<label>
										<input  name="fb" value="3" />
										<i class="fa"></i>
									</label>
									<label>
										<input  name="fb" value="4" />
										<i class="fa"></i>
									</label>
									<label>
										<input name="fb" value="5" />
										<i class="fa"></i>
									</label>
							    </div>

                            </div>
                        </div>

						<div class="col-md-6">
							<div class="box-for overflow">
								<div class="col-md-12 col-xs-12 login-blocks">
									<h2>Reserva</h2>
									<form action="" method="post">
										<div class="form-group">
											<label>Responsável pela reserva</label>
											<input type="text" class="form-control" placeholder="Obs: Cliente que fará o pagamento no hotel/resort/pousada" name="">
										</div>
										<div class="form-group">
											<label>CPF</label>
											<input type="text" class="form-control" name=""  placeholder="Digite seu cpf" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' onkeypress='return SomenteNumero(event)' maxlength="14">
										</div>
										<div class="form-group">
											<label>Celular</label>
											<input type="text" class="form-control" placeholder="Digite seu celular" name="celular" onkeyup="mascaraCelular( this, mtel );"  onkeypress='return SomenteNumero(event)' maxlength="15">
										</div>
										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control" placeholder="Digite seu email" name="">
										</div>
										<div class="form-group">
											<label>Quartos</label>
											<select id="basic" class="selectpicker show-tick form-control">
												<option>1</option>
												<option>2</option>
												<option>3</option>
											</select>
										</div>
										<div class="form-group">
											<label>Adultos</label>
											<select id="basic" class="selectpicker show-tick form-control">
												<option>1</option>
												<option>2</option>
												<option>3</option>
											</select>
										</div>
										<div class="form-group">
											<label>Crianças</label>
											<select id="basic" class="selectpicker show-tick form-control">
												<option>1</option>
												<option>2</option>
												<option>3</option>
											</select>
										</div>

										<div class="single-property-header">
                                            <h1 class="property-title">  Valor</h1>
                                            <span class="property-price">R$300,00</span>
                                        </div>

										<div class="text-center">
											<button type="submit" class="btn btn-default"> Reservar</button>
										</div>
									</form>
									<br>
								</div>

							</div>
						</div>



























                    </div>
                </div>
            </div>
        </div>












        <!-- Footer area-->
        <div class="footer-area">

            <div class=" footer">
                <div class="container">
                    <div class="row">



                    </div>
                </div>
            </div>



        </div>

        <script src="assets/js/modernizr-2.6.2.min.js"></script>

        <script src="assets/js/jquery-1.10.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-select.min.js"></script>
        <script src="assets/js/bootstrap-hover-dropdown.js"></script>

        <script src="assets/js/easypiechart.min.js"></script>
        <script src="assets/js/jquery.easypiechart.min.js"></script>

        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/wow.js"></script>


        <script src="assets/js/icheck.min.js"></script>
        <script src="assets/js/price-range.js"></script>

        <script src="assets/js/main.js"></script>

    </body>

	<script>

		$('.vote label i.fa').on('click mouseover',function(){
		// remove classe ativa de todas as estrelas
		$('.vote label i.fa').removeClass('active');
		// pegar o valor do input da estrela clicada
		var val = $(this).prev('input').val();
		//percorrer todas as estrelas
		$('.vote label i.fa').each(function(){
			/* checar de o valor clicado é menor ou igual do input atual
			*  se sim, adicionar classe active
			*/
			var $input = $(this).prev('input');
			if($input.val() <= val){
				$(this).addClass('active');
			}
		});
		$("#voto").html(val); // somente para teste
	});
	//Ao sair da div vote
	$('.vote').mouseleave(function(){
		//pegar o valor clicado
		var val = $(this).find('input:checked').val();
		//se nenhum foi clicado remover classe de todos
		if(val == undefined ){
			$('.vote label i.fa').removeClass('active');
		} else {
			//percorrer todas as estrelas
			$('.vote label i.fa').each(function(){
				/* Testar o input atual do laço com o valor clicado
				*  se maior, remover classe, senão adicionar classe
				*/
				var $input = $(this).prev('input');
				if($input.val() > val){
					$(this).removeClass('active');
				} else {
					$(this).addClass('active');
				}
			});
		}
	});


	</script>



	<script>
			function mascaraMutuario(o,f){
				v_obj=o
				v_fun=f
				setTimeout('execmascara()',1)
			}

			function execmascara(){
				v_obj.value=v_fun(v_obj.value)
			}

			function cpfCnpj(v){

				//Remove tudo o que não é dígito
				v=v.replace(/\D/g,"")

				if (v.length <= 14) { //CPF

					//Coloca um ponto entre o terceiro e o quarto dígitos
					v=v.replace(/(\d{3})(\d)/,"$1.$2")

					//Coloca um ponto entre o terceiro e o quarto dígitos
					//de novo (para o segundo bloco de números)
					v=v.replace(/(\d{3})(\d)/,"$1.$2")

					//Coloca um hífen entre o terceiro e o quarto dígitos
					v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")

				} else { //CNPJ

					//Coloca ponto entre o segundo e o terceiro dígitos
					v=v.replace(/^(\d{2})(\d)/,"$1.$2")

					//Coloca ponto entre o quinto e o sexto dígitos
					v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")

					//Coloca uma barra entre o oitavo e o nono dígitos
					v=v.replace(/\.(\d{3})(\d)/,".$1/$2")

					//Coloca um hífen depois do bloco de quatro dígitos
					v=v.replace(/(\d{4})(\d)/,"$1-$2")

				}

				return v

			}
	</script>


	<script>
		function mascaraCelular(o,f){
		v_obj=o
		v_fun=f
		setTimeout("execmascara()",1)
		}
		function execmascara(){
			v_obj.value=v_fun(v_obj.value)
		}
		function mtel(v){
			v=v.replace(/\D/g,"");
			v=v.replace(/^(\d{2})(\d)/g,"($1) $2");
			v=v.replace(/(\d)(\d{4})$/,"$1-$2");
			return v;
		}

		</script>


		<script>
		 function somenteNumeros(num) {
			var er = /[^0-9.]/;
			er.lastIndex = 0;
			var campo = num;
			if (er.test(campo.value)) {
			  campo.value = "";
			}
		}
	</script>


</html>