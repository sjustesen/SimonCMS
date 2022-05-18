export class ComponentsController {

    constructor(host, service) {
        (this.host = host).addController(this);
        this.componentsService = service;

    }

    list() {
        this.componentsService.list()
        .then(data => {
            console.dir(data)
        })
        return null;
    }
    
}