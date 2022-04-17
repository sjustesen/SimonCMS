@extends('admin.layout.master')
@section('content')
<main>
	<simoncms-doctypeeditor>
		<slot>
			<form class="">
				<div class="uk-container">
				<h1>Create New DocumentType</h1>

					<button class="uk-button uk-button-primary" id="btnSaveDoctype">Save</button>

					<div class="uk-width-1-2">
						<label>Name</label>
						<input class="uk-input uk-form-large" type="text" placeholder="100">
					</div>
					<div class="uk-width-1-2">
						<label>Alias</label>
						<input class="uk-input uk-form-large" type="text" placeholder="100">
					</div>
				</div>

				<div class="uk-container uk-margin">
					<h2>Controls</h2>

					<ul uk-tab id="dtTabs">
						<li class="uk-active" data-nonremovable><a href="#">Generic Properties</a></li>
						<li><button id="btnAddTab" class="uk-button uk-button-small uk-button-primary" data-nonremovable>Add tab</button></li>
					</ul>

					<div class="uk-margin">
					<button id="btnAddField" class="uk-button uk-button-small uk-button-primary">Add field</button>
					</div>

					<div id="newfields_template" style="margin-bottom: 20px;">
						<input class="uk-input uk-form-large" type="text" placeholder="Visual name">
						<input class="uk-input uk-form-large" type="text" placeholder="Data alias">

						<select class="uk-select uk-form-large" class="dtComponents">
							<option>Select Doctype control</option>
							<option value="text">Text</option>
							<option value="textarea">Textarea</option>
							<option value="number">Number</option>
						</select>
					</div>
					<div id="newfields_container"  uk-margin>

					</div>

				</div>
			</form>
		</slot>
	</simoncms-doctypeeditor>
</main>
@endsection