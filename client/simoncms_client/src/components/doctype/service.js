import { DoctypeModel } from "./model";

export class DoctypeEditorService {
    constructor() {
        console.log('EditorService loaded')
    }

    load(document_uuid) {
        console.dir(`DoctypeService: Loading doctype with uuid: ${document_uuid}`)
        let config = { 
            method: 'GET',
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        }
        this.model = new DoctypeModel();
        fetch(`/admin/api/doctype/show/${document_uuid}`, config)
            .then(response => response.json())
            .then(data => {
              this.model.setName(data.name);
              this.model.setAlias(data.alias);
              this.model.setTemplate(data.template);
              this.model.setFields(data.fields);
              console.dir(data)
            });
        
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

            dispatchEvent(new Event('UpdateDoctypeTree'));
    }
}
