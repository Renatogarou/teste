<!-- File: /app/View/Interessados/index.ctp -->
<?php //var_dump($interessados) ?>
<h1>Interessados</h1>

<table border="1">
    <thead>
        <tr>
            <th>Matricula</th>
            <th>Nome</th>
            <th>Situação</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($interessados as $interessado) { ?>
            <tr>
                <td><?php echo $interessado['Interessado']['matricula']; ?></td>
                <td><?php echo $this->Html->link($interessado['Interessado']['nome'],array('action'=>'edit',$interessado['Interessado']['id'])); ?></td>
                <td><?php echo $interessado['Situacao']['situacao']; ?></td>
            </tr>

        <?php } ?>

        <tr>
            <td colspan="3" ></td>
            
        </tr>
    </tbody>
</table>
