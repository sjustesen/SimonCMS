export class TemplateEditorController {
    constructor(host) {
        //self = this;
        ((this.host = host)).addController(this);
    }

    saveTemplate() {
        console.dir('We\'re pretend-saving...');
    }

    bindEvents() {
        const submit_btn = document.querySelector('#btnSaveDoctype');
        submit_btn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Save clicked');
        });
    }


}