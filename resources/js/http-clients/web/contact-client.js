const BASE_URL = `contacts`;
export default {
    store(formValue) {
        return axios.post(`${BASE_URL}`, formValue);
    },
}