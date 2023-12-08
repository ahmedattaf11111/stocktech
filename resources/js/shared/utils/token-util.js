export default {
    KEY: 'TOKEN',
    set(token) {
        localStorage.setItem(this.KEY, token);
    },
    get() {
        return localStorage.getItem(this.KEY);
    },
    remove() {
        localStorage.removeItem(this.KEY);
    },
    payload() {
        return this.get() ? this.decode(this.get().split(".")[1]) : null;
    },
    getUser() {
        if(this.payload()==null) return null;
        return {
            id: this.payload().id,
            name: this.payload().name,
            email: this.payload().email,
        };
    },
    //Commons
    decode(payload) {
        return JSON.parse(this.b64DecodeUnicode(payload));
    },
    b64DecodeUnicode(str) {
        return decodeURIComponent(Array.prototype.map.call(atob(str), function (c) {
            return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
        }).join(''));
    }
}