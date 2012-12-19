<?php

if ($interessado['Situacao']['id'] == 2) {

    $divisor['base'] = 1;

    $pensao_vitalicia = 0;
    $pensao_temporaria = 0;

    foreach ($interessado['Beneficiario'] as $beneficiario) {
        $divisor[$beneficiario['pensao_id']]++;

        if ($beneficiario['pensao_id'] == 1) {
            $pensao_vitalicia = 1;
        } elseif ($beneficiario['pensao_id'] == 2) {
            $pensao_temporaria = 1;
        }
    }

    $divisor['base'] = $divisor['base'] * ($pensao_temporaria + $pensao_vitalicia);

    foreach ($interessado['Beneficiario'] as $beneficiario) {
        ?>

        <?php echo $this->element('Interessado/css-pdf'); ?>

        <?php echo $this->element('Interessado/memo-pdf', array('interessado' => $interessado,)); ?>

        <pagebreak type="NEXT-ODD" resetpagenum="1" pagenumstyle="i" suppress="off" />

        <?php echo $this->element('Interessado/relatorio-auditoria-pdf', array('interessado' => $interessado)); ?>

        <pagebreak type="NEXT-ODD" resetpagenum="1" pagenumstyle="i" suppress="off" showwatermarktext="true" />

        <?php echo $this->element('Interessado/carta-pdf', array('interessado' => $interessado, 'beneficiario' => $beneficiario, 'divisor' => $divisor, 'watermark' => 'C&Oacute;PIA')); ?>

        <pagebreak type="NEXT-ODD" resetpagenum="1" pagenumstyle="i" suppress="off" />

        <?php echo $this->element('Interessado/autuacao-pdf', array('interessado' => $interessado)); ?>

        <pagebreak type="NEXT-ODD" resetpagenum="1" pagenumstyle="i" suppress="off" />

        <?php echo $this->element('Interessado/carta-pdf', array('interessado' => $interessado, 'beneficiario' => $beneficiario, 'divisor' => $divisor, $watermark => NULL)); ?>
        <pagebreak type="NEXT-ODD" resetpagenum="1" pagenumstyle="i" suppress="off" />
        <?php

    }
} else { ?> 

    <?php echo $this->element('Interessado/css-pdf'); ?>

    <?php echo $this->element('Interessado/memo-pdf', array('interessado' => $interessado)); ?>

    <pagebreak type="NEXT-ODD" resetpagenum="1" pagenumstyle="i" suppress="off" />

    <?php echo $this->element('Interessado/relatorio-auditoria-pdf', array('interessado' => $interessado)); ?>

    <pagebreak type="NEXT-ODD" resetpagenum="1" pagenumstyle="i" suppress="off" showwatermarktext="true" />

    <?php echo $this->element('Interessado/carta-pdf', array('interessado' => $interessado, 'watermark' => 'C&Oacute;PIA')); ?>

    <pagebreak type="NEXT-ODD" resetpagenum="1" pagenumstyle="i" suppress="off" />

    <?php echo $this->element('Interessado/autuacao-pdf', array('interessado' => $interessado)); ?>

    <pagebreak type="NEXT-ODD" resetpagenum="1" pagenumstyle="i" suppress="off" />

    <?php echo $this->element('Interessado/carta-pdf', array('interessado' => $interessado, 'watermark' => NULL)); ?>

<?php } ?> 








