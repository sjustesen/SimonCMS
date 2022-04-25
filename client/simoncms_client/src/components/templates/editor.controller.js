
export class TemplateEditorController {
    constructor(host, model, service) {
        ((this.host = host)).addController(this);
        this.submit_btn = document.querySelector('#btnSaveTemplate');
        this.editorService = service;
        this.editorModel = model;
        this.viewmodel = '';
    }

    getViewModel() {
        return this.viewmodel;
    }

    // model: object
    setViewModel(model) {
        this.viewmodel = model;
    }

    validate() {
        // validate incoming model
        // display user error if not ok
        // validation must happen on the server as well
    }

    getModelDataFromView() {
        let fields = document.querySelectorAll('#templateeditor [data-model]');
        fields.forEach(element => {
            console.dir(element)
        });
    }

    loadTemplateData(guid) {
        const data = this.service.loadTemplateData(guid);
        this.editorModel = {
            name: data.name,
            alias: data.alias,
            editor: data.editor
        }
        return this.editorModel;
    }ß

    saveTemplate() {
        const data = this.getModelDataFromView();
        let model = this.validate(data);

        if (model != null) {
            console.dir(model);
        }
        setTimeout(() => {
            this.submit_btn.classList.remove("button--loading");    
           // this.editorService.save(model)
        }, 3000);
        console.dir('We\'re pretend-saving...');

    }

    bindEvents() {
        this.submit_btn.addEventListener('click', () => {
            if (!this.submit_btn.classList.contains('button--loading')) {
                this.submit_btn.classList.add("button--loading");
            } else {
                this.submit_btn.classList.remove("button--loading");    
            }
            this.saveTemplate();
        });
        }


}