<?php
//$arquivo = 'teste.doc';
//
//header ('Content-type: application/msword'); 
//
//header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );


$total_restituicao = 0;
foreach ($interessado['Periodo'] as $periodo) {



    $total_restituicao += (float) str_replace(array('.', ','), array('', '.'), $periodo['restituicao']);
    //$total_restituicao += (float) str_replace(',', '.', $periodo['restituicao']);
}

if (isset($divisor) && $divisor != null) {

    $total_restituicao = ($total_restituicao / $divisor['base']) / $divisor[$beneficiario['pensao_id']];
}
?>

<watermarktext content="<?php echo $watermark; ?>" alpha="0.1" />
<img src="img/brasao_pb1.gif" width="100" height="105" style="padding-left: 285px;">

<div id="cabecalho">
    <p>MINIST&Eacute;RIO DA SA&Uacute;DE</p>
    <p>NERJ - NUCLEO ESTADUAL DO RIO DE JANEIRO</p>
    <p>DIGEP - DIVIS&Atilde;O DE GEST&Atilde;O DE PESSOAS</p>
    <p>SECSI - SERVI&Ccedil;O DE CADASTRO DE SERVIDORES INATIVOS</p>
    <p class="fit">Rua M&eacute;xico, 128 - 2&ordf; sobreloja - sala 21 - Rio de Janeiro.</p>
    <p class="fit">Tel.: (021) 2240-5018 - CEP 20031-142</p>

</div>

<p style="text-align: center;"><b><u>COMUNICADO</u></b></p>

<p>
    Rio de Janeiro, 
    <?php echo date('d'); ?> de
    <?php echo $this->Data->mes(date('m')); ?> de
    <?php echo date('Y'); ?>.
</p> 

<table border="0" cellspacing="0">

    <tr>
        <td style="vertical-align:top;padding-right: 10px; ">Ao Senhor (a) </td>
        <td>
            <span style="font-family: courier">
                <?php if (isset($beneficiario) && $beneficiario != null) { ?>

                    <?php echo utf8_decode($beneficiario['nome']) ?>.<br/>
                    <p>
                        <?php echo utf8_decode($beneficiario['endereco']) ?>

                        <?php
                        if ($beneficiario['numero'] != NULL) {
                            echo 'N ' . utf8_decode($beneficiario['numero']);
                        };
                        ?>

                        <?php
                        if ($beneficiario['complemento'] != NULL) {
                            echo ' ' . utf8_decode($beneficiario['complemento']);
                        };
                        ?>
                    </p>    

                    <p>
                        BAIRRO: <?php echo utf8_decode($beneficiario['bairro']) ?> -
                        <?php echo utf8_decode($beneficiario['cidade']) ?> - 
                        <?php echo utf8_decode($beneficiario['uf']) ?>
                    </p>    

                    <p>
                        CEP: <?php
                    $beneficiario['cep'] = trim(preg_replace('/[^0-9]/', '', $beneficiario['cep']));

                    $cep = substr($beneficiario['cep'], 0, 5) . '-' . substr($beneficiario['cep'], 5, 7);

                    $beneficiario['cep'] = $cep;

                    echo utf8_decode($beneficiario['cep'])
                        ?>
                    </p>
                    <?php
                } else {
                    echo utf8_decode($interessado['Interessado']['nome'])
                    ?>
                    <br/>
                    <p>
                        <?php echo utf8_decode($interessado['Interessado']['endereco']) ?>

                        <?php
                        if ($interessado['Interessado']['numero'] != NULL) {
                            echo 'N ' . utf8_decode($interessado['Interessado']['numero']);
                        };
                        ?>

                        <?php
                        if ($interessado['Interessado']['complemento'] != NULL) {
                            echo ' ' . utf8_decode($interessado['Interessado']['complemento']);
                        };
                        ?>
                    </p>    

                    <p>
                        BAIRRO: <?php echo utf8_decode($interessado['Interessado']['bairro']) ?> -
                        <?php echo utf8_decode($interessado['Interessado']['cidade']) ?> - 
                        <?php echo utf8_decode($interessado['Interessado']['uf']) ?>
                    </p>    

                    <p>
                        CEP: <?php echo utf8_decode($interessado['Interessado']['cep']) ?>
                    </p>
                <?php } ?>
            </span>
        </td>
    </tr>

