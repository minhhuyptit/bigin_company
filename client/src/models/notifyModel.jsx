export const notify = {
  state: {
    isShow: false,
    style: "info",
    title: "",
    content: "",
    position: "top-right",
    timeout: 2000
  },
  reducers: {
    hideNotification(state) {
      return {
        isShow: false
      };
    },

    changeNotification(state, option) {
      let newState = {isShow: true, ...option}
      return {
        ...state, ...newState
      };
    }
  },
  effects: {}
};
