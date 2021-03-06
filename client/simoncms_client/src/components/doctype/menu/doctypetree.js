import { LitElement, html } from "lit";
import { SCTab } from "../../../factories/tab";
import DoctypeEditor from "../editor";

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
        window.addEventListener('UpdateDoctypeTree', (event) => {
            this.loadDoctypes();
        })
    }

    loadDoctypes() {
        let section = 'doctypes/list';
        fetch(`/admin/api/${section}`)
            .then(response => response.json())
            .then(data => this.parse_and_inject(data));
    }

    parse_and_inject(data) {
        let ul = document.querySelector('#doctypetree');
        ul.textContent = '';
        data.forEach(element => {
            let li = document.createElement(`li`);
            li.innerHTML = `<li>${element.name}</li>`;
            li.addEventListener('click', () => {
                let doctypeeditor = new DoctypeEditor();
                doctypeeditor.openDocType(element.uuid);
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
