import { LitElement, css, html } from "lit";
import { TemplateEditorController } from './editor.controller'
import { EditorModel } from "./editor.model";
import { TemplateEditorService } from "./editor.service";
import { TemplateViewModel } from "../../models/template.model";

export class TemplateEditor extends LitElement {
    static get styles() {
        return css`
         slot a { color: red; }
        `;
      }
    constructor() {
        super();
        this.model = new EditorModel();
        this.editorService = new TemplateEditorService();
        this.controller = new TemplateEditorController(this, this.model, this.editorService);
        this.controller.setViewModel(new TemplateViewModel());

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
