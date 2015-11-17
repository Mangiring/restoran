<html>
	<script>window.print();</script>
<body>
<style>
html,body{margin:0;padding:0}
</style>
<div style="width:300px">
<div style="text-align:center;">
Ayam Goreng Bakar Presto <br />
Green Lake City Ruko Colloseum No. 36 <br />
021 255 255 19 / 0821 78 788 988
</div>
<br />
<table border="0" style="width:300px">
<tr><td>Tgl</td><td>: <?php echo __get_date(time());?></td></tr>
<tr><td>Faktur</td><td>: <?php echo str_pad($id, 4, "0", STR_PAD_LEFT);?></td></tr>
</table>
--------------------------------------------------------
<table border="0" style="width:300px">
<?php 
$subtotal=0;
$tdisc=0;
foreach($wishlist as $k => $v) : ?>
<tr><td><?php echo $v -> mname .'<br />' . $v -> wqty.' X ' . __get_rupiah($v -> wharga,2); ?></td>
<td style="text-align:right;vertical-align:top"><?php
$disc = ($v -> wharga*$v -> wdisc/100) * $v -> wqty;
$total = ($v -> wharga * $v -> wqty) - $disc;
echo __get_rupiah($total,2);
$subtotal = $total+$subtotal;
$tdisc = ($subtotal * $v -> wdis) / 100;
?></td></tr>
<?php endforeach; ?>
<?php 
$subdis=($subtotal-$tdisc)*$v -> wdis;
$tall=$subtotal;
$tppn=$tall*$v -> wppn /100;
$tallx=$subtotal - $tdisc + $tppn;
?>
<tr><td></td></tr>
</table>
--------------------------------------------------------
<table border="0" style="width:300px">
<tr><td>Subtotal</td><td style="text-align:right;"> <?php echo __get_rupiah($subtotal,2); ?></td></tr>
<tr><td>Discount</td><td style="text-align:right;"> <?php echo __get_rupiah($tdisc,2); ?></td></tr>
<tr><td>PPN &nbsp;(<?php echo $v -> wppn;?>%)</td><td style="text-align:right;"> <?php echo __get_rupiah($tppn,2); ?></td></tr>
<tr><td></td><td style="text-align:right;">-------------------------------------</td></tr>
<tr><td>Grand Total</td><td style="text-align:right;"> <?php echo __get_rupiah($tallx,2); ?></td></tr>
<tr><td>Total Bayar</td><td style="text-align:right;"> <?php echo __get_rupiah($v -> wpayment,2); ?></td></tr>
<tr><td>Sisa</td><td style="text-align:right;"> <?php echo __get_rupiah($v -> wpayment - $tallx,2); ?></td></tr>
</table>
</div>
<br />
<br />
&nbsp;
</body>
</html>
