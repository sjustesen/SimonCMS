export class ComponentsController {

    constructor(host, service) {
        (this.host = host).addController(this);
        this.componentsService = service;

    }

    list() {
        this.componentsService.list()
        .then(data => {
            this.host.innerHTML = 'Hello...'; 
            console.log(data)
        })
    }
    
}