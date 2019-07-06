import ConfigurationApi from "./../apis/ConfigurationApis";
import {store} from "./../index";
import * as notify from "./../constants/Notify";

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
    },
    addConfigOfType(state, data) {
      let tmp = state;
      if (tmp[data.type] !== undefined) tmp[data.type].push(data);
      return {...state, ...tmp};
    },
    editConfigOfType(state, data) {
      let tmp = state;
      if (tmp[data.type] !== undefined) {
        tmp[data.type].forEach(elm => {
          if (elm.id === data.id) {
            elm.value = data.value;
            elm.description = data.description;
          }
        });
      }
      return {...state, ...tmp};
    },
    deleteConfigOfType(state, data) {
      let tmp = state;
      tmp[data.type].forEach((item, index) => {
        if (item.id === data.id) {
          tmp[data.type].splice(index, 1);
        }
      });
      return {...state, ...tmp};
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
    },

    async asyncCreateConfig(item) {
      let data = await configApi.call("createConfig", {
        body: {
          value: item["value"],
          description: item["description"],
          type: item["type"]
        }
      });
      handleError(data.status, notify.TITLE_CREATE_FAIL, data.message, 2500);
      if (data.status === 200) {
        this.addConfigOfType(data.data);
        Notification(notify.SUCCESS, notify.TITLE_CREATE_SUCCESS, data.message, 1500);
      }
    },

    async asyncUpdateConfig(item) {
      let data = await configApi.call("updateConfig", {
        body: {
          value: item["value"],
          description: item["description"]
        },
        url: {
          id: item["id"]
        }
      });
      handleError(data.status, notify.TITLE_UPDATE_FAIL, data.message, 2500);
      if (data.status === 200) {
        this.editConfigOfType(data.data);
        Notification(notify.SUCCESS, notify.TITLE_UPDATE_SUCCESS, data.message, 1500);
      }
    },

    async asyncDeleteConfig(id) {
      let data = await configApi.call("deleteConfig", {
        url: {id}
      });
      handleError(data.status, notify.TITLE_DELETE_FAIL, data.message, 2500);
      if (data.status === 200) {
        this.deleteConfigOfType(data.data);
        Notification(notify.SUCCESS, notify.TITLE_DELETE_SUCCESS, data.message, 1500);
      }
    }
  }
};

function handleError(status, title, content, timeout) {
  let style = notify.WARNING;
  if (status === 500) style = notify.DANGER;
  Notification(style, title, content, timeout);
}

function Notification(style, title, content, timeout) {
  let option = {style, title, content, timeout};
  store.dispatch.notify.changeNotification(option);
}
