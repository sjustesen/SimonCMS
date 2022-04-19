export class TemplateEditorService {
    constructor() {
        this.config = { 
            method: 'POST',
            body: JSON.stringify(model),
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        } 
    }

    async fetchData(url, config) {
        
        if (config == null){
            config = this.config;
        }
        
        await fetch(url, config)
        .then(response => response.json())
        .then(data => console.dir(data));
    }

    create(model) {
        let config_override = this.config;
        config_override.method = 'GET';
        this.fetchData('/admin/api/template', config_override);
    }

    read() {
        this.fetchData('/admin/api/templates') 
      
    }

    readByType() {
        this.fetchData('')
    }

    update() {
       
    }
}