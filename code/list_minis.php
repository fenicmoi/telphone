<?php
    $presee_sql = 'SELECT * FROM ministry  ORDER BY m_impo';
    $presee_result = dbQuery($presee_sql);
    $presee_num = dbNumRows($presee_result);
    if ($presee_num > 0) {
        while ($presee_row = dbFetchArray($presee_result)) {
            $m_id = $presee_row['m_id'];
            $m_name = $presee_row['m_name']; ?>      
			<option value="<?php echo $m_id; ?>"><?php echo $m_name; ?></option>	 
		<?php
        }
    } else {
        ?>     <option value="0">NoData</option><?php
    }
?>