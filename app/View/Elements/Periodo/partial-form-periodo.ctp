<?php
$periodo_final = end($periodos);

if ($periodo_final != null) {
    list($a, $m, $d) = explode('-', $periodo_final['Periodo']['fim']);

    $data_inicial = mktime(0, 0, 0, $m + 1, 1, $a );
    $data_final   = mktime(0, 0, 0, $m + 2, 1, $a );
} else {
    $data_inicial = mktime(0, 0, 0, 5, 1, 2006);
    $data_final = mktime(0, 0, 0, 6, 1, 2006);
}

$ano_atual = date('Y');
?>

<div id="box-form-periodo">

    <?php echo $this->Form->create('Periodo', array('action' => 'add/' . $interessado_id)); ?>
    <?php echo $this->Form->input('interessado_id', array('type' => 'hidden', 'value' => $interessado_id, 'name' => 'data[Periodo][interessado_id]')); ?>

    <ul id="list-form-periodo">
        <li><?php echo $this->Form->input('inicio', array('dateFormat' => 'YMD', 'label' => 'Início', 'class' => 'data', 'minYear' => '2006', 'maxYear' => $ano_atual, 'selected' => $data_inicial)); ?></li>
        <li>
            <?php
           // echo $this->Form->day('fim.day',date(1));
            echo $this->Form->input('meses', array('readonly' => true, 'class' => 'meses', 'label' => ''));
            echo $this->Form->input('fim', array('dateFormat' => 'YMD', 'label' => 'Final', 'class' => 'data', 'minYear' => '2006', 'maxYear' => $ano_atual,'selected'=>$data_final));
            ?>
        </li>
        <!--<li><?php //echo $this->Form->input('meses', array('readonly' => true));   ?>  </li>-->
        <li><?php echo $this->Form->input('gesst', array('class' => 'moeda')); ?>  </li>
        <li><?php echo $this->Form->input('gdasst', array('class' => 'moeda')); ?> </li>
        <li><?php echo $this->Form->input('gdpst', array('class' => 'moeda')); ?>  </li>
        <li><?php echo $this->Form->input('art-184', array('class' => 'moeda')); ?></li>     
        <li><?php echo $this->Form->input('outros', array('class' => 'moeda')); ?> </li>
        <li><?php echo $this->Form->input('devido', array('readonly' => true, 'class' => 'moeda')); ?></li>
        <li><?php echo $this->Form->input('diferenca', array('readonly' => true, 'class' => 'moeda')); ?></li>
        <li><?php echo $this->Form->input('restituicao', array('readonly' => true, 'class' => 'moeda')); ?></li>          
        <li style="width:460px"><?php echo $this->Form->end('Ok'); ?></li>
    </ul>


</div>
