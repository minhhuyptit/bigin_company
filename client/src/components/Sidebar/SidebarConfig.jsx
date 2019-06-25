export default {
    items: [
      {
        name: 'Home',
        url: '/dashboard',
        icon: 'fa fa-home fa-lg',
        badge: {
          variant: 'info',
          text: 'NEW',
        },
      },
      {
        divider: true,
      },
      {
        title: true,
        name: 'Management',
      },
      {
        name: 'Member Management',
        icon: 'fa fa-users fa-lg',
        url: '/team'
      },
      {
        name: 'Configuration',
        icon: 'fa fa-wrench fa-lg',
        url: '/configuration'
      },
      {
        name: 'Food',
        icon: 'fa fa-lemon-o fa-lg',
        url: '/food'
      },
      {
        name: 'Events',
        icon: 'fa fa-star fa-lg',
        url: '/event/all'
      }
    ]
  };
  