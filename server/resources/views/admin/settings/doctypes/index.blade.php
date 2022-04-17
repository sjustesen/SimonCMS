@extends('admin.layout.master')
@section('content')
<main>
	<h1>Create New DocumentType</h1>
	<simoncms-doctypeeditor>
		<slot>
			<form>
				<button class="uk-button uk-button-primary">Save</button>
				<div class="uk-container uk-width-1-1">
					<label>Name</label>
					<input class="uk-input uk-form-large" type="text" placeholder="100">
					<label>Alias</label>
					<input class="uk-input uk-form-large" type="text" placeholder="100">
					<h2>Controls</h2>
					<button class="uk-button uk-button-primary">Add new tab</button>
					
					<ul uk-tab>
						<li class="uk-active"><a href="#">Generic Properties</a></li>
						<li><a href="#">Item</a></li>
						<li><a href="#">Item</a></li>
						<li class="uk-disabled"><a>Disabled</a></li>
					</ul>
					<input class="uk-input uk-form-large" type="text" placeholder="Visual name">
					<input class="uk-input uk-form-large" type="text" placeholder="Data alias">
					<select class="uk-select">
						<option>Select Doctype control</option>
						<option value="text">Text</option>
						<option value="textarea">Textarea</option>
						<option value="number">Number</option>
					</select>
							
				</div>
			</form>
		</slot>
	</simoncms-doctypeeditor>
</main>
@endsection