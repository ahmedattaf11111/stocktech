const BASE_URL = `setting`;
export default {
    store(formValue) {
        return axios.post(`${BASE_URL}`, formValue);
    },
    getItem() {
        return axios.get(`${BASE_URL}`);
    },
}