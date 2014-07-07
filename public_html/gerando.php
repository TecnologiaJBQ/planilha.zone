<?php

$uptime = shell_exec("cut -d. -f1 /proc/uptime");
include("../libs/config.php");
include("../libs/header.php");

if ($_GET["codigo_servico"] == "81019" || $_GET["codigo_servico"] == "40215" || $_GET["codigo_servico"] == "40290") {

$FAIXAS_CEPS = array(
    ['estado' => 'AC', 'tipo' => 'capital', 'nome' => 'Rio Branco', 'faixas' => ['69900-000', '69923-999', '69911-776']],

    ['estado' => 'AL', 'tipo' => 'capital', 'nome' => 'Maceió', 'faixas' => ['57000-000', '57099-999', '57035-830']],

    ['estado' => 'AM', 'tipo' => 'capital', 'nome' => 'Manaus', 'faixas' => ['69000-000', '69099-999', '69083-350']],

    ['estado' => 'AP', 'tipo' => 'capital', 'nome' => 'Macapá', 'faixas' => ['68900-000', '68911-999', '68909-167']],

    ['estado' => 'BA', 'tipo' => 'capital', 'nome' => 'Salvador', 'faixas' => ['40000-000', '42599-999', '40335-505']],

    ['estado' => 'CE', 'tipo' => 'capital', 'nome' => 'Fortaleza', 'faixas' => ['60000-000', '61599-999', '60744-280']],

    ['estado' => 'DF', 'tipo' => 'capital', 'nome' => 'Brasília', 'faixas' => ['70000-000', '72799-999 ', '71900-500']],
    ['estado' => 'DF', 'tipo' => 'capital', 'nome' => 'Brasília', 'faixas' => ['73000-000', '73699-999', '73090-135']],

    ['estado' => 'ES', 'tipo' => 'capital', 'nome' => 'Vitória', 'faixas' => ['29000-000', '29099-999', '29060-017']],
    
    ['estado' => 'GO', 'tipo' => 'capital', 'nome' => 'Goiânia', 'faixas' => ['74000-000', '74899-999', '74343-610']],

    ['estado' => 'MA', 'tipo' => 'capital', 'nome' => 'São Luiz', 'faixas' => ['65000-000', '65109-999', '65072-405']],

    ['estado' => 'MG', 'tipo' => 'capital', 'nome' => 'Belo Horizonte', 'faixas' => ['30000-000', '31999-999', '31540-473']],

    ['estado' => 'MS', 'tipo' => 'capital', 'nome' => 'Campo Grande', 'faixas' => ['79000-000', '79124-999', '79104-570']],

    ['estado' => 'MT', 'tipo' => 'capital', 'nome' => 'Cuiabá', 'faixas' => ['78000-000', '78099-999', '78048-245']],

    ['estado' => 'PA', 'tipo' => 'capital', 'nome' => 'Belém', 'faixas' => ['66000-000', '66999-999', '66820-820']],

    ['estado' => 'PB', 'tipo' => 'capital', 'nome' => 'João Pessoa', 'faixas' => ['58000-000', '58099-999', '58028-860']],

    ['estado' => 'PE', 'tipo' => 'capital', 'nome' => 'Recife', 'faixas' => ['50000-000', '52999-999', '52031-216']],

    ['estado' => 'PI', 'tipo' => 'capital', 'nome' => 'Teresina', 'faixas' => ['64000-000', '64099-999', '64062-080']],

    ['estado' => 'PR', 'tipo' => 'capital', 'nome' => 'Curitiba', 'faixas' => ['80000-000', '82999-999', '80510-330']],

    ['estado' => 'RJ', 'tipo' => 'capital', 'nome' => 'Rio De Janeiro', 'faixas' => ['20000-000', '23799-999', '23591-450']],
    ['estado' => 'RJ', 'tipo' => 'interior', 'nome' => 'Interior do RJ', 'faixas' => ['23800-000', '28999-999', '28035-005']],

    ['estado' => 'RN', 'tipo' => 'capital', 'nome' => 'Natal', 'faixas' => ['59000-000', '59139-999', '59123-029']],
    ['estado' => 'RN', 'tipo' => 'interior', 'nome' => 'Interior do RN', 'faixas' => ['59140-000', '59999-999', '59612-300']],

    ['estado' => 'RO', 'tipo' => 'capital', 'nome' => 'Porto Velho', 'faixas' => ['76800-000', '76834-999', '76801-016']],

    ['estado' => 'RR', 'tipo' => 'capital', 'nome' => 'Boa Vista', 'faixas' => ['69300-000', '69339-999', '69310-030']],

    ['estado' => 'RS', 'tipo' => 'capital', 'nome' => 'Porto Alegre', 'faixas' => ['90000-000', '91999-999', '91330-730']],
    ['estado' => 'RS', 'tipo' => 'interior', 'nome' => 'Interior do RS', 'faixas' => ['92000-000', '99999-999', '94475-770']],

    ['estado' => 'SC', 'tipo' => 'capital', 'nome' => 'Florianópolis', 'faixas' => ['88000-000', '88099-999', '88066-410']],
    ['estado' => 'SC', 'tipo' => 'interior', 'nome' => 'Interior de SC', 'faixas' => ['88100-000', '89999-999', '88818-286']],

    ['estado' => 'SE', 'tipo' => 'capital', 'nome' => 'Aracajú', 'faixas' => ['49000-000', '49098-999', '49027-390']],

    ['estado' => 'SP', 'tipo' => 'capital', 'nome' => 'São Paulo', 'faixas' => ['01000-000', '09999-999', '01303-001']],

    ['estado' => 'TO', 'tipo' => 'capital', 'nome' => 'Palmas', 'faixas' => ['77000-000', '77249-999', '77064-318']],

);

} else {

$FAIXAS_CEPS = array(
    ['estado' => 'AC', 'tipo' => 'capital', 'nome' => 'Rio Branco', 'faixas' => ['69900-000', '69923-999', '69911-776']],
    ['estado' => 'AC', 'tipo' => 'interior', 'nome' => 'Interior do AC', 'faixas' => ['69924-000', '69999-999', '69970-000']],

    ['estado' => 'AL', 'tipo' => 'capital', 'nome' => 'Maceió', 'faixas' => ['57000-000', '57099-999', '57035-830']],
    ['estado' => 'AL', 'tipo' => 'interior', 'nome' => 'Interior do AL', 'faixas' => ['57100-000', '57999-999', '57602-640']],

    ['estado' => 'AM', 'tipo' => 'capital', 'nome' => 'Manaus', 'faixas' => ['69000-000', '69099-999', '69083-350']],
    ['estado' => 'AM', 'tipo' => 'interior', 'nome' => 'Interior do AM', 'faixas' => ['69100-000', '69299-999', '69280-000']],
    ['estado' => 'AM', 'tipo' => 'interior', 'nome' => 'Interior do AM', 'faixas' => ['69400-000', '69899-999', '69280-000']],
    ['estado' => 'AM', 'tipo' => 'interior', 'nome' => 'Interior do AM', 'faixas' => ['69800-000', '69800-000', '69800-000']],

    ['estado' => 'AP', 'tipo' => 'capital', 'nome' => 'Macapá', 'faixas' => ['68900-000', '68911-999', '68909-167']],
    ['estado' => 'AP', 'tipo' => 'interior', 'nome' => 'Interior do AP', 'faixas' => ['68912-000', '68999-999', '68920-000']],

    ['estado' => 'BA', 'tipo' => 'capital', 'nome' => 'Salvador', 'faixas' => ['40000-000', '42599-999', '40335-505']],
    ['estado' => 'BA', 'tipo' => 'interior', 'nome' => 'Interior da BA', 'faixas' => ['42600-000', '48999-999', '44935-000']],

    ['estado' => 'CE', 'tipo' => 'capital', 'nome' => 'Fortaleza', 'faixas' => ['60000-000', '61599-999', '60744-280']],
    ['estado' => 'CE', 'tipo' => 'interior', 'nome' => 'Interior do CE', 'faixas' => ['61600-000', '63999-999', '62748-000']],

    ['estado' => 'DF', 'tipo' => 'capital', 'nome' => 'Brasília', 'faixas' => ['70000-000', '72799-999 ', '71900-500']],
    ['estado' => 'DF', 'tipo' => 'capital', 'nome' => 'Brasília', 'faixas' => ['73000-000', '73699-999', '73090-135']],

    ['estado' => 'ES', 'tipo' => 'capital', 'nome' => 'Vitória', 'faixas' => ['29000-000', '29099-999', '29060-017']],
    ['estado' => 'ES', 'tipo' => 'interior', 'nome' => 'Interior do ES', 'faixas' => ['29100-000', '29999-999', '29860-000']],
    
    ['estado' => 'GO', 'tipo' => 'capital', 'nome' => 'Goiânia', 'faixas' => ['74000-000', '74899-999', '74343-610']],
    ['estado' => 'GO', 'tipo' => 'interior', 'nome' => 'Interior de GO', 'faixas' => ['72800-000', '72999-999', '76330-000']],
    ['estado' => 'GO', 'tipo' => 'interior', 'nome' => 'Interior de GO', 'faixas' => ['73700-000', '73999-999', '76330-000']],
    ['estado' => 'GO', 'tipo' => 'interior', 'nome' => 'Interior de GO', 'faixas' => ['74900-000', '76799-999', '76330-000']],

    ['estado' => 'MA', 'tipo' => 'capital', 'nome' => 'São Luiz', 'faixas' => ['65000-000', '65109-999', '65072-405']],
    ['estado' => 'MA', 'tipo' => 'interior', 'nome' => 'Interior do MA', 'faixas' => ['65110-000', '65999-999', '65940-000']],

    ['estado' => 'MG', 'tipo' => 'capital', 'nome' => 'Belo Horizonte', 'faixas' => ['30000-000', '31999-999', '31540-473']],
    ['estado' => 'MG', 'tipo' => 'interior', 'nome' => 'Interior de MG', 'faixas' => ['32000-000', '39999-999', '37800-000']],

    ['estado' => 'MS', 'tipo' => 'capital', 'nome' => 'Campo Grande', 'faixas' => ['79000-000', '79124-999', '79104-570']],
    ['estado' => 'MS', 'tipo' => 'interior', 'nome' => 'Interior do MS', 'faixas' => ['79125-000', '79999-999', '79400-000']],

    ['estado' => 'MT', 'tipo' => 'capital', 'nome' => 'Cuiabá', 'faixas' => ['78000-000', '78099-999', '78048-245']],
    ['estado' => 'MT', 'tipo' => 'interior', 'nome' => 'Interior do MT', 'faixas' => ['78100-000', '78899-999', '78175-000']],

    ['estado' => 'PA', 'tipo' => 'capital', 'nome' => 'Belém', 'faixas' => ['66000-000', '66999-999', '66820-820']],
    ['estado' => 'PA', 'tipo' => 'interior', 'nome' => 'Interior do PA', 'faixas' => ['67000-000', '68899-999', '68371-163']],

    ['estado' => 'PB', 'tipo' => 'capital', 'nome' => 'João Pessoa', 'faixas' => ['58000-000', '58099-999', '58028-860']],
    ['estado' => 'PB', 'tipo' => 'interior', 'nome' => 'Interior da PB', 'faixas' => ['58100-000', '58999-999', '58805-350']],

    ['estado' => 'PE', 'tipo' => 'capital', 'nome' => 'Recife', 'faixas' => ['50000-000', '52999-999', '52031-216']],
    ['estado' => 'PE', 'tipo' => 'interior', 'nome' => 'Interior do PE', 'faixas' => ['53000-000', '56999-999', '56909-716']],

    ['estado' => 'PI', 'tipo' => 'capital', 'nome' => 'Teresina', 'faixas' => ['64000-000', '64099-999', '64062-080']],
    ['estado' => 'PI', 'tipo' => 'interior', 'nome' => 'Interior do PI', 'faixas' => ['64100-000', '64999-999', '64215-360']],

    ['estado' => 'PR', 'tipo' => 'capital', 'nome' => 'Curitiba', 'faixas' => ['80000-000', '82999-999', '80510-330']],
    ['estado' => 'PR', 'tipo' => 'interior', 'nome' => 'Interior do PR', 'faixas' => ['83000-000', '87999-999', '85840-000']],

    ['estado' => 'RJ', 'tipo' => 'capital', 'nome' => 'Rio De Janeiro', 'faixas' => ['20000-000', '23799-999', '23591-450']],
    ['estado' => 'RJ', 'tipo' => 'interior', 'nome' => 'Interior do RJ', 'faixas' => ['23800-000', '28999-999', '28035-005']],

    ['estado' => 'RN', 'tipo' => 'capital', 'nome' => 'Natal', 'faixas' => ['59000-000', '59139-999', '59123-029']],
    ['estado' => 'RN', 'tipo' => 'interior', 'nome' => 'Interior do RN', 'faixas' => ['59140-000', '59999-999', '59612-300']],

    ['estado' => 'RO', 'tipo' => 'capital', 'nome' => 'Porto Velho', 'faixas' => ['76800-000', '76834-999', '76801-016']],
    ['estado' => 'RO', 'tipo' => 'interior', 'nome' => 'Interior de RO', 'faixas' => ['76835-000', '76999-999', '76890-000']],

    ['estado' => 'RR', 'tipo' => 'capital', 'nome' => 'Boa Vista', 'faixas' => ['69300-000', '69339-999', '69310-030']],
    ['estado' => 'RR', 'tipo' => 'interior', 'nome' => 'Interior de RR', 'faixas' => ['69340-000', '69399-999', '69373-000']],

    ['estado' => 'RS', 'tipo' => 'capital', 'nome' => 'Porto Alegre', 'faixas' => ['90000-000', '91999-999', '91330-730']],
    ['estado' => 'RS', 'tipo' => 'interior', 'nome' => 'Interior do RS', 'faixas' => ['92000-000', '99999-999', '94475-770']],

    ['estado' => 'SC', 'tipo' => 'capital', 'nome' => 'Florianópolis', 'faixas' => ['88000-000', '88099-999', '88066-410']],
    ['estado' => 'SC', 'tipo' => 'interior', 'nome' => 'Interior de SC', 'faixas' => ['88100-000', '89999-999', '88818-286']],

    ['estado' => 'SE', 'tipo' => 'capital', 'nome' => 'Aracajú', 'faixas' => ['49000-000', '49098-999', '49027-390']],
    ['estado' => 'SE', 'tipo' => 'interior', 'nome' => 'Interior de SE', 'faixas' => ['49099-000', '49999-999', '49704-000']],

    ['estado' => 'SP', 'tipo' => 'capital', 'nome' => 'São Paulo', 'faixas' => ['01000-000', '09999-999', '01303-001']],
    ['estado' => 'SP', 'tipo' => 'interior', 'nome' => 'Interior de SP', 'faixas' => ['10000-000', '19999-999', '13760-000']],

    ['estado' => 'TO', 'tipo' => 'capital', 'nome' => 'Palmas', 'faixas' => ['77000-000', '77249-999', '77064-318']],
    ['estado' => 'TO', 'tipo' => 'interior', 'nome' => 'Interior do TO', 'faixas' => ['77250-000', '77999-999', '77423-510']],

);

}

