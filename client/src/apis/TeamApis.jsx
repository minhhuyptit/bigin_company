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
            },
            createTeam: {
                url: 'team',
                method: 'post',
                payload:{
                    body: {
                        name: "",
                        leader: "",
                        description: ""
                    }
                }
            },
            updateTeam: {
                url: 'team/{id}',
                method: 'put',
                payload:{
                    body: {
                        name: "",
                        leader: "",
                        description: ""
                    },
                    url: {
                        id: ""
                    }
                }
            },
            deleteTeam: {
                url: 'team/{id}',
                method: 'delete',
                payload:{
                    url: {
                        id: ""
                    }
                }
            },
            createMemberIntoTeam: {
                url: 'team_member',
                method: 'post',
                payload: {
                    body: {
                        team_id: '',
                        member_id: '',
                        team_member_role: ''
                    }
                }
            },
            deleteMemberFromTeam: {
                url: 'team_member/{id}',
                method: 'delete',
                payload: {
                    url: {
                        id: ''
                    }
                }
            }
        }
    }
}