@include('admin.layout.header')
@yield('notifications')

<div class="uk-section">
    <div class="uk-container uk-container-expand">
        <div class="" uk-grid>
            <div class="uk-width-1-6 uk-height-large"><phpbraco-treeview id="main-navtree"></phpbraco-treeview></div>
            <div class="uk-width-expand">@yield('content')</div>
        </div>
    </div>
</div>

@include("admin.layout.footer")