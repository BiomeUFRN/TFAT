<?php
require_once('../model/TFATConfig.php');
error_reporting(0);

					
			$obj = new TF();
					
			$mysqli = getMysqli();
			echo mysqli_connect_error();
			if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
											
			$lista = urlencode($lista);
			$lista = str_replace(array('%2C','+','%3B','%09'),'%0D%0A',$lista);
			$l = explode('%0D%0A', $lista);
			$l = array_filter($l);
						
			$lista_fatores = '';
			
			
				
				$sql_complet = '';
				$method = '';
				$css = '';
				
				
				if($metodologia=='EC'){
					$sql_complet = ' AND fonte LIKE "EC" ';
					$method = 'Public Data Base<br/><b>Source:</b> ENRICHR[ChEA]';
					
					$css = '
						.ALL, .EX, .PR, .EE, .EP, .EC, .CA, .GT, .HT, .UC, .HC{
							 opacity: 0.25;
						}
						
						.'.$metodologia.'{
							opacity: 1;
						}
					';
					
				}else if($metodologia=='EE'){
					$sql_complet = ' AND fonte LIKE "EE" ';
					$method = 'Public Data Base<br/><b>Source:</b> ENRICHR[ENCODE]';
					
					$css = '
						.ALL, .EX, .PR, .EE, .EP, .EC, .CA, .GT, .HT, .UC, .HC{
							 opacity: 0.25;
						}
						
						.'.$metodologia.'{
							opacity: 1;
						}
					';
					
				}else if($metodologia=='EP'){
					$sql_complet = ' AND fonte LIKE "EP" ';
					$method = 'Public Data Base<br/><b>Source:</b> ENRICHR[PWMs]';
					
					$css = '
						.ALL, .EX, .PR, .EE, .EP, .EC, .CA, .GT, .HT, .UC, .HC{
							 opacity: 0.25;
						}
						
						.'.$metodologia.'{
							opacity: 1;
						}
					';
					
				}else if($metodologia=='GT'){
					$sql_complet = ' AND fonte LIKE "GT" ';
					$method = 'ChIP-seq experiment<br/><b>Source:</b> GTRD';
					
					$css = '
						.ALL, .DB, .PR, .EE, .EP, .EC, .CA, .GT, .HT, .UC, .HC{
							 opacity: 0.25;
						}
						
						.'.$metodologia.'{
							opacity: 1;
						}
					';
					
				}else if($metodologia=='CA'){
					$sql_complet = ' AND fonte LIKE "CA" ';
					$method = 'ChIP-seq experiment<br/><b>Source:</b> ChIP-Atlas';
					
					$css = '
						.ALL, .DB, .PR, .EE, .EP, .EC, .CA, .GT, .HT, .UC, .HC{
							 opacity: 0.25;
						}
						
						.'.$metodologia.'{
							opacity: 1;
						}
					';
					
				}else if($metodologia=='HT'){
					$sql_complet = ' AND fonte LIKE "HT" ';
					$method = 'Public Data Base<br/><b>Source:</b> HTRIdb';
					
					$css = '
						.ALL, .EX, .PR, .EE, .EP, .EC, .CA, .GT, .HT, .UC, .HC{
							 opacity: 0.25;
						}
						
						.'.$metodologia.'{
							opacity: 1;
						}
					';
					
				}else if($metodologia=='UC'){
					$sql_complet = ' AND fonte LIKE "UC" ';
					$method = 'Public Data Base<br/><b>Source:</b> UCSC/ENCODE';
					
					$css = '
						.ALL, .EX, .PR, .EE, .EP, .EC, .CA, .GT, .HT, .UC, .HC{
							 opacity: 0.25;
						}
						
						.'.$metodologia.'{
							opacity: 1;
						}
					';
					
				}else if($metodologia=='HC'){
					$sql_complet = ' AND fonte LIKE "HC" ';
					$method = 'Prediction<br/><b>Source:</b> HOCOMOCO';
					
					$css = '
						.ALL, .EX, .DB, .EE, .EP, .EC, .CA, .GT, .HT, .UC, .HC{
							 opacity: 0.25;
						}
						
						.'.$metodologia.'{
							opacity: 1;
						}
					';
					
					
					
					
					
				}else if($metodologia=='database'){
					$sql_complet = ' AND metodologia LIKE "DB" ';
					$method = 'Public Data Base';
					
					$css = '
						#all, #ex, #pr{
							 opacity: 0.25;
						}
					';
					
				}else if($metodologia=='experiment'){
					$sql_complet = ' AND metodologia LIKE "EX" ';
					$method = 'ChIP-seq experiment';
					
					$css = '
						#all, #db, #pr{
							 opacity: 0.25;
						}
					';
					
				}else if($metodologia=='prediction'){
					$sql_complet = ' AND metodologia LIKE "PR" AND fonte LIKE "HC" ';
					$method = 'Prediction';
					//fonte LH (HOCOMOCO LOW QUALITY)
					
					$css = '
						#all, #ex, #db{
							 opacity: 0.25;
						}
					';
					
				}else{
					$method = 'All';
				}
				
				

				$txtf = array();
				$tf = array();
				$alvos_total = array();
				$escore = array();
				
				
				$genes_by_tf = array();
				$symbol_tf = array();
				$symbol_gene = array();
				
				
				for($i=0; $i<count($l);$i++){

					$sql_gene .= $l[$i].',';
					$symbol_gene[$l[$i]] = $obj->gene_symbol($l[$i]);
						
				}
				
				$sql_gene = substr($sql_gene, 0, -1);
				
				
				$sql01 = 'SELECT distinct(tf) FROM tf_gene WHERE gene IN ('.$sql_gene.') '.$sql_complet.';';
				

				$query01 = $mysqli->query($sql01);	

				while($dados01 = $query01->fetch_array()){
					$tf[] = $dados01['tf'];
					$symbol_tf[$dados01['tf']] = $obj->gene_symbol($dados01['tf']);
				}
				

				$sql02 = 'SELECT * FROM tf_regulatory_statistics;';

				$query02 = $mysqli->query($sql02);	

				while($dados02 = $query02->fetch_array()){
					$alvos_total[$dados02['tfactor']] = $dados02['alvos_total'];
					$escore[$dados02['tfactor']] = $dados02['escore'];
				}
				
				
				$sql03 = 'SELECT distinct tf, gene FROM tf_gene WHERE gene IN ('.$sql_gene.') '.$sql_complet.';';

				$query03 = $mysqli->query($sql03);	

				while($dados03 = $query03->fetch_array()){
					$genes_by_tf[$dados03['tf']] .= '<li style="background: #DDD;" class="tooltip">'.$symbol_gene[$dados03['gene']].'&nbsp;</li>';
				}
						


				$tf = array_unique($tf);
											


								$sql_total_genes = 'SELECT count(distinct(gene)) as totaltf FROM tf_gene;';	
								$query_sql_total_genes = $mysqli->query($sql_total_genes);

								$totaltf = $query_sql_total_genes->fetch_array();
								$n_total_genes .= $totaltf['totaltf'];								

