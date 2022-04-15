import { LitElement, css, html } from 'lit';
import { TreeviewController } from './treeview.controller';

export default class TreeView extends LitElement {

  static get styles() {

    return css`
      ul { 
        list-style-type: none; 
        padding: 0;
        margin: 0;  
      }
      li, a { color: gray; }

    `;

  }

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
    const path = document.location.href;
    
    let menu = '<ul>';
    fetchedMenuData.forEach(element => {
      let url = `${element.alias}`;
      menu += `<li><a href="${url}">${element.name}</a></li>`;
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