?>

<script>

csv = "ZipCodeStart;ZipCodeEnd;WeightStart;WeightEnd;AbsoluteMoneyCost;PricePercent;PriceByExtraWeight;MaxVolume;TimeCost;Country\n";

<?php if ($_GET["codigo_servico"] == "81019" || $_GET["codigo_servico"] == "40215" || $_GET["codigo_servico"] == "40290") { ?>
var FAIXAS_PESO = [
    [0.0, 0.3], [0.3, 0.5], [0.5, 0.75], [0.75, 1.0], [1.0, 1.5], [1.5, 2.0], [2.0, 2.5], [2.5, 3.0], [3.0, 3.5],
    [3.5, 4.0], [4.0, 4.5], [4.5, 5.0], [5.0, 6.0], [6.0, 7.0], [7.0, 8.0], [8.0, 9.0], [9.0, 10.0], [10.0, 11.0],
    [11.0, 12.0], [12.0, 13.0], [13.0, 14.0], [14.0, 15.0]
];
<?php } else { ?>
var FAIXAS_PESO = [
    [0.0, 0.3], [0.3, 0.5], [0.5, 0.75], [0.75, 1.0], [1.0, 1.5], [1.5, 2.0], [2.0, 2.5], [2.5, 3.0], [3.0, 3.5],
    [3.5, 4.0], [4.0, 4.5], [4.5, 5.0], [5.0, 6.0], [6.0, 7.0], [7.0, 8.0], [8.0, 9.0], [9.0, 10.0], [10.0, 11.0],
    [11.0, 12.0], [12.0, 13.0], [13.0, 14.0], [14.0, 15.0], [15.0, 16.0], [16.0, 17.0], [17.0, 18.0], [18.0, 19.0],
    [19.0, 20.0], [20.0, 21.0], [21.0, 22.0], [22.0, 23.0], [23.0, 24.0], [24.0, 25.0], [25.0, 26.0], [26.0, 27.0],
    [27.0, 28.0], [28.0, 29.0], [29.0, 30.0]
];
<?php } ?>

