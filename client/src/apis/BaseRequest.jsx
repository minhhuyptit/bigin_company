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
      let res = await axios.get(url, {
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
        status: 500,
        message: error.message
      };
    }
  }

  async post(url, body) {
    try {
      let res = await axios.post(url, body, {
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
        status: 500,
        message: error.message
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
        status: 500,
        message: error.message
      };
    }
  }

  async delete(url) {
    try {
      let res = await axios.delete(url, {
        headers: {
          Authorization: "Bearer " + this.getAccessToken()
        }
      });
      console.log(res.data);
      return {
        status: res.status,
        data: res.data
      };
    } catch (error) {
      return {
        status: 500,
        message: error.message
      };
    }
  }
}
