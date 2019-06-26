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
    async asyncUpdateUser(user) {
      // let {id, fullname, birthday, is_male, email, phone, picture} = user;
      // let res = await authenApi.call("updateUser", {
      //   body: {
      //     fullname,
      //     birthday,
      //     is_male,
      //     email,
      //     phone,
      //     picture,
      //     execute_by: id
      //   },
      //   url: {
      //     id
      //   }
      // });

      // console.log("Result: ", res);

    }
  }
};
