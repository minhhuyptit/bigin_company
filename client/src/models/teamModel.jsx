import TeamApi from "./../apis/TeamApis";
const teamApi = new TeamApi();

export const team = {
  state: {
    teamList: [],
    infoTeam: {
      id: "",
      name: "",
      leader: "",
      description: ""
    },
    teamMembersList: []
  },
  reducers: {
    updateTeamList(state, data) {
      return {...state, teamList: data};
    },
    updateInfoTeam(state, data) {
      return {...state, infoTeam: data};
    },
    updateTeamMembersList(state, data) {
      return {...state, teamMembersList: data};
    }
  },
  effects: {
    async asyncGetAllTeam() {
      let data = await teamApi.call("getAllTeam");
      if (data.status === 200) {
        this.updateTeamList(data.data);
      }
    },

    async asynGetTeamMembersList(team_id) {
      let data = await teamApi.call("getTeamMembersList", {
        url: {
          id: team_id
        }
      });

      if (data.status === 200) {
        this.updateTeamMembersList(data.data);
      }
    },

    async asynGetInfoTeam(team_id) {
      let data = await teamApi.call("getInfoTeam", {
        url: {
          id: team_id
        }
      });

      if (data.status === 200) {
        this.updateInfoTeam(data.data);
      }
    }
  }
};
