import BaseApi from "./BaseApis";

export default class AuthenticationApi extends BaseApi{
    constructor() {
        super()
        this.apiList = {
            login: {
                url: 'login',
                method: 'post',
                payload: {
                    body: {
                        email: '',
                        password: ''
                    }
                }
            },
            updateProfile: {
                url: 'member/update-profile/{id}',
                method: 'post',
                payload: {
                    body: "",
                    url: {
                        id: ""
                    }
                }
            }
        }
    }
}