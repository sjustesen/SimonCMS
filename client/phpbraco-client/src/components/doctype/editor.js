import { LitElement, css, html } from "lit";

export default class DoctypeEditor extends LitElement {
    constructor() {
        super();
    }

    connectedCallback() {
        super.connectedCallback();

    }

    render() {
        return html`
        <slot>
        
        </slot>
        `
    }
}

customElements.define('simoncms-doctypeeditor', DoctypeEditor)