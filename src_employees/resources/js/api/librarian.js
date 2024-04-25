import axios from "axios";
import authHeader from "../elements/auth-header.js";
const librarianApi = axios.create({
    baseURL: '/admin/api/librarian',
});

export default {
    leasing() {
        return librarianApi.get('leasing',{ headers: authHeader() });
    }
}