</table>

<p>
    <b>Assunto:</b>
    Reposi&ccedil;&atilde;o ao er&aacute;rio &ndash; Inclus&atilde;o de GDASST/GESST/GDPST no c&aacute;lculo da vantagem prevista no art. 184, II, Lei n&ordm; 1.711/52
</p>

<p>Prezado (a) Senhor (a),</p>

<div id="conteudo-carta">
    <p style="text-align:justify"> 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Comunicamos, por meio da presente, a necessidade de reposi&ccedil;&atilde;o 
        ao er&aacute;rio dos valores recebidos em excesso por V.S.a, por meio da 
        rubrica &ldquo;VANT. ART.184 INC II L.1711/52&rdquo;, decorrentes de lapso 
        no c&aacute;lculo da vantagem prevista no art. 184, inciso II, Lei n&ordm; 
        1.711/52.
    </p>

    <p style="text-align:justify">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        No momento da aposentadoria de V.S.a ou do instituidor de seu benef&iacute;cio, 
        foram inclu&iacute;dos, na base de c&aacute;lculo da vantagem supracitada,
        valores referentes &agrave;s gratifica&ccedil;&otilde;es denominadas GDASST
        (Gratifica&ccedil;&atilde;o de Desempenho de Atividade da Seguridade Social e do Trabalho),
        GESST (Gratifica&ccedil;&atilde;o Espec&iacute;fica da Seguridade Social e do Trabalho)
        e GDPST (Gratifica&ccedil;&atilde;o de Desempenho da Carreira da Previd&ecirc;ncia, da Sa&uacute;de e do Trabalho).
    </p>

    <p style="text-align:justify">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Relat&oacute;rio de auditoria do Minist&eacute;rio do Planejamento, 
        Or&ccedil;amento e Gest&atilde;o apontou que as gratifica&ccedil;&otilde;es 
        supracitadas, em raz&atilde;o de seus fundamentos legais, n&atilde;o deveriam
        servir de base para o c&aacute;lculo de nenhuma vantagem ou benef&iacute;cio.
        Em vista de tal fato, o relat&oacute;rio de auditoria concluiu ser necess&aacute;rio
        o ressarcimento ao er&aacute;rio dos valores pagos em excesso pela inclus&atilde;o de tais
        gratifica&ccedil;&otilde;es na base de c&aacute;lculo da vantagem supracitada.
    </p>

    <p style="text-align:justify">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Dessa forma, em obedi&ecirc;ncia aos princ&iacute;pios do contradit&oacute;rio e da ampla defesa,
        insculpidos no artigo 5&ordm;, inciso LV, da Constitui&ccedil;&atilde;o da Rep&uacute;blica Federativa
        do Brasil e no artigo 2&ordm; da Lei n&ordm; 9.784/1999, solicitamos a manifesta&ccedil;&atilde;o de V.S.a,
        no prazo de 30 (trinta) dias a contar do recebimento desta, sobre a devolu&ccedil;&atilde;o
        ao er&aacute;rio de  <b>R$
            <?php echo number_format($total_restituicao, 2, ',', '.'); ?> 
            (<?php echo utf8_decode(MonetaryComponent::numberToExt($total_restituicao)); ?>)
        </b>.
        Esclarecemos que &eacute; direito de V.S.a requerer em sua manifesta&ccedil;&atilde;o que a
        devolu&ccedil;&atilde;o dos valores ocorra de forma parcelada, na forma do artigo 46 da lei n&ordm; 8.112/90,
        em parcelas n&atilde;o inferiores ao correspondente a dez por cento de sua remunera&ccedil;&atilde;o.
        A manifesta&ccedil;&atilde;o de V.S.a dever&aacute; ser entregue, pessoalmente ou por via postal,
        ao Servi&ccedil;o de Cadastro de Servidores Inativos deste N&uacute;cleo Estadual do Minist&eacute;rio da Sa&uacute;de,
        situado na Rua M&eacute;xico, n&ordm; 128 &ndash; 2&ordf; Sobreloja - Rio de Janeiro/RJ, CEP 20.031-142,
        sendo necess&aacute;rio anexar &agrave; mesma c&oacute;pias de RG, CPF e contracheque recente. 

    </p>

    <p style="text-align:justify">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Caso V.S.a deseje maiores esclarecimentos, pedimos que compare&ccedil;a a este
        Servi&ccedil;o de Cadastro de Servidores Inativos (Rua M&eacute;xico, n&ordm; 128 -
        2&ordf; sobreloja - sala 21), trazendo consigo esta carta, documento de
        identidade e contracheque recente, ou entre em contato com este Servi&ccedil;o
        atrav&eacute;s do telefone 2240-5345.
    </p>

    <p>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Sem mais, subscrevemo-nos.
    </p>

    <p class="center">Atenciosamente,</p>
    <br/><br/>


    <p class="center">______________________________________________________</p>
    <p class="center bold">MARIA DE F&Aacute;TIMA MATHEUS ALVES</p>
    <p class="center bold">CHEFE DA DIVIS&Atilde;O DE GEST&Atilde;O DE PESSOAS</p>
