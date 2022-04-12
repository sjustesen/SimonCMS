import { LitElement, css, html } from "lit";

class NotFoundRoute extends LitElement {
  constructor() {
    super();
  }

  static get styles() {
    return [css`
      h1 {color: red;}
    `];
  }

  render() {
    return html`
    <div>
      <phpbraco-treeview></phpbraco-treeview>
    </div> 
    <div>
      <h1>This is Home Page</h1>
    </div>`;
  }

  static get properties() {
    return {
      eg: {
        type: String,
      },
    };
  }
 
}

customElements.define("not-found", NotFoundRoute);