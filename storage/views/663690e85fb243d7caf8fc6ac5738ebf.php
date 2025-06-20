<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo _e(site()->title()); ?></title>

    <?php if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot'))): ?>
        <?php echo (new Beebmx\KirbyBlade\Foundation\Vite)(['resources/css/web.css', 'resources/js/web.js','resources/js/app.js','resources/css/app.css'], 'build'); ?> 
    <?php endif; ?>
</head>
<body>
    <div id="app"></div> 

</body>
</html>
<?php /**PATH /Users/andreblass/Sites/kirby-mecenas/site/templates/components/layout/index.blade.php ENDPATH**/ ?>