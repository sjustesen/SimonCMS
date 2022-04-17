import {LitElement, css, html} from 'lit';

export class DocTree extends LitElement {
    static properties = {
      name: {},
    };

    static styles = css`
      :host {
        color: blue;
      }
    `;
  
    constructor() {
      super();
      this.name = 'World';
    }
  
    render() {
      return html`<p>Hello, ${this.name}, I am doctree!</p>`;
    }
  }
  customElements.define('simoncms-doctree', DocTree);