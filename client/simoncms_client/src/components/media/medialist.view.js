import { LitElement } from "lit";
import { MediaService } from './medialist.service';
import { MediaListController } from './medialist.controller'


export default class MediaList extends LitElement {

    constructor() {
        super();
        this.controller = new MediaListController(this, new MediaService());
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

customElements.define('sc-medialist', MediaList)