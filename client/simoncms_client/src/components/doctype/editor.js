import { LitElement, css, html } from "lit";
import { DoctypeEditorController } from './controller'
import { DoctypeModel } from "./model";

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
        this.doctype = new DoctypeModel();
    }

    connectedCallback() {
        super.connectedCallback();
        this.controller.registerEventsForDocTypeTabs();
        this.controller.registerEventsForFormFields();
    }

    openDocType() {
        this.controller.loadDoctype();
    }


    render() {
        return html`
        <slot>
        
        </slot>
        `
    }
}

customElements.define('simoncms-doctypeeditor', DoctypeEditor)