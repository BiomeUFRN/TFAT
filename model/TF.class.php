<?php
require_once('TFATConfig.php');
class TF {
	

    public function __set($atrib, $value) {
        $this->$atrib = $value;
    }

    public function __get($atrib) {
        return $this->$atrib;
    }
	





//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE///SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCORE//SCO

function consultar_score($lista){
				
				
				$lista = urlencode(trim($lista));			
				$lista = str_replace(array('%2C','+','%3B','%09'),'%0D%0A',$lista);
				$l = explode('%0D%0A', $lista);
				$l = array_filter($l);
				
				$mysqli = getMysqli();
							
				echo mysqli_connect_error();
				if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
						
		
					$sql_total_tf = 'SELECT count(distinct(GeneID)) as totaltf FROM tf_evidence;';	
					$query_sql_total_tf = $mysqli->query($sql_total_tf);

					$totaltf = $query_sql_total_tf->fetch_array();
					$n_total_ft .= $totaltf['totaltf'];
		
	
			
				$acc  = array();
				
				for($i=0; $i<count($l);$i++){
					
					
					$acc_dbd = 0;
					$acc_exp = 0;
					$acc_tgt = 0;
					$acc_dbs = 0;
					
					
					$DbTF = 0;
					$TFClass = 0;
					$UniprotLocationNucleus = 0;
					$Amigo2DNAbinding = 0;
					$GTRD = 0;
					$ChIPAtlas = 0;
					$Vaquerizas = 0;
					$Ravasi = 0;

					$Enrichr = 0;
					$UCSC_ENCODE = 0;
					$HTRIdb = 0;


					$AnimalTFDB = 0;
					$DBD = 0;
					$GOC = 0;
					$JASPAR = 0;
					$ORFeome = 0;
					$TcoF = 0;
					$TFCat = 0;
					$AnimalTFDB2 = 0;
					$GOC2 = 0;
					$FactorBook = 0;
					$TcoFDB2 = 0;
					$JASPAR2018 = 0;
					$SSTAR = 0;
					$HOCOMOCO = 0;
						
						
					$check = '';
					$check = $this->gene_id($l[$i]);
					
					if(!empty($check)&&!empty($l[$i])){
						
						$l[$i] = strtoupper($l[$i]);
						$sql = 'SELECT * FROM tf_evidence WHERE GeneID = '.$this->gene_id($l[$i]).';';				
						$query = $mysqli->query($sql);				
						$dados = $query->fetch_array();
						
									
									//DNA Binding + Location
										if($dados['DbTF']==1){
											$DbTF=1;
											$acc_dbd += 25;
										}
										if($dados['TFClass']==1){
											$TFClass = 1;
											$acc_dbd += 25;
										}
										if($dados['UniprotLocationNucleus']==1){
											$UniprotLocationNucleus = 1;
											$acc_dbd += 25;
										}
										if($dados['Amigo2DNAbinding']==1){
											$Amigo2DNAbinding = 1;
											$acc_dbd += 25;
										}
									
									//Experiments
										if($dados['GTRD']==1){
											$GTRD = 1;
											$acc_exp += 25;
										}
										if($dados['ChIPAtlas']==1){
											$ChIPAtlas = 1;
											$acc_exp += 25;
										}
										if($dados['Vaquerizas']==1){
											$Vaquerizas = 1;
											$acc_exp += 25;
										}
										if($dados['Ravasi']==1){
											$Ravasi = 1;
											$acc_exp += 25;
										}
										
									//Target
										if($dados['Enrichr']==1){
											$Enrichr = 1;
											$acc_tgt += 33.3;
										}
										if($dados['UCSC_ENCODE']==1){
											$UCSC_ENCODE = 1;
											$acc_tgt += 33.3;
										}
										if($dados['HTRIdb']==1){
											$HTRIdb = 1;
											$acc_tgt += 33.3;
										}
										
									//Evidence
										
										if($dados['AnimalTFDB']==1){
											$AnimalTFDB = 1;
											$acc_dbs += 7.14;
										}
										if($dados['DBD']==1){
											$DBD = 1;
											$acc_dbs += 7.14;
										}
										if($dados['GOC']==1){
											$GOC = 1;
											$acc_dbs += 7.14;
										}
										if($dados['JASPAR']==1){
											$JASPAR = 1;
											$acc_dbs += 7.14;
										}
										if($dados['ORFeome']==1){
											$ORFeome = 1;
											$acc_dbs += 7.14;
										}
										if($dados['TcoF']==1){
											$TcoF = 1;
											$acc_dbs += 7.14;
										}
										if($dados['TFCat']==1){
											$TFCat = 1;
											$acc_dbs += 7.14;
										}
										if($dados['AnimalTFDB2']==1){
											$AnimalTFDB2 = 1;
											$acc_dbs += 7.14;
										}
										if($dados['GOC2']==1){
											$GOC2 = 1;
											$acc_dbs += 7.14;
										}
										if($dados['FactorBook']==1){
											$FactorBook = 1;
											$acc_dbs += 7.14;
										}
										if($dados['TcoFDB2']==1){
											$TcoFDB2 = 1;
											$acc_dbs += 7.14;
										}
										if($dados['JASPAR2018']==1){
											$JASPAR2018 = 1;
											$acc_dbs += 7.14;
										}
										if($dados['SSTAR']==1){
											$SSTAR = 1;
											$acc_dbs += 7.14;
										}
										if($dados['HOCOMOCO']==1){
											$HOCOMOCO = 1;
											$acc_dbs += 7.14;
										}


									$acc[$this->gene_id($l[$i])] = (($acc_dbd+$acc_exp+$acc_tgt+$acc_dbs)/4);
					}
					
					
				}
				
				
				
				
				
				echo '<div style="width: 30%; float: left; padding: 15px; vertical-align: top; background: #FAFAFA;">
					
					<div style="float: right; width: 100%; margin-top: 5%;">					
						
						
						<div style="float: left; margin-bottom:25px; background: none;">
							<div style="width: 100%; float: left; height:25px; border-bottom: 2px solid gold;">
								<h4>Transcription Factor Check</h4>
							</div>
							<div style="text-align: left;">
								<b>Total TF in database:</b> '.$n_total_ft.'<br/>
								<b>Submitted Itens:</b> '.count($l).'<br/>
								<b>Checked TF:</b> '.count($acc).'<br/>
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
						</div>							
					</div>
				</div>';
			
				
				echo '<table style="width: 65%; float: right; margin-bottom: 5%; text-align: center;" id="myTable" class="tablesorter">
						<thead>
							<tr style="background: #FAFAFA; padding: 2.5%;">

							    <th style="width: 15%; padding: 15px;">
									Submitted TF
								</th>
								
								<th style="width: 85%; padding: 15px;">
									Reliability
								</th>
							</tr>
						</thead>
					<tbody>';
					
				foreach($acc as $tf => $tx){
					
					$tx = round($tx, 2);
					
					echo '<tr>
							<td style="text-align: left;">
								<a href="?mode=score&l_tf='.$tf.'&tfscore=390d56" style="padding: 15px; text-decoration: none;">'.$this->gene_symbol($tf).'</a>
							</td>
							<td>';
								if(empty($tx)||$tx<15){
									echo '<div style="background: GhostWhite; padding: 5px; width: '.$tx.'%;">'.$tx.'%</div>';
								}else if($tx<30){
									echo '<div style="background: Gainsboro; padding: 5px; width: '.$tx.'%;">'.$tx.'%</div>';
								}else if($tx<45){
									echo '<div style="background: LightSteelBlue; padding: 5px; width: '.$tx.'%;">'.$tx.'%</div>';
								}else if($tx<60){
									echo '<div style="background: PaleGreen; padding: 5px; width: '.$tx.'%;">'.$tx.'%</div>';
								}else if($tx<75){
									echo '<div style="background: Khaki; padding: 5px; width: '.$tx.'%;">'.$tx.'%</div>';
								}else if($tx<90){
									echo '<div style="background: SandyBrown; padding: 5px; width: '.$tx.'%;">'.$tx.'%</div>';
								}else{
									echo '<div style="background: Tomato; padding: 5px; width: '.$tx.'%;">'.$tx.'%</div>';
								}
							echo '</td>
					</tr>';
				}
				
					echo '</tbody>
				</table>';
				
				
				if(count($l)==1){
					
					echo '<div style="width: 65%; float: right; margin-bottom: 5%; text-align: center;">
						<div style="background: #FAFAFA; padding: 2.5%; width: 100%; float: left; color: #5F9EA0; font-size: 15px; font-weight: bold;">
								DNA Binding and Location Nucleus
						</div>
						<table style="padding: 2.5%; width: 100%; float: left; ">
							<tr>
								<td>DbTF</td>
								<td>TFClass</td>
								<td>Uniprot<sup>[Location Nucleus]</sup></td>
								<td>Amigo2<sup>[GOC]</sup></td>
							</tr>
							<tr>';
							
											if($DbTF==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											if($TFClass==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											if($Amigo2DNAbinding==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											if($UniprotLocationNucleus==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
						echo '</tr>
						</table>
						
						
						<div style="background: #FAFAFA; padding: 2.5%; width: 100%; float: left; color: #5F9EA0; font-size: 15px; font-weight: bold;">
								Experiments
						</div>
						<table style="padding: 2.5%; width: 100%; float: left; ">
							<tr>
								<td>GTRD<sup>[Target]</sup></td>
								<td>ChIP-Atlas<sup>[Target]</sup></td>
								<td>Vaquerizas et al</td>
								<td>Ravasi et al</td>
							</tr>
							<tr>';
							
											if($GTRD==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											if($ChIPAtlas==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											if($Ravasi==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											if($Vaquerizas==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
						echo '</tr>
						</table>
						
						
						<div style="background: #FAFAFA; padding: 2.5%; width: 100%; float: left; color: #5F9EA0; font-size: 15px; font-weight: bold;">
								Literature with Target Genes
						</div>
						<table style="padding: 2.5%; width: 100%; float: left; ">
							<tr>
								<td>Enrichr</td>
								<td>UCSC/ENCODE</td>
								<td>HTRIdb</td>
							</tr>
							<tr>';
							
											if($Enrichr==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											if($UCSC_ENCODE==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											if($HTRIdb==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
						echo '</tr>
						</table>
						
						
						<div style="background: #FAFAFA; padding: 2.5%; width: 100%; float: left; color: #5F9EA0; font-size: 15px; font-weight: bold;">
								Another Databases
						</div>
						<table style="padding: 2.5%; width: 100%; float: left; ">
							<tr>
								<td>AnimalTFDB</td>
								<td>DBD</td>
								<td>GOC</td>
								<td>JASPAR</td>
								<td>ORFeome</td>
								<td>TcoF</td>
								<td>TFCat</td>
							</tr>
							<tr>';
							
											if($AnimalTFDB==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											if($DBD==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											if($GOC==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											if($JASPAR==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											if($ORFeome==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											if($TcoF==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											
											if($TFCat==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
						echo '</tr>
							 <tr style="font-size: small;">
								<td>AnimalTFDB<sup>[v.2.0]</sup></td>
								<td>FactorBook</td>
								<td>GOC<sup>[2017]</sup></td>
								<td>JASPAR<sup>[2018]</sup></td>
								<td>HOCOMOCO<sup>[v.11]</sup></td>
								<td>TcoFDB<sup>[v.2]</sup></td>
								<td>SSTAR</td>
							</tr>';
							
											if($AnimalTFDB2==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											if($FactorBook==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											if($GOC2==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											if($JASPAR2018==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}											
											
											if($HOCOMOCO==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											
											if($TcoFDB2==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
											
											if($SSTAR==1){
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/512/Tick_Mark-16.png"/></td>';
											}else{
												echo '<td><img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Close_Icon-16.png"/></td>';
											}
											
							echo '<tr>
						</table>
						
						
					</div>';
					
				}
				
			$mysqli->close();
			
}

			



			
			
//ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT 
//ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT 
//ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT //ENRICHMENT 
			
function consultar_enrichment($lista, $metodologia, $stf, $tev){

			$_GET['l_tf'] = urlencode($_GET['l_tf']);
			$_GET['l_tf'] = str_replace(array('%2C','+','%3B','%09'),'%0D%0A',$_GET['l_tf']);
			
			
	$method = '';
			
	if(!isset($_GET['method'])){
			
			
			if(isset($_GET['prediction'])){
				$method = 'prediction';
			}
			
			if(isset($_GET['database'])){
				$method = 'database';
			}
			
			if(isset($_GET['experiment'])){
				$method = 'experiment';
			}
			
			if(isset($_GET['database'])&&isset($_GET['experiment'])&&isset($_GET['prediction'])){
				$method = 'all';	
			}
			
			if(isset($_GET['database'])&&isset($_GET['experiment'])&&!isset($_GET['prediction'])){
				$method = 'all';	
			}
			
			if(isset($_GET['database'])&&!isset($_GET['experiment'])&&isset($_GET['prediction'])){
				$method = 'all';	
			}
			
			if(!isset($_GET['database'])&&isset($_GET['experiment'])&&isset($_GET['prediction'])){
				$method = 'all';	
			}
			
			if(!isset($_GET['database'])&&!isset($_GET['experiment'])&&!isset($_GET['prediction'])){
				$method = 'all';	
			}
			
			
			
			$list_tf = '';
			$list_verifield = '';
			$l = explode('%0D%0A', strtoupper($_GET['l_tf']));
			
			$gverifield = 0;
			$gverifield_html = '';
			$nfound = 0;
			$nfound_html = '';
			for($i=0; $i<count($l);$i++){
				
			
				if(!empty($l[$i])){
					$check = '';
					$check = $this->gene_id($l[$i]);
					
					if(!empty($check)){
						$gverifield_html .= '<span style="background: #6B8E23; color: #FFF; padding: 5px; border-radius:5px; margin: 10% 15px;">'.$l[$i].'</span> ';
						$list_verifield .= $check.'+';
						$gverifield++;
												
					}else{
						$nfound_html .= '<span style="background: #A52A2A; color: #FFF; padding: 5px; border-radius:5px; margin: 10% 15px;">'.$l[$i].'</span> ';
						$nfound++;
					}
				}
			}
			
		$list_verifield = substr($list_verifield,0,-1);
		
		$url = '?mode=enrichment&l_tf='.$list_verifield.'&accScoreTF='.$_GET['accScoreTF'].'&tissueExpression='.$_GET['tissueExpression'].'
		&&tfscore=390d56&pvalue=1&result='.$_GET['result'].'&method='.$method;
		
		$_SERVER['HTTP_HOST'];
		$_SERVER['REQUEST_URI'];
		
		$diretorio = explode('?', $_SERVER['REQUEST_URI']);
		
		header('Location: '.$url);
		
		
	}else{
	
			//páginas incorporadas
			if($_GET['result']=="summary"){
				$url = 'enrichment_resume.php';
				include($url);
			}else if($_GET['result']=="enrichment"){
				$url = 'enrichment_table.php';
				include($url);
			}else if($_GET['result']=="backup"){
				$url = 'enrichment_resume_melhor_backup.php';
				include($url);
			}else if($_GET['result']=="tissue"){
				$url = 'enrichment_tissue.php';
				include($url);
			}else{
				require_once('TFATConfig.php');
				echo '<iframe width="100%" height="750" src="'.getTFATServerAddress().'/enrichment_network.php?&listGene=T&accScore='.$_GET['accScoreTF'].'" frameborder="0" allowfullscreen></iframe>';
			}
		
	}
				

}
			
			
//class


//TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET 
//TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET 
//TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET 
//TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET //TARGET 
			
		function consultar_target($lista){
				
				
				$lista = urlencode(trim($lista));			
				$lista = str_replace(array('%2C','+','%3B','%09'),'%0D%0A',$lista);
				$l = explode('%0D%0A', $lista);
				
				
				$mysqli = getMysqli();
				echo mysqli_connect_error();
				if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
				
				
				$lista_genes = array();
				
				
				echo '<div style="width: 100%; height: auto; margin: auto;">


				
						<style>
							.tooltip {
								position: relative;
								display: inline-block;
								
								display: inline;
								float: left; 
								padding: 5px;
								margin: 2.5px;
								border-radius: 5px;
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
								transition: opacity 1s;
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
							</style>

						<div>
							<h2>All regulated Genes from ChIP-Seq Experiments and Public Data Base</h2>
							
							<br/><br/>
								<hr/>
							<br/><br/>
							
						</div>';
					
						for($i=0; $i<count($l);$i++){
							
							
								$l[$i] = strtoupper($l[$i]);
								$sql = 'SELECT distinct(gene) FROM tf_gene WHERE tf = '.$l[$i].';';	
								$query = $mysqli->query($sql);	
								
								echo '<div style="width: 22.5%; float: left; text-align: center;">
												<h3><a href="?l_tf='.$l[$i].'&mode=enrichment&tfscore=390d56">'.strtoupper($l[$i]).'</a></h3>
												<br/>list '.mysqli_num_rows($query).' Genes
									  </div>
									  
									  <div style="width: 72.5%; float: right;">
										<ul>';
								while($dados = $query->fetch_array()){
										
										$sub_sql = 'SELECT tx, txup FROM tf_tx_score WHERE tf LIKE "'.$dados['gene'].'";';	
										$sub_query = $mysqli->query($sub_sql);
																				
										
										if(mysqli_num_rows($sub_query)==0){
											
										
												echo '<li class="tooltip">
													<span class="tooltiptext">TF score: 0%</span>';
												
										}else{
													
												$sub_dados = $sub_query->fetch_array();
										
												$tx_tf = ($sub_dados['tx']+$sub_dados['txup']);
												$txt = ((100*$tx_tf)/20);
											
												if($txt<20){
													echo '<li style="background: DODGERBLUE;" class="tooltip">
														<span class="tooltiptext">TF score: '.$txt.'%</span>';
												}else if($txt<40){
													echo '<li style="background: YELLOWGREEN;" class="tooltip">
														<span class="tooltiptext">TF score: '.$txt.'%</span>';
												}else if($txt<60){
													echo '<li style="background: YELLOW;" class="tooltip">
														<span class="tooltiptext">TF score: '.$txt.'%</span>';
												}else if($txt<80){
													echo '<li style="background: ORANGE;" class="tooltip">
														<span class="tooltiptext">TF score: '.$txt.'%</span>';
												}else{
													echo '<li style="background: RED;" class="tooltip">
														<span class="tooltiptext">TF score: '.$txt.'%</span>';
												}
													
										}
													echo $dados['gene'].'&nbsp;</li>';
													
								}
								echo '</ul>
									</div>
								<div style="width: 100%; float: left;">
								
									<br/><br/>
										<hr/>
									<br/><br/>
								
								</div>';
								
					
						}

				echo '</div>';
				
				
				$mysqli->close();
					
					
			

		}
		
		
		
		
		
//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT
//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT
//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT//CONVERT

		function gene_id($symbol){

			$entrez = '';
			
			$mysqli = getMysqli();
							
			echo mysqli_connect_error();
			if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
			
			$symbol = strtoupper($symbol);
			
				$sql = 'select GeneID from hsgeneinfo where Symbol LIKE "'.$symbol.'" OR GeneID LIKE "'.$symbol.'";';
			
				$q = $mysqli->query($sql);								
				$d = $q->fetch_array();
				
				if(mysqli_num_rows($q)>0){
					
					$entrez = $d['GeneID'];
					
				}else{
					
					$sql = 'select GeneID from hsgeneinfo where Synonyms LIKE "%|'.$symbol.'|%" 
					OR Synonyms LIKE "'.$symbol.'|%" OR Synonyms LIKE "%|'.$symbol.'" OR Synonyms LIKE "'.$symbol.'"';	
					
					$q = $mysqli->query($sql);								
					$d = $q->fetch_array();
					
					$entrez = $d['GeneID'];
					
				}
													
						
			return($entrez);
			
		}
			
				
				
		function gene_symbol($id){
			
			$mysqli = getMysqli();
							
			echo mysqli_connect_error();
			if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
			
			$sql = 'select Symbol from hsgeneinfo where GeneID = '.$id.';';	
				$q = $mysqli->query($sql);				
				$d = $q->fetch_array();
					$symbol = $d['Symbol'];								
						
			return($symbol);
			
		}
	
			



	function convert_list($lista, $to){
		
		$_GET['l_tf'] = urlencode($_GET['l_tf']);
		$_GET['l_tf'] = str_replace(array('%2C','+','%3B','%09'),'%0D%0A',$_GET['l_tf']);
		
		
			$l = explode('%0D%0A', strtoupper($_GET['l_tf']));
			
	
	$from = '';
	
	if($to == 'GeneID'){
		$from = 'Symbol';
		$to = 'GeneID';
	}else{
		$to = 'Symbol';
		$from = 'GeneID';
	}
			
			
			echo '<div style="width: 30%; float: left; padding: 15px; vertical-align: top; background: #FAFAFA;">
					
					<div style="float: right; width: 100%; margin-top: 5%;">					
						
						
						<div style="float: left; margin-bottom:25px; background: none;">
							<div style="width: 100%; float: left; height:25px; border-bottom: 2px solid gold;">
								<h4>Convert from '.$from.' to '.$to.'</h4>
							</div>
							<div style="text-align: left;">
								<b>Submitted Itens:</b> '.count($l).'<br/>
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
						</div>							
					</div>
				</div>';
				
			
				echo '<table style="width: 65%; float: right; margin-bottom: 5%; text-align: center;" id="myTable" class="tablesorter">
						<thead>
							<tr style="background: #FAFAFA; padding: 2.5%;">

							    <th style="width: 15%; padding: 15px;">
									'.$from.'
								</th>
								
								<th style="width: 85%; padding: 15px;">
									'.$to.'
								</th>
							</tr>
						</thead>
					<tbody>';
				
				$order = 1;
				
				if($to == 'GeneID'){
					
					for($i=0; $i<count($l);$i++){				
			
						if(!empty($l[$i])){
							
							if($order%2==0){
								echo '<tr style="background: #FAFAFA;">';
							}else{
								echo '<tr>';
							}
							
							echo '
								<td style="padding: 10px;">'.$l[$i].'</td>
								<td>'.$this->gene_id($l[$i]).'</td>
							</tr>';
						}
						
						$order++;
					}
					
				}else{
					
					for($i=0; $i<count($l);$i++){				
			
						if(!empty($l[$i])){
							
							if($order%2==0){
								echo '<tr style="background: #FAFAFA;">';
							}else{
								echo '<tr>';
							}
							
							echo '
								<td style="padding: 10px;">'.$l[$i].'</td>
								<td>'.$this->gene_symbol($l[$i]).'</td>
							</tr>';
						}
						
						$order++;
					}
				}
						
			
					
						

			
				echo '</tbody>
				</table>';
		
		
	}
	
	
	
	function pwm_scan_hocomoco($gene, $mode){
		
		
		
		$tf_model = [
		"AHR_HUMAN.H11MO.0.B" => "AHR",
		"AIRE_HUMAN.H11MO.0.C" => "AIRE",
		"ALX1_HUMAN.H11MO.0.B" => "ALX1",
		"ALX3_HUMAN.H11MO.0.D" => "ALX3",
		"ALX4_HUMAN.H11MO.0.D" => "ALX4",
		"ANDR_HUMAN.H11MO.0.A" => "AR",
		"ANDR_HUMAN.H11MO.1.A" => "AR",
		"ANDR_HUMAN.H11MO.2.A" => "AR",
		"AP2A_HUMAN.H11MO.0.A" => "TFAP2A",
		"AP2B_HUMAN.H11MO.0.B" => "TFAP2B",
		"AP2C_HUMAN.H11MO.0.A" => "TFAP2C",
		"AP2D_HUMAN.H11MO.0.D" => "TFAP2D",
		"ARI3A_HUMAN.H11MO.0.D" => "ARID3A",
		"ARI5B_HUMAN.H11MO.0.C" => "ARID5B",
		"ARNT2_HUMAN.H11MO.0.D" => "ARNT2",
		"ARNT_HUMAN.H11MO.0.B" => "ARNT",
		"ARX_HUMAN.H11MO.0.D" => "ARX",
		"ASCL1_HUMAN.H11MO.0.A" => "ASCL1",
		"ASCL2_HUMAN.H11MO.0.D" => "ASCL2",
		"ATF1_HUMAN.H11MO.0.B" => "ATF1",
		"ATF2_HUMAN.H11MO.0.B" => "ATF2",
		"ATF2_HUMAN.H11MO.1.B" => "ATF2",
		"ATF2_HUMAN.H11MO.2.C" => "ATF2",
		"ATF3_HUMAN.H11MO.0.A" => "ATF3",
		"ATF4_HUMAN.H11MO.0.A" => "ATF4",
		"ATF6A_HUMAN.H11MO.0.B" => "ATF6",
		"ATF7_HUMAN.H11MO.0.D" => "ATF7",
		"ATOH1_HUMAN.H11MO.0.B" => "ATOH1",
		"BACH1_HUMAN.H11MO.0.A" => "BACH1",
		"BACH2_HUMAN.H11MO.0.A" => "BACH2",
		"BARH1_HUMAN.H11MO.0.D" => "BARHL1",
		"BARH2_HUMAN.H11MO.0.D" => "BARHL2",
		"BARX1_HUMAN.H11MO.0.D" => "BARX1",
		"BARX2_HUMAN.H11MO.0.D" => "BARX2", 
		"BATF3_HUMAN.H11MO.0.B" => "BATF3", 
		"BATF_HUMAN.H11MO.0.A" => "BATF", 
		"BATF_HUMAN.H11MO.1.A" => "BATF", 
		"BC11A_HUMAN.H11MO.0.A" => "BCL11A",
		"BCL6B_HUMAN.H11MO.0.D" => "BCL6B",
		"BCL6_HUMAN.H11MO.0.A" => "BCL6", 
		"BHA15_HUMAN.H11MO.0.B" => "BHLHA15",
		"BHE22_HUMAN.H11MO.0.D" => "BHLHE22", 
		"BHE23_HUMAN.H11MO.0.D" => "BHLHE23", 
		"BHE40_HUMAN.H11MO.0.A" => "BHLHE40", 
		"BHE41_HUMAN.H11MO.0.D" => "BHLHE41", 
		"BMAL1_HUMAN.H11MO.0.A" => "ARNTL", 
		"BPTF_HUMAN.H11MO.0.D" => "BPTF", 
		"BRAC_HUMAN.H11MO.0.A" => "T", 
		"BRAC_HUMAN.H11MO.1.B" => "T", 
		"BRCA1_HUMAN.H11MO.0.D" => "BRCA1",
		"BSH_HUMAN.H11MO.0.D" => "BSX", 
		"CDC5L_HUMAN.H11MO.0.D" => "CDC5L",
		"CDX1_HUMAN.H11MO.0.C" => "CDX1", 
		"CDX2_HUMAN.H11MO.0.A" => "CDX2", 
		"CEBPA_HUMAN.H11MO.0.A" => "CEBPA", 
		"CEBPB_HUMAN.H11MO.0.A" => "CEBPB",
		"CEBPD_HUMAN.H11MO.0.C" => "CEBPD",
		"CEBPE_HUMAN.H11MO.0.A" => "CEBPE", 
		"CEBPG_HUMAN.H11MO.0.B" => "CEBPG", 
		"CEBPZ_HUMAN.H11MO.0.D" => "CEBPZ", 
		"CENPB_HUMAN.H11MO.0.D" => "CENPB", 
		"CLOCK_HUMAN.H11MO.0.C" => "CLOCK", 
		"COE1_HUMAN.H11MO.0.A" => "EBF1",
		"COT1_HUMAN.H11MO.0.C" => "NR2F1",
		"COT1_HUMAN.H11MO.1.C" => "NR2F1", 
		"COT2_HUMAN.H11MO.0.A" => "NR2F2", 
		"COT2_HUMAN.H11MO.1.A" => "NR2F2", 
		"CPEB1_HUMAN.H11MO.0.D" => "CPEB1", 
		"CR3L1_HUMAN.H11MO.0.D" => "CREB3L1",
		"CR3L2_HUMAN.H11MO.0.D" => "CREB3L2", 
		"CREB1_HUMAN.H11MO.0.A" => "CREB1", 
		"CREB3_HUMAN.H11MO.0.D" => "CREB3", 
		"CREB5_HUMAN.H11MO.0.D" => "CREB5", 
		"CREM_HUMAN.H11MO.0.C" => "CREM", 
		"CRX_HUMAN.H11MO.0.B" => "CRX", 
		"CTCFL_HUMAN.H11MO.0.A" => "CTCFL",
		"CTCF_HUMAN.H11MO.0.A" => "CTCF",
		"CUX1_HUMAN.H11MO.0.C" => "CUX1", 
		"CUX2_HUMAN.H11MO.0.D" => "CUX2", 
		"CXXC1_HUMAN.H11MO.0.D" => "CXXC1",
		"DBP_HUMAN.H11MO.0.B" => "DBP",
		"DDIT3_HUMAN.H11MO.0.D" => "DDIT3", 
		"DLX1_HUMAN.H11MO.0.D" => "DLX1", 
		"DLX2_HUMAN.H11MO.0.D" => "DLX2", 
		"DLX3_HUMAN.H11MO.0.C" => "DLX3", 
		"DLX4_HUMAN.H11MO.0.D" => "DLX4", 
		"DLX5_HUMAN.H11MO.0.D" => "DLX5", 
		"DLX6_HUMAN.H11MO.0.D" => "DLX6", 
		"DMBX1_HUMAN.H11MO.0.D" => "DMBX1",
		"DMRT1_HUMAN.H11MO.0.D" => "DMRT1",
		"DPRX_HUMAN.H11MO.0.D" => "DPRX",
		"DRGX_HUMAN.H11MO.0.D" => "DRGX",
		"DUX4_HUMAN.H11MO.0.A" => "DUX4",
		"DUXA_HUMAN.H11MO.0.D" => "DUXA", 
		"E2F1_HUMAN.H11MO.0.A" => "E2F1", 
		"E2F2_HUMAN.H11MO.0.B" => "E2F2", 
		"E2F3_HUMAN.H11MO.0.A" => "E2F3", 
		"E2F4_HUMAN.H11MO.0.A" => "E2F4", 
		"E2F4_HUMAN.H11MO.1.A" => "E2F4", 
		"E2F5_HUMAN.H11MO.0.B" => "E2F5", 
		"E2F6_HUMAN.H11MO.0.A" => "E2F6", 
		"E2F7_HUMAN.H11MO.0.B" => "E2F7", 
		"E2F8_HUMAN.H11MO.0.D" => "E2F8", 
		"E4F1_HUMAN.H11MO.0.D" => "E4F1", 
		"EGR1_HUMAN.H11MO.0.A" => "EGR1", 
		"EGR2_HUMAN.H11MO.0.A" => "EGR2", 
		"EGR2_HUMAN.H11MO.1.A" => "EGR2", 
		"EGR3_HUMAN.H11MO.0.D" => "EGR3", 
		"EGR4_HUMAN.H11MO.0.D" => "EGR4", 
		"EHF_HUMAN.H11MO.0.B" => "EHF", 
		"ELF1_HUMAN.H11MO.0.A" => "ELF1",
		"ELF2_HUMAN.H11MO.0.C" => "ELF2", 
		"ELF3_HUMAN.H11MO.0.A" => "ELF3", 
		"ELF5_HUMAN.H11MO.0.A" => "ELF5", 
		"ELK1_HUMAN.H11MO.0.B" => "ELK1", 
		"ELK3_HUMAN.H11MO.0.D" => "ELK3", 
		"ELK4_HUMAN.H11MO.0.A" => "ELK4", 
		"EMX1_HUMAN.H11MO.0.D" => "EMX1", 
		"EMX2_HUMAN.H11MO.0.D" => "EMX2", 
		"EOMES_HUMAN.H11MO.0.D" => "EOMES", 
		"EPAS1_HUMAN.H11MO.0.B" => "EPAS1", 
		"ERG_HUMAN.H11MO.0.A" => "ERG", 
		"ERR1_HUMAN.H11MO.0.A" => "ESRRA", 
		"ERR2_HUMAN.H11MO.0.A" => "ESRRB", 
		"ERR3_HUMAN.H11MO.0.B" => "ESRRG", 
		"ESR1_HUMAN.H11MO.0.A" => "ESR1", 
		"ESR1_HUMAN.H11MO.1.A" => "ESR1", 
		"ESR2_HUMAN.H11MO.0.A" => "ESR2", 
		"ESR2_HUMAN.H11MO.1.A" => "ESR2", 
		"ESX1_HUMAN.H11MO.0.D" => "ESX1", 
		"ETS1_HUMAN.H11MO.0.A" => "ETS1", 
		"ETS2_HUMAN.H11MO.0.B" => "ETS2", 
		"ETV1_HUMAN.H11MO.0.A" => "ETV1", 
		"ETV2_HUMAN.H11MO.0.B" => "ETV2", 
		"ETV3_HUMAN.H11MO.0.D" => "ETV3", 
		"ETV4_HUMAN.H11MO.0.B" => "ETV4", 
		"ETV5_HUMAN.H11MO.0.C" => "ETV5", 
		"ETV6_HUMAN.H11MO.0.D" => "ETV6", 
		"ETV7_HUMAN.H11MO.0.D" => "ETV7", 
		"EVI1_HUMAN.H11MO.0.B" => "MECOM", 
		"EVX1_HUMAN.H11MO.0.D" => "EVX1", 
		"EVX2_HUMAN.H11MO.0.A" => "EVX2", 
		"FEV_HUMAN.H11MO.0.B" => "FEV", 
		"FEZF1_HUMAN.H11MO.0.C" => "FEZF1", 
		"FIGLA_HUMAN.H11MO.0.D" => "FIGLA", 
		"FLI1_HUMAN.H11MO.0.A" => "FLI1", 
		"FLI1_HUMAN.H11MO.1.A" => "FLI1", 
		"FOSB_HUMAN.H11MO.0.A" => "FOSB", 
		"FOSL1_HUMAN.H11MO.0.A" => "FOSL1", 
		"FOSL2_HUMAN.H11MO.0.A" => "FOSL2", 
		"FOS_HUMAN.H11MO.0.A" => "FOS", 
		"FOXA1_HUMAN.H11MO.0.A" => "FOXA1", 
		"FOXA2_HUMAN.H11MO.0.A" => "FOXA2", 
		"FOXA3_HUMAN.H11MO.0.B" => "FOXA3", 
		"FOXB1_HUMAN.H11MO.0.D" => "FOXB1", 
		"FOXC1_HUMAN.H11MO.0.C" => "FOXC1", 
		"FOXC2_HUMAN.H11MO.0.D" => "FOXC2", 
		"FOXD1_HUMAN.H11MO.0.D" => "FOXD1", 
		"FOXD2_HUMAN.H11MO.0.D" => "FOXD2",
		"FOXD3_HUMAN.H11MO.0.D" => "FOXD3", 
		"FOXF1_HUMAN.H11MO.0.D" => "FOXF1", 
		"FOXF2_HUMAN.H11MO.0.D" => "FOXF2", 
		"FOXG1_HUMAN.H11MO.0.D" => "FOXG1", 
		"FOXH1_HUMAN.H11MO.0.A" => "FOXH1", 
		"FOXI1_HUMAN.H11MO.0.B" => "FOXI1", 
		"FOXJ2_HUMAN.H11MO.0.C" => "FOXJ2", 
		"FOXJ3_HUMAN.H11MO.0.A" => "FOXJ3", 
		"FOXJ3_HUMAN.H11MO.1.B" => "FOXJ3", 
		"FOXK1_HUMAN.H11MO.0.A" => "FOXK1", 
		"FOXL1_HUMAN.H11MO.0.D" => "FOXL1", 
		"FOXM1_HUMAN.H11MO.0.A" => "FOXM1", 
		"FOXO1_HUMAN.H11MO.0.A" => "FOXO1", 
		"FOXO3_HUMAN.H11MO.0.B" => "FOXO3", 
		"FOXO4_HUMAN.H11MO.0.C" => "FOXO4", 
		"FOXO6_HUMAN.H11MO.0.D" => "FOXO6", 
		"FOXP1_HUMAN.H11MO.0.A" => "FOXP1", 
		"FOXP2_HUMAN.H11MO.0.C" => "FOXP2", 
		"FOXP3_HUMAN.H11MO.0.D" => "FOXP3", 
		"FOXQ1_HUMAN.H11MO.0.C" => "FOXQ1", 
		"FUBP1_HUMAN.H11MO.0.D" => "FUBP1", 
		"GABPA_HUMAN.H11MO.0.A" => "GABPA", 
		"GATA1_HUMAN.H11MO.0.A" => "GATA1", 
		"GATA1_HUMAN.H11MO.1.A" => "GATA1", 
		"GATA2_HUMAN.H11MO.0.A" => "GATA2", 
		"GATA2_HUMAN.H11MO.1.A" => "GATA2", 
		"GATA3_HUMAN.H11MO.0.A" => "GATA3", 
		"GATA4_HUMAN.H11MO.0.A" => "GATA4", 
		"GATA5_HUMAN.H11MO.0.D" => "GATA5",
		"GATA6_HUMAN.H11MO.0.A" => "GATA6",
		"GBX1_HUMAN.H11MO.0.D" => "GBX1",
		"GBX2_HUMAN.H11MO.0.D" => "GBX2",
		"GCM1_HUMAN.H11MO.0.D" => "GCM1",
		"GCM2_HUMAN.H11MO.0.D" => "GCM2",
		"GCR_HUMAN.H11MO.0.A" => "NR3C1",
		"GCR_HUMAN.H11MO.1.A" => "NR3C1",
		"GFI1B_HUMAN.H11MO.0.A" => "GFI1B",
		"GFI1_HUMAN.H11MO.0.C" => "GFI1",
		"GLI1_HUMAN.H11MO.0.D" => "GLI1",
		"GLI2_HUMAN.H11MO.0.D" => "GLI2",
		"GLI3_HUMAN.H11MO.0.B" => "GLI3",
		"GLIS1_HUMAN.H11MO.0.D" => "GLIS1",
		"GLIS2_HUMAN.H11MO.0.D" => "GLIS2",
		"GLIS3_HUMAN.H11MO.0.D" => "GLIS3",
		"GMEB2_HUMAN.H11MO.0.D" => "GMEB2",
		"GRHL1_HUMAN.H11MO.0.D" => "GRHL1",
		"GRHL2_HUMAN.H11MO.0.A" => "GRHL2",
		"GSC2_HUMAN.H11MO.0.D" => "GSC2",
		"GSC_HUMAN.H11MO.0.D" => "GSC",
		"GSX1_HUMAN.H11MO.0.D" => "GSX1",
		"GSX2_HUMAN.H11MO.0.D" => "GSX2",
		"HAND1_HUMAN.H11MO.0.D" => "HAND1",
		"HAND1_HUMAN.H11MO.1.D" => "HAND1",
		"HBP1_HUMAN.H11MO.0.D" => "HBP1",
		"HEN1_HUMAN.H11MO.0.C" => "NHLH1",
		"HES1_HUMAN.H11MO.0.D" => "HES1",
		"HES5_HUMAN.H11MO.0.D" => "HES5",
		"HES7_HUMAN.H11MO.0.D" => "HES7",
		"HESX1_HUMAN.H11MO.0.D" => "HESX1",
		"HEY1_HUMAN.H11MO.0.D" => "HEY1",
		"HEY2_HUMAN.H11MO.0.D" => "HEY2",
		"HIC1_HUMAN.H11MO.0.C" => "HIC1",
		"HIC2_HUMAN.H11MO.0.D" => "HIC2",
		"HIF1A_HUMAN.H11MO.0.C" => "HIF1A",
		"HINFP_HUMAN.H11MO.0.C" => "HINFP",
		"HLF_HUMAN.H11MO.0.C" => "HLF",
		"HLTF_HUMAN.H11MO.0.D" => "HLTF",
		"HMBX1_HUMAN.H11MO.0.D" => "HMBOX1",
		"HME1_HUMAN.H11MO.0.D" => "EN1",
		"HME2_HUMAN.H11MO.0.D" => "EN2",
		"HMGA1_HUMAN.H11MO.0.D" => "HMGA1",
		"HMGA2_HUMAN.H11MO.0.D" => "HMGA2",
		"HMX1_HUMAN.H11MO.0.D" => "HMX1",
		"HMX2_HUMAN.H11MO.0.D" => "HMX2",
		"HMX3_HUMAN.H11MO.0.D" => "HMX3",
		"HNF1A_HUMAN.H11MO.0.C" => "HNF1A",
		"HNF1B_HUMAN.H11MO.0.A" => "HNF1B",
		"HNF1B_HUMAN.H11MO.1.A" => "HNF1B",
		"HNF4A_HUMAN.H11MO.0.A" => "HNF4A",
		"HNF4G_HUMAN.H11MO.0.B" => "HNF4G",
		"HNF6_HUMAN.H11MO.0.B" => "ONECUT1",
		"HOMEZ_HUMAN.H11MO.0.D" => "HOMEZ",
		"HSF1_HUMAN.H11MO.0.A" => "HSF1",
		"HSF1_HUMAN.H11MO.1.A" => "HSF1",
		"HSF2_HUMAN.H11MO.0.A" => "HSF2",
		"HSF4_HUMAN.H11MO.0.D" => "HSF4",
		"HSFY1_HUMAN.H11MO.0.D" => "HSFY1/HSFY2",
		"HTF4_HUMAN.H11MO.0.A" => "TCF12",
		"HXA10_HUMAN.H11MO.0.C" => "HOXA10",
		"HXA11_HUMAN.H11MO.0.D" => "HOXA11",
		"HXA13_HUMAN.H11MO.0.C" => "HOXA13",
		"HXA1_HUMAN.H11MO.0.C" => "HOXA1",
		"HXA2_HUMAN.H11MO.0.D" => "HOXA2",
		"HXA5_HUMAN.H11MO.0.D" => "HOXA5",
		"HXA7_HUMAN.H11MO.0.D" => "HOXA7",
		"HXA9_HUMAN.H11MO.0.B" => "HOXA9",
		"HXB13_HUMAN.H11MO.0.A" => "HOXB13",
		"HXB1_HUMAN.H11MO.0.D" => "HOXB1",
		"HXB2_HUMAN.H11MO.0.D" => "HOXB2",
		"HXB3_HUMAN.H11MO.0.D" => "HOXB3",
		"HXB4_HUMAN.H11MO.0.B" => "HOXB4",
		"HXB6_HUMAN.H11MO.0.D" => "HOXB6",
		"HXB7_HUMAN.H11MO.0.C" => "HOXB7",
		"HXB8_HUMAN.H11MO.0.C" => "HOXB8",
		"HXC10_HUMAN.H11MO.0.D" => "HOXC10",
		"HXC11_HUMAN.H11MO.0.D" => "HOXC11",
		"HXC12_HUMAN.H11MO.0.D" => "HOXC12",
		"HXC13_HUMAN.H11MO.0.D" => "HOXC13",
		"HXC6_HUMAN.H11MO.0.D" => "HOXC6",
		"HXC8_HUMAN.H11MO.0.D" => "HOXC8",
		"HXC9_HUMAN.H11MO.0.C" => "HOXC9",
		"HXD10_HUMAN.H11MO.0.D" => "HOXD10",
		"HXD11_HUMAN.H11MO.0.D" => "HOXD11",
		"HXD12_HUMAN.H11MO.0.D" => "HOXD12",
		"HXD13_HUMAN.H11MO.0.D" => "HOXD13",
		"HXD3_HUMAN.H11MO.0.D" => "HOXD3",
		"HXD4_HUMAN.H11MO.0.D" => "HOXD4",
		"HXD8_HUMAN.H11MO.0.D" => "HOXD8",
		"HXD9_HUMAN.H11MO.0.D" => "HOXD9",
		"ID4_HUMAN.H11MO.0.D" => "ID4",
		"IKZF1_HUMAN.H11MO.0.C" => "IKZF1",
		"INSM1_HUMAN.H11MO.0.C" => "INSM1",
		"IRF1_HUMAN.H11MO.0.A" => "IRF1",
		"IRF2_HUMAN.H11MO.0.A" => "IRF2",
		"IRF3_HUMAN.H11MO.0.B" => "IRF3",
		"IRF4_HUMAN.H11MO.0.A" => "IRF4",
		"IRF5_HUMAN.H11MO.0.D" => "IRF5",
		"IRF7_HUMAN.H11MO.0.C" => "IRF7",
		"IRF8_HUMAN.H11MO.0.B" => "IRF8",
		"IRF9_HUMAN.H11MO.0.C" => "IRF9",
		"IRX2_HUMAN.H11MO.0.D" => "IRX2",
		"IRX3_HUMAN.H11MO.0.D" => "IRX3",
		"ISL1_HUMAN.H11MO.0.A" => "ISL1",
		"ISL2_HUMAN.H11MO.0.D" => "ISL2",
		"ISX_HUMAN.H11MO.0.D" => "ISX",
		"ITF2_HUMAN.H11MO.0.C" => "TCF4",
		"JDP2_HUMAN.H11MO.0.D" => "JDP2",
		"JUNB_HUMAN.H11MO.0.A" => "JUNB",
		"JUND_HUMAN.H11MO.0.A" => "JUND",
		"JUN_HUMAN.H11MO.0.A" => "JUN",
		"KAISO_HUMAN.H11MO.0.A" => "ZBTB33",
		"KAISO_HUMAN.H11MO.1.A" => "ZBTB33",
		"KAISO_HUMAN.H11MO.2.A" => "ZBTB33",
		"KLF12_HUMAN.H11MO.0.C" => "KLF12",
		"KLF13_HUMAN.H11MO.0.D" => "KLF13",
		"KLF14_HUMAN.H11MO.0.D" => "KLF14",
		"KLF15_HUMAN.H11MO.0.A" => "KLF15",
		"KLF16_HUMAN.H11MO.0.D" => "KLF16",
		"KLF1_HUMAN.H11MO.0.A" => "KLF1",
		"KLF3_HUMAN.H11MO.0.B" => "KLF3",
		"KLF4_HUMAN.H11MO.0.A" => "KLF4",
		"KLF5_HUMAN.H11MO.0.A" => "KLF5",
		"KLF6_HUMAN.H11MO.0.A" => "KLF6",
		"KLF8_HUMAN.H11MO.0.C" => "KLF8",
		"KLF9_HUMAN.H11MO.0.C" => "KLF9",
		"LBX2_HUMAN.H11MO.0.D" => "LBX2",
		"LEF1_HUMAN.H11MO.0.A" => "LEF1",
		"LHX2_HUMAN.H11MO.0.A" => "LHX2",
		"LHX3_HUMAN.H11MO.0.C" => "LHX3",
		"LHX4_HUMAN.H11MO.0.D" => "LHX4",
		"LHX6_HUMAN.H11MO.0.D" => "LHX6",
		"LHX8_HUMAN.H11MO.0.D" => "LHX8",
		"LHX9_HUMAN.H11MO.0.D" => "LHX9",
		"LMX1A_HUMAN.H11MO.0.D" => "LMX1A",
		"LMX1B_HUMAN.H11MO.0.D" => "LMX1B",
		"LYL1_HUMAN.H11MO.0.A" => "LYL1",
		"MAFA_HUMAN.H11MO.0.D" => "MAFA",
		"MAFB_HUMAN.H11MO.0.B" => "MAFB",
		"MAFF_HUMAN.H11MO.0.B" => "MAFF",
		"MAFF_HUMAN.H11MO.1.B" => "MAFF",
		"MAFG_HUMAN.H11MO.0.A" => "MAFG",
		"MAFG_HUMAN.H11MO.1.A" => "MAFG",
		"MAFK_HUMAN.H11MO.0.A" => "MAFK",
		"MAFK_HUMAN.H11MO.1.A" => "MAFK",
		"MAF_HUMAN.H11MO.0.A" => "MAF",
		"MAF_HUMAN.H11MO.1.B" => "MAF",
		"MAX_HUMAN.H11MO.0.A" => "MAX",
		"MAZ_HUMAN.H11MO.0.A" => "MAZ",
		"MAZ_HUMAN.H11MO.1.A" => "MAZ",
		"MBD2_HUMAN.H11MO.0.B" => "MBD2",
		"MCR_HUMAN.H11MO.0.D" => "NR3C2",
		"MECP2_HUMAN.H11MO.0.C" => "MECP2",
		"MEF2A_HUMAN.H11MO.0.A" => "MEF2A",
		"MEF2B_HUMAN.H11MO.0.A" => "MEF2B",
		"MEF2C_HUMAN.H11MO.0.A" => "MEF2C",
		"MEF2D_HUMAN.H11MO.0.A" => "MEF2D",
		"MEIS1_HUMAN.H11MO.0.A" => "MEIS1",
		"MEIS1_HUMAN.H11MO.1.B" => "MEIS1",
		"MEIS2_HUMAN.H11MO.0.B" => "MEIS2",
		"MEIS3_HUMAN.H11MO.0.D" => "MEIS3",
		"MEOX1_HUMAN.H11MO.0.D" => "MEOX1",
		"MEOX2_HUMAN.H11MO.0.D" => "MEOX2",
		"MESP1_HUMAN.H11MO.0.D" => "MESP1",
		"MGAP_HUMAN.H11MO.0.D" => "MGA",
		"MITF_HUMAN.H11MO.0.A" => "MITF",
		"MIXL1_HUMAN.H11MO.0.D" => "MIXL1",
		"MLXPL_HUMAN.H11MO.0.D" => "MLXIPL",
		"MLX_HUMAN.H11MO.0.D" => "MLX",
		"MNX1_HUMAN.H11MO.0.D" => "MNX1",
		"MSX1_HUMAN.H11MO.0.D" => "MSX1",
		"MSX2_HUMAN.H11MO.0.D" => "MSX2",
		"MTF1_HUMAN.H11MO.0.C" => "MTF1",
		"MXI1_HUMAN.H11MO.0.A" => "MXI1",
		"MXI1_HUMAN.H11MO.1.A" => "MXI1",
		"MYBA_HUMAN.H11MO.0.D" => "MYBL1",
		"MYBB_HUMAN.H11MO.0.D" => "MYBL2",
		"MYB_HUMAN.H11MO.0.A" => "MYB",
		"MYCN_HUMAN.H11MO.0.A" => "MYCN",
		"MYC_HUMAN.H11MO.0.A" => "MYC",
		"MYF6_HUMAN.H11MO.0.C" => "MYF6",
		"MYNN_HUMAN.H11MO.0.D" => "MYNN",
		"MYOD1_HUMAN.H11MO.0.A" => "MYOD1",
		"MYOD1_HUMAN.H11MO.1.A" => "MYOD1",
		"MYOG_HUMAN.H11MO.0.B" => "MYOG",
		"MZF1_HUMAN.H11MO.0.B" => "MZF1",
		"NANOG_HUMAN.H11MO.0.A" => "NANOG",
		"NANOG_HUMAN.H11MO.1.B" => "NANOG",
		"NDF1_HUMAN.H11MO.0.A" => "NEUROD1",
		"NDF2_HUMAN.H11MO.0.B" => "NEUROD2",
		"NF2L1_HUMAN.H11MO.0.C" => "NFE2L1",
		"NF2L2_HUMAN.H11MO.0.A" => "NFE2L2",
		"NFAC1_HUMAN.H11MO.0.B" => "NFATC1",
		"NFAC1_HUMAN.H11MO.1.B" => "NFATC1",
		"NFAC2_HUMAN.H11MO.0.B" => "NFATC2",
		"NFAC3_HUMAN.H11MO.0.B" => "NFATC3",
		"NFAC4_HUMAN.H11MO.0.C" => "NFATC4",
		"NFAT5_HUMAN.H11MO.0.D" => "NFAT5",
		"NFE2_HUMAN.H11MO.0.A" => "NFE2",
		"NFIA_HUMAN.H11MO.0.C" => "NFIA",
		"NFIA_HUMAN.H11MO.1.D" => "NFIA",
		"NFIB_HUMAN.H11MO.0.D" => "NFIB",
		"NFIC_HUMAN.H11MO.0.A" => "NFIC",
		"NFIC_HUMAN.H11MO.1.A" => "NFIC",
		"NFIL3_HUMAN.H11MO.0.D" => "NFIL3",
		"NFKB1_HUMAN.H11MO.0.A" => "NFKB1",
		"NFKB2_HUMAN.H11MO.0.B" => "NFKB2",
		"NFYA_HUMAN.H11MO.0.A" => "NFYA",
		"NFYB_HUMAN.H11MO.0.A" => "NFYB",
		"NFYC_HUMAN.H11MO.0.A" => "NFYC",
		"NGN2_HUMAN.H11MO.0.D" => "NEUROG2",
		"NKX21_HUMAN.H11MO.0.A" => "NKX2-1",
		"NKX22_HUMAN.H11MO.0.D" => "NKX2-2",
		"NKX23_HUMAN.H11MO.0.D" => "NKX2-3",
		"NKX25_HUMAN.H11MO.0.B" => "NKX2-5",
		"NKX28_HUMAN.H11MO.0.C" => "NKX2-8",
		"NKX31_HUMAN.H11MO.0.C" => "NKX3-1",
		"NKX32_HUMAN.H11MO.0.C" => "NKX3-2",
		"NKX61_HUMAN.H11MO.0.B" => "NKX6-1",
		"NKX61_HUMAN.H11MO.1.B" => "NKX6-1",
		"NKX62_HUMAN.H11MO.0.D" => "NKX6-2",
		"NOBOX_HUMAN.H11MO.0.C" => "NOBOX",
		"NOTO_HUMAN.H11MO.0.D" => "NOTO",
		"NR0B1_HUMAN.H11MO.0.D" => "NR0B1",
		"NR1D1_HUMAN.H11MO.0.B" => "NR1D1",
		"NR1D1_HUMAN.H11MO.1.D" => "NR1D1",
		"NR1H2_HUMAN.H11MO.0.D" => "NR1H2",
		"NR1H3_HUMAN.H11MO.0.B" => "NR1H3",
		"NR1H3_HUMAN.H11MO.1.B" => "NR1H3",
		"NR1H4_HUMAN.H11MO.0.B" => "NR1H4",
		"NR1H4_HUMAN.H11MO.1.B" => "NR1H4",
		"NR1I2_HUMAN.H11MO.0.C" => "NR1I2",
		"NR1I2_HUMAN.H11MO.1.D" => "NR1I2",
		"NR1I3_HUMAN.H11MO.0.C" => "NR1I3",
		"NR1I3_HUMAN.H11MO.1.D" => "NR1I3",
		"NR2C1_HUMAN.H11MO.0.C" => "NR2C1",
		"NR2C2_HUMAN.H11MO.0.B" => "NR2C2",
		"NR2E1_HUMAN.H11MO.0.D" => "NR2E1",
		"NR2E3_HUMAN.H11MO.0.C" => "NR2E3",
		"NR2F6_HUMAN.H11MO.0.D" => "NR2F6",
		"NR4A1_HUMAN.H11MO.0.A" => "NR4A1",
		"NR4A2_HUMAN.H11MO.0.C" => "NR4A2",
		"NR4A3_HUMAN.H11MO.0.D" => "NR4A3",
		"NR5A2_HUMAN.H11MO.0.B" => "NR5A2",
		"NR6A1_HUMAN.H11MO.0.B" => "NR6A1",
		"NRF1_HUMAN.H11MO.0.A" => "NRF1",
		"NRL_HUMAN.H11MO.0.D" => "NRL",
		"OLIG1_HUMAN.H11MO.0.D" => "OLIG1",
		"OLIG2_HUMAN.H11MO.0.B" => "OLIG2",
		"OLIG2_HUMAN.H11MO.1.B" => "OLIG2",
		"OLIG3_HUMAN.H11MO.0.D" => "OLIG3",
		"ONEC2_HUMAN.H11MO.0.D" => "ONECUT2",
		"ONEC3_HUMAN.H11MO.0.D" => "ONECUT3",
		"OSR2_HUMAN.H11MO.0.C" => "OSR2",
		"OTX1_HUMAN.H11MO.0.D" => "OTX1",
		"OTX2_HUMAN.H11MO.0.A" => "OTX2",
		"OVOL1_HUMAN.H11MO.0.C" => "OVOL1",
		"OVOL2_HUMAN.H11MO.0.D" => "OVOL2",
		"OZF_HUMAN.H11MO.0.C" => "ZNF146",
		"P53_HUMAN.H11MO.0.A" => "TP53",
		"P53_HUMAN.H11MO.1.A" => "TP53",
		"P5F1B_HUMAN.H11MO.0.D" => "POU5F1B",
		"P63_HUMAN.H11MO.0.A" => "TP63",
		"P63_HUMAN.H11MO.1.A" => "TP63",
		"P73_HUMAN.H11MO.0.A" => "TP73",
		"P73_HUMAN.H11MO.1.A" => "TP73",
		"PATZ1_HUMAN.H11MO.0.C" => "PATZ1",
		"PATZ1_HUMAN.H11MO.1.C" => "PATZ1",
		"PAX1_HUMAN.H11MO.0.D" => "PAX1",
		"PAX2_HUMAN.H11MO.0.D" => "PAX2",
		"PAX3_HUMAN.H11MO.0.D" => "PAX3",
		"PAX4_HUMAN.H11MO.0.D" => "PAX4",
		"PAX5_HUMAN.H11MO.0.A" => "PAX5",
		"PAX6_HUMAN.H11MO.0.C" => "PAX6",
		"PAX7_HUMAN.H11MO.0.D" => "PAX7",
		"PAX8_HUMAN.H11MO.0.D" => "PAX8",
		"PBX1_HUMAN.H11MO.0.A" => "PBX1",
		"PBX1_HUMAN.H11MO.1.C" => "PBX1",
		"PBX2_HUMAN.H11MO.0.C" => "PBX2",
		"PBX3_HUMAN.H11MO.0.A" => "PBX3",
		"PBX3_HUMAN.H11MO.1.A" => "PBX3",
		"PDX1_HUMAN.H11MO.0.A" => "PDX1",
		"PDX1_HUMAN.H11MO.1.A" => "PDX1",
		"PEBB_HUMAN.H11MO.0.C" => "CBFB",
		"PHX2A_HUMAN.H11MO.0.D" => "PHOX2A",
		"PHX2B_HUMAN.H11MO.0.D" => "PHOX2B",
		"PIT1_HUMAN.H11MO.0.C" => "POU1F1",
		"PITX1_HUMAN.H11MO.0.D" => "PITX1",
		"PITX2_HUMAN.H11MO.0.D" => "PITX2",
		"PITX3_HUMAN.H11MO.0.D" => "PITX3",
		"PKNX1_HUMAN.H11MO.0.B" => "PKNOX1",
		"PLAG1_HUMAN.H11MO.0.D" => "PLAG1",
		"PLAL1_HUMAN.H11MO.0.D" => "PLAGL1",
		"PO2F1_HUMAN.H11MO.0.C" => "POU2F1",
		"PO2F2_HUMAN.H11MO.0.A" => "POU2F2",
		"PO2F3_HUMAN.H11MO.0.D" => "POU2F3",
		"PO3F1_HUMAN.H11MO.0.C" => "POU3F1",
		"PO3F2_HUMAN.H11MO.0.A" => "POU3F2",
		"PO3F3_HUMAN.H11MO.0.D" => "POU3F3",
		"PO3F4_HUMAN.H11MO.0.D" => "POU3F4",
		"PO4F1_HUMAN.H11MO.0.D" => "POU4F1",
		"PO4F2_HUMAN.H11MO.0.D" => "POU4F2",
		"PO4F3_HUMAN.H11MO.0.D" => "POU4F3",
		"PO5F1_HUMAN.H11MO.0.A" => "POU5F1",
		"PO5F1_HUMAN.H11MO.1.A" => "POU5F1",
		"PO6F1_HUMAN.H11MO.0.D" => "POU6F1",
		"PO6F2_HUMAN.H11MO.0.D" => "POU6F2",
		"PPARA_HUMAN.H11MO.0.B" => "PPARA",
		"PPARA_HUMAN.H11MO.1.B" => "PPARA",
		"PPARD_HUMAN.H11MO.0.D" => "PPARD",
		"PPARG_HUMAN.H11MO.0.A" => "PPARG",
		"PPARG_HUMAN.H11MO.1.A" => "PPARG",
		"PRD14_HUMAN.H11MO.0.A" => "PRDM14",
		"PRDM1_HUMAN.H11MO.0.A" => "PRDM1",
		"PRDM4_HUMAN.H11MO.0.D" => "PRDM4",
		"PRDM6_HUMAN.H11MO.0.C" => "PRDM6",
		"PRGR_HUMAN.H11MO.0.A" => "PGR",
		"PRGR_HUMAN.H11MO.1.A" => "PGR",
		"PROP1_HUMAN.H11MO.0.D" => "PROP1",
		"PROX1_HUMAN.H11MO.0.D" => "PROX1",
		"PRRX1_HUMAN.H11MO.0.D" => "PRRX1",
		"PRRX2_HUMAN.H11MO.0.C" => "PRRX2",
		"PTF1A_HUMAN.H11MO.0.B" => "PTF1A",
		"PTF1A_HUMAN.H11MO.1.B" => "PTF1A",
		"PURA_HUMAN.H11MO.0.D" => "PURA",
		"RARA_HUMAN.H11MO.0.A" => "RARA",
		"RARA_HUMAN.H11MO.1.A" => "RARA",
		"RARA_HUMAN.H11MO.2.A" => "RARA",
		"RARB_HUMAN.H11MO.0.D" => "RARB",
		"RARG_HUMAN.H11MO.0.B" => "RARG",
		"RARG_HUMAN.H11MO.1.B" => "RARG",
		"RARG_HUMAN.H11MO.2.D" => "RARG",
		"RAX2_HUMAN.H11MO.0.D" => "RAX2",
		"RELB_HUMAN.H11MO.0.C" => "RELB",
		"REL_HUMAN.H11MO.0.B" => "REL",
		"REST_HUMAN.H11MO.0.A" => "REST",
		"RFX1_HUMAN.H11MO.0.B" => "RFX1",
		"RFX1_HUMAN.H11MO.1.B" => "RFX1",
		"RFX2_HUMAN.H11MO.0.A" => "RFX2",
		"RFX2_HUMAN.H11MO.1.A" => "RFX2",
		"RFX3_HUMAN.H11MO.0.B" => "RFX3",
		"RFX4_HUMAN.H11MO.0.D" => "RFX4",
		"RFX5_HUMAN.H11MO.0.A" => "RFX5",
		"RFX5_HUMAN.H11MO.1.A" => "RFX5",
		"RHXF1_HUMAN.H11MO.0.D" => "RHOXF1",
		"RORA_HUMAN.H11MO.0.C" => "RORA",
		"RORG_HUMAN.H11MO.0.C" => "RORC",
		"RREB1_HUMAN.H11MO.0.D" => "RREB1",
		"RUNX1_HUMAN.H11MO.0.A" => "RUNX1",
		"RUNX2_HUMAN.H11MO.0.A" => "RUNX2",
		"RUNX3_HUMAN.H11MO.0.A" => "RUNX3",
		"RXRA_HUMAN.H11MO.0.A" => "RXRA",
		"RXRA_HUMAN.H11MO.1.A" => "RXRA",
		"RXRB_HUMAN.H11MO.0.C" => "RXRB",
		"RXRG_HUMAN.H11MO.0.B" => "RXRG",
		"RX_HUMAN.H11MO.0.D" => "RAX",
		"SALL4_HUMAN.H11MO.0.B" => "SALL4",
		"SCRT1_HUMAN.H11MO.0.D" => "SCRT1",
		"SCRT2_HUMAN.H11MO.0.D" => "SCRT2",
		"SHOX2_HUMAN.H11MO.0.D" => "SHOX2",
		"SHOX_HUMAN.H11MO.0.D" => "SHOX",
		"SIX1_HUMAN.H11MO.0.A" => "SIX1",
		"SIX2_HUMAN.H11MO.0.A" => "SIX2",
		"SMAD1_HUMAN.H11MO.0.D" => "SMAD1",
		"SMAD2_HUMAN.H11MO.0.A" => "SMAD2",
		"SMAD3_HUMAN.H11MO.0.B" => "SMAD3",
		"SMAD4_HUMAN.H11MO.0.B" => "SMAD4",
		"SMCA1_HUMAN.H11MO.0.C" => "SMARCA1",
		"SMCA5_HUMAN.H11MO.0.C" => "SMARCA5",
		"SNAI1_HUMAN.H11MO.0.C" => "SNAI1",
		"SNAI2_HUMAN.H11MO.0.A" => "SNAI2",
		"SOX10_HUMAN.H11MO.0.B" => "SOX10",
		"SOX10_HUMAN.H11MO.1.A" => "SOX10",
		"SOX11_HUMAN.H11MO.0.D" => "SOX11",
		"SOX13_HUMAN.H11MO.0.D" => "SOX13",
		"SOX15_HUMAN.H11MO.0.D" => "SOX15",
		"SOX17_HUMAN.H11MO.0.C" => "SOX17",
		"SOX18_HUMAN.H11MO.0.D" => "SOX18",
		"SOX1_HUMAN.H11MO.0.D" => "SOX1",
		"SOX21_HUMAN.H11MO.0.D" => "SOX21",
		"SOX2_HUMAN.H11MO.0.A" => "SOX2",
		"SOX2_HUMAN.H11MO.1.A" => "SOX2",
		"SOX3_HUMAN.H11MO.0.B" => "SOX3",
		"SOX4_HUMAN.H11MO.0.B" => "SOX4",
		"SOX5_HUMAN.H11MO.0.C" => "SOX5",
		"SOX7_HUMAN.H11MO.0.D" => "SOX7",
		"SOX8_HUMAN.H11MO.0.D" => "SOX8",
		"SOX9_HUMAN.H11MO.0.B" => "SOX9",
		"SOX9_HUMAN.H11MO.1.B" => "SOX9",
		"SP1_HUMAN.H11MO.0.A" => "SP1",
		"SP1_HUMAN.H11MO.1.A" => "SP1",
		"SP2_HUMAN.H11MO.0.A" => "SP2",
		"SP2_HUMAN.H11MO.1.B" => "SP2",
		"SP3_HUMAN.H11MO.0.B" => "SP3",
		"SP4_HUMAN.H11MO.0.A" => "SP4",
		"SP4_HUMAN.H11MO.1.A" => "SP4",
		"SPDEF_HUMAN.H11MO.0.D" => "SPDEF",
		"SPI1_HUMAN.H11MO.0.A" => "SPI1",
		"SPIB_HUMAN.H11MO.0.A" => "SPIB",
		"SPIC_HUMAN.H11MO.0.D" => "SPIC",
		"SPZ1_HUMAN.H11MO.0.D" => "SPZ1",
		"SRBP1_HUMAN.H11MO.0.A" => "SREBF1",
		"SRBP2_HUMAN.H11MO.0.B" => "SREBF2",
		"SRF_HUMAN.H11MO.0.A" => "SRF",
		"SRY_HUMAN.H11MO.0.B" => "SRY",
		"STA5A_HUMAN.H11MO.0.A" => "STAT5A",
		"STA5B_HUMAN.H11MO.0.A" => "STAT5B",
		"STAT1_HUMAN.H11MO.0.A" => "STAT1",
		"STAT1_HUMAN.H11MO.1.A" => "STAT1",
		"STAT2_HUMAN.H11MO.0.A" => "STAT2",
		"STAT3_HUMAN.H11MO.0.A" => "STAT3",
		"STAT4_HUMAN.H11MO.0.A" => "STAT4",
		"STAT6_HUMAN.H11MO.0.B" => "STAT6",
		"STF1_HUMAN.H11MO.0.B" => "NR5A1",
		"SUH_HUMAN.H11MO.0.A" => "RBPJ",
		"TAF1_HUMAN.H11MO.0.A" => "TAF1",
		"TAL1_HUMAN.H11MO.0.A" => "TAL1",
		"TAL1_HUMAN.H11MO.1.A" => "TAL1",
		"TBP_HUMAN.H11MO.0.A" => "TBP",
		"TBR1_HUMAN.H11MO.0.D" => "TBR1",
		"TBX15_HUMAN.H11MO.0.D" => "TBX15",
		"TBX19_HUMAN.H11MO.0.D" => "TBX19",
		"TBX1_HUMAN.H11MO.0.D" => "TBX1",
		"TBX20_HUMAN.H11MO.0.D" => "TBX20",
		"TBX21_HUMAN.H11MO.0.A" => "TBX21",
		"TBX2_HUMAN.H11MO.0.D" => "TBX2",
		"TBX3_HUMAN.H11MO.0.C" => "TBX3",
		"TBX4_HUMAN.H11MO.0.D" => "TBX4",
		"TBX5_HUMAN.H11MO.0.D" => "TBX5",
		"TCF7_HUMAN.H11MO.0.A" => "TCF7",
		"TEAD1_HUMAN.H11MO.0.A" => "TEAD1",
		"TEAD2_HUMAN.H11MO.0.D" => "TEAD2",
		"TEAD3_HUMAN.H11MO.0.D" => "TEAD3",
		"TEAD4_HUMAN.H11MO.0.A" => "TEAD4",
		"TEF_HUMAN.H11MO.0.D" => "TEF",
		"TF2LX_HUMAN.H11MO.0.D" => "TGIF2LX",
		"TF65_HUMAN.H11MO.0.A" => "RELA",
		"TF7L1_HUMAN.H11MO.0.B" => "TCF7L1",
		"TF7L2_HUMAN.H11MO.0.A" => "TCF7L2",
		"TFAP4_HUMAN.H11MO.0.A" => "TFAP4",
		"TFCP2_HUMAN.H11MO.0.D" => "TFCP2",
		"TFDP1_HUMAN.H11MO.0.C" => "TFDP1",
		"TFE2_HUMAN.H11MO.0.A" => "TCF3",
		"TFE3_HUMAN.H11MO.0.B" => "TFE3",
		"TFEB_HUMAN.H11MO.0.C" => "TFEB",
		"TGIF1_HUMAN.H11MO.0.A" => "TGIF1",
		"TGIF2_HUMAN.H11MO.0.D" => "TGIF2",
		"THA11_HUMAN.H11MO.0.B" => "THAP11",
		"THAP1_HUMAN.H11MO.0.C" => "THAP1",
		"THA_HUMAN.H11MO.0.C" => "THRA",
		"THA_HUMAN.H11MO.1.D" => "THRA",
		"THB_HUMAN.H11MO.0.C" => "THRB",
		"THB_HUMAN.H11MO.1.D" => "THRB",
		"TLX1_HUMAN.H11MO.0.D" => "TLX1",
		"TWST1_HUMAN.H11MO.0.A" => "TWIST1",
		"TWST1_HUMAN.H11MO.1.A" => "TWIST1",
		"TYY1_HUMAN.H11MO.0.A" => "YY1",
		"TYY2_HUMAN.H11MO.0.D" => "YY2",
		"UBIP1_HUMAN.H11MO.0.D" => "UBP1",
		"UNC4_HUMAN.H11MO.0.D" => "UNCX",
		"USF1_HUMAN.H11MO.0.A" => "USF1",
		"USF2_HUMAN.H11MO.0.A" => "USF2",
		"VAX1_HUMAN.H11MO.0.D" => "VAX1",
		"VAX2_HUMAN.H11MO.0.D" => "VAX2",
		"VDR_HUMAN.H11MO.0.A" => "VDR",
		"VDR_HUMAN.H11MO.1.A" => "VDR",
		"VENTX_HUMAN.H11MO.0.D" => "VENTX",
		"VEZF1_HUMAN.H11MO.0.C" => "VEZF1",
		"VEZF1_HUMAN.H11MO.1.C" => "VEZF1",
		"VSX1_HUMAN.H11MO.0.D" => "VSX1",
		"VSX2_HUMAN.H11MO.0.D" => "VSX2",
		"WT1_HUMAN.H11MO.0.C" => "WT1",
		"WT1_HUMAN.H11MO.1.B" => "WT1",
		"XBP1_HUMAN.H11MO.0.D" => "XBP1",
		"Z324A_HUMAN.H11MO.0.C" => "ZNF324",
		"Z354A_HUMAN.H11MO.0.C" => "ZNF354A",
		"ZBED1_HUMAN.H11MO.0.D" => "ZBED1",
		"ZBT14_HUMAN.H11MO.0.C" => "ZBTB14",
		"ZBT17_HUMAN.H11MO.0.A" => "ZBTB17",
		"ZBT18_HUMAN.H11MO.0.C" => "ZBTB18",
		"ZBT48_HUMAN.H11MO.0.C" => "ZBTB48",
		"ZBT49_HUMAN.H11MO.0.D" => "ZBTB49",
		"ZBT7A_HUMAN.H11MO.0.A" => "ZBTB7A",
		"ZBT7B_HUMAN.H11MO.0.D" => "ZBTB7B",
		"ZBTB4_HUMAN.H11MO.0.D" => "ZBTB4",
		"ZBTB4_HUMAN.H11MO.1.D" => "ZBTB4",
		"ZBTB6_HUMAN.H11MO.0.C" => "ZBTB6",
		"ZEB1_HUMAN.H11MO.0.A" => "ZEB1",
		"ZEP1_HUMAN.H11MO.0.D" => "HIVEP1",
		"ZEP2_HUMAN.H11MO.0.D" => "HIVEP2",
		"ZF64A_HUMAN.H11MO.0.D" => "ZFP64",
		"ZFHX3_HUMAN.H11MO.0.D" => "ZFHX3",
		"ZFP28_HUMAN.H11MO.0.C" => "ZFP28",
		"ZFP42_HUMAN.H11MO.0.A" => "ZFP42",
		"ZFP82_HUMAN.H11MO.0.C" => "ZFP82",
		"ZFX_HUMAN.H11MO.0.A" => "ZFX",
		"ZFX_HUMAN.H11MO.1.A" => "ZFX",
		"ZIC1_HUMAN.H11MO.0.B" => "ZIC1",
		"ZIC2_HUMAN.H11MO.0.D" => "ZIC2",
		"ZIC3_HUMAN.H11MO.0.B" => "ZIC3",
		"ZIC4_HUMAN.H11MO.0.D" => "ZIC4",
		"ZIM3_HUMAN.H11MO.0.C" => "ZIM3",
		"ZKSC1_HUMAN.H11MO.0.B" => "ZKSCAN1",
		"ZKSC3_HUMAN.H11MO.0.D" => "ZKSCAN3",
		"ZN121_HUMAN.H11MO.0.C" => "ZNF121",
		"ZN134_HUMAN.H11MO.0.C" => "ZNF134",
		"ZN134_HUMAN.H11MO.1.C" => "ZNF134",
		"ZN136_HUMAN.H11MO.0.C" => "ZNF136",
		"ZN140_HUMAN.H11MO.0.C" => "ZNF140",
		"ZN143_HUMAN.H11MO.0.A" => "ZNF143",
		"ZN148_HUMAN.H11MO.0.D" => "ZNF148",
		"ZN214_HUMAN.H11MO.0.C" => "ZNF214",
		"ZN219_HUMAN.H11MO.0.D" => "ZNF219",
		"ZN232_HUMAN.H11MO.0.D" => "ZNF232",
		"ZN250_HUMAN.H11MO.0.C" => "ZNF250",
		"ZN257_HUMAN.H11MO.0.C" => "ZNF257",
		"ZN260_HUMAN.H11MO.0.C" => "ZNF260",
		"ZN263_HUMAN.H11MO.0.A" => "ZNF263",
		"ZN263_HUMAN.H11MO.1.A" => "ZNF263",
		"ZN264_HUMAN.H11MO.0.C" => "ZNF264",
		"ZN274_HUMAN.H11MO.0.A" => "ZNF274",
		"ZN281_HUMAN.H11MO.0.A" => "ZNF281",
		"ZN282_HUMAN.H11MO.0.D" => "ZNF282",
		"ZN317_HUMAN.H11MO.0.C" => "ZNF317",
		"ZN320_HUMAN.H11MO.0.C" => "ZNF320",
		"ZN322_HUMAN.H11MO.0.B" => "ZNF322",
		"ZN329_HUMAN.H11MO.0.C" => "ZNF329",
		"ZN331_HUMAN.H11MO.0.C" => "ZNF331",
		"ZN333_HUMAN.H11MO.0.D" => "ZNF333",
		"ZN335_HUMAN.H11MO.0.A" => "ZNF335",
		"ZN335_HUMAN.H11MO.1.A" => "ZNF335",
		"ZN341_HUMAN.H11MO.0.C" => "ZNF341",
		"ZN341_HUMAN.H11MO.1.C" => "ZNF341",
		"ZN350_HUMAN.H11MO.0.C" => "ZNF350",
		"ZN350_HUMAN.H11MO.1.D" => "ZNF350",
		"ZN382_HUMAN.H11MO.0.C" => "ZNF382",
		"ZN384_HUMAN.H11MO.0.C" => "ZNF384",
		"ZN394_HUMAN.H11MO.0.C" => "ZNF394",
		"ZN394_HUMAN.H11MO.1.D" => "ZNF394",
		"ZN410_HUMAN.H11MO.0.D" => "ZNF410",
		"ZN418_HUMAN.H11MO.0.C" => "ZNF418",
		"ZN418_HUMAN.H11MO.1.D" => "ZNF418",
		"ZN423_HUMAN.H11MO.0.D" => "ZNF423",
		"ZN436_HUMAN.H11MO.0.C" => "ZNF436",
		"ZN449_HUMAN.H11MO.0.C" => "ZNF449",
		"ZN467_HUMAN.H11MO.0.C" => "ZNF467",
		"ZN490_HUMAN.H11MO.0.C" => "ZNF490",
		"ZN502_HUMAN.H11MO.0.C" => "ZNF502",
		"ZN524_HUMAN.H11MO.0.D" => "ZNF524",
		"ZN528_HUMAN.H11MO.0.C" => "ZNF528",
		"ZN547_HUMAN.H11MO.0.C" => "ZNF547",
		"ZN549_HUMAN.H11MO.0.C" => "ZNF549",
		"ZN554_HUMAN.H11MO.0.C" => "ZNF554",
		"ZN554_HUMAN.H11MO.1.D" => "ZNF554",
		"ZN563_HUMAN.H11MO.0.C" => "ZNF563",
		"ZN563_HUMAN.H11MO.1.C" => "ZNF563",
		"ZN582_HUMAN.H11MO.0.C" => "ZNF582",
		"ZN586_HUMAN.H11MO.0.C" => "ZNF586",
		"ZN589_HUMAN.H11MO.0.D" => "ZNF589",
		"ZN652_HUMAN.H11MO.0.D" => "ZNF652",
		"ZN667_HUMAN.H11MO.0.C" => "ZNF667",
		"ZN680_HUMAN.H11MO.0.C" => "ZNF680",
		"ZN708_HUMAN.H11MO.0.C" => "ZNF708",
		"ZN708_HUMAN.H11MO.1.D" => "ZNF708",
		"ZN713_HUMAN.H11MO.0.D" => "ZNF713",
		"ZN740_HUMAN.H11MO.0.D" => "ZNF740",
		"ZN768_HUMAN.H11MO.0.C" => "ZNF768",
		"ZN770_HUMAN.H11MO.0.C" => "ZNF770",
		"ZN770_HUMAN.H11MO.1.C" => "ZNF770",
		"ZN784_HUMAN.H11MO.0.D" => "ZNF784",
		"ZN816_HUMAN.H11MO.0.C" => "ZNF816",
		"ZN816_HUMAN.H11MO.1.C" => "ZNF816",
		"ZNF18_HUMAN.H11MO.0.C" => "ZNF18",
		"ZNF41_HUMAN.H11MO.0.C" => "ZNF41",
		"ZNF41_HUMAN.H11MO.1.C" => "ZNF41",
		"ZNF76_HUMAN.H11MO.0.C" => "ZNF76",
		"ZNF85_HUMAN.H11MO.0.C" => "ZNF85",
		"ZNF85_HUMAN.H11MO.1.C" => "ZNF85",
		"ZNF8_HUMAN.H11MO.0.C" => "ZNF8",
		"ZSC16_HUMAN.H11MO.0.D" => "ZSCAN16",
		"ZSC22_HUMAN.H11MO.0.C" => "ZSCAN22",
		"ZSC31_HUMAN.H11MO.0.C" => "ZSCAN31",
		"ZSCA4_HUMAN.H11MO.0.D" => "ZSCAN4"
		];
	
			$mysqli = getMysqli();
							
			echo mysqli_connect_error();
			if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
			
			$qualy = '';
			
			if($mode == 'highquality'){
				$qualy = ' and (pwm like "%HUMAN.H11MO.0.A" or pwm like "%HUMAN.H11MO.0.B" or pwm like "%HUMAN.H11MO.0.C") ';
				$m_e = 'High Quality';
			}else{
				$m_e = 'Full PWMs';
			}
			
			$sql = 'select * from tf_prediction where gene like "'.$gene.'"  '.$qualy.';';	
			$q = $mysqli->query($sql);	


			echo '<h3 style="color:#5F9EA0; text-transform: uppercase;">'.mysqli_num_rows($q).' 
			prediction for gene "'.$gene.'" mode "'.$m_e.'"</h3><br/>';
			
			
					echo '<table style="width: 100%; float: right; margin-bottom: 5%; text-align: center;" id="myTable" class="tablesorter">
						<thead>
							<tr style="background: #FAFAFA; padding: 2.5%;">

							    <th style="width: 15%; padding: 15px;">
									PWM Model
								</th>
								
								<th style="width: 15%; padding: 15px;">
									TF
								</th>
								
								<th style="width: 15%; padding: 15px;">
									Threshold
								</th>
								
								<th style="width: 20%; padding: 15px;">
									PWM Logo
								</th>
								
								<th style="width: 15%; padding: 15px;">
									TFBS
								</th>
								
								<th style="width: 15%; padding: 15px;">
									ESCORE
								</th>
							</tr>
						</thead>
					<tbody>';
					
				$order = 0;
				while($d = $q->fetch_array()){
							
							if($order%2==0){
								echo '<tr>';
							}else{
								echo '<tr style="background: #FAFAFA;">';
							}
							
						echo '<td style="padding-bottom: 5px; height: 50px;">
							<a href="http://hocomoco11.autosome.ru/motif/'.$d['pwm'].'" style="text-decoration: none;">'.$d['pwm'].'</a></td>';
						echo '<td>'.$tf_model[$d['pwm']].'</td>';
						echo '<td>'.$d['threshold'].'</td>';
						echo '<td><img src="http://hocomoco11.autosome.ru/final_bundle/hocomoco11/full/HUMAN/mono/logo_large/'.$d['pwm'].'_direct.png" width="100%"/></td>';
						echo '<td>'.$d['tfbs'].'</td>';
						echo '<td>'.round($d['score'],5).'</td>';
					echo '</tr>';
					
					$order++;
				}
				
				echo '</tbody>
				</table>';
			$mysqli->close();
		
	}
			
			
			
}
//class
	
	
	
?>