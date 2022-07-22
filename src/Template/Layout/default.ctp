<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta charset="utf-8">
        <meta name="robots" content="index, follow"/>
        <?= $this->Html->meta(
            'keywords',
            'sertifikasi,blog,bnsp'
        );
        ?>
        <?= $this->Html->meta(
            'description',
            'Sertifikasi BNSP'
        );
        ?>
        <?= $this->Html->meta(
            'author',
            'Axl Calvin Pearl'
        );?>
        <title><?= Cake\Core\Configure::read('SiteName'); ?> - <?= $this->fetch('title') ?></title>


        <?= $this->Html->css([
            '/front-assets/css/plugins',
            '/front-assets/css/style',
        ]); ?>

        <?= $this->Html->meta(
            'favicon.ico',
            '/admin-assets/media/logos/logo.png',
            ['type' => 'icon']
        ); ?>

        <?= $this->fetch('meta'); ?>
        <?= $this->fetch('css'); ?>
    </head>

    <body>
        <div class="body-inner">
            <?= $this->element('Partial/header'); ?>
            <?= $this->fetch('content') ?>
            <?= $this->element('Partial/footer'); ?>
        </div>
        <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
        <?= $this->Html->script([
            '/front-assets/js/jquery.js',
            '/front-assets/js/plugins.js',
            '/front-assets/js/functions.js'
        ]); ?>

        <?php $this->append('css'); ?>
        <!-- isi CSS untuk layout global -->
        <?php $this->end(); ?>

        <?php $this->append('script'); ?>
        <!-- isi JS untuk layout global -->
        <?php $this->end(); ?>

        <?= $this->fetch('script') ?>

    </body>
</html>
