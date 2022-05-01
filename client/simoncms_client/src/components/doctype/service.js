import { DoctypeModel } from "./model";

export class DoctypeEditorService {
    constructor() {
    }

    load(document_uuid) {
        console.dir(`DoctypeService: Loading doctype with uuid: ${document_uuid}`)
        let config = { 
            method: 'GET',
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        }
        let model = new DoctypeModel();
        fetch(`/admin/api/doctype/show/${document_uuid}`, config)
            .then(response => response.json())
            .then(data => {
                model.name = data.name;
                model.alias = data.alias;
                model.template = data.template;
                model.fields = data.fields;
            });
        return model;
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
