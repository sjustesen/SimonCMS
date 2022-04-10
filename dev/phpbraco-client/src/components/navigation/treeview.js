import { LitElement, css, html } from 'lit';
import { TreeviewController } from './treeview.controller';

export default class TreeView extends LitElement {

  constructor() {
    super();
    this.controller = new TreeviewController(this);

  }

  getData(parsed_data) {
    return '<ul><li>{parsed_data.id}</li></ul>';
  }

  connectedCallback() {
    super.connectedCallback()
    this.addEventListener('updateMenu', (e) => {
       console.dir(e.detail.data);
       document.getElementById('main-navtree').innerHTML = '<ul><li>Hejhej</li></ul>';
     });
  }

  updated(element) {
    console.dir(element)
  }

  render() {
    return html`<div id="pb-navtree"></div>`
  }

}

customElements.define('phpbraco-treeview', TreeView);