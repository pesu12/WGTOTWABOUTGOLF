<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    'class' => 'navbar',

    // Here comes the menu strcture
    'items' => [

        'home'  => [
            'text'  => 'Hem',
            'url'   => $this->di->get('url')->create(''),
            'title' => 'Hem'
        ],

        'question'  => [
            'text'  => 'Frågor',
            'url'   => $this->di->get('url')->create('question/list'),
            'title' => 'Frågor'
        ],

        'tag'  => [
            'text'  => 'Taggar',
            'url'   => $this->di->get('url')->create('tag/list'),
            'title' => 'Taggar'
        ],

        'users' => [
            'text'  =>'Användare',
            'url'   => $this->di->get('url')->create('admin/list'),
            'title' => 'Användare'
         ],

        'about'  => [
            'text'  => 'Om WGTOTW',
            'url'   => $this->di->get('url')->create('about'),
            'title' => 'Om WGTOTW',
        ],

    ],

    /**
     * Callback tracing the current selected menu item base on scriptname
     *
     */
    'callback' => function ($url) {
        if ($url == $this->di->get('request')->getCurrentUrl(false)) {
            return true;
        }
    },

    /**
     * Callback to check if current page is a decendant of the menuitem, this check applies for those
     * menuitems that has the setting 'mark-if-parent' set to true.
     *
     */
    'is_parent' => function ($parent) {
        $route = $this->di->get('request')->getRoute();
        return !substr_compare($parent, $route, 0, strlen($parent));
    },
];
