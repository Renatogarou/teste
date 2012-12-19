<?php
if ($interessados) {


    foreach ($interessados as $interessado) {
        ?>


        <?php echo $this->element('Interessado/css-pdf'); ?>

        <?php //echo $this->element('Interessado/memo-pdf', array('interessado' => $interessado)); ?>

                <!--  <pagebreak type="NEXT-ODD" resetpagenum="1" pagenumstyle="i" suppress="off" /> -->

        <?php //echo $this->element('Interessado/relatorio-auditoria-pdf', array('interessado' => $interessado)); ?>

                        <!-- <pagebreak type="NEXT-ODD" resetpagenum="1" pagenumstyle="i" suppress="off" showwatermarktext="true" /> -->


        <?php echo $this->element('Interessado/carta-pdf', array('interessado' => $interessado)); ?>

        <pagebreak type="NEXT-ODD" resetpagenum="1" pagenumstyle="i" suppress="off" />

                        <!-- <pagebreak type="NEXT-ODD" resetpagenum="1" pagenumstyle="i" suppress="off" showwatermarktext="true"/> -->

        <?php //echo $this->element('Interessado/autuacao-pdf', array('interessado' => $interessado)); ?> 


        <?php
    }
} else {
    ?>

    <?php echo $this->element('Interessado/css-pdf'); ?>

    <?php echo $this->element('Interessado/memo-pdf'); ?>

    <pagebreak type="NEXT-ODD" resetpagenum="1" pagenumstyle="i" suppress="off" />

    <?php echo $this->element('Interessado/relatorio-auditoria-pdf'); ?>

    <pagebreak type="NEXT-ODD" resetpagenum="1" pagenumstyle="i" suppress="off" showwatermarktext="true" />

    <?php echo $this->element('Interessado/carta-pdf'); ?>

    <pagebreak type="NEXT-ODD" resetpagenum="1" pagenumstyle="i" suppress="off" showwatermarktext="true"/>

    <?php echo $this->element('Interessado/autuacao-pdf'); ?>

<?php } ?>


