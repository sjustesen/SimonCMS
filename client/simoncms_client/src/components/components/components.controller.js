export class ComponentsController {

    constructor(host, service) {
        (this.host = host).addController(this);
        this.componentsService = service;

    }

    list() {
        this.componentsService.list()
        .then(data => {
            console.dir(data)
            // the controller should not generate the view, just pass the viewmodel. testing.
            let rowHtml = '<div>Name</div><div>Description</div><div>Status</div>';
            data.forEach(element => {
                rowHtml += '<div><strong>' + element.name + '</strong></div><div><strong>' + element.description + '</strong></div><div><strong>' + element.status + '</strong></div>';
            });
            this.host.innerHTML = '<div style="display: grid; grid-template-columns: auto auto auto; gap: 10px; width: 100%;">' + rowHtml + '</div>';
            return data; 
        })
        return null;
    }
    
}