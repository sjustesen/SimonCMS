<html>
    <head>
        <title>Administration</title>
</head>
<body>
    <header id="menu">
    </header>
    <main>
        <div id="documentTree"><div class="nav-container">
            <nav-link href="/">Home</nav-link>
            <nav-link href="/about">About</nav-link>
        </div>
         </div>
        <div id="mainSection"> @yield('content')</div>
        <phpbraco-doctree name="Simon"></phpbraco-doctree>
    </main>
    <footer>
    </footer>
    <script type="module" src="scripts/main.js" ></script>   
</body>
</html>