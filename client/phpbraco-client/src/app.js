import {LitElement, css, html} from 'lit';
import { router } from "lit-element-router";

//Components
import './components/navigation/treeview'

class App extends router(LitElement) {

  
  render() {
  }
}

customElements.define("app-main", App);

