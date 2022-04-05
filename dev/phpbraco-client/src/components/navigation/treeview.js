import {LitElement, css, html} from 'lit';

class TreeView extends LitElement {

    constructor() {
      super();
      console.log('Treeview loaded');
    }

    render() {html`
        <tree-view id="chart" key="id" value="1" ></tree-view>`
    }
  
  }
  
  customElements.define('phpbraco-treeview', TreeView);