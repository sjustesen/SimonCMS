import { LitElement, css, html } from "lit";

class SettingsSection extends LitElement {
  static get styles() {
    return [css``];
  }

  render() {
    return html` <div>
      <h1>This is Settings</h1>
    </div>`;
  }

  static get properties() {
    return {
      eg: {
        type: String,
      },
    };
  }
  constructor() {
    super();
  }
}

customElements.define("settings-section", SettingsSection);