import { LitElement, html } from "lit";
import { TemplateEditorController } from './editor.controller'

export class TemplateEditor extends LitElement {
    constructor() {
        super();
        this.controller = new TemplateEditorController(this);
    }
    connectedCallback() {
        super.connectedCallback();
        this.controller.bindEvents();
    }

    render() {
        return html`<slot></slot>`;
    }
}

customElements.define('sc-templateeditor', TemplateEditor)
