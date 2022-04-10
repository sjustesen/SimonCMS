export class TreeviewController {
    constructor(host) {
        (this.host = host).addController(this);
        console.log('Treeview controller loaded');
    }

    fetchJSON(navtype) {
        fetch('https://jsonplaceholder.typicode.com/todos/1')
            .then(response => response.json())
            .then(data => this.host.dispatchEvent(
                new CustomEvent("updateMenu", {
                    detail: {
                        data: data
                    },
                })));
        this.host.requestUpdate();
        console.dir('dispatching...');
    }

    // fetchJSON callback


    hostConnected() {
        this.fetchJSON('contenttree');
    }

    hostDisconnected() {
    }
}