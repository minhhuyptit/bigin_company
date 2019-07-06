import BaseApi from "./BaseApis";

export default class ConfigurationApi extends BaseApi {
  constructor() {
    super();
    this.apiList = {
      getConfig: {
        url: "configuration",
        method: "get"
      },

      getConfigByType: {
        url: "configuration/{type}",
        method: "get",
        payload: {
          url: {
            type: ""
          }
        }
      },

      createConfig: {
        url: "configuration",
        method: "post",
        payload: {
          body: {
            value: "",
            description: "",
            type: ""
          }
        }
      },

      updateConfig: {
        url: "configuration/{id}",
        method: "put",
        payload: {
          body: {
            value: "",
            description: ""
          }
        }
      },

      deleteConfig: {
        url: "configuration/{id}",
        method: "delete",
        payload: {
          url: {
            id: ""
          }
        }
      }
    };
  }
}
