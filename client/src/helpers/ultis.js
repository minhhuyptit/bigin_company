import history from './history';
import { store } from './../index';
import * as notify from "./../constants/Notify";

var jwtDecode = require('jwt-decode');

export function isLoggedIn() {
  let isAuthenticated = store.getState().user.isAuthenticated;
  if (!isAuthenticated) {
    return isAuthenticated;
  }

  let token = store.getState().user.user.token;
  let is_expired = isExpired(token);
  if (is_expired) {
    forceLogout();
  }
  return !is_expired;
}

export function isExpired(token) {
  let decode = jwtDecode(token);
  let secondsRemain = decode.exp - Date.now() / 1000;
  // let secondsNotWorking = process.env.REACT_APP_TIME_DOES_NOT_WORK * 60;
  let secondsNotWorking = 30;
  if (secondsRemain < secondsNotWorking) {
    store.dispatch.user.asyncRefreshToken();
  }
  return (decode.exp < Date.now() / 1000);
}

export function forceLogout() {
  let option = {
    style: notify.WARNING,
    title: notify.TITLE_SESSION_END,
    content: 'Your working section ends! Please login again!!',
    timeout: 5000
  };
  store.dispatch.notify.changeNotification(option);
  store.dispatch.user.logout();
  history.push('/login');
}