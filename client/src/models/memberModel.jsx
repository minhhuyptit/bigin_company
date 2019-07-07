import MemberApi from "./../apis/MemberApis";
const memberApi = new MemberApi();

export const member = {
  state: {
    memberList: []
  },
  reducers: {
    updateMembeList(state, data) {
      return {...state, memberList: data};
    }
  },
  effects: {
    async asyncGetAllMember() {
      let data = await memberApi.call("getAllMember");
      if (data.status === 200) {
        this.updateMembeList(data.data);
      }
    },
  }
};
