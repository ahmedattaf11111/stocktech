const BASE_URL = `web-about`;
export default {
    getItem() {
        return axios.get(`${BASE_URL}`);
    },
}