import axios from "axios";
import {store} from "./../index.jsx";

export default class BaseRequest {
  getAccessToken() {
    return store.getState() !== undefined && store.getState().user.user !== undefined
      ? store.getState().user.user.token
      : "";
  }

  async get(url) {
    try {
      let res = await axios.get(url);
      return {
        status: res.status,
        data: res.data
      };
    } catch (error) {
      return {
        status: error.response.status,
        message: error.response.data.message
      };
    }
  }

  async post(url, body) {
    try {
      let res = await axios.post(url, body
      // {
      //   headers: {
      //     Authorization: "Bearer " + this.getAccessToken(),
      //     Accept: "application/json"
      //   }
      // }
      );
      return {
        status: res.status,
        data: res.data
      };
    } catch (error) {
      return {
        status: error.response.status,
        message: error.response.data.message
      };
    }
  }

  async put(url, body) {
    try {
      let res = await axios.put(url, body, {
        headers: {
          Authorization: "Bearer " + this.getAccessToken()
        }
      });
      return {
        status: res.status,
        data: res.data
      };
    } catch (error) {
      return {
        status: error.response.status,
        message: error.response.data.message
      };
    }
  }
}
