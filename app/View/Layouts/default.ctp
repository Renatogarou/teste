<!-- app/Resources/views/base.html.twig -->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset=utf-8" />
        <title>Auditoria Art 184-II</title>
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <?php echo $this->Html->script('jquery'); ?>
        <link href='http://fonts.googleapis.com/css?family=Irish+Grover' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Alike' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
        <link href="{{ asset('css/screen.css') }}" type="text/css" rel="stylesheet" />

        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />


        <?php
        //echo $this->Html->meta('icon');
       
        echo $this->Html->css('style');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        ?>

    </head>
    <body>

        <section id="wrapper">
            <header id="header">
                <div class="top">
                    <nav>
                        <ul class="navigation">
                            <li><?php echo $this->Html->link('Início',array('controller'=>'interessados','action'=>'index')); ?></li>
                            <li><?php echo $this->Html->link('Adicionar Interessado',array('action'=>'add')); ?></li>
                        </ul>
                    </nav>
                </div>

                <hgroup>
                    <h2><?php echo $this->Html->link('Auditoria Art. 184-II',array('controller'=>'interessados','action'=>'index')); ?></h2>
                    <h3><?php echo $this->Html->link('Gerador de Processos de auditoria do Art. 184-II',array('controller'=>'interessados','action'=>'index')); ?></h3>
                </hgroup>
            </header>

            <section class="main-col">
                <?php echo $this->Session->flash(); ?>

                <?php echo $this->fetch('content'); ?>
            </section>
            

            <div id="footer">
                <?php echo $this->element('sql_dump'); ?>
            </div>
        </section>
        <?php
        echo $this->Html->script('jquery');
        echo $this->fetch('script');
        echo $this->Html->script('javascript');
        ?>
    </body>
</html>