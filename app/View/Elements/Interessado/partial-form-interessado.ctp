
<div id="box-form-interessado">
    <h1>
        <?php echo $label; ?>: 
        <?php
        if (isset($this->data['Interessado'])) {

            $interessado = $this->data['Interessado'];
            @$situacao = $this->data['Situacao'];
            $instituidor = ($this->data['Instituidor'] != null) ? $this->data['Instituidor'] : null;

            echo $interessado['nome'] . ' - ' . $interessado['matricula'] . ' - ' . $situacao['situacao'];
        }
        ?>
    </h1>
    <?php echo $this->Form->create('Interessado', array('id' => 'InteressadoForm')); ?>
    <?php echo $this->Form->input('interessado_id', array('type' => 'hidden')); ?>

    <ul id="list-form-interessado">
        <li><?php echo $this->Form->input('situacao_id', array('required' => 'required', 'label' => 'Situação')); ?></li>
        <li><?php echo $this->Form->input('matricula', array('label' => 'Matrícula',)); ?></li>
        <li><?php echo $this->Form->input('nome'); ?></li>
        <li><?php echo $this->Form->input('cpf', array('label' => 'CPF')); ?></li>

        <li>
            <?php
            $instituidor['matricula'] = (isset($this->data['Instituidor'])) ? $this->data['Instituidor']['matricula'] : null;

            echo $this->Form->input('matricula_instituidor_pensao', array(
                'label' => 'Matrícula Instituidor',
                'value' => $instituidor['matricula']
            ));
            ?>
        </li>

        <li>
            <?php
            $instituidor['nome'] = (isset($this->data['Instituidor'])) ? $this->data['Instituidor']['nome'] : null;

            echo $this->Form->input('nome_instituidor_pensao', array(
                'label' => 'Nome Instituidor',
                'value' => $instituidor['nome']
            ));
            ?>
        </li>

        <li><?php echo $this->Form->input('cep', array('label' => 'CEP')); ?></li>
        <li><?php echo $this->Form->input('endereco', array('label' => 'Endereço')); ?></li>
        <li><?php echo $this->Form->input('numero', array('label' => 'Número')); ?></li>
        <li><?php echo $this->Form->input('bairro'); ?></li>
        <li><?php echo $this->Form->input('cidade'); ?></li>
        <li><?php echo $this->Form->input('complemento'); ?></li>
        <li><?php echo $this->Form->input('recurso_id'); ?></li>
        <li><?php echo $this->Estados->select('uf', null, array('uf' => true)); ?></li>
    </ul>

    <?php
    echo $this->Form->end('Ok');
    ?>
</div>
<a href="#" class="back_bt"><-- Voltar</a>

<?php
echo $this->Html->script('interessado');
?>