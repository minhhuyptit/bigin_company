export function listTeamMembers(list = []) {
    let arrTeamMembers = [];
    list.map((item, index) => {
        arrTeamMembers.push({
            key: index,
            text: item.fullname,
            image: process.env.REACT_APP_THUMB_SIZE_50 + "-" + item.picture,
            value: item.id
        });
    });
    return arrTeamMembers
}

export function listRoleMembers(list = []) {
    let arrRoleMembers = [];
    list.map((item, index) => {
        arrRoleMembers.push({
            key: index,
            text: item.value,
            value: item.id
        });
    });
    return arrRoleMembers
}

export function listMemberNotInTeam(allMembers = [], teamMembers = []) {
    let listMemberNotInTeam = allMembers.filter(function (elm_1) {
        return teamMembers.filter(function (elm_2) {
            return elm_1.id == elm_2.id
        }).length == 0
    })

    let arrMemberNotInTeam = [];
    listMemberNotInTeam.map((item, index) => {
        arrMemberNotInTeam.push({
            key: index,
            text: item.fullname,
            image: process.env.REACT_APP_THUMB_SIZE_50 + "-" + item.picture,
            value: item.id
        });
    });
    return arrMemberNotInTeam
}

export function listAllMember(list = []) {
    let arrMembers = [];
    list.map((item, index) => {
        arrMembers.push({
            key: index,
            text: item.fullname,
            image: process.env.REACT_APP_THUMB_SIZE_50 + "-" + item.picture,
            value: item.id
        });
    });
    return arrMembers
}