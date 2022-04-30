import { html, css, LitElement } from "lit";

export class SCTab extends LitElement {
    static styles = css`
    :host a {
        display: flex;
        align-items: center;
        column-gap: .25em;
        justify-content: center;
        padding: 5px 10px;
        color: #999;
        border-bottom: 1px solid transparent;
        border-bottom-color: transparent;
        font-size: .875rem;
        text-transform: uppercase;
        transition: color .1s ease-in-out;
        text-decoration: none;
    }`;
    
    
    constructor() {
        super();
    }

    
    connectedCallback() {
        super.connectedCallback();
    }

    
    render() {
        return html `<li class="uk-tab"><a href="#">${this.innerHTML}</a></li>`
    }
    
    
    add(text, callback) {
        this.innerHTML = text;
        this.addEventListener('click', callback);
        return this;
    }
}

customElements.define('sc-tab', SCTab)