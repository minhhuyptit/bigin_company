import BaseApi from "./BaseApis";

export default class MemberApi extends BaseApi{
    constructor() {
        super()
        this.apiList = {
            getAllMember: {
                url: 'member',
                method: 'get'
            }
        }
    }
}