<?php
include_once("include.php");
if ($_REQUEST['id']<>0) {
	$ret=GetBand($_REQUEST['id']);
	$band=$ret[0]['band'];
} else {
	$band="";
	$ret[0]['id']=0;
}
?>
<form action=post.php>
<input type=hidden name=type value=band>
<table>
	<tr><th>Band List Seq</th><td><input type=text name=id value="<?=$ret[0]['id'];?>" autofocus></td></tr>
	<tr><th>Band Name</th><td><input type=text name=band value="<?=$band;?>"></td></tr>
</table>
<?php
if ($_REQUEST['id']<>0) { ?>
<input type=submit name=submitie value="Update Band"><input type=submit name=submitie value="Delete Band">
<input type=hidden name=id value="<?=$ret[0]['id'];?>">
</form>
<?php } else {?>
<form method=post>
<input type=submit name=submitie value="Add Band">
<?php } ?>
</form>