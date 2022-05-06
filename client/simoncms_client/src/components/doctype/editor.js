import { LitElement, html } from "lit";
import { TemplateEditorService } from '../templates/editor.service';
import { DoctypeEditorController } from './controller'

export default class DoctypeEditor extends LitElement {

    constructor() {
        super();
        this.templateEditorService = Object.create(TemplateEditorService);
        this.controller = new DoctypeEditorController(this, this.templateEditorService);
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