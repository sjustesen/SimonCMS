import { LitElement, html } from "lit"

export default class TemplateTree extends LitElement {
    constructor() {
        super();
        this.dirs = [];
    }

    connectedCallback() {
        super.connectedCallback();
        this.fetchTemplatesFromDisk();
    }

    resolveUrl() {
        return 'templates'
    }

    

    fetchTemplatesFromDisk() {
        let section = 'templates/list';
        fetch(`/admin/api/${section}`)
        .then(response => response.json())
        .then(data => this.parse_and_inject(data));
    }
    
    parse_and_inject(menuitems) {
        let ul = document.querySelector('#templatefiles');
        if (menuitems.length > 0 ) {
        menuitems.forEach(element => {
            let li = document.createElement('li');
            li.innerHTML = element.name;
            ul.appendChild(li);
        });
    }
    }

    fetchFilesAndFolders() {
        let section = this.resolveUrl();
        fetch(`/admin/api/${section}`)
            .then(response => response.json())
            .then(data => parse(data));
    }

    render() {
        return html`
        <slot></slot>
        `;
    }
}

customElements.define('sc-templatetree', TemplateTree)
