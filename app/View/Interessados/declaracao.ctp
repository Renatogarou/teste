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



        <?php echo $this->element('Interessado/declaracao', array('interessado' => $interessado,)); ?>

        <?php

    }
} else { ?> 

  

    <?php echo $this->element('Interessado/declaracao', array('interessado' => $interessado)); ?>

<?php } ?> 








