<x-navigation-menu.links :links="[
    [
        'label' => __('Account'),
        'url' => route('profile.show'),
        'isActive' => request()->routeIs('profile.show'),
    ],
    [
        'label' => __('Additional Data'),
        'url' => route('profile.additional'),
        'isActive' => request()->routeIs('profile.additional'),
    ],
]" />
