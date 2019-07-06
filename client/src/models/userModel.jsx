import AuthenticationApi from "./../apis/AuthenticationApis";
import {store} from "./../index";
import * as notify from "./../constants/Notify";

const authenApi = new AuthenticationApi();

export const user = {
  state: {
    isAuthenticated: false,
    user: {
      token: ""
    }
  },
  reducers: {
    login(state, data) {
      return {
        isAuthenticated: true,
        user: {...state.user, ...data}
      };
    },

    logout(state) {
      return {
        isAuthenticated: false,
        user: {}
      };
    },

    updateUser(state, data) {
      return {...state, user: {...state.user, ...data}};
    },

    updateToken(state, data) {
      return {...state, user: {...state.user, ...{token: data}}};
    }
  },
  effects: {
    async asyncUpdateProfile(user) {
      let formData = createFormData(user);
      let res = await authenApi.call("updateProfile", {
        body: formData,
        url: {
          id: user["id"]
        }
      });

      if (res.status === 200) {
        this.login(res.data);
        Notification(notify.SUCCESS, notify.TITLE_UPDATE_SUCCESS, res.message, 1500);
      } else {
        Notification(notify.DANGER, notify.TITLE_UPDATE_FAIL, res.message, 2500);
      }
    },

    async asyncRefreshToken() {
      let res = await authenApi.call("refreshToken");
      if (res.status === 200) {
        this.updateToken(res.data);
      }
    }
  }
};

function createFormData(user) {
  let {fullname, birthday, is_male, phone, picture} = user;
  let formData = new FormData();
  formData.set("fullname", fullname);
  formData.set("birthday", birthday);
  formData.set("is_male", +is_male);
  formData.set("phone", phone);
  if (picture !== undefined) {
    formData.append("picture", picture);
  }
  return formData;
}

function Notification(style, title, content, timeout) {
  let option = {style, title, content, timeout};
  store.dispatch.notify.changeNotification(option);
}
