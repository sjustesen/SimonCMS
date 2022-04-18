import { LitElement, html } from "lit"

export default class TemplateTree extends LitElement {
    constructor() {
        super();
    }

    connectedCallback() {
        super.connectedCallback();
        this.download();
    }

    download() {
        let section = this.resolveUrl();
        fetch(`/admin/api/${section}`)
            .then(response => response.json())
            .then(data => this.host.dispatchEvent(
                new CustomEvent("updateMenu", {
                    detail: {
                        data: data
                    },
                })));
    }

    render() {
        return html`hej`;
    }
}

customElements.define('sc-templatetree', TemplateTree)
