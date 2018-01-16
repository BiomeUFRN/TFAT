<div class="container" style="width: 1024px; height: auto; margin: auto; padding: 15px;">

				<form method="get">
					
					
					<?php
					
						if($_GET['m']=='score'){
							
								echo '<input type="hidden" name="mode" value="score"/>';
								
						}else if($_GET['m']=='tfg'){
						
							echo '<input type="hidden" name="mode" value="target"/>';
							
						}else if($_GET['m']=='enrichment'){
							
							echo '<input type="hidden" name="mode" value="enrichment"/>';
							
						}else if($_GET['m']=='scan'){
							
							echo '<input type="hidden" name="mode" value="scan"/>';
							
						}
						
					?>
					
					
					<style>	

							table{
								width:85%;	
								margin: auto;								
							}
							
									div.legenda{
										width: 350px;
										float:right;
									}
									div.legenda div div {
										float:left;
										width:40px;
										height:15px;
										text-align:center;
										padding: 2.5px;
										margin: 2.5px;
										border-radius: 5px;
										font-size:small;
									}
					</style>
					
						<table>
						
							<tr>
							
								<td>
									<textarea name="l_tf" style="width: 350px; height: 350px; padding: 7.5px;"></textarea>
								</td>
								
								<td style="vertical-align: top; padding: 0px 15px;">
									<?php
										if($_GET['m']=='enrichment'){
											
											echo '<h2 style="margin-bottom: 5%;">Enter or send a list of genes to identify the transcription factors that regulate them 
												present in our database</h2>';
											
										}else if($_GET['m']=='score'){
											
											echo '<b> TF Check:</b> Type or submit a list of transcription factors to verify your evidence-based 
											reliability across multiple databases and resources, such as dna domain and others.
											
											
											<div style="padding:15px;">Symbol or Entrez Gene/GeneID separated by commas, semicolons, line breaks or space
											
												
													
													<br/><br/>Example:
													<br/>25; 86, 103
													<br/>646
													<br/>1022
													
													<br/><br/>Example:
													<br/>ABL1; ACTL6A, ADAR
													<br/>BNC1
													<br/>CDK7
													
											</div>
											
											
											';
												
										}else if($_GET['m']=='scan'){
											
											echo '<h2 style="margin-bottom: 5%;">Enter or send a list of gene promoter sequences to identify the transcription 
												factor binding sites (TFBS) using the position weight matrix (PWM) by HOCOMOCO</h2>';
											
										}
										
									?>
									
										<input type="hidden" name="tfscore" value="390d56"/>
										<input type="submit" value="send" style="border-radius: 2.5px; padding: 5px; 
										color: #FFF; background: #00004d; border: none; width: 100px; float: right; margin-top: 5%;"/>
									</td>
								</td>

								
							
							<?php	if($_GET['m']=='enrichment'){	?>
							
								<td style="border-right:none;">
								
								
									<div style="width: 100%; height: 250px; background: pink;">
									</div>
								
									<div style="text-align: right; margin: 7.5% 0px 2.5%;">Select the Pearson Correlation</div>
									<div class="legenda tissuelevel" style="width: 75%;">
										<div style="width:100%; float: left;">
											<div style="width: 22.5%; float: left;">Less</div>
											<div style="width: 22.5%; float: left;">Low</div>
											<div style="width: 22.5%; float: left;">Medium</div>
											<div style="width: 22.5%; float: left;">High</div>
										</div>
										<div style="width:100%; float: left;">
											<div style="width: 20%; float: left; background: GhostWhite; cursor:pointer;" class="tooltip" id="bless">
												<span><0.5</span></div>
												<div style="width: 20%; float: left; background: PeachPuff; cursor:pointer;" class="tooltip" id="blow">
												<span><10</span></div>
											<div style="width: 20%; float: left; background: LightSalmon; cursor:pointer;" class="tooltip" id="bmedium">
												<span><1000</span></div>
											<div style="width: 20%; float: left; background: IndianRed; color: #FFF; cursor:pointer;" 
											class="tooltip" id="bhigh">
												<span>>1000</span></div>
										</div>
										<div><input style="width: 85%;" type="range" name="tissueExpression" id="inte" min="0" max="1000" value="0" oninput="outte.value=inte.value">&nbsp;&nbsp;&nbsp;<sup><output id="outte">0</output></sup></div>
									</div>
									
									
									<div style="text-align: right; margin:7.5% 0px 2.5%; width: 100%; float: right;">Select the FPKM level of expression on tissue</div>
									<div class="legenda tissuelevel" style="width: 75%;">
										<div style="width:100%; float: left;">
											<div style="width: 22.5%; float: left;">Less</div>
											<div style="width: 22.5%; float: left;">Low</div>
											<div style="width: 22.5%; float: left;">Medium</div>
											<div style="width: 22.5%; float: left;">High</div>
										</div>
										<div style="width:100%; float: left;">
											<div style="width: 20%; float: left; background: GhostWhite; cursor:pointer;" class="tooltip" id="bless">
												<span><0.5</span></div>
												<div style="width: 20%; float: left; background: PeachPuff; cursor:pointer;" class="tooltip" id="blow">
												<span><10</span></div>
											<div style="width: 20%; float: left; background: LightSalmon; cursor:pointer;" class="tooltip" id="bmedium">
												<span><1000</span></div>
											<div style="width: 20%; float: left; background: IndianRed; color: #FFF; cursor:pointer;" 
											class="tooltip" id="bhigh">
												<span>>1000</span></div>
										</div>
										<div><input style="width: 85%;" type="range" name="tissueExpression" id="inte" min="0" max="1000" value="0" oninput="outte.value=inte.value">&nbsp;&nbsp;&nbsp;<sup><output id="outte">0</output></sup></div>
									</div>
								
									<div style="text-align: right; margin-bottom: 2.5%;">Select the Transcription Factor Accuracy</div>
									<div class="legenda" style="float: right;">
										<div style="width:100%;">
											<div style="width: 25%; float: left;">Low</div>
											<div style="width: 40%; float: left;"><h3>&rarr;</h3></div>
											<div style="width: 25%; float: left;">High</div>
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
										<div>
										<input style="width: 85%;" type="range" name="accScoreTF" id="ins" min="0" max="100" value="0" oninput="outs.value = ins.value">
									&nbsp;&nbsp;&nbsp;<sup><output id="outs">0</output>%</sup>
										</div>
									</div>
								</td>
							
							
							<?php } ?>
							
						
							</tr>
						</table>					
				</form>
	
</div>