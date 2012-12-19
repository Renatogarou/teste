<!-- File: /app/View/Periodos/add.ctp -->

<?php
echo $this->Html->script('jquery.maskMoney');
echo $this->Html->script('jquery.maskedinput');
?>
<div id="box-periodo">
    <h1 id="title"><?php echo $interessado['Interessado']['nome'] . ' - ' . $interessado['Interessado']['matricula'] ?></h1>

    <?php echo $this->element('Periodo/partial-form-periodo'); ?> 

    <div id="box-table-periodo">
        <table  id="table-periodo">
            <thead>
                <tr>
                    <th>Período</th>
                    <th>Art 184 II</th>
                    <th>Devido</th>
                    <th>Diferença</th>
                    <th>Nº Meses</th>
                    <th>Restituição</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $total_restituicao = 0;
                $count = 0;
                foreach ($periodos as $periodo) {
                    ?>

                    <tr class="<?php echo ($count % 2) ? 'odd' : 'even'; ?>">
                        <td class="text-left" >
                            <?php
                            if ($periodo['Periodo']['inicio'] == $periodo['Periodo']['fim']) {
                                echo $this->Data->mesAno($periodo['Periodo']['fim']);
                            } else {
                                echo $this->Data->mesAno($periodo['Periodo']['inicio']) . ' a ' . $this->Data->mesAno($periodo['Periodo']['fim']);
                            }
                            ?>
                        </td>
                        <td ><?php echo $periodo['Periodo']['art-184'] ?></td>
                        <td ><?php echo $periodo['Periodo']['devido'] ?></td>
                        <td ><?php echo $periodo['Periodo']['diferenca'] ?></td>
                        <td class="text-center"><?php echo $periodo['Periodo']['meses'] ?></td>
                        <td ><?php echo $periodo['Periodo']['restituicao'] ?></td>
                        <td>

                            <?php echo $this->Form->postLink('Deletar', array('action' => 'delete', $periodo['Periodo']['id'], 'id_interessado' => $interessado['Interessado']['id']), array('confirm' => 'Apagar registro selecionado?')) ?>
                        </td>
                    </tr>

                    <?php
                    $total_restituicao += (float) str_replace(array('.', ','), array('', '.'), $periodo['Periodo']['restituicao']);
                    $count++;
                }
                ?>

            </tbody>

            <tr class="<?php echo ($count % 2) ? 'odd' : 'even'; ?>">
                <td colspan="5" class="text-left">Total a Restituir </td>
                <td colspan="2">
                    <?php
                    echo number_format($total_restituicao, 2, ',', '.');
                    ?>

                </td>
                
            </tr>
        </table>
    </div>



</div>