</div>

<br/><br/><br/>

<table class="table-valores" border="1" cellspacing="0" cellpadding="2" width="100%">
    <thead>
        <tr class="gray"><td colspan="6" style="text-align: center"><b >Rublica - Vantagem Art-184 - Inciso II Lei 1711/52</b></td></tr>
        <tr class="gray">
            <th width="37%">Per&iacute;odo</th>
            <th width="15%">Pago</th>
            <th width="15%">Devido</th>
            <th width="15%">Diferen&ccedil;a</th>
            <th width="3%" style="font-size: 10pt">N&ordm; Meses</th>
            <th width="15%">Restitui&ccedil;&atilde;o</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $total_restituicao = 0;

        foreach ($interessado['Periodo'] as $periodo) {

            $decimoTerceiro = null;

            if ($periodo['decimoTerceiro'] == 1) {

                $decimoTerceiro = '*';
            }
            ?>




            <tr>
                <td >&nbsp;&nbsp;<?php echo utf8_decode(mb_convert_case($this->Data->mesAno($periodo['inicio']), MB_CASE_TITLE, "UTF-8")) . ' a ' . utf8_decode($this->Data->mesAno($periodo['fim'])) . ' ' . $decimoTerceiro ?></td>
                <td >&nbsp;&nbsp;<?php echo $periodo['art-184'] ?></td>
                <td >&nbsp;&nbsp;<?php echo $periodo['devido'] ?></td>
                <td >&nbsp;&nbsp;<?php echo $periodo['diferenca'] ?></td>
                <td >&nbsp;&nbsp;<?php echo $periodo['meses'] ?></td>
                <td >&nbsp;&nbsp;<?php echo $periodo['restituicao'] ?></td>
            </tr>

            <?php
            $total_restituicao += (float) str_replace(array('.', ','), array('', '.'), $periodo['restituicao']);
        }
        ?>

    </tbody>

    <tr class="gray">
        <td colspan="5"><b>Total a Restituir </b></td>
        <td><b>
                <?php
                echo number_format($total_restituicao, 2, ',', '.');
                ?>
            </b>
        </td>
    </tr>

</table>
<br/>

<i>* Incluso o valor do d&eacute;cimo terceiro nesse per&iacute;odo.</i>