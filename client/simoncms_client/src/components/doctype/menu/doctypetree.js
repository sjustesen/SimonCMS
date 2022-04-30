import { LitElement } from "lit";

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

    loadDoctypes() {
        let section = 'doctypes/list';
        fetch(`/admin/api/${section}`)
            .then(response => response.json())
            .then(data => this.parse_and_inject(data));
    }

    parse_and_inject(data) {
        let ul = document.querySelector('#doctypetree')
        data.forEach(element => {
            let li = document.createElement(`li`);
            li.innerHTML = `<li>${element.name}</li>`;
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
