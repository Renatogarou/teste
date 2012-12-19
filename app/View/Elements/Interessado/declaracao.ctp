<?php echo $this->element('Interessado/css-pdf'); ?>
<?php
$total_restituicao = 0;
foreach ($interessado['Periodo'] as $periodo) {


    $total_restituicao += (float) str_replace(array('.', ','), array('', '.'), $periodo['restituicao']);
    //$total_restituicao += (float) str_replace(',', '.', $periodo['restituicao']);
}

if (isset($divisor) && $divisor != null) {

    $total_restituicao = ($total_restituicao / $divisor['base']) / $divisor[$beneficiario['pensao_id']];
}
?>

<table width="100%" style="border: 1px solid #000" >

    <tr >
        <td cellspacing="0"  >
            <img src="img/brasao_pb1.gif" width="100" height="105" >
        </td>
        <td >

            <b>
                <p >MINIST&Eacute;RIO DA SA&Uacute;DE</p>
                <p >NERJ - NUCLEO ESTADUAL DO RIO DE JANEIRO</p>
                <p >DIGEP - DIVIS&Atilde;O DE GEST&Atilde;O DE PESSOAS</p>
                <p >SECSI - SERVI&Ccedil;O DE CADASTRO DE SERVIDORES INATIVOS</p>
            </b>
            <p class="fit">Rua M&eacute;xico, 128 - 2&ordf; sobreloja - sala 21 - Rio de Janeiro.</p>
            <p class="fit">Tel.: (021) 2240-5018 - CEP 20031-142</p>


        </td>
    </tr>
</table>

<br/><br/>

<p style="text-align: center;"><b><u>DECLARA&Ccedil;&Atilde;O</u></b></p>


<br/><br/>

<div id="conteudo-declaracao">
    <p style="text-align:justify;"> 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Eu, 
        <?php if (isset($beneficiario) && $beneficiario != null) { ?>

            <?php echo utf8_decode($beneficiario['nome']) ?>,
            CPF n&ordm; 
            <?php echo utf8_decode($beneficiario['cpf']) ?>,
            matr&iacute;cula n&ordm; 
            <?php echo utf8_decode($beneficiario['matricula']) ?>,

            <?php
        } else {
            echo utf8_decode($interessado['Interessado']['nome'])
            ?>, 

            CPF n&ordm; 
            <?php echo utf8_decode($interessado['Interessado']['cpf']) ?>,
            matr&iacute;cula n&ordm; 
            <?php echo utf8_decode($interessado['Interessado']['matricula']) ?>,
        <?php } ?>

        declaro concordar com a reposi&ccedil;&atilde;o ao Er&aacute;rio do valor de 

        <b>R$
            <?php echo number_format($total_restituicao, 2, ',', '.'); ?> 
            (<?php echo utf8_decode(MonetaryComponent::numberToExt($total_restituicao)); ?>)
        </b>, que recebi em excesso por meio da rubrica &quot;VANTAGEM ART. 184, INCISO II - LEI 1711/52&quot;, em decorr&ecirc;ncia da inclus&atilde;o 
        da GDASST/GESST/GDPST na base de calculo da vantagem prevista no artigo 184, inciso II, da Lei 1711/52.
    </p>
    <br/>

    <p style="text-align:justify">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Requeiro que tal reposi&ccedil;&atilde;o seja feita em parcelas correspondentes a <b><u>10% (dez por cento)</u></b>
        da minha remunera&ccedil;&atilde;o, na forma do artigo 46, &sect; 1&ordm;, da Lei n&ordm; 8112/90. 
    </p>

    <br/><br/>
    <p style="text-align: right"><?php echo date('d/m/Y') ?></p>

    <br/><br/><br/><br/>

    <p class="center">______________________________________________________</p>

    <p class="center">
        <?php if (isset($beneficiario) && $beneficiario != null) { ?>

            <?php echo utf8_decode($beneficiario['nome']) ?>
            <?php
        } else {
            echo utf8_decode($interessado['Interessado']['nome']);
        }
        ?>
    </p>

</div>
<br/><br/>

<hr/>
