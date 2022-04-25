@extends('admin.layout.3col')

@section('header')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.14/ace.js"></script>

@endsection

@section('sectionnav')
<small>Navigation</small>
<sc-templatetree>
    <slot>
        <ul id="templatefiles">
            
        </ul>
    </slot>
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
<sc-templateeditor>
    <slot>
        <form id="templateEditor">
            <div class="uk-container" uk-grid>
                <div class="uk-width-1-1">
                    <button class="uk-button button" id="btnSaveTemplate"> 
                        <span class="button__text">Save</span>
                    </button>
                </div>

                <div class="uk-width-1-2">
                    <label>Template name</label>
                    <input class="uk-input uk-form-medium" type="text" data-model="name" placeholder="">
                </div>
                <div class="uk-width-1-2">
                    <label>Systemwide Element ID</label>
                    <input class="uk-input uk-form-medium" type="text" data-model="alias" placeholder="">
                </div>

                <div class="uk-width-1-1">
                    <div id="editor" data-model="editor">

                    </div>
                </div>
            </div>
        </form>
    </slot>
</sc-templateeditor>
        <script>
            var editor = ace.edit("editor");
            editor.setTheme("ace/theme/monokai");
            editor.session.setMode("ace/mode/php_laravel_blade");
        </script>

        @endsection