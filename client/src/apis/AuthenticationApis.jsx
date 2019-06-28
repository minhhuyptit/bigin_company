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
            updateUser: {
                url: 'member/{id}',
                method: 'put',
                payload: {
                    body: {
                        fullname: '',
                        birthday: '',
                        is_male: '',
                        phone: '',
                        picture: '',
                    },
                    url: {
                        id: ''
                    }
                }
            }
        }
    }
}