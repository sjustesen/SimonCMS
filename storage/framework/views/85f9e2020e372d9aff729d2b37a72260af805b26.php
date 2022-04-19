<html>
    <head>
        <title>Administration</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/vendor/uikit/uikit.min.css">
        <link rel="stylesheet" href="/styles/base.css">
    </head>
<body>
    
<?php echo $__env->make('admin.layout.headernav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="uk-section">
    <div class="uk-container uk-container-expand">
        <div class="uk-child-width-expand" uk-grid>
            <div class="uk-width-1-4 uk-height-large"><phpbraco-treeview id="main-navtree"></phpbraco-treeview></div>
            <div class="uk-width-3-4"><?php echo $__env->yieldContent('content'); ?></div>
        </div>
    </div>
</div>
    <script type="module" src="/scripts/main.js" ></script>
    <script type="text/javascript" src="/vendor/uikit/uikit.min.js" ></script>   
</body>
</html><?php /**PATH /Users/simonjustesen/Sites/localhost/phpbraco/resources/views/admin/layout/master.blade.php ENDPATH**/ ?>