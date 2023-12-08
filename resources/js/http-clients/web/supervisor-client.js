const BASE_URL = `web-supervisors`;
export default {
    getSupervisors(limit) {
        return axios.get(`${BASE_URL}?limit=${limit}`);
    },
}