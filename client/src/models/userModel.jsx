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
    async asyncUpdateProfile(data) {
      let formData = new FormData();
      formData.set("fullname", data["fullname"]);
      formData.set("birthday", data["birthday"]);
      formData.set("is_male", +data["is_male"]);
      formData.set("phone", data["phone"]);
      if (data["picture"] !== undefined) {
        formData.append("picture", data["picture"]);
      }
      let res = await authenApi.call("updateProfile", {
        body: formData,
        url: {
          id: data["id"]
        }
      });

      if (res.status === 200) {
        //throw undefined when token expired
        this.login(res.data);
        let option = {
          style: notify.SUCCESS,
          title: notify.TITLE_UPDATE_SUCCESS,
          content: res.message,
          timeout: 1500
        };
        store.dispatch.notify.changeNotification(option);
      } else {
        let option = {
          style: notify.DANGER,
          title: notify.TITLE_UPDATE_FAIL,
          content: res.message,
          timeout: 2500
        };
        store.dispatch.notify.changeNotification(option);
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
