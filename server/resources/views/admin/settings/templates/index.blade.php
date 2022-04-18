@extends('admin.layout.3col')

@section('sectionnav')
<small>Navigation</small>
<sc-templatetree>
    <slot></slot>
</sc-templatetree>
@endsection

@section('content')
<h1>Templates</h1>
@endsection