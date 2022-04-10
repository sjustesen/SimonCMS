<html>
    <head>
        <title>Administration</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/vendor/uikit/uikit.min.css">
        <link rel="stylesheet" href="/styles/base.css">
    </head>
<body>
    
@include('admin.layout.headernav')

<div class="uk-section">
    <div class="uk-container uk-container-expand">
        <div class="uk-child-width-expand" uk-grid>
            <div class="uk-width-1-4 uk-height-large"><phpbraco-treeview id="main-navtree"></phpbraco-treeview></div>
            <div class="uk-width-3-4">@yield('content')</div>
        </div>
    </div>
</div>
    <script type="module" src="/scripts/main.js" ></script>
    <script type="text/javascript" src="/vendor/uikit/uikit.min.js" ></script>   
</body>
</html>