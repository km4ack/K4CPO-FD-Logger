<?php
include_once("include.php");
if ($_REQUEST['id']<>0) {
	$ret=GetMode($_REQUEST['id']);
	$mode=$ret[0]['mode'];
} else {
	$mode="";
	$ret[0]['id']=0;
}
?>
<form action=post.php>
<input type=hidden name=type value=mode>
<table>
	<tr><th>Mode List Seq</th><td><input type=text name=id value="<?=$ret[0]['id'];?>" autofocus></td></tr>
	<tr><th>Mode Name</th><td><input type=text name=mode value="<?=$mode;?>"></td></tr>
</table>
<?php
if ($_REQUEST['id']<>0) { ?>
<input type=submit name=submitie value="Update Mode"><input type=submit name=submitie value="Delete Mode">
<input type=hidden name=id value="<?=$ret[0]['id'];?>">
</form>
<?php } else {?>
<form method=post>
<input type=submit name=submitie value="Add Mode">
<?php } ?>
</form>