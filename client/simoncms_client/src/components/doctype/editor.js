import { LitElement, css, html } from "lit";
import { DoctypeEditorController } from './controller'

export default class DoctypeEditor extends LitElement {

    static properties = {
        name: { type: String },
        alias: { type: String }
    };

    static model = {

    }

    constructor() {
        super();
        this.controller = new DoctypeEditorController(this);
    }

    connectedCallback() {
        super.connectedCallback();
        this.controller.registerEventsForDocTypeTabs();
        this.controller.registerEventsForFormFields();
    }

    render() {
        return html`
        <slot>
        
        </slot>
        `
    }
}

customElements.define('simoncms-doctypeeditor', DoctypeEditor)