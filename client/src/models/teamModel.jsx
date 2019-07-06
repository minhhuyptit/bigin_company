import TeamApi from "./../apis/TeamApis";
const teamApi = new TeamApi();

export const team = {
  state: {
    teamList: []
  },
  reducers: {
    updateTeam(state, data) {
      return {...state, teamList: data};
    }
  },
  effects: {
    async asyncGetAllTeam() {
      let data = await teamApi.call("getAllTeam");
      if (data.status === 200) {
          this.updateTeam(data);
      }
    }
  }
};
