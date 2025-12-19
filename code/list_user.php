<?
							  		$usee_sql="SELECT * FROM user  WHERE u_type='u' ORDER BY u_user ";
									$usee_result=dbQuery($usee_sql);
									$usee_num=dbNumRows($usee_result);
									if ($usee_num>0)
									{
										while($usee_row=dbFetchArray($usee_result))
										{
												$ur_user=$usee_row["u_user"];
												$u_prefix=$usee_row["u_prefix"];
												$u_name=$usee_row["u_name"];
												$u_last=$usee_row["u_last"];
												$u_dep_id=$usee_row["u_dep_id"];

												
												$presee_sql="SELECT * FROM prefix  WHERE  pre_id='$u_prefix'";
												$presee_result=dbQuery($presee_sql);
												$presee_num=dbNumRows($presee_result);
												if ($presee_num>0)
												 {
														$presee_row=dbFetchArray($presee_result);
														$pre_name=$presee_row["pre_name"];
												 }
												 else  {	$pre_name="-";	}

												$depsee_sql="SELECT * FROM depart  WHERE  dep_id='$u_dep_id' ";
												$depsee_result=dbQuery($depsee_sql);
												$depsee_num=dbNumRows($depsee_result);
												if ($depsee_num>0)
												 {
														$depsee_row=dbFetchArray($depsee_result);
														$dep_name=$depsee_row["dep_name"];
												 }
												 else  {	$dep_name="����Һ˹��§ҹ";	}


												?>                <option value="<? echo"$ur_user";?>"><? echo"$ur_user ---- $pre_name$u_name  $u_last ----- $dep_name";?></option>                  <?
												  		
			  
				  						}
				  					}

								 else
								{
											?>                  <option value="0">NoData</option>                  <?
								}
?>