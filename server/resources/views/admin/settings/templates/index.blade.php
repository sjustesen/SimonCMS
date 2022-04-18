@extends('admin.layout.3col')

@section('header')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.14/ace.js"></script>

@endsection

@section('sectionnav')
<small>Navigation</small>
<sc-templatetree>
    <slot></slot>
</sc-templatetree>
@endsection

@section('content')
<style type="text/css" media="screen">
    #editor {
        position: relative;
        width: 100%;
        height: 500px;
    }
</style>

<h1>Templates</h1>
<form class="">
    <div class="uk-container" uk-grid>
        <div class="uk-width-1-1">
            <button class="uk-button uk-button-primary" id="btnSaveDoctype">Save</button>
        </div>

        <div class="uk-width-1-2">
            <label>Name</label>
            <input class="uk-input uk-form-medium" type="text" placeholder="100">
        </div>
        <div class="uk-width-1-2">
            <label>Systemwide Element ID</label>
            <input class="uk-input uk-form-medium" type="text" placeholder="100">
        </div>
    

    <div id="editor">
     
    </div>
        </div>
</form>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/php_laravel_blade");
</script>

@endsection