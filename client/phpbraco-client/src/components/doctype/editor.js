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
        <form>
            <div class="uk-container uk-width-1-1">
            <label>Name</label>
            <input class="uk-input uk-form-large" type="text" placeholder="100">
            </div>
        </form>
        </slot>
        `
    }
}

customElements.define('phpbraco-doctypeeditor', DoctypeEditor)