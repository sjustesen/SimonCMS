import { LitElement, css, html } from "lit";
import { DoctypeEditorController } from './controller'

export default class DoctypeEditor extends LitElement {

    constructor() {
        super();
        this.controller = new DoctypeEditorController(this);
    }

    connectedCallback() {
        super.connectedCallback();
        this.controller.registerEventsForDocTypeTabs();
        this.controller.registerEventsForFormFields();
    }

    openDocType(uuid) {
        this.controller.loadDoctype(uuid);
        this.requestUpdate();

    }


    render() {
        return html`
        <slot>
        
        </slot>
        `
    }
}

customElements.define('simoncms-doctypeeditor', DoctypeEditor)