<?php 




?>

<ul>
<?php foreach ($categorias as $categoria) { ?>
        <li id="categoria-<?php echo $categoria['id'] ?>"><a href="#"><?php echo $categoria['categoria'] ?></a></li>
<?php } ?>
</ul>


<div style="display:none">

<?php foreach ($categorias as $categoria) { ?>


        <div id="anuncio-<?php echo $categoria['id'] ?>">

    <?php echo $categoria ?>

        </div>


<?php } ?>

</div>

<script>

    $(document).ready(function(){
    
        alert($('#categoria-1').html())
    })

</script>