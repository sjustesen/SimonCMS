import {LitElement, css, html} from 'lit';
import { TreeviewController } from './treeview.controller';

export default class TreeView extends LitElement {

    constructor() {
      super();
      this.controller = new TreeviewController(this);
      console.log('Treeview loaded');
    }

    

    render() {
      return html`<h1>hello world</h1>`
    }
  
  }
  
  customElements.define('phpbraco-treeview', TreeView);