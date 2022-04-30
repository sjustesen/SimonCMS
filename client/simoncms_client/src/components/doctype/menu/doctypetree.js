import { LitElement, html } from "lit";
import { SCTab } from "../../../factories/tab";

export default class DoctypeTree extends LitElement {
    constructor() {
        super();
    }

    connectedCallback() {
        super.connectedCallback();
        this.loadDoctypes();
        this.attachEvents();
    }

    attachEvents() {
        
    }

    openDocTypeInEditor(uuid) {
        let tab = new SCTab();
        tab.add('Hello', (e) => { 
            console.log('clicked...')
        });
        const dt_tabs = document.querySelector('#dtTabs');  
        dt_tabs.prepend(tab);
        
        const template = document.querySelector('#newfields_template')
    }

    loadDoctypes() {
        let section = 'doctypes/list';
        fetch(`/admin/api/${section}`)
            .then(response => response.json())
            .then(data => this.parse_and_inject(data));
    }

    parse_and_inject(data) {
        console.log(data)
        let ul = document.querySelector('#doctypetree')
        data.forEach(element => {
            let li = document.createElement(`li`);
            li.innerHTML = `<li>${element.name}</li>`;
            li.addEventListener('click', () => {
                this.openDocTypeInEditor(element.uuid)
            })
            ul.appendChild(li)
        });
    }

    render() {
        return html`
        <slot></slot>
        `;
    }
}

customElements.define('sc-doctypetree', DoctypeTree)
