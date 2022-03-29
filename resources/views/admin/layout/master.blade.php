<html>
    <head>
        <title>Administration</title>
</head>
<body>
    <header id="menu">
    </header>
    <main>
        <div id="documentTree">@yield('doctree')</div>
        <div id="mainSection"> @yield('content')</div>
        <simple-greeting name="Simon"></simple-greeting>
    </main>
    <footer>
    </footer>
    <script type="module" src="scripts/main.js" ></script>   
</body>
</html>