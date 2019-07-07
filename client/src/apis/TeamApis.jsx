import BaseApi from "./BaseApis";

export default class TeamApi extends BaseApi{
    constructor() {
        super()
        this.apiList = {
            getAllTeam: {
                url: 'team',
                method: 'get'
            },
            getTeamMembersList: {
                url: 'team/{id}/members',
                method: 'get',
                payload: {
                    url:{
                        id: ""
                    }
                }
            },
            getInfoTeam: {
                url: 'team/{id}',
                method: 'get',
                payload: {
                    url:{
                        id: ""
                    }
                }
            }
        }
    }
}