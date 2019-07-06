import BaseApi from "./BaseApis";

export default class TeamApi extends BaseApi{
    constructor() {
        super()
        this.apiList = {
            getAllTeam: {
                url: 'team',
                method: 'get'
            }
        }
    }
}