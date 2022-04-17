@include('admin.layout.header')

<div class="uk-section">
    <div class="uk-container uk-container-expand">
        <div class="" uk-grid>
            <div class="uk-width-1-6 uk-height-large"><simoncms-treeview id="main-navtree"></simoncms-treeview></div>
            <div class="uk-width-1-6 uk-height-large">@yield('sectionnav')</div>
            <div class="uk-width-expand">@yield('content')</div>
        </div>
    </div>
</div>

@include("admin.layout.footer")