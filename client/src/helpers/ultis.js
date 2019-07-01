import history from 'helpers/history';
import { store } from '../index.jsx';

export function forceLogout() {
  alert('Your working section ends! Please login again!!');
  store.dispatch.user.logout();
  history.push('/login');
}