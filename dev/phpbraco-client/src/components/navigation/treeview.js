import { LitElement, css, html } from 'lit';
import { TreeviewController } from './treeview.controller';

export default class TreeView extends LitElement {

  constructor() {
    super();
    this.controller = new TreeviewController(this);
  }

  connectedCallback() {
    super.connectedCallback()
    this.addEventListener('updateMenu', (e) => {
      this.fetchedMenuData = e.detail.data;
      const slot = this.shadowRoot.querySelector('slot');
      slot.innerHTML= '<ul><li>' + this.fetchedMenuData.title + '</li></ul>';
     });
  }

  render() {
   return html`
    <div id="pb-navtree">
    <slot></slot>
    </div>`
  }

}

customElements.define('phpbraco-treeview', TreeView);