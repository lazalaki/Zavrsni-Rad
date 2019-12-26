import ApiService from './api.service';


const AuthService = {
    async login(loginForm) {
        return await ApiService.post('login', loginForm);
    },

    async createUser(registerForm) {
        return await ApiService.post('registration', registerForm);
    },

    async createShop(shopForm) {
        return await ApiService.post('shops/create', shopForm)
    },

    async createManager(managerForm) {
        return await ApiService.post('managers/create', managerForm)
    }
}

export default AuthService;