const BASE_URL = `about`;
export default {
    store(formValue) {
        return axios.post(`${BASE_URL}`, formValue);
    },
    getItem() {
        return axios.get(`${BASE_URL}`);
    },
}