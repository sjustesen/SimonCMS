import { LitElement, html } from "lit"

export default class TemplateTree extends LitElement {
    constructor() {
        super();
        self = this;
        this.dirs = [];
    }

    connectedCallback() {
        super.connectedCallback();
        this.fetchTemplatesFromDisk();
        this.attachEvents();
    }

    resolveUrl() {
        return 'templates'
    }

    attachEvents() {
      
    }

    fetchTemplatesFromDisk() {
        let section = 'templates/list';
        fetch(`/admin/api/${section}`)
            .then(response => response.json())
            .then(data => this.parse_and_inject(data));
    }

    parse_and_inject(menuitems) {
        let ul = document.querySelector('#templatefiles');
        if (menuitems.length > 0) {
            menuitems.forEach(element => {
                let li = document.createElement('li');
                li.innerHTML = element.name;
                li.addEventListener('click', function(e)
                {
                    // element.path should be relative
                    self.openInEditor(element.path)
                });
                ul.appendChild(li);

                // apply nested
                if (element.children.length > 0) {
                    let nested_ul = document.createElement('ul');

                    element.children.forEach(child => {
                        console.dir(child)
                        let nested_li = document.createElement('li');
                        nested_li.innerHTML = `<a href="#" data-item=\"${child.path}\")">${child.name}</a>`;
                        nested_ul.appendChild(nested_li)

                    });
                    li.appendChild(nested_ul);
                }
            });
        }
    }

    openInEditor(file) {
        console.log(file)
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
