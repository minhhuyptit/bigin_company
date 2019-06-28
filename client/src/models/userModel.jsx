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
    async asyncUpdateUser(formData) {
      console.log(formData);
      // console.log(user);
      // let {id, fullname, birthday, is_male, phone, picture} = user;
      let res = await authenApi.call("updateUser", {
        body: {
          fullname: "Nguyễn Huy",
          birthday: "1997/06/21",
          is_male: true,
          phone: "0978250272",
          picture: "avatar.jpg"
        },
        url: {
          id: 1
        }
      });

      console.log("Result: ", res);
    }
  }
};
