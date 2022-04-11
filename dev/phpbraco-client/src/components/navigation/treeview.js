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
      this.renderMenu(e.detail.data);
     });
  }

  renderMenu(fetchedMenuData) {
    const slot = this.shadowRoot.querySelector('slot');
    let menu = '<ul>';
    fetchedMenuData.forEach(element => {
      menu += `<li><a href="${element.href}">${element.title}</a></li>`;
    });
    menu += '</ul>';
    
    slot.innerHTML= menu;
  }

  render() {
   return html`
    <div id="pb-navtree">
    <slot></slot>
    </div>`
  }

}

customElements.define('phpbraco-treeview', TreeView);