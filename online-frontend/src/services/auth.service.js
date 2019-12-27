import ApiService from './api.service';


const AuthService = {
    async login(loginForm) {
        return await ApiService.post('login', loginForm);
    },

    async createUser(registerForm) {
        return await ApiService.post('registration', registerForm);
    },

}

export default AuthService;