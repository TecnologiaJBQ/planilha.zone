<?php

include("../libs/config.php");
include("../libs/header.php");

?>

<script type="text/javascript">

$( document ).ready(function() {

  $("#formDados").validate({
        rules: {
            "cep_origem": {
                minlength: 9,
                maxlength: 9,
                required: true
            },
            "codigo_administrativo": {
                minlength: 8,
                maxlength: 8
            },
            "senha": {
                minlength: 8,
                maxlength: 8
            }

  },
         highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
  submitHandler: function(form) {

      form.submit();

      }
  
    });


});

</script>


<form class="form-horizontal" role="form" id="formDados" action="gerando.php" method="get">

  <div class="form-group">
    <label for="inputCountry" class="col-sm-4 control-label">Formato
    <span class="help-block">Em que formato precisa?</span>
    </label>
    <div class="col-sm-8">
      <select name="formato" class="form-control input-lg">
        <option value="VTEX">VTEX</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="inputCountry" class="col-sm-4 control-label">Transportadora
    <span class="help-block">Verifique o código do serviço</span>
    </label>
    <div class="col-sm-8">
      <select name="codigo_servico" class="form-control input-lg">
        <?php 
        foreach ($CORREIOS_CONTRATO AS $item) {
        ?>
        <option value="<?php echo $item[0] ?>"><?php echo $item[1] ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputState" class="col-sm-4 control-label">CEP Origem
    <span class="help-block">CEP de onde estão os produtos</span>
    </label>
    <div class="col-sm-8">
      <input type="text" class="form-control input-lg" id="inputState" name="cep_origem" placeholder="99999-999">
    </div>
  </div>
  <div class="form-group">
    <label for="inputState" class="col-sm-4 control-label">Código Administrativo
    <span class="help-block">Está no seu cartão dos correios</span>
    </label>
    <div class="col-sm-8">
      <input type="text" class="form-control input-lg" id="inputState" name="codigo_administrativo" placeholder="99999999">
    </div>
  </div>
  <div class="form-group">
    <label for="inputLocality" class="col-sm-4 control-label">Senha
    <span class="help-block">Geralmente 8 primeiros dígitos do CNPJ</span>
    </label>
    <div class="col-sm-8">
      <input type="text" class="form-control input-lg" id="inputLocality" name="senha" placeholder="99999999">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <button type="submit" class="btn btn-default generate" id="generateCSR">Gerar planilha</button>
    </div>
  </div>
</form>

<?php

include("../libs/footer.php");

?>