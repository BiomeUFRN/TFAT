<?php
error_reporting(0);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  
  <link rel="shortcut icon" href="img/mlogo.png" type="image/x-icon" />
  <title>TFAT - Transcription Factor Analysis Toolkit</title>

  
  <style type="text/css">
  
	*{
		padding:0px;
		margin:0px;
		color: #2f3136;
	}
  
	#menu{
		background: #4a6077;
		margin: 0px 0px 50px 0px;
	}
	
		#menu ul{
			width: 1024px;
			height: 50px;
			margin: auto;
			padding: 25px 0px 25px 0px;
			
		}
		
			#menu ul li{
				display: inline;
				padding-right: 7.5px;
			}
			
				#menu ul li a, #menu ul li span{
					color: #FFF;
					font-size: 25px;
					text-decoration: none;
					text-transform: uppercase;
					
				}			
				#menu ul li a:hover{
					color: #f2a682;
				}
  
	#layout{
		margin: auto;
		width: 1024px;
		height: auto;
	}
	
	h2{
		text-align: center;
	}
	
	td ul li{
		margin-left: 10%;
	}
	
	td ul li a{
		text-decoration:none;
		color:#4d79ff;
	}
	
	td ul li a:hover{
		color:#ff9900;
	}
	
	
	p{
		text-align: justify;
		text-indent: 5%;
	}
	
	
	
	
	
	#tfscore{
		
		width: 50px;
		margin: auto;
		
	}
	
	#tfscore tr td{
		padding-right: 0px;
		padding:15px;
		width:auto;
		text-align: center;
			
	}
  
  
  
  
				div.legenda{
					width: 300px;
					float:right;
				}
				div.legenda div div {
					float:left;
					width:32px;
					height:15px;
					text-align:center;
					padding: 2.5px;
					margin: 2.5px;
					border-radius: 5px;
					font-size:small;
				}
  
</style>
  
  
  
	<?php if($_GET['mode']=='enrichment' || $_GET['mode']=='score'){ ?>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/sort/jquery-latest.js"></script> 
		<script type="text/javascript" src="js/sort/jquery.tablesorter.min.js"></script>
		
				<script type="text/javascript">
					$(document).ready(function() 
						{ 
							$("#myTable").tablesorter(); 
						} 
					);
				</script>

							
							<style type="text/css">
							
								th{
									color: #5F9EA0;
									font-size: 15px;
									font-weight: bold;
									cursor: pointer;
								}
									
								.headerSortDown{
									background: url(img/down.png) no-repeat bottom right;
								}
								
								.headerSortUp{
									background: url(img/up.png) no-repeat bottom right;
								}
							</style>
	<?php } ?>
  
</head>
<body>


<div id="menu">

	<ul>
		<li>
			<a href="?"><img src="img/mlogo.png" height="50" /></a>
		</li>
		<li>
			<span>|</span>
		</li>
		<li>
			<a href="?tfscore=390d56&m=enrichment">TF Enrichment</a>
		</li>
		<li>
			<span>|</span>
		</li>
		<li>
			<a href="?tfscore=390d56&m=score">TF Check</a>
		</li>
		<li>
			<span>|</span>
		</li>
		<li>
			<a href="?tfscore=390d56&m=scan">TF Prediction</a>
		</li>
		<li style="text-align: right;">
				<form method="get" style="width: 300px; float: right; position: relative; top: -7.5px;">
					<input type="text" name="busca" value="" style="border-radius: 5px; padding: 5px; width: 50%;"/>
					<input type="submit" value="SEARCH" style="border-radius: 2.5px; padding: 5px; 
					color: #FFF; background: #4a6077; border: solid 2px #fff; float: right;"/>
					<br/><small><small style="color: #fff;">Symbol or Gene ID [Example: STAT3 or 6774]</small></small>
				</form>
		</li>
	</ul>

