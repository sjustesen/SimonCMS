import { LitElement, html } from "lit";
import { ComponentsService } from './components.service';
import { ComponentsController } from './components.controller'

export default class InstalledComponentsList extends LitElement {

    constructor() {
        super();
        this.controller = new ComponentsController(this, new ComponentsService());
    }

    connectedCallback() {
        super.connectedCallback();
        this.listComponents();
    }

    listComponents() {
        this.controller.list();
           /* list.forEach(element => {
                this.innerHTML += element.name
            }); */      
    }

    render() {
        return html`
        <slot>
        
        </slot>
        `
    }
}

customElements.define('sc-installed-components', InstalledComponentsList)