export class TemplateViewModel {
    constructor() {
        this.model = {
            name: '',
            alias: '',
            fields: [],

        }
    }
    getModel() { return this.model }
    getName() { return this.model.name }
    getAlias() { return this.model.alias }
    getFields() { return this.model.fields };

    setName(name) { this.model.name = name; }
    setAlias(alias) { this.model.alias = alias; }
    setFields(field) {
        this.model.fields.push(field)
    }
}