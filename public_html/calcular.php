<?php

// SimpleXMLElement simplexml_load_file ( string $filename [, string $class_name = "SimpleXMLElement" [, int $options = 0 [, string $ns = "" [, bool $is_prefix = false ]]]] )

function calculaFrete($cod_servico, $cep_origem, $cep_destino, $peso, $cod_adm, $senha, $altura='2', $largura='11', $comprimento='16', $valor_declarado='0.50')
{
    #OFICINADANET###############################
    # Código dos Serviços dos Correios
    # 41106 PAC sem contrato
    # 40010 SEDEX sem contrato
    # 40045 SEDEX a Cobrar, sem contrato
    # 40215 SEDEX 10, sem contrato
    ############################################

    $correios = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=".$cod_adm."&sDsSenha=".$senha."&sCepOrigem=".$cep_origem."&sCepDestino=".$cep_destino."&nVlPeso=".$peso."&nCdFormato=1&nVlComprimento=".$comprimento."&nVlAltura=".$altura."&nVlLargura=".$largura."&sCdMaoPropria=n&nVlValorDeclarado=".$valor_declarado."&sCdAvisoRecebimento=n&nCdServico=".$cod_servico."&nVlDiametro=0&StrRetorno=xml";
    $xml = @simplexml_load_file($correios, 'SimpleXMLElement');
    
    if (!$xml) { 
        sleep(1);
        $xml = @simplexml_load_file($correios, 'SimpleXMLElement');
    
        if (!$xml) {
            error_log('Erro na URL: '.$correios);
            exit();
        }
    }
    
    if($xml->cServico->Erro == '0')
        return $xml->cServico;
    else
        return false;
}

$xml = calculaFrete(41106,'22031-072','22031-072','1.25','','');
// $xml = calculaFrete($_GET['codigo_servico'],$_GET['cepOrigem'],$_GET['cepDestino'],$_GET['peso'],$_GET['codigo_administrativo'],$_GET['senha']);

$xml->Valor = str_replace(",",".",$xml->Valor);

print '{ "Valor": "'.$xml->Valor.'", "PrazoEntrega": "'.$xml->PrazoEntrega.'"}'; 

?>
