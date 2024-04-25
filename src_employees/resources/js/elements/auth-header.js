export default function authHeader() {
    const user = JSON.parse(localStorage.getItem('userEmployee'));
    if (user && user.token) {
        return {'Authorization': 'Bearer ' + user.token }
    } else {
        return {};
    }
}
