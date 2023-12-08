const BASE_URL = `profiles`;
export default {
    getStudents() {
        return axios.get(`${BASE_URL}/students`);
    },
    getGuardians() {
        return axios.get(`${BASE_URL}/guardians`);
    },
    getGuardianStudents(guardianId) {
        return axios.get(`${BASE_URL}/guardian-students/${guardianId}`);
    },
    getRates() {
        return axios.get(`${BASE_URL}/rates`);
    },
    getStudentRates(studentId) {
        return axios.get(`${BASE_URL}/rates/${studentId}`);
    }

}   