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
            register: {
                url: 'register',
                method: 'post',
                payload: {
                    body: {
                        fullname: '',
                        email: '',
                        birthday: '',
                        is_male: '',
                        phone: '',
                        password: '',
                        password_confirmation: ''
                    }
                }
            },
            resendConfirm: {
                url: 'register/confirm/resend/{email}',
                method: 'get',
                payload: {
                    url: {
                        email: ""
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
            },
            refreshToken: {
                url: 'token/refresh',
                method: 'get' 
            }
        }
    }
}