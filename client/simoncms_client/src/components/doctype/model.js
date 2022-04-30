export class DoctypeModel {
    constructor() {
        this.model = {
            name: '',
            alias: '',
            template: {
                name: '',
                alias: ''
            },
            fields: [],

        }
    }

    // ES5 style setters

    getModel() { return this.model }
    setModel() {
        // TODO... 
    }
    getName() { return this.model.name }
    setName(name) { this.model.name = name; }

    getTemplate() {
        return this.model.template;
    }

    // templateObject consists of a name and an alias property
    setTemplate(templateObject) {
        this.model.template = templateObject
    }

    getAlias() { return this.model.alias }
    setAlias(alias) { 
        this.model.alias = alias; 
    }
    
    getFields() { return this.model.fields };
    setFields(fields) { this.model.fields = fields }
}