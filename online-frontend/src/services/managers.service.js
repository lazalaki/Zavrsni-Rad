import ApiService from './api.service';

const ManagerService = {

    async createManager(managerForm) {
        return await ApiService.post('managers/create', managerForm)
    },

    async getAllManagers() {
        return await ApiService.get('/managers')
    },

    async getManagers() {
        return await ApiService.get('/managers/without-shop')
    },

    async getManagersById(id) {
        return await ApiService.get('/managers' + id)
    }

    
}

export default ManagerService;