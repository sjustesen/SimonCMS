import { DoctypeEditorService } from './service'
import { DoctypeModel } from './model'

export class DoctypeEditorController {

    constructor(host) {
        (this.host = host).addController(this);
        this.service = new DoctypeEditorService();
        this.model = new DoctypeModel();

    }


    addTab() {
        let tab = new SCTab();
        tab.add('Hello', (e) => {
            console.log('clicked...')
        });
        const dt_tabs = document.querySelector('#dtTabs');
        dt_tabs.prepend(tab);

        const template = document.querySelector('#newfields_template')
    }


    // FIXME: make reactive
    updateModel() {
        let doctype_fields = document.querySelectorAll('#new_doctype_form [data-model]');

        doctype_fields.forEach(element => {
            switch (element.dataset.model) {
                case 'name':
                    this.model.name = element.value;
                    break;
                case 'alias':
                    this.model.alias = element.value;
                    break;
                case 'template':
                    this.model.template = element.selectedValue;
                    break;
                default:
                    this.model.fields.push({
                        name: element.name,
                        alias: element.dataset.model,
                        value: element.value
                    })
            }
        });
    }


    loadDoctype(uuid) {
        console.log('Doctype Controller -- Loading doctype');
        const template_name = document.querySelector('#new_doctype_form [data-model="name"]');
        const template_alias = document.querySelector('#new_doctype_form [data-model="alias"]');
        const selected_template = document.querySelector('#sc-select-template');

        const doctype_fields = document.querySelector('#newfields_container');
        const item_template = document.querySelector('#newfields_template').cloneNode(true);


        this.service.load(uuid).then(model => {
            template_name.value = model.name;
            template_alias.value = model.alias;
            selected_template.value = (model.template != null) ? model.template : '';

            if (model.fields != null) {
                let i = 0;
                model.fields.forEach(element => {
                    let field = item_template.children[i];

                    if (field.tagName == 'INPUT' &&
                        field.dataset.model == 'newfield_name'
                    ) {
                        field.value = element.value;
                        console.log(field.dataset.model, i)
                    }

                    if (field.tagName == 'INPUT' &&
                        field.dataset.model == 'newfield_alias'
                    ) {
                        field.value = element.value;
                        console.log(field.dataset.model, i)

                    }

                    if (field.tagName == 'SELECT') {
                        field.value = element.value
                    }

                    if (field.tagName == 'INPUT' &&
                        field.type == 'checkbox'
                    ) {
                        if (element.value != 'on') {
                            field.checked = false;
                        } else {
                            field.checked = true;
                        }
                    }


                    i++;
                    doctype_fields.append(item_template)
                    console.dir(model)
                });
            }
        });
    }


    saveDoctype() {
        // serialize all form fields before saving
        this.updateModel();
        this.service.save(this.model);
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
