export class TreeviewController {
    constructor(host) {
        (this.host = host).addController(this);
        console.log('Treeview controller loaded');
    }

    fetchJSON(navtype) {
        let section = this.resolveUrl();
        fetch(`/admin/navtree/${section}`)
            .then(response => response.json())
            .then(data => this.host.dispatchEvent(
                new CustomEvent("updateMenu", {
                    detail: {
                        data: data
                    },
                })));
        this.host.requestUpdate();
    }

    // fetch tree based on path
    
    resolveUrl() {
        let segment = document.location.pathname.split('/')[2];
        return segment;
    }

    hostConnected() {
        this.fetchJSON();
    }

    hostDisconnected() {
        // gracefully cleanup
    }
}
