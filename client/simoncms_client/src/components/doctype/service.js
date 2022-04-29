export { DoctypeModel } from "./model";

export class DoctypeEditorService {
    constructor() {
        console.log('EditorService loaded')
    }

    load() {
        this.model = new DoctypeModel();
        return this.model;
    }

    save(model) {
        console.dir(model);
        
        let config = { 
            method: 'POST',
            body: JSON.stringify({
                name: model.name,
                alias: model.alias,
                fields: model.fields
            }),
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        } 

        fetch(`/admin/api/doctype/create`, config)
            .then(response => response.json())
            .then(data => console.dir(data));
    }
}
