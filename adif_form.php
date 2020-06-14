<?php
include("include.php");
echo "<form method=post action=adif.php><table width=900>";
foreach($contest as $key=>$val){
    //echo $key."  |  ".$val."<br>";
    if($key != 'SOAPBOX:'){
        echo "<tr><td width=70% align=right>".$key."</td><td><input type=text name='contest[".$key."]' id='".$key."' value='".$val."'></td></tr>";
    } else {
        echo "<tr><td align=right>".$key."</td><td><textarea rows=5 cols=80 name='contest[".$key."]' id='".$key."' placeholder=\"".$textarea."\"  >".$val."</textarea></td></tr>";
    }
}

?>
</table><br>
<input type=submit value='Submit Form'>
