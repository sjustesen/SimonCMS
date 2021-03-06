import { DoctypeModel } from "./model";

export class DoctypeEditorService {
    constructor() {
    }

    async load(document_uuid) {
        console.dir(`DoctypeService: Loading doctype with uuid: ${document_uuid}`)
        let config = { 
            method: 'GET',
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        }
        
        return await fetch(`/admin/api/doctype/show/${document_uuid}`, config)
            .then(response => response.json())
            .then(data => {
                let model = new DoctypeModel();
                model.name = data.name;
                model.alias = data.alias;
                model.template = data.template;
                model.fields = JSON.parse(data.fields);
                return model;
            });
    }

    loadTest() {
        let model = new DoctypeModel();
        model.name = 'Testnavn';
        model.alias = 'Testalias';
        return model;
    }

    save(model) {
        console.dir(model);
        
        let config = { 
            method: 'POST',
            body: JSON.stringify({
                name: model.name,
                alias: model.alias,
                template: model.template,
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
