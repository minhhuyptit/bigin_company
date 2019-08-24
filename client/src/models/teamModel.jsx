import TeamApi from "./../apis/TeamApis";
import * as notify from "./../constants/Notify";
import {store} from "./../index";
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

    async asynGetTeamMembersList(id) {
      let data = await teamApi.call("getTeamMembersList", {
        url: {
          id
        }
      });
      if (data.status === 200) {
        this.updateTeamMembersList(data.data);
      }
    },

    async asynGetInfoTeam(id) {
      let data = await teamApi.call("getInfoTeam", {
        url: {
          id
        }
      });

      if (data.status === 200) {
        this.updateInfoTeam(data.data);
      }
    },

    async asyncCreateTeam(item) {
      let data = await teamApi.call("createTeam", {
        body: {
          name: item["name"],
          leader: item["leader"],
          description: item["description"]
        }
      });

      if (data.status === 200) {
        this.asyncGetAllTeam();
      }
    },

    async asyncUpdateTeam(item) {
      let data = await teamApi.call("updateTeam", {
        body: {
          name: item["name"],
          leader: item["leader"],
          description: item["description"]
        },
        url: {
          id: item["id"]
        }
      });

      if (data.status === 200) {
        this.updateInfoTeam(data.data);
        Notification(notify.SUCCESS, notify.TITLE_UPDATE_SUCCESS, data.message, 1500);
      }else {
        Notification(notify.DANGER, notify.TITLE_UPDATE_FAIL, data.message, 2500);
      }
    },

    async asyncDeleteTeam(id) {
      let data = await teamApi.call("deleteTeam", {
        url: {id}
      });
      if (data.status === 200) {
        this.asyncGetAllTeam();
        Notification(notify.SUCCESS, notify.TITLE_UPDATE_SUCCESS, data.message, 1500);
      }else {
        Notification(notify.DANGER, notify.TITLE_UPDATE_FAIL, data.message, 2500);
      }
    },

    async asyncAddMemberIntoTeam(item) {
      let data = await teamApi.call("createMemberIntoTeam", {
        body: {
          team_id: item["team_id"],
          member_id: item["member_id"],
          team_member_role: item["team_member_role"]
        }
      });
      if (data.status === 200) {
        this.asynGetTeamMembersList(item["team_id"]);
        Notification(notify.SUCCESS, notify.TITLE_CREATE_SUCCESS, data.message, 1500);
      }else {
        Notification(notify.DANGER, notify.TITLE_CREATE_FAIL, data.message, 2500);
      }
    },
    async asyncDeleteMemberFromTeam(item) {
      let data = await teamApi.call("deleteMemberFromTeam", {
        url: {
          id: item["team_member_id"]
        }
      });
      if (data.status === 200) {
        this.asynGetTeamMembersList(item["team_id"]);
        Notification(notify.SUCCESS, notify.TITLE_DELETE_SUCCESS, data.message, 1500);
      } else {
        Notification(notify.DANGER, notify.TITLE_DELETE_FAIL, data.message, 2500);
      }
    }
  }
};
function Notification(style, title, content, timeout) {
  let option = {style, title, content, timeout};
  store.dispatch.notify.changeNotification(option);
}