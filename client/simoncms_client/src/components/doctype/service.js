export class DoctypeEditorService {
    constructor() {
        console.log('EditorService loaded')
    }

    save(model) {
        let config = { 
            method: 'POST',
            body: JSON.stringify(model),
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        } 

        fetch(`/admin/api/doctype`, config)
            .then(response => response.json())
            .then(data => console.dir(data));
    }
}