?>


		<style type="text/css">
							.tooltip, li {
								position: relative;
								display: inline-block;
								
								display: inline;
								float: left; 
								padding: 5px;
								margin: 2.5px;
								border-radius: 5px;
								font-size:small;
							}

							.tooltip a, li a{
								color:#000;
							}.tooltip:hover a, li:hover a{
								color: #FFF;
							}
							
							
							a{
								text-decoration:none;
							}
							
							
							
							table{
								width:100%;								
							}
							
							table tr td {
								border:solid 1px #FAFAFA;
								border-top:none;
								border-left:none;
							}

							table tr.l:hover td span a{
								color:#FFF;
							}
							
							table tr:hover{
								background-color: #f5f5f5;
								background-image: linear-gradient(top,#f5f5f5,#f1f1f1);
							}
							
							table tr td.t{
								border-top: solid 1px #DDD;
							}
							
							
							
							
							
							
							
							
									
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 0.5s;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}

									

									
									
									small{
										color: #fff;
									}
									
									#inmenu li{
										width: 95%;
										margin: 0px;
									}

										<?php 
											echo $css;
										?>
							
			</style>

		<?php
			require_once('../model/TFATConfig.php');
			
			$_GET["l_tf"] = str_replace('%0D%0A','+',$_GET["l_tf"]);
				
			echo '<div style="width: 30%; float: left; padding: 15px; vertical-align: top; background: #FAFAFA;">
					
					<div style="float: right; width: 100%; margin-top: 5%;">					
						
						
						<div style="float: left; margin-bottom:25px; background: none;">
							<div style="width: 100%; float: left; height:25px; border-bottom: 2px solid gold;">
								<h4>Enrichment information</h4>
							</div>
							<div style="text-align: left;">
								<b>Total genes in database:</b> '.$n_total_genes.'<br/>
								<b>Submitted genes:</b> '.count($l).'<br/>
								<b>Transcription Factor found:</b> '.count($tf).'<br/>
								<b>Methodology selected:</b> '.$method.'<br/>
							</div>
						</div>
						
						
						<div class="legenda" style="float: left; margin-bottom:25px; background: none;">
							<div style="width: 100%; float: left; height:25px; border-bottom: 2px solid gold;">
								<h4>Choose the Transcription Factor Accuracy</h4>
							</div>
							<div>
								<div>Low</div>
								<div style="width: 150px;"><h3>&rarr;</h3></div>
								<div>High</div>
							</div>
							<div style="width:100%; float: left;">
								<div style="background:GhostWhite; cursor:pointer;" id="bwhite" class="tooltip">15%</div>
								<div style="background:Gainsboro; cursor:pointer;" id="bddd">30%</div>
								<div style="background:LightSteelBlue; cursor:pointer;" id="bdodgerblue">45%</div>
								<div style="background:PaleGreen; cursor:pointer;" id="byellowgreen">60%</div>
								<div style="background:Khaki; cursor:pointer;" id="byellow">75%</div>
								<div style="background:SandyBrown; cursor:pointer;" id="borange">90%</div>
								<div style="background:Tomato; cursor:pointer;" id="bred">>90%</div>
							</div>
							<div style="width: 100%; float: left; height:50px;">
								<small style="color: #000;">TF Accuracy greater than or equal to '.$stf.'%</small>
							</div>
						</div>
						
						<div style="width:100%; float: left;">
						
							<div style="width: 100%; float: left; height:25px; border-bottom: 2px solid gold;">
								<h4>Choose research methodology</h4>
							</div>
							
								<div style="width:100%; float: left;">
									<ul id="inmenu">
									
										<li style="border-bottom: 1px solid silver; padding-bottom: 15px;"><a href="?mode=enrichment&l_tf='.$_GET["l_tf"].'&accScoreTF='.$_GET["accScoreTF"].'&tissueExpression='.$_GET["tissueExpression"].'&&tfscore=390d56&result=enrichment&method=all"><small style="background:#cc6699;" id="all"   class="tooltip ALL"><small>ALL SOURCES</small></small></a></li>													
									
									
										<li><a href="?mode=enrichment&l_tf='.$_GET["l_tf"].'&accScoreTF='.$_GET["accScoreTF"].'&tissueExpression='.$_GET["tissueExpression"].'&&tfscore=390d56&result=enrichment&method=database"><small style="background:#ffcc66;" id="db"   class="tooltip DB"><small>PUBLIC DATA BASE</small></small></a></li>
										<li style="margin-left: 5%; border-bottom: 1px solid silver; padding-bottom: 15px;">
											<a href="?mode=enrichment&l_tf='.$_GET["l_tf"].'&accScoreTF='.$_GET["accScoreTF"].'&tissueExpression='.$_GET["tissueExpression"].'&&tfscore=390d56&result=enrichment&method=EE"><small style="background:#B22222;". id="db"  class="tooltip EE"><small>ENRICHR[<small>ENCODE</small>]</small></small></a></a>
											<a href="?mode=enrichment&l_tf='.$_GET["l_tf"].'&accScoreTF='.$_GET["accScoreTF"].'&tissueExpression='.$_GET["tissueExpression"].'&&tfscore=390d56&result=enrichment&method=EP"><small style="background:#D2691E;" id="db"  class="tooltip EP"><small>ENRICHR[<small>PWMs</small>]</small></small></a>
											<a href="?mode=enrichment&l_tf='.$_GET["l_tf"].'&accScoreTF='.$_GET["accScoreTF"].'&tissueExpression='.$_GET["tissueExpression"].'&&tfscore=390d56&result=enrichment&method=EC"><small style="background:#A52A2A;" id="db"  class="tooltip EC"><small>ENRICHR[<small>ChEA</small>]</small></small></a>
											<a href="?mode=enrichment&l_tf='.$_GET["l_tf"].'&accScoreTF='.$_GET["accScoreTF"].'&tissueExpression='.$_GET["tissueExpression"].'&&tfscore=390d56&result=enrichment&method=UC"><small style="background:#6B8E23;" id="db"  class="tooltip UC"><small>UCSC/ENCODE</small></small></a>
											<a href="?mode=enrichment&l_tf='.$_GET["l_tf"].'&accScoreTF='.$_GET["accScoreTF"].'&tissueExpression='.$_GET["tissueExpression"].'&&tfscore=390d56&result=enrichment&method=HT"><small style="background:#9966cc;" id="db"  class="tooltip HT"><small>HTRIdb</small></small></a>
										</li>
									
									
										<li><a href="?mode=enrichment&l_tf='.$_GET["l_tf"].'&accScoreTF='.$_GET["accScoreTF"].'&tissueExpression='.$_GET["tissueExpression"].'&&tfscore=390d56&result=enrichment&method=experiment"><small style="background:#cc6666;" id="ex"   class="tooltip EX"><small>CHIP-SEQ EXPERIMENT</small></small></a></li>
										<li style="margin-left: 5%; border-bottom: 1px solid silver; padding-bottom: 15px;">
											<a href="?mode=enrichment&l_tf='.$_GET["l_tf"].'&accScoreTF='.$_GET["accScoreTF"].'&tissueExpression='.$_GET["tissueExpression"].'&&tfscore=390d56&result=enrichment&method=GT"><small style="background:#B8860B;" id="ex"  class="tooltip GT"><small>GTRD</small></small></a>
											<a href="?mode=enrichment&l_tf='.$_GET["l_tf"].'&accScoreTF='.$_GET["accScoreTF"].'&tissueExpression='.$_GET["tissueExpression"].'&&tfscore=390d56&result=enrichment&method=CA"><small style="background:#4682B4;" id="ex"  class="tooltip CA"><small>ChIP-Atlas</small></small></a>
										</li>
									
									
										<li><a href="?mode=enrichment&l_tf='.$_GET["l_tf"].'&accScoreTF='.$_GET["accScoreTF"].'&tissueExpression='.$_GET["tissueExpression"].'&&tfscore=390d56&result=enrichment&method=prediction"><small style="background:#996677;" id="pr"   class="tooltip PR"><small>PREDICTION</small></small></a></li>
											<li style="margin-left: 5%;">
												<a href="?mode=enrichment&l_tf='.$_GET["l_tf"].'&accScoreTF='.$_GET["accScoreTF"].'&tissueExpression='.$_GET["tissueExpression"].'&&tfscore=390d56&result=enrichment&method=HC"><small style="background:#663366;" id="pr"   class="tooltip HC"><small>HOCOMOCO</small></small></a>
											</li>
										
									</ul>
								</div>
						</div>
							
					</div>
				</div>';
				
				
								
				echo '<table style="width: 67%; float: right; margin-bottom: 5%; text-align: center;" id="myTable" class="tablesorter">
						<thead>
							<tr style="background: #FAFAFA; padding: 2.5%;">

								<th style="width: 20%; padding: 15px;">
									TF
								</th>
								
							    <th style="width: 42.5%; padding: 15px;">
									Submitted genes
								</th>
								
								<th style="width: 12.5%; padding: 15px;">
									Target Genes
								</th>
								
								<th style="width: 12.5%; padding: 15px;">
									Genes regulated by TF
								</th>';
								
								if(isset($_GET['pvalue'])){
									echo '<th style="width: 12.5%; padding: 15px;">
										P-Value
									</th>';
								}
							
							echo '</tr>
						</thead>
					<tbody>';
					
						
						$order = 1;
						foreach($tf as $tfactor){
							
							
							if($order%2==0){
								echo '<tr style="background: #FAFAFA;">';
							}else{
								echo '<tr>';
							}
								
								
								echo '<td>										
										<li>';
											//coluna com o fator de transcrição
											if(!empty($tfactor)){
												
												
												$txt = $escore[$tfactor];
												
												if(empty($txt)||$txt<15){
													echo '<li style="background: GhostWhite;" class="tooltip WHITE">
													<span class="tooltiptext">'.$txt.'%</span>
													<a href="?l_tf='.strtoupper($tfactor).'&mode=resume&tfscore=390d56">'.
													$symbol_tf[$tfactor].'</a></li>';
												}else if($txt<30){
													echo '<li style="background: Gainsboro;" class="tooltip DDD">
													<span class="tooltiptext">'.$txt.'%</span>
													<a href="?l_tf='.strtoupper($tfactor).'&mode=resume&tfscore=390d56">'.
													$symbol_tf[$tfactor].'</a></li>';
												}else if($txt<45){
													echo '<li style="background: LightSteelBlue;" class="tooltip DODGERBLUE">
													<span class="tooltiptext">'.$txt.'%</span>
													<a href="?l_tf='.strtoupper($tfactor).'&mode=resume&tfscore=390d56">'.
													$symbol_tf[$tfactor].'</a></li>';
												}else if($txt<60){
													echo '<li style="background: PaleGreen;" class="tooltip YELLOWGREEN">
													<span class="tooltiptext">'.$txt.'%</span>
													<a href="?l_tf='.strtoupper($tfactor).'&mode=resume&tfscore=390d56">'.
													$symbol_tf[$tfactor].'</a></li>';
												}else if($txt<75){
													echo '<li style="background: Khaki;" class="tooltip YELLOW">
													<span class="tooltiptext">'.$txt.'%</span>
													<a href="?l_tf='.strtoupper($tfactor).'&mode=resume&tfscore=390d56">'.
													$symbol_tf[$tfactor].'</a></li>';
												}else if($txt<90){
													echo '<li style="background: SandyBrown;" class="tooltip ORANGE">
													<span class="tooltiptext">'.$txt.'%</span>
													<a href="?l_tf='.strtoupper($tfactor).'&mode=resume&tfscore=390d56">'.
													$symbol_tf[$tfactor].'</a></li>';
												}else{
													echo '<li style="background: Tomato;" class="tooltip RED">
													<span class="tooltiptext">'.$txt.'%</span>
													<a href="?l_tf='.strtoupper($tfactor).'&mode=resume&tfscore=390d56">'.
													$symbol_tf[$tfactor].'</a></li>';
												}								
											}
												
															
								echo '	</li>
								</td>';
								
								echo '<td>
									<ul>';
						
									echo $genes_by_tf[$tfactor];
							
								echo '</ul>
								</td>';	
								
								
								//total de genes
								
								$genes = explode('<li',$genes_by_tf[$tfactor]);
								echo '<td class="l">'.(count($genes)-1).'</td>';
								
								
								//total de genes que o fator de transcrição regula
								echo '<td class="l">';
									echo $alvos_total[$tfactor];
								echo '</td>';
								
								
								
								if(isset($_GET['pvalue'])){
									//p-value
									$p11 = count($genes);
									$p12 = (count($l)-$p11);
									$p21 = $alvos_total[$tfactor];
									$p22 = $n_total_genes-$p21;
									require_once('../model/TFATConfig.php');
									$pvalue = 0;
									$pvalue = shell_exec(getPythonPath().' ./test/fisher_exact.py '.$p11.' '.$p12.' '.$p21.' '.$p22);
									echo '<td class="l" style="vertical-align: middle;">'.$pvalue.'</td>';
								}
								
							$order++;
						}
						
						
						echo '</tbody>
						</table>';

					$mysqli->close();
						
				?></div>
