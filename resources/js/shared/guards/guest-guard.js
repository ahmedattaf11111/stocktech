import TokenUtil from "../utils/token-util";
import global from "../global";
import authClient from "../../http-clients/web/auth-client"; 
export default (to, from, next) => {
    if (!TokenUtil.get()) {
        next()
    }
    else {
        return authClient.verifyToken()
            .then(() => { next({ path: global.AUTH_REDIRECT }) })
            .catch(() => { next() })
    }
}
