import { EditorService } from './service'
import { DoctypeModel } from './model'

export class DoctypeEditorController {
    constructor(host) {
        (this.host = host).addController(this);
        this.model = new DoctypeModel().getFields();
        console.dir(this.model);
    }

    updateModel() {
        let doctype_fields = document.querySelectorAll('#new_doctype_form [data-model]');

        doctype_fields.forEach(element => {
            if (element.dataset.model == 'doctype_name' || element.dataset.model == 'doctype_alias') {
                this.model.name = (element.value != '') ? element.value : element.textContent;
                this.model.alias = (element.value != '') ? element.value : element.textContent;
            } else {
                this.model.fields.push({
                    name: element.dataset.model,
                    value: element.value
                })
            }
        });  
        console.dir(this.model)
    }

    saveDoctype() {
        // serialize all form fields before saving
        this.updateModel();

        let service = new EditorService();
        //service.save();
        console.dir('Doctype saving...');
    }

    updateActiveTabContent() {

    }

    attachEventHandlersToNewTab() {
        let dtTab_listiems = document.querySelectorAll('#dtTabs li');
        dtTab_listiems.forEach(element => {
            // register onclick update event for all list items
            // that are not "special"
            if (element.hasAttribute('data-mustupdate')) {
                element.addEventListener('click', (event) => {
                    console.log('Active tab clicked... Fetching content')
                    let activeNode = element;
                    this.updateActiveTabContent(activeNode);
                });

            }
        });
    }

    registerEventsForFormFields() {
        let inputs = document.querySelectorAll('#newFields input');
        inputs.forEach(element => {
            element.addEventListener('keyup', (e) => {
                console.dir(e.currentTarget.value)
            });
        });
    }

    registerEventsForDocTypeTabs() {
        // event for the save-button
        // figure out a datamodel
        document.querySelector('#btnSaveDoctype').addEventListener('click', (e) => {
            e.preventDefault();
            this.saveDoctype();

        })

        // event for the addfield-button

        document.querySelector('#genericproptab').addEventListener('click', (e) => {
            this.updateActiveTabContent();
        })

        document.querySelector('#btnAddField').addEventListener('click', (e) => {
            e.preventDefault();
            const clonedNodes = document.querySelector('#newfields_template').cloneNode(true);
            document.querySelector('#newfields_container').appendChild(clonedNodes);
        });

        // event for adding a new tab

        document.querySelector('#btnAddTab').addEventListener('click', (e) => {
            e.preventDefault();

            let doctypeTabArray = document.querySelector('#dtTabs');
            let listElement = document.createElement('li');
            listElement.setAttribute('class', 'newtab')

            let newTabElement = document.createElement('input');
            newTabElement.type = 'text';
            newTabElement.placeholder = 'Tab name';
            newTabElement.setAttribute('class', 'uk-input uk-form-small');

            newTabElement.addEventListener('keyup', (e) => {
                e.preventDefault();
                if (e.key == 'Enter') {
                    listElement.innerHTML = `<a href="#">${e.currentTarget.value}</a>`
                    listElement.setAttribute('data-mustupdate', true)
                    listElement.addEventListener('click', (event) => this.updateActiveTabContent());

                    newTabElement.setAttribute('style', 'display: none;');

                    this.attachEventHandlersToNewTab();
                }
            });

            listElement.appendChild(newTabElement);
            listElement.remove(newTabElement);

            doctypeTabArray.prepend(listElement);
        })



    }
}