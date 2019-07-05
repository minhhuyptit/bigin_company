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
            type: ''
          }
        }
      }
    };
  }
}
