<?php
function __check_if_exists($id,$arr) {
	for($i=0;$i<count($arr);++$i) {
		if ($id == $arr[$i]) {
			return true;
		}
	}
	return false;
}

$wishlist2 = '';
$res = array();
$wids = explode('+',$_SERVER['QUERY_STRING']);

for($i=0;$i<count($wids);++$i) {
	if ($wids[$i]) $res[] = $wids[$i];
}
if (count($res) > 0) {
	foreach($wishlist as $k => $v) {
		if (__check_if_exists($v -> wdid,$res))
		$wishlist2[] = $v;
	}
	$wishlist = $wishlist2;
}
?>
<html>
	<script>window.print();</script>
<style>
html,body{margin:0;padding:0}
table{font-size:16px;border-collapse:collapse}
table th {border:1px solid #000}
</style>
<body>
<table border="0" style="width:200px">
<?php
foreach($wishlist as $k => $v) {
$wname=$v -> wname;
$wstatus=$v -> wstatus;
$wtid=$wtid;
$tname=$v -> tname;
$person=$v -> person;
$notes=$v -> wnotes;
$note=$v -> wnote;
}
$wcount= count($wishlist);
if($wcount==0){
$wname="";
$wstatus="";
$tname="";
$person="";
$notes="";
$note="";
}
?>
<tr><td>Meja</td><td>: <?php echo $tname; ?></td></tr>
<tr><td>Nama</td><td>: <?php echo $wname; ?></td></tr>
</table>
<br>

<table border="0" style="width:300px">
<thead>
<tr>
<th>No. </th>		  
<th>Menu</th>		  
<th>Qty</th>
<th>Notes</th>
</tr>
</thead>
<tbody>
<?php
$t=0;
$i=1;
foreach($wishlist as $k => $v) :
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $v -> mname; ?></td>
<td> <?php echo $v -> wqty;?></td>
<td><?php echo $v->wnote; ?></td>
</tr>
<?php
++$i;
$t=$t+$v -> wqty;
endforeach; ?>
</tbody>
<tr><td></td><td>Total </td><td><?php echo $t;?></td><td></td></tr>
</table>
</body>
</html>
