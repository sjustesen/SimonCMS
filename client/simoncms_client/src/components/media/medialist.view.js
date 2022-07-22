import { LitElement, html } from "lit";
import { MediaService } from './medialist.service';
import { MediaListController } from './medialist.controller'


export default class MediaLibrary extends LitElement {

    constructor() {
        super();
        console.log('MediaLibrary says hello...')
        this.controller = new MediaListController(this, new MediaService());
    }

    connectedCallback() {
        super.connectedCallback();
        this.listComponents();
    }

    listComponents() {
        let test = this.controller.list();
        this.innerHTML = test;
       }

    render() {
        return html`
        <slot>
        
        </slot>
        `
    }
}

customElements.define('sc-medialibrary', MediaLibrary)
