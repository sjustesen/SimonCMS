import { LitElement, html, css } from "lit";
import { navigator } from "lit-element-router";

class NavLink extends navigator(LitElement) {

    static get properties() {
      return {
        href: { type: String },
      };
    }
    constructor() {
      super();
      this.href = "";
    }
    
    static styles = css`
    ::slotted(*) {
      display: block;
      color: red;
    }
  `;
    render() {
      return html`
        <a href="${this.href}" @click="${this.handleClick}">
          <slot></slot>
        </a>
      `;
    }
    handleClick(e) {
      e.preventDefault();
      this.navigate(this.href);
    }
  }
  
  customElements.define("nav-link", NavLink);