import { ComponentModel } from "./components.model";

export class ComponentsService {

    async list() {
        console.dir(`Listing components`)
        let config = { 
            method: 'GET',
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        }
        
        return await fetch(`/admin/api/components/list`, config)
            .then(response => response.json())
            .then(data => {
                let components = [];
                data.forEach(element => {
                    let model = new ComponentModel();
                    model.name = element.name;
                    model.alias = element.alias ?? '';
                    model.description = element.description;
                    model.status = element.status ?? '';        
                    components.push(model);
                });
                return components;
            });
    }
    
}

