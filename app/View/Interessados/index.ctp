<!-- File: /app/View/Interessados/index.ctp -->
<?php //var_dump($interessados) ?>

<table border="1" id="interessado-table">
    <thead>
        <tr>
    <caption><span>Interessados</span>
        <form method="get" >
            <input type="text" name="interessado" value="" />
            <input type="submit" value="" />
        </form>
    </caption>
    <th>
      Deletar
    </th>
    <th>Matrícula</th>
    <th>Nome</th>
    <th>Situação</th>
    <th>Periodos</th>
    <th>Declaração</th>
    <th  class="last_cell">Documento</th>
</tr>
</thead>
<tbody>

    <?php
    $count = 0;
    foreach ($interessados as $interessado) {
        ?>
        <tr class="<?php echo ($count % 2) ? 'odd' : 'even'; ?>">
           
            <td>
                <?php
                echo $this->Form->postLink('Deletar', array('action' => 'delete', $interessado['Interessado']['id']), array('confirm' => 'Apagar registro selecionado?'))
                ?>
            </td>

            <td>
                <?php echo $interessado['Interessado']['matricula']; ?>
            </td>

            <td>
                <?php echo $this->Html->link($interessado['Interessado']['nome'], array('action' => 'edit', $interessado['Interessado']['id'])); ?>

                <?php
                if ($interessado['Interessado']['situacao_id'] == 3 && $interessado['Instituidor']['id'] != null) {
                    echo ' [ Instituidor: ';
                    echo $this->Html->link($interessado['Instituidor']['nome'], array('action' => 'edit', $interessado['Instituidor']['id']));
                    echo ']';
                }
                ?>
            </td>

            <td>
                <?php
                echo $interessado['Situacao']['situacao'];
                if ($interessado['Situacao']['id'] == 2) {

                    $count_beneficiario = count($interessado['Beneficiario']);

                    if ($count_beneficiario > 0) {

                        echo ' [ ' . $this->Html->link($count_beneficiario . 'Beneficiário(s)', array(
                            'action' => 'index', '?' => array('instituidor' => $interessado['Interessado']['id']))) . ' ]';
                    }
                }
                ?>
            </td>

            <td>
                <?php
                if ($interessado['Interessado']['situacao_id'] != 3) {
                    echo $this->Html->link('Adicionar Periodo', array('controller' => 'periodos', 'action' => 'add', $interessado['Interessado']['id']));
                } else {
                    echo $this->Html->link('Periodo instituidor', array('controller' => 'periodos', 'action' => 'add', $interessado['Interessado']['interessado_id']));
                }
                ?>
            </td>
            
            <td>
                <?php
                if ($interessado['Interessado']['situacao_id'] != 3) {
                    echo $this->Html->link('Declaração', array('controller' => 'interessados', 'action' => 'declaracao', $interessado['Interessado']['id']));
                } else {
                    echo $this->Html->link('Declaração', array('controller' => 'interessados', 'action' => 'declaracao', $interessado['Interessado']['interessado_id']));
                }
                ?>
            </td>

            <td class="last_cell">
                <?php
                if ($interessado['Interessado']['situacao_id'] != 3) {
                    echo $this->Html->link('Gerar Documento', array('controller' => 'interessados', 'action' => 'pdf', $interessado['Interessado']['id']), array('target' => '_blank'));
                } else {
                    echo $this->Html->link('Gerar Documento', array('controller' => 'interessados', 'action' => 'pdf', $interessado['Interessado']['interessado_id']), array('target' => '_blank'));
                }
                ?>
            </td>

        </tr>

        <?php
        $count++;
    }
    ?>
<tfoot>
    <tr>
        <td colspan="7">
            <?php echo $this->Paginator->prev(' << ' . __('previous'), array(), null, array('class' => 'prev disabled')); ?>
            <?php echo $this->Paginator->numbers(); ?>
            <?php echo $this->Paginator->next(__('next') . '>>', array(), null, array('class' => 'prev disabled')); ?>
        </td>
    </tr>
</tfoot>

</tbody>

</table>

<?php
//echo $this->Html->link('Adicionar Interessado', array('action' => 'add')); ?>