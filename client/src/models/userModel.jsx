import AuthenticationApi from "./../apis/AuthenticationApis";
const authenApi = new AuthenticationApi();

export const user = {
  state: {
    isAuthenticated: false,
    user: {}
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
    }
  },
  effects: {
    async asyncUpdateProfile(data) {
      let formData = new FormData();
      formData.set("fullname", data["fullname"]);
      formData.set("birthday", data["birthday"]);
      formData.set("is_male", data["is_male"]);
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

      console.log(res);
    }
  }
};
