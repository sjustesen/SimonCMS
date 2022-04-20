import { LitElement, html } from "lit"

export default class TemplateTree extends LitElement {
    constructor() {
        super();
    }

    connectedCallback() {
        super.connectedCallback();
        this.download();
    }

    resolveUrl() {
        return 'templates'
    }

    download() {
        let section = this.resolveUrl();
        fetch(`/admin/api/${section}`)
            .then(response => response.json())
            .then(data => dispatchEvent(
                new CustomEvent("updateMenu", {
                    detail: {
                        data: data
                    },
                })));
    }

    render() {
        return html`
        <ul>
        <li>Folder</li>
        </ul>
        `;
    }
}

customElements.define('sc-templatetree', TemplateTree)