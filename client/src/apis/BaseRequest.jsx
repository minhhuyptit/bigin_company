import axios from "axios";

export default class BaseRequest {
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
      let res = await axios.post(url, body);
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
      let res = await axios.put(url, body);
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
