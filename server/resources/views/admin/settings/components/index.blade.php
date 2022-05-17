@extends('admin.layout.3col')

@section('sectionnav')
<small>Packages</small>
<sc-doctypetree>
    <slot>
        <ul id="doctypetree">
        </ul>
    </slot>
</sc-doctypetree>
@endsection

@section('content')
<main>
    <h1>Installed components</h1>
    <sc-installed-components>
    </sc-installed-components>
</main>
@endsection