csv = "ZipCodeStart;ZipCodeEnd;WeightStart;WeightEnd;AbsoluteMoneyCost;PricePercent;PriceByExtraWeight;MaxVolume;TimeCost;Country\n";

function calcular(v_count,faixa_ini,faixa_fim,cep_uso,peso_ini,peso_fim,peso_medio) {

  $.getJSON("calcular.php", {
    'cepOrigem': '<?php echo $_GET["cep_origem"] ?>',
    'cepDestino': cep_uso,
    'peso': peso_medio,
    'codigo_servico': '<?php echo $_GET["codigo_servico"] ?>',
    'codigo_administrativo': '<?php echo $_GET["codigo_administrativo"] ?>',
    'senha': '<?php echo $_GET["senha"] ?>'
  }, function(data) {

    progress_id = "#progress-" + v_count;
    progress_value = parseInt($(progress_id).attr('aria-valuenow'));
    progress_value += 1;
    $(progress_id).attr('aria-valuenow',progress_value);
    progress_max = FAIXAS_PESO.length;
    progress_percent = (progress_value / FAIXAS_PESO.length) * 100;

    $(progress_id).css("width",progress_percent + "%")
    $(progress_id).html(parseFloat(progress_percent).toFixed(2) + "%");

    peso_ini = parseInt(parseFloat(peso_ini) * 1000);
    peso_fim = parseInt(parseFloat(peso_fim) * 1000);

    valor = data.Valor;
    valor = valor.replace(".",",");

    margem_seguranca = <?php echo $_GET["margem_seguranca"] ?>;
    valor = (parseFloat(valor) * (parseInt(margem_seguranca)/100)) + parseFloat(valor);

    linha = faixa_ini.replace("-","") + ";" + faixa_fim.replace("-","") + ";" + peso_ini + ";" + peso_fim + ";" + valor + ";0;0;10000000;" + data.PrazoEntrega + ";BRA;\n";
    
    csv += linha;

    $('#csv').text(csv);

  });

}

