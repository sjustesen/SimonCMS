<html>
    <head>
        <title>Administration</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="module" src="/scripts/main.js" ></script>
        <script type="text/javascript" src="/vendor/uikit/uikit.min.js" ></script>   
        @yield('header')
    </head>
<body>

<nav class="uk-navbar-container sc-container-padding" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li class="uk-parent"><a href="/admin/content">Content</a></li>
            <li class="uk-parent"><a href="/admin/media">Media</a></li>
            <li class="uk-parent"><a href="/admin/settings">Settings</a></li>
            <li class="uk-parent"><a href="/admin/developer">Developer</a></li>
            <li class="uk-parent"><a href="/admin/members">Members</a></li>
        </ul>
    </div>

    <div class="uk-navbar-right">
    <div class="uk-navbar-item">
            <form action="javascript:void(0)">
                <input class="uk-input uk-form-width-400" type="text" placeholder="Search">
            </form>
        </div>
<ul class="uk-navbar-nav">
    <li>
        <a href="#">Parent</a>
        <div class="uk-navbar-dropdown">
            <ul class="uk-nav uk-navbar-dropdown-nav">
                <li><a href="#">Item</a></li>
            </ul>
        </div>
    </li>
</ul>
</div>
</nav>