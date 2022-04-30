import {LitElement, css, html} from 'lit';
import { router } from "lit-element-router";

//Components
import './components/navigation/treeview'
import './components/templates/menu/templatetree'
import './components/doctype/menu/doctypetree'
import './components/templates/editor'
import './components/doctype/editor'

//Styles
import './styles/uikit.min.css'
import './styles/base.css'

class App extends router(LitElement) {

  
  render() {
  }
}

customElements.define("app-main", App);

