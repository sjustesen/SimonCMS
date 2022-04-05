import {LitElement, css, html} from 'lit';
import { router } from "lit-element-router";

//Components
import "./components/navigation/nav-link";

class App extends router(LitElement) {
  

  
  render() {
    return html`
    <nav id="header">
      <nav-link href="/admin/content">Content</nav-link>
      <nav-link href="/admin/media">Media</nav-link>
      <nav-link href="/admin/settings">Settings</nav-link>
      <nav-link href="/admin/developer">Developer</nav-link>
    </nav>
     `;
  }
}

customElements.define("app-main", App);

