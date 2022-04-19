export class DoctypeModel {
    constructor() {
        this.model = {
            name: '',
            alias: '',
            fields: [],

        }
    }
    getFields() { return this.model };
}