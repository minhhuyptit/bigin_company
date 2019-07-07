import React from "react";
import Loadable from "react-loadable";
import MainLayout from "./../../components/Layout/MainLayout";

function Loading(props) {
	if (props.error){
		return <div>Error! Cant load your page, please contact administrator for help !!</div>;
	} else {
		return <div>Loading...</div>;
	}
}

const MainPageContainer = Loadable({
  loader: () => import("./../../containers/MainPageContainer"),
  loading: Loading
});

const ProfileContainer = Loadable({
  loader: () => import("./../../containers/ProfileContainer"),
  loading: Loading
});

const ConfigurationContainer = Loadable({
  loader: () => import("./../../containers/ConfigurationContainer"),
  loading: Loading
});

const TeamManagementContainer = Loadable({
  loader: () => import("./../../containers/TeamManagementContainer"),
  loading: Loading
});

const TeamDetailContainer = Loadable({
  loader: () => import("./../../containers/TeamDetailContainer"),
  loading: Loading
});

const routes = [
  { exact:true, path: '/', name: "Home", component: MainLayout },
  { exact:true, path: '/dashboard', name: "Dashboard", component: MainPageContainer },
  { exact:true, path: '/profile', name: "Profile", component: ProfileContainer},
  { exact:true, path: '/configuration', name: "Configuration", component: ConfigurationContainer},
  { exact:true, path: '/management/team', name: "Team Management", component: TeamManagementContainer},
  { path: '/management/team/detail/:id', name: 'Team Detail', component: TeamDetailContainer },
];

export default routes;