$( document ).ready(function() {

  count = $('#count').val();
  timeout = 0;

  for (i = 1; i <= count; i++) { 
      
      timeout = 0;

    for (j = 0; j < FAIXAS_PESO.length; j++) {

      if (i > 100) {
        tmp = parseInt(i/100);
      } else {
        tmp = i;
      }

      timeout += (tmp*100);
      timeout += j;
      peso_medio = (FAIXAS_PESO[j][0] + FAIXAS_PESO[j][1]) / 2;
      funcao = "calcular(" + i + ",'" + $('#FAIXA-INI-' + i).text() + "','" + $('#FAIXA-FIM-' + i).text() + "','" + $('#FAIXA-USO-' + i).text() + "','" + FAIXAS_PESO[j][0] + "','" + FAIXAS_PESO[j][1] + "','" + peso_medio + "');"
      
      //console.log(funcao);
      setTimeout(funcao, timeout);

      //timeout += 5000;
      timeout += 4000;

    }

  }

});

</script>

<table class="table" style="font-family: 'Courier New'">
  <tr>
      <td>Região</td>
      <td>Progresso</td>
  </tr>

<?php 
  $count = 0;
  foreach ($FAIXAS_CEPS AS $item) {
      $count += 1;
?>

  <tr>
    <td width="50%"><?php echo $item['estado']?> - <?php echo $item['tipo']?> - <span id="FAIXA-INI-<?php echo $count ?>"><?php echo $item['faixas'][0] ?></span> até <span id="FAIXA-FIM-<?php echo $count ?>"><?php echo $item['faixas'][1] ?></span><span id="FAIXA-USO-<?php echo $count ?>" style="display: none"><?php echo $item['faixas'][2] ?></span></td>
    <td width="50%">

<div class="progress" style="margin-bottom: 0px;">
  <div id="progress-<?php echo $count ?>" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
    0%
  </div>
</div>

    </td>
  </tr>

<?php } ?>

<input type="hidden" id="count" value="<?php echo $count ?>" />
</table>

<form method="POST" action="gerar_csv.php">
  <textarea id="csv"></textarea>
</form>

<?php

include("../libs/footer.php");

?>