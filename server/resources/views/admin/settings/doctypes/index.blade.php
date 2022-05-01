@extends('admin.layout.3col')

@section('sectionnav')
<small>Doctypes</small>
<sc-doctypetree>
    <slot>
        <ul id="doctypetree">
        </ul>
    </slot>
</sc-doctypetree>
@endsection


@section('content')
<main>
	<simoncms-doctypeeditor>
		<slot>
			<form id="new_doctype_form">
				<section class="uk-container uk-child-width-1-1">
					<div uk-grid>
						<div class="uk-width-1-1">
							<h1>Create New Document Type</h1>
							<p>DocumentTypes is the blueprint for every page. </p>
							<button class="uk-button uk-button-primary" id="btnSaveDoctype">Save</button>
						</div>

						<div class="uk-width-1-2">
							<label>Name</label>
							<input class="uk-input uk-form-medium" id="templatename" data-model="name" type="text" placeholder="">
						</div>
						<div class="uk-width-1-2">
							<label>Systemwide Element Alias</label>
							<input class="uk-input uk-form-medium" data-model="alias" type="text" placeholder="">
						</div>
						<div class="uk-width-1-2">
							<select class="uk-select uk-form-medium" id="sc-select-template">
								<option value="">Select Template</a>
							</select>
						</div>
					</div>
					<hr>
				</section>
				
				<section class="uk-container uk-child-width-1-1 uk-margin">
					<h2>Document type controls</h2>
					<div class="uk-width-1-2 uk-margin">
						<button id="btnAddField" class="uk-button uk-button-small uk-button-primary">Add field</button>
					</div>
					<div style="background-color: #dedede; border-radius: 5px; padding: 20px;">

						<ul uk-tab id="dtTabs">
							<li class="uk-active" data-mustupdate="true" id="genericproptab"><a href="#">Generic Properties</a></li>
							<li><button id="btnAddTab" class="uk-button uk-button-small uk-button-primary">Add tab</button></li>
						</ul>

						<div class="uk-child-width-1-2">


							<div id="newfields_template">
								<input class="uk-input uk-form-medium uk-margin" type="text" data-model="newfield_name" placeholder="Visual name" value="">
								<input class="uk-input uk-form-medium" type="text" data-model="newfield_alias" placeholder="Data alias" value="">

								<select class="uk-select uk-form-medium uk-margin" data-model="componentSelected" class="dtComponents">
									<option value="">Select Doctype control</option>
									<option value="text">Text</option>
									<option value="textarea">Textarea</option>
									<option value="number">Number</option>
								</select>
								<div class="uk-grid-small uk-child-width-auto uk-grid">
									<label><input type="checkbox" class="uk-checkbox uk-form-medium" data-model="required">Required</label>
								</div>
								<hr>
							</div>

							<div id="newfields_container" uk-margin>

							</div>
						</div>
					</div>

				</section>
			</form>
		</slot>
	</simoncms-doctypeeditor>
</main>
@endsection
