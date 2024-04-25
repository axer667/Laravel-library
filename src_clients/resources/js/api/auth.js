import axios from "axios";
import authHeader from "../elements/auth-header.js";
const testApi = axios.create({
    baseURL: '/api/auth',
});
export default {
    register(params) {
        return testApi.post('register', params, { headers: authHeader() });
    },
    login(params) {
        return testApi.post('login', params, { headers: authHeader() });
    },
    refresh() {
        return testApi.post('refresh',{}, { headers: authHeader() });
    },
    user() {
        return testApi.get('user-profile',{ headers: authHeader() });

    }
}
