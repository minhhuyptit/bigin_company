import BaseRequest from "./BaseRequest";
import {forceLogout} from "./../helpers/token";

export default class BaseApi extends BaseRequest {
  constructor() {
    super();
  }

  async invoke(method, url, body = null) {
    let res = await super[method](url, body);
    if (res.status === 401) {
      forceLogout();
    } else if (res.status !== 200) {
      alert("Error: " + res);
    } else {
      return res.data;
    }
    return res;
  }

  async call(apiName, payload = {}) {
    let apiList = this.apiList;

    // Validate API name
    if (!apiList.hasOwnProperty(apiName)) {
      alert("Call to undefined api: " + apiName);
      return;
    }

    let url = process.env.REACT_APP_URL_SERVER_API + apiList[apiName].url;
    let url_param = null;
    let body = null;

    //Validate Payload
    if (apiList[apiName].hasOwnProperty("payload")) {
      // Validate Parram Url
      if (this.validateUrl(apiList[apiName].payload, payload, url)) {
        url_param = payload.url;
      } else {
        alert("Param passed in not match what Api defined !!");
        return;
      }
      // Validate Parram Body
      if (this.validateBody(apiList[apiName].payload, payload)) {
        body = payload.body;
      } else {
        alert("Param passed in not match what Api defined !!");
        return;
      }
    }

    // Construct url param
    if (url_param != null) {
      Object.keys(url_param).forEach(function(item) {
        url = url.replace("{" + item + "}", url_param[item]);
      });
    }

    //Call API
    let res = await this.invoke(apiList[apiName].method, url, body);
    return res;
  }

  validateUrl(payloadStructure, payload, url) {
    if (payloadStructure.hasOwnProperty("url")) {
      // validate length
      if (
        !payload.hasOwnProperty("url") ||
        Object.keys(payloadStructure.url).length !== Object.keys(payload.url).length
      ) {
        return false;
      }
      // validate mapping parram url
      Object.keys(payloadStructure.url).forEach(function(param) {
        if (!payload.url.hasOwnProperty(param)) {
          return false;
        }
      });
      // validate parram exist in url
      Object.keys(payloadStructure.url).forEach(key => {
        if (url.indexOf("{" + key + "}") === -1) {
          return false;
        }
      });
    }
    return true;
  }

  validateBody(payloadStructure, payload) {
    if (payloadStructure.hasOwnProperty("body")) {
      // validate length
      if (
        !payload.hasOwnProperty("body") ||
        Object.keys(payloadStructure.body).length !== Object.keys(payload.body).length
      ) {
        return false;
      }
      // validate mapping parram body
      Object.keys(payloadStructure.body).forEach(function(param) {
        if (!payload.body.hasOwnProperty(param)) {
          return false;
        }
      });
    }
    return true;
  }
}
