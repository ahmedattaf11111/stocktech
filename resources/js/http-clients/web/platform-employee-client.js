const BASE_URL = `web-platform-employees`;
export default {
    getEmployees(limit) {
        return axios.get(`${BASE_URL}?limit=${limit}`);
    },
}