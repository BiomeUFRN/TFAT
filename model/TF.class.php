<?php

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
				
				require_once "TFATConfig.php";

				$mysqli = getMysqli();
		
					$sql_total_tf = 'SELECT count(distinct(GeneID)) as totaltf FROM tf_evidence;';	
					$query_sql_total_tf = $mysqli->query($sql_total_tf);

					$totaltf = $query_sql_total_tf->fetch_array();
					$n_total_ft .= $totaltf['totaltf'];
		
						
				echo '<div style="width: 30%; float: left; padding: 15px; vertical-align: top; background: #FAFAFA;">
					
					<div style="float: right; width: 100%; margin-top: 5%;">					
						
						
						<div style="float: left; margin-bottom:25px; background: none;">
							<div style="width: 100%; float: left; height:25px; border-bottom: 2px solid gold;">
								<h4>Transcription Factor Check</h4>
							</div>
							<div style="text-align: left;">
								<b>Total TF in database:</b> '.$n_total_ft.'<br/>
								<b>Submitted TF:</b> '.count($l).'<br/>
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
				
			if(!isset($_GET['result'])){
				
				
				
				?>
				
				<style>
					table{
						width:500px;
						margin:auto;
						text-align:center;
					}
					
					a{
						color: #00004d;
						text-decoration: none;
					}
					
					a:hover{
						color: ORANGE;
					}

				</style>
				
				
				<?php
				
				
				echo '<table style="width: 97.5%;">
						<tr>
							<td style="border: 1px #DDD solid; border-radius: 10px; padding: 10px; width: 30%; text-align: left;">
								<h2 style="color: #4F4F4F;">Submitted genes list info</h2>
							</td>
							<td style="border: 1px #DDD solid; border-radius: 10px; padding: 10px;" colspan="2">
								<h2 style="color: #4F4F4F;">Enrichment analysis view</h2>
							</td>
						</tr>
						<tr>
							<td style="border: 1px #DDD solid; border-radius: 10px;">';
								
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
								
								
							echo '<span style="background: #0B0B61; color: #FFF; padding: 15px; border-radius:5px; margin: 15px;">TOTAL: '.count($l).'</span><br/><br/><br/>';
							echo '<span style="background: #D7DF01; color: #FFF; padding: 15px; border-radius:5px; margin: 15px;">VERIFIELD: '.$gverifield.'</span><br/><br/><br/>';
							echo '<span style="background: #B4045F; color: #FFF; padding: 15px; border-radius:5px; margin: 15px;">NOT FOUND: '.$nfound.'</span>';
							
							
								
							
							echo '</td>
							
							<td style="border: 1px #DDD solid; border-radius: 10px; padding: 10px;" >
							
							<a href="?mode='.$_GET['mode'].'&l_tf='.$list_verifield.'&accScoreTF='.$_GET['accScoreTF'].'&tissueExpression='.$_GET['tissueExpression'].'&&tfscore=390d56&result=summary&method=all">
							<img src="img/summary.jpg" height="180" style="padding:10px;"/><h3 style="background: #CD2626; padding: 15px; color: #fff; border-radius: 5px; margin: 5px;">Overview</h3></a>
							
								<a href="?mode='.$_GET['mode'].'&l_tf='.$list_verifield.'&accScoreTF='.$_GET['accScoreTF'].'&tissueExpression='.$_GET['tissueExpression'].'&&tfscore=390d56&result=summary&method=database">
								<b style="background: #FFA500; padding: 7.5px; color: #fff; border-radius: 5px; margin: 5px; width: 25%; float: left;">Public data base</b></a>
							
								<a href="?mode='.$_GET['mode'].'&l_tf='.$list_verifield.'&accScoreTF='.$_GET['accScoreTF'].'&tissueExpression='.$_GET['tissueExpression'].'&&tfscore=390d56&result=summary&method=experiment">
								<b style="background: #EE7621; padding: 7.5px; color: #fff; border-radius: 5px; margin: 5px; width: 25%; float: left;">ChIP-seq experiment</b></a>
							
								<a href="?mode='.$_GET['mode'].'&l_tf='.$list_verifield.'&accScoreTF='.$_GET['accScoreTF'].'&tissueExpression='.$_GET['tissueExpression'].'&&tfscore=390d56&result=summary&method=prediction">
								<b style="background: #8B4726; padding: 7.5px; color: #fff; border-radius: 5px; margin: 5px; width: 25%; float: left;">Prediction TFBS</b></a>
							
						
							
							
							
							<!--<a href="?mode='.$_GET['mode'].'&l_tf='.$list_verifield.'&accScoreTF='.$_GET['accScoreTF'].'&tissueExpression='.$_GET['tissueExpression'].'&&tfscore=390d56&result=network">
							<h3 style="background: #4169E1; padding: 15px; color: #fff; border-radius: 5px; margin: 5px;">Regulatory Network</h3></a>-->
							</td>
							
							<td style="border: 1px #DDD solid; border-radius: 10px; padding: 10px;" >
							
							<a href="?mode='.$_GET['mode'].'&l_tf='.$list_verifield.'&accScoreTF='.$_GET['accScoreTF'].'&tissueExpression='.$_GET['tissueExpression'].'&&tfscore=390d56&result=enrichment&method=all">
							<img src="img/enrichment.jpg" height="200"/><h3 style="background: #4F94CD; padding: 15px; color: #fff; border-radius: 5px; margin: 5px;">Itemized</h3><a>
							
								<a href="?mode='.$_GET['mode'].'&l_tf='.$list_verifield.'&accScoreTF='.$_GET['accScoreTF'].'&tissueExpression='.$_GET['tissueExpression'].'&&tfscore=390d56&result=enrichment&method=database">
								<b style="background: #CD69C9; padding: 7.5px; color: #fff; border-radius: 5px; margin: 5px; width: 25%; float: left;">Public data base</b></a>
							
								<a href="?mode='.$_GET['mode'].'&l_tf='.$list_verifield.'&accScoreTF='.$_GET['accScoreTF'].'&tissueExpression='.$_GET['tissueExpression'].'&&tfscore=390d56&result=enrichment&method=experiment">
								<b style="background: #CD6889; padding: 7.5px; color: #fff; border-radius: 5px; margin: 5px; width: 25%; float: left;">ChIP-seq experiment</b></a>
							
								<a href="?mode='.$_GET['mode'].'&l_tf='.$list_verifield.'&accScoreTF='.$_GET['accScoreTF'].'&tissueExpression='.$_GET['tissueExpression'].'&&tfscore=390d56&result=enrichment&method=prediction">
								<b style="background: #7A8B8B; padding: 7.5px; color: #fff; border-radius: 5px; margin: 5px; width: 25%; float: left;">Prediction TFBS</b></a>
							
							
							</td>
						</tr>
						
						<tr>
							<td style="border: 1px #DDD solid; border-radius: 10px; padding: 10px; margin-top: 5%;" colspan="3">
								<b style="color: #4F4F4F; font-size: 15px;">Genes not found</b>
								'.$nfound_html.'
							</td>
						</tr>
					</table>';
					
				
			}else{
				
				//$lista = strtoupper(urlencode(trim($lista)));			
				//$lista = str_replace(array('%2C','+','%3B'),'%0D%0A',$lista);
			
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
						require_once 'TFATConfig.php';
						echo '<iframe width="100%" height="750" src="http://'.$tfatServerAddress.'/enrichment_network.php?&listGene=T&accScore='.$_GET['accScoreTF'].'" frameborder="0" allowfullscreen></iframe>';
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
			
			$sql = 'select Symbol from hsgeneinfo where GeneID = '.$id.';';	
				$q = $mysqli->query($sql);				
				$d = $q->fetch_array();
					$symbol = $d['Symbol'];								
						
			return($symbol);
			
		}
	
			
			
			
			
			
}
//class
	
	
	
?>