const BASE_URL = `web-setting`;
export default {
    getItem() {
        return axios.get(`${BASE_URL}`);
    },
}