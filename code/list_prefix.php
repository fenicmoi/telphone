<?
							  		$presee_sql="SELECT * FROM prefix  ";
									$presee_result=mysql_query($presee_sql);
									$presee_num=mysql_num_rows($presee_result);
									if ($presee_num>0)
									 {
											while($presee_row=mysql_fetch_array($presee_result))
											{	
												$pre_id=$presee_row["pre_id"];
												$pre_name=$presee_row["pre_name"];
												?>                  <option value="<? echo"$pre_id";?>"><? echo"$pre_name";?></option>                  <?
											}
							  			}
							  		else
										{
											?>                  <option value="0">NoData</option>                  <?
										}

?>