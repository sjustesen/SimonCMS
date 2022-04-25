import { EditorModel } from "./editor.model";

export class TemplateEditorService {
    constructor() {
        // standard config
        this.config = { 
            method: 'POST',
            body: '',
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        }

        this.model = new EditorModel();
    }

    setConfig(config) {
        this.config = config;
    }

    persistData(url, model, config) {
        fetch(url, config ?? this.config)
        .then(response => response.json())
        .then(data => console.dir(data));
        return response.status;
    }

    fetchData(url, config) {    
       fetch(url, config ?? this.config)
        .then(response => response.json())
        .then(data => {
            // populate the model loaded in the constructor
        });
        
        return response.status;
    }

    save(model) {
        let config_override = this.config;
        config_override.body = JSON.stringify({ 'model': model }); 
        let result = this.persistData('/admin/api/template/save', model, config_override);
        return result;
    }

    read(guid) {
        let result = this.fetchData('/admin/api/template/read') 
        return result;
    }
}