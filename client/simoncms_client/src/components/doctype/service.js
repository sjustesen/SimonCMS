export class EditorService {
    constructor() {
        console.log('EditorService loaded')
    }

    save() {
        let config = { 
            method: 'POST',
            body: JSON.stringify({
                title: '',
                alias: '',
            }),
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        } 

        fetch(`/admin/api/doctype`, config)
            .then(response => response.json())
            .then(data => console.dir(data));
    }
}