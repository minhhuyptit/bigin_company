import ConfigurationApi from "./../apis/ConfigurationApis";
const configApi = new ConfigurationApi();

export const config = {
  state: {
    role: [],
    permission: [],
    repeat_type: []
  },
  reducers: {
    updateConfig(state, data) {
      return {...state, ...data};
    },
    
    updateConfigByType(state, type, data) {
      return {...state, [type]: data};
    }
  },
  effects: {
    async asyncGetConfig() {
      let data = await configApi.call("getConfig");
      if (data.status === 200) {
        this.updateConfig(data.data);
      }
    },

    async asyncGetConfigByType(type) {
      let data = await configApi.call("getConfigByType", {
        url: {
          type
        }
      });
      if (data.status === 200) {
        this.updateConfigByType(type, data.data);
      }
    }
  }
};
