import { LitElement, css, html } from "lit";
import '../components/navigation/treeview'

class ContentSection extends LitElement {
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
      <simoncms-treeview></simoncms-treeview>
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

customElements.define("content-section", ContentSection);