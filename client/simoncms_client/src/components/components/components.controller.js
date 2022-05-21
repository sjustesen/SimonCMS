export class ComponentsController {

    constructor(host, service) {
        (this.host = host).addController(this);
        this.componentsService = service;
        this.host.innerHTML = '<div id="sc_component_table" style="display: grid; grid-template-columns: auto auto auto; gap: 10px; width: 100%;"></div>';
    }

    gridHeader() {
        let rowHtml = '<div>Name</div><div>Description</div><div>Status</div>';
        return rowHtml;
    }

    list() {
        this.rowHtml = '';
        this.componentsService.list()
        .then(data => {
            console.dir(data)
            // the controller should not generate the view, just pass the viewmodel. testing.
            data.forEach(element => {
                document.querySelector('#sc_component_table').innerHTML += '<div><strong>' + element.name + '</strong></div><div><strong>' + element.description + '</strong></div><div><strong>' + element.status + '</strong></div>';
            });
            return data; 
        })
        return null;
    }
    
}