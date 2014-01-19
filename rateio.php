<?php include('include-header.php') ?>
<h2>Rateio</h2>
<h3>Montante: R$ <?php echo $_REQUEST['montante']; ?></h3>
<?php 

for($i = 0; $i < $_REQUEST['subordinados']; $i++)
{
  $valor_sem_superior[$i] = floatval($_REQUEST['montante']) * floatval($_REQUEST['porcentagem_subordinado'][$i]) / 100;
  $valor_com_superior[$i] = $valor_sem_superior[$i] * (1 - floatval($_REQUEST['porcentagem_superior'][$i]) / 100);
  $valor_superior[$i]     = $valor_sem_superior[$i] - $valor_com_superior[$i];
}

$valor_total_sem_superior = array_sum ($valor_sem_superior);
$valor_total_com_superior = array_sum ($valor_com_superior);
$valor_total_superior = array_sum ($valor_superior);
$valor_total_porcentagem = array_sum($_REQUEST['porcentagem_subordinado']);
?>
<table class="table table-striped table-bordered table-hover">
<tr>
	<th>Subordinado</th>
  <th>% do subordinado</th>
	<th>Valor sem percentual do superior (R$)</th>
	<th>Valor com percentual do superior (R$)</th>
  <th>% do superior sobre o subordinado</th>
	<th>Valor do superior sobre o subordinado (R$)  </th>
</tr>
<?php
for($i = 0; $i < $_REQUEST['subordinados']; $i++)
{ ?>

  <tr>
    <td><?php echo $i+1 ?></td>
    <td><?php echo $_REQUEST['porcentagem_subordinado'][$i] ?></td>
    <td><?php echo $valor_sem_superior[$i] ?></td>
    <td><?php echo $valor_com_superior[$i] ?></td>
    <td><?php echo $_REQUEST['porcentagem_superior'][$i] ?></td>
    <td><?php echo $valor_superior[$i] ?></td>
  </tr>
<?php
}
?>
  <tr>
    <td>Total</td>
    <td><?php echo $valor_total_porcentagem ?></td>
    <td><?php echo $valor_total_sem_superior ?></td>
    <td>&nbsp;</td>
    <td><?php echo $valor_total_com_superior ?></td>
    <td><?php echo $valor_total_superior ?></td>
  </tr>

</table>


<?php include('include-footer.php') ?>