</div>

    <div id="layout">
		
		<?php
		
		
			
			if(isset($_GET['gen'])||isset($_GET['tamanho_seq'])||isset($_POST['tamanho_seq'])){
			
				if(isset($_GET['tamanho_seq'])||isset($_POST['tamanho_seq'])){
				
					//echo $_SERVER['REQUEST_METHOD'];
					if(isset($_GET['nome_gene'])){
						
						require("../model/Genes.class.php");
						$q = new Genes();
						$q->consultar_gene($_GET['nome_gene'], $_GET['tamanho_seq']);
						
					}else if(isset($_GET['lista_gene'])){
						
						require("../model/Genes.class.php");
						$q = new Genes();
						$q->consultar_gene_lista($_GET['lista_gene'], $_GET['tamanho_seq']);
						
					}else if(isset($_FILES["arquivo_gene"]["tmp_name"])){
						
						echo 'busca por arquivo';
						
					}
				
				}else{
				
					include("search_gen.php");
				
				}
				
			}else if(isset($_GET['ft'])||isset($_GET['nome_ft'])){
			
				if(isset($_GET['nome_ft'])||isset($_POST['db'])){
				
					require("../model/TF.class.php");
					$q = new TF();
					$q->consultar_ft($_GET['nome_ft'], $_GET['db']);
					
				
				}else{
				
					include("search_ft_regulations.php");
				
				}
				
			
			
			//associação FT/GENE
			}else if(isset($_GET['tfscore'])){
				
				if(isset($_GET['l_tf'])&&$_GET['mode']=='target'){
					
						require("../model/TF.class.php");
						$q = new TF();
						$q->consultar_target($_GET['l_tf']);
						
				}else if(isset($_GET['l_tf'])&&$_GET['mode']=='enrichment'){
					
						require("../model/TF.class.php");
						$q = new TF();
						$q->consultar_enrichment($_GET['l_tf'],$_GET['method'],$_GET['accScoreTF'],$_GET['tissueExpression']);
						
				}else if(isset($_GET['l_tf'])&&$_GET['mode']=='score'){
					
						require("../model/TF.class.php");
						$q = new TF();
						$q->consultar_score($_GET['l_tf']);
						
				}else if(isset($_GET['l_tf'])&&$_GET['mode']=='resume'){
					
						require("../model/TF.class.php");
						$q = new TF();
						$q->consultar_score($_GET['l_tf']);
						$q->consultar_target($_GET['l_tf']);
						
				}else if(isset($_GET['l_tf'])&&$_GET['mode']=='scan'){
					
						require("../model/PWM.class.php");
						$q = new PWM();
						$q->pwm_scan_hocomoco($_GET['l_tf']);
						
				}else{
					
					include("enrichment_config.php");
					
				}
				
				
				
			}else if(isset($_GET['convert'])){

				include("gene_to_hugo.php");
				
				
				
			}else if(isset($_GET['consensu'])){
				
				if(isset($_GET['lista_gene_consenso'])){
						require("../model/Genes.class.php");
						$q = new Genes();
						$q->consultar_gene_lista_consenso($_GET['lista_gene_consenso'], $_GET['tamanho_seq_consenso'], $_GET['consenso']);
				}else{			
					include("search_consensu.php");
				}

			}else{
		
				?>
				
					<div>
					
						<div style="width: 47.5%; float: left;">
														
							<p style="line-height: 2;">The <b>TFAT (TRANSCRIPTION FACTOR ANALYSIS TOOLKIT)</b> web tool provides access to the collected FT data, allowing:</p>
							<p style="line-height: 2;">
								<ul style="margin-left: 10%; line-height: 2;">
									<li><span style="border-radius: 2.5px; padding: 5px; 
									color: #FFF; background: #FFD700;  margin-top: 15%;">
									<a href="?tfscore=390d56&m=enrichment" style="color: #fff; text-decoration: none;">TF Enrichment</a></span>: The analysis and identification of the TF associated with a list of genes;</li>
									<li><span style="border-radius: 2.5px; padding: 5px; 
									color: #FFF; background: #00C5CD;  margin-top: 15%;">
									<a href="?tfscore=390d56&m=score" style="color: #fff; text-decoration: none;">TF Check</a></span>: Check of a list of TF;</li>
									<li><span style="border-radius: 2.5px; padding: 5px; 
									color: #FFF; background: #8B5A2B;  margin-top: 15%;">
									<a href="?tfscore=390d56&m=scan" style="color: #fff; text-decoration: none;">TF Prediction</a></span>: Prediction using HOCOMOCO PWMs for DNA sequences;</li>									
									
									<li>Custom configurations by the user in their queries such as the degree of scalable precision of the TF, tissue expression, data contained in public databases, ChIP-seq experiments and prediction;</li>
									<li>Filters integrated into the results.</li>

								</ul>
							</p>							
								
						</div>
						
						
						
						<div style="width: 47.5%; float: right;">
							<p style="line-height: 2;">
									In our database, we collected a total of <span style="border-radius: 2.5px; padding: 5px; 
									color: #FFF; background: #b7616c;  margin-top: 15%;">16.462.707</span> associations between the transcription factor 
									and gene, with <span style="border-radius: 2.5px; padding: 5px; 
									color: #FFF; background: #d26f8e;  margin-top: 15%;">26.065</span> target genes and <span style="border-radius: 2.5px; padding: 5px; 
									color: #FFF; background: #826172;  margin-top: 15%;">1.172</span> transcription factors. These data are derived from several
									tools, classified into three methodologies: public databases, CHIP-Seq experiments and PWM predictions. 
									These are six libraries that allow us to identify the enrichment Transcription Factors of a list of genes 
									using as data source <span style="border-radius: 2.5px; padding: 5px; 
									color: #FFF; background: #B22222;  margin-top: 15%;">Enrichr</span>, <span style="border-radius: 2.5px; padding: 5px; 
									color: #FFF; background: #9966cc;  margin-top: 15%;">HTRIdb</span>, <span style="border-radius: 2.5px; padding: 5px; 
									color: #FFF; background: #6B8E23;  margin-top: 15%;">UCSC/ENCODE</span>, <span style="border-radius: 2.5px; padding: 5px; 
									color: #FFF; background: #B8860B;  margin-top: 15%;">GTRD</span>, <span style="border-radius: 2.5px; padding: 5px; 
									color: #FFF; background: #4682B4;  margin-top: 15%;">ChIP-Atlas</span> and <span style="border-radius: 2.5px; padding: 5px; 
									color: #FFF; background: #663366;  margin-top: 15%;">HOCOMOCO</span> PWMs.
								</p>
								<p style="line-height: 2;">This is an alternative that integrates several data sources, from the most diverse methodologies on FT, making it complement the existing proposals for TF enrichment analysis.</p>
						</div>
						
					</div>
					
				
				<?php
				
			}
			
		?>

    </div>
 
 
</body>
</html>
