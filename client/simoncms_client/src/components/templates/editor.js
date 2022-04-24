import { LitElement, css, html } from "lit";
import { TemplateEditorController } from './editor.controller'

export class TemplateEditor extends LitElement {
    static get styles() {
        return css`
         slot a { color: red; }
        `;
      }
    constructor() {
        super();
        this.controller = new TemplateEditorController(this);
        this.controller.bindEvents();
    }
    
    connectedCallback() {
        super.connectedCallback();
    }

    render() {
        return html`<slot></slot>`;
    }
}

customElements.define('sc-templateeditor', TemplateEditor)
