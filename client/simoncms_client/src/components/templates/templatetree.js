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

    openInEditor(file) {
        let payload = {
            file: file
        }


        let config = {
            'method': 'POST',
            'body': JSON.stringify(payload),
            'headers': {
                "Content-type": "application/json; charset=UTF-8"
            }
        }

        let section = 'template/read';
        fetch(`/admin/api/${section}`, config)
            .then(response => response.json())
            .then(data => {
                var editor = ace.edit("editor");
                editor.session.setValue(data)
            });
    }


    fetchTemplatesFromDisk() {
        let section = 'templates/list';
        fetch(`/admin/api/${section}`)
            .then(response => response.json())
            .then(data => this.parse_and_inject(data));
    }

    setActionfromItemType(item) {
        let nested_li = document.createElement('li');
        
        switch (item.type) {
            case 'file':
                nested_li.innerHTML = `<a href="#" data-item=\"${item.path}\")">${item.name}</a>`;
                self = this; // scoping self to local scope, seems hacky, but it works,

                nested_li.addEventListener('click', function (e) {
                    // element.path should be relative
                    self.openInEditor(item.path)
                });
                break;
            case 'folder':
                nested_li.classList.add('menu-closed');
                nested_li.innerHTML = `<a href="#" data-item=\"${item.path}\")">${item.name}</a>`;
                nested_li.addEventListener('click', function (e) {
                    let menuitem = e.currentTarget;
                    menuitem.classList.toggle('menu-closed')
                });
                break;
            default:
                console.error('ERROR! SetActionForItemType: item had no type')
                break;

        }
        return nested_li;
    }

    parse_and_inject(menuitems) {
        let ul = document.querySelector('#templatefiles');
        if (menuitems.length > 0) {
            menuitems.forEach(element => {
                let li = this.setActionfromItemType(element);
                ul.appendChild(li);

                // apply nested
                if (element.children != null &&
                    element.children.length > 0) {
                    let nested_ul = document.createElement('ul');

                    element.children.forEach(child => {
                        let nested_li = this.setActionfromItemType(child);
                        nested_ul.appendChild(nested_li)
                    });

                    li.appendChild(nested_ul);
                }
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
