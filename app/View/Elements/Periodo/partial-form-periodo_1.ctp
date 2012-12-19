<?php 

$ano_atual = date('Y');



?>

<?php echo $this->Form->create('Periodo', array('action' => 'add/' . $interessado_id)); ?>
<?php echo $this->Form->input('interessado_id', array('type' => 'hidden', 'value' => $interessado_id, 'name' => 'data[Periodo][interessado_id]')); ?>

<table border="1">

    <tbody>
        <tr>
            <td width="   "><?php echo $this->Form->input('inicio', array('dateFormat' => 'MY', 'class' => 'data','minYear'=>'2006','maxYear'=>$ano_atual)); ?></td>
            <td width="   "><?php echo $this->Form->input('fim', array('dateFormat' => 'MY', 'class' => 'data','minYear'=>'2006','maxYear'=>$ano_atual)); ?></td>
            <td width=" 5%"><?php echo $this->Form->input('meses', array('readonly' => true)); ?></td>
            <td width="15%"><?php echo $this->Form->input('gesst', array('class' => 'moeda')); ?></td>
            <td width="15%"><?php echo $this->Form->input('gdasst', array('class' => 'moeda')); ?></td>
            <td width="15%"><?php echo $this->Form->input('gdpst', array('class' => 'moeda')); ?></td>
            <td width="15%"><?php echo $this->Form->input('art-184', array('class' => 'moeda')); ?></td>
        </tr>
        <!--
               <tr>            
       
                   <td><?php echo $this->Form->input('outros', array('class' => 'moeda')); ?></td>
                   <td><div id="diferenca"></div></td>
               </tr>
        -->

    </tbody>
</table>

<table border="1">
    <tbody>
        <tr>
            <td><?php echo $this->Form->input('devido', array('readonly' => true, 'class' => 'moeda')); ?></td>
            <td><?php echo $this->Form->input('diferenca', array('readonly' => true, 'class' => 'moeda')); ?></td>
            <td><?php echo $this->Form->input('restituicao', array('readonly' => true, 'class' => 'moeda')); ?></td>          
        </tr>
    </tbody>
</table>


<?php echo $this->Form->end('Ok'); ?>


