import axios from "axios";
import authHeader from "../elements/auth-header.js";
const testApi = axios.create({
    baseURL: '/admin/api',
});
export default {
    register(params) {
        return testApi.post('register', params);
    },
    login(params) {
        return testApi.post('login', params);
    },
    refresh() {
        return testApi.post('refresh',{}, { headers: authHeader() });
    },
    user() {
        return testApi.get('user-profile',{ headers: authHeader() });

    }
}
