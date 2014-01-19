<?php include('include-header.php') ?>

<h2>Número de subordinados: <?php echo $_GET['subordinados'] ?></h2>
	<form action="rateio.php" method="get"  class="form-horizontal">
  <div class="form-group">
    <label for="" class="col-sm-3 control-label">Montante a ser dividido</label>
    <div class="col-sm-9">
      <input class="form-control"  type="text" name="montante" />
    </div>
  </div>
  <table class="table table-striped table-bordered table-hover">
  	<tr>
  		<th>Subordinado</th>
  		<th>Porcentagem do montante<a href="#info1">*</a></th>
  		<th>Quanto o superior recebe do subordinado (em porcentagem)<a href="#info2">**</a></th>
  	</tr>
    <?php for($i = 0; $i < $_GET['subordinados']; $i++)
    { ?>
    <tr>
      <td><?php echo $i + 1 ?></td>
      <td><input type="text" class="form-control" name="porcentagem_subordinado[]" /></td>
      <td><input type="text" class="form-control" name="porcentagem_superior[]" /></td>
    </tr>
    <?php } ?>
  </table>
  
  <input type="hidden" name="subordinados" value="<?php echo $_GET['subordinados'] ?>" />
  <input type="submit" value="Próximo passo" class="btn btn-info" />
  </form>
  <hr />
  <p id="info1">* Insira valores entre 0 e 100. A soma das porcentagens do montante devem ser iguais a 100%.</p>
  <p id="info2">** Insira valores entre 0 e 100. Este percentual é referente a quanto o superior ganha sobre o valor do subordinado em questão.</p>
  
<?php include('include-footer.php') ?>
