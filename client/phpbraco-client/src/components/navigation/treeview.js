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
    let menu = '<ul>';
    let path = document.location.origin;
    fetchedMenuData.forEach(element => {
      let url_matches_alias = document.location.pathname.includes(element.alias);
      let url = (url_matches_alias) ? '' : `${path}/admin/${fetchedMenuData[0].alias}/${element.alias}`;   
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