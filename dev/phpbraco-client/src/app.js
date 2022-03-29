import {LitElement, css, html} from 'lit';
import './components/doctree';
import { router } from "lit-element-router";

//Components
import "./components/navigation/nav-link";
import "./routing/router-outlet";

//pages
import "./pages/index.js";
import "./pages/about.js"

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
        name: "home",
        pattern: "",
        data: { title: "Home" },
      },
      {
        name: "about",
        pattern: "about",
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
      <app-header></app-header>
      <nav-link href="/">Home</nav-link>
      <nav-link href="/contact">Contact</nav-link>
      <nav-link href="/about">About</nav-link>

      <router-outlet active-route=${this.route}>
        <home-page route="home"></home-page>
        <about-page route="about"></about-page>
        <contact-page route="contact"></contact-page>
        <h1 route="not-found">Not Found</h1>
      </router-outlet>
    `;
  }
}

customElements.define("app-container", App);

