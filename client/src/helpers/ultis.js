import history from './history';
import { store } from './../index';

export function forceLogout() {
  alert('Your working section ends! Please login again!!');
  store.dispatch.user.logout();
  history.push('/login');
}