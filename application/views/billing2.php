<html>
<body>
<div style="width:300px">
<div style="text-align:center;">
Ayam Goreng Bakar Presto <br />
Green Lake City Ruko Colloseum No. 36 <br />
021 255 255 19 / 0812 78 788 988
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
<tr><td><?php echo $v -> mname .' ' . $v -> wqty.' X ' . __get_rupiah($v -> wharga,2); ?></td><td><?php
$total = $v -> wharga * $v -> wqty;
$disc= ($v -> wharga*$v -> wdisc/100) * $v -> wqty;
echo __get_rupiah($total,2);
$subtotal = $total+$subtotal;
$tdisc=$tdisc+$disc;
?></td></tr>
<?php endforeach; ?>
<?php 
$subdis=($subtotal-$tdisc)*$v -> wdis;
$tall=$subtotal-$tdisc;
$tppn=$tall*$v -> wppn /100;
$tallx=$tall+$tppn;
?>
<tr><td></td></tr>
</table>
--------------------------------------------------------
<table border="0" style="width:300px">
<tr><td></td><td>Subtotal</td><td style="text-align:right;">: <?php echo __get_rupiah($subtotal,2); ?></td></tr>
<tr><td></td><td>Discount</td><td style="text-align:right;">: <?php echo __get_rupiah($tdisc,2); ?></td></tr>
<tr><td></td><td>PPN &nbsp;(<?=$v -> wppn;?> %)</td><td style="text-align:right;">: <?php echo __get_rupiah($tppn,2); ?></td></tr>
<tr><td></td><td></td><td style="text-align:right;">-------------------------------------</td></tr>
<tr><td></td><td>Grand Total</td><td style="text-align:right;">: <?php echo __get_rupiah($tallx,2); ?></td></tr>
</table>
</div>
</body>
</html>
