<?php   
  
    function setformat($count){

      $format = $count;
       $count = strlen($count);
      
       switch ($count) {
           case 9:  //โทรศัพท์
               $sec1=substr($format,0,3);
               $sec2=substr($format,3,8);
               $concat = $sec1."-".$sec2;
               return $concat;
               break;
                    
            case 10:    //มือถือ
               $sec1=substr($format,0,3);
               $sec2=substr($format,3,9);
               $concat = $sec1."-".$sec2;
               return $concat;
               break;
       }
    }




                              
?>