export class TreeviewController {
    constructor(host) {
        (this.host = host).addController(this);
        console.log('Treeview controller loaded');
    }

    fetchJSON(navtype) {
        fetch('/api/navtree/')
            .then(response => response.json())
            .then(data => this.host.dispatchEvent(
                new CustomEvent("updateMenu", {
                    detail: {
                        data: data
                    },
                })));
        this.host.requestUpdate();
    }

    // fetchJSON callback


    hostConnected() {
        this.fetchJSON('contenttree');
    }

    hostDisconnected() {
        // gracefully cleanup
    }
}