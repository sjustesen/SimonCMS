import {LitElement, css, html} from 'lit';
import './components/doctree';
import { router } from "lit-element-router";

//Components
import "./components/navigation/nav-link";
import "./routing/router-outlet";

//pages
import "./sections/content";
import "./sections/media"
import "./sections/settings";
import "./sections/developer";

class App extends router(LitElement) {
  static get properties() {
    return {
      route: { type: String },
      params: { type: Object },
      query: { type: Object },
    };
  }

  static get routes() {
    return [
      {
        name: "admin",
        pattern: "admin",
        data: { title: "Contents" },
      },
      {
        name: "content",
        pattern: "admin/content",
        data: { title: "Contents" },
      },
      {
        name: "media",
        pattern: "admin/media",
      },
      {
        name: "settings",
        pattern: "admin/settings",
      },
      {
        name: "developer",
        pattern: "admin/developer",
      },
      {
        name: "not-found",
        pattern: "*",
      },
    ];
  }

  constructor() {
    super();
    this.route = "";
    this.params = {};
    this.query = {};
  }

  router(route, params, query, data) {
    this.route = route;
    this.params = params;
    this.query = query;
    console.log(route, params, query, data);
  }

  render() {
    return html`
    <nav id="header">
      <nav-link href="/admin/content">Content</nav-link>
      <nav-link href="/admin/media">Media</nav-link>
      <nav-link href="/admin/settings">Settings</nav-link>
      <nav-link href="/admin/developer">Developer</nav-link>
    </nav>
      <router-outlet active-route=${this.route}>
        <content-section route="content"></content-section>
        <media-section route="media"></media-section>
        <settings-section route="settings"></settings-section>
        <developer-section route="developer"></developer-section>
        <error-page route="not-found">Not Found</h1>
      </router-outlet>
    `;
  }
}

customElements.define("app-main", App);

