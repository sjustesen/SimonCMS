import { LitElement, css, html } from "lit";

export default class DoctypeEditor extends LitElement {
    constructor() {
        super();
    }

    connectedCallback() {
        super.connectedCallback();
        document.querySelector('#btnSaveDoctype').addEventListener('click', (e) => {
            e.preventDefault();
            console.dir('Doctype saving...')
        })

        document.querySelector('#btnAddField').addEventListener('click', (e) => {
            e.preventDefault();
            const clonedNodes = document.querySelector('#newfields_template').cloneNode(true);
            document.querySelector('#newfields_container').appendChild(clonedNodes);
        });

        document.querySelector('#btnAddTab').addEventListener('click', (e) => {
            e.preventDefault();
            let doctypeTabArray = document.querySelector('#dtTabs');
            let listElement = document.createElement('li');
            listElement.setAttribute('class', 'newtab')
            
            let anchorElement = document.createElement('input');
            anchorElement.type = 'text';
            anchorElement.setAttribute('class', 'uk-input uk-form-small');
            anchorElement.addEventListener('keyup', (e) => {
                e.preventDefault();
                if (e.key == 'Enter' )
                console.log(e)
            });

            listElement.appendChild(anchorElement);
            doctypeTabArray.prepend(listElement);
        
            

            console.dir(' adding...')
        })
    }

    render() {
        return html`
        <slot>
        
        </slot>
        `
    }
}

customElements.define('simoncms-doctypeeditor', DoctypeEditor)