import { LitElement, css, html } from "lit";

class MediaLibrarySection extends LitElement {
  static get styles() {
    return [css``];
  }
  render() {
    return html` <div>
      <h1>This is the MediaLibrary</h1>
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
customElements.define("media-section", MediaLibrarySection);