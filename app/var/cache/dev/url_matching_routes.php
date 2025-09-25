<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_wdt/styles' => [[['_route' => '_wdt_stylesheet', '_controller' => 'web_profiler.controller.profiler::toolbarStylesheetAction'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'app_admin_index', '_controller' => 'App\\Controller\\Admin\\AdminController::index'], null, null, null, true, false, null]],
        '/admin/offres/categories-offres' => [[['_route' => 'app_categories_offres_index', '_controller' => 'App\\Controller\\Admin\\CategoriesOffresController::index'], null, null, null, false, false, null]],
        '/admin/offres/categories-offres/ajout' => [[['_route' => 'app_categories_offres_new', '_controller' => 'App\\Controller\\Admin\\CategoriesOffresController::new'], null, null, null, false, false, null]],
        '/admin/offres' => [[['_route' => 'app_offres_index', '_controller' => 'App\\Controller\\Admin\\OffresController::index'], null, null, null, false, false, null]],
        '/catalogue-offres-clients' => [[['_route' => 'app_offres_catalogue', '_controller' => 'App\\Controller\\Admin\\OffresController::catalogue'], null, null, null, false, false, null]],
        '/admin/offres/ajout' => [[['_route' => 'app_offres_new', '_controller' => 'App\\Controller\\Admin\\OffresController::new'], null, null, null, false, false, null]],
        '/admin/sports' => [[['_route' => 'app_sports_index', '_controller' => 'App\\Controller\\Admin\\SportsController::index'], null, null, null, false, false, null]],
        '/admin/sports/ajout' => [[['_route' => 'app_sports_new', '_controller' => 'App\\Controller\\Admin\\SportsController::new'], null, null, null, false, false, null]],
        '/admin/utilisateurs' => [[['_route' => 'app_utilisateurs_index', '_controller' => 'App\\Controller\\Admin\\UsersController::index'], null, null, null, true, false, null]],
        '/cart' => [[['_route' => 'app_cart_index', '_controller' => 'App\\Controller\\CartController::index'], null, null, null, true, false, null]],
        '/cart/count' => [[['_route' => 'app_cart_count', '_controller' => 'App\\Controller\\CartController::count'], null, ['GET' => 0], null, false, false, null]],
        '/cart/empty' => [[['_route' => 'app_cart_empty', '_controller' => 'App\\Controller\\CartController::emptyCart'], null, ['POST' => 0], null, false, false, null]],
        '/commandes/ajout' => [[['_route' => 'app_commandes_ajout', '_controller' => 'App\\Controller\\CommandesController::index'], null, null, null, false, false, null]],
        '/commandes/liste' => [[['_route' => 'app_commandes_liste', '_controller' => 'App\\Controller\\CommandesController::liste'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_main', '_controller' => 'App\\Controller\\MainController::index'], null, null, null, false, false, null]],
        '/profil' => [[['_route' => 'app_profile_index', '_controller' => 'App\\Controller\\Profile\\ProfileController::index'], null, null, null, true, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/mot-de-passe-oublie' => [[['_route' => 'forgotten_password', '_controller' => 'App\\Controller\\SecurityController::forgottenPassword'], null, null, null, false, false, null]],
        '/2fa' => [[['_route' => 'app_2fa_verify', '_controller' => 'App\\Controller\\TwoFactorController::verify'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/2fa/setup' => [[['_route' => 'app_2fa_setup', '_controller' => 'App\\Controller\\TwoFactorSetupController::setup'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/admin/(?'
                    .'|offres/categories\\-offres/([^/]++)/edit(*:251)'
                    .'|commande/scan/([^/]++)(*:281)'
                    .'|edit/([^/]++)(*:302)'
                    .'|sports/edit/([^/]++)(*:330)'
                    .'|utilisateurs/edit/(\\d+)(*:361)'
                .')'
                .'|/mo(?'
                    .'|ck/payment/([^/]++)(*:395)'
                    .'|t\\-de\\-passe\\-oublie/([^/]++)(*:432)'
                .')'
                .'|/tickets/([^/]++)(*:458)'
                .'|/offres(?'
                    .'|\\-par\\-categorie/([^/]++)(*:501)'
                    .'|/sports(?:/([^/]++))?(*:530)'
                .')'
                .'|/c(?'
                    .'|art/(?'
                        .'|add/([^/]++)(*:563)'
                        .'|remove/([^/]++)(*:586)'
                    .')'
                    .'|ommandes/mock/payment/([^/]++)(*:625)'
                .')'
                .'|/verif/([^/]++)(*:649)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        251 => [[['_route' => 'app_categories_offres_edit', '_controller' => 'App\\Controller\\Admin\\CategoriesOffresController::edit'], ['slug'], null, null, false, false, null]],
        281 => [[['_route' => 'admin_commande_scan', '_controller' => 'App\\Controller\\Admin\\CommandeScanController::scanCommande'], ['token'], null, null, false, true, null]],
        302 => [[['_route' => 'app_offres_edit', '_controller' => 'App\\Controller\\Admin\\OffresController::edit'], ['slug'], null, null, false, true, null]],
        330 => [[['_route' => 'app_sports_edit', '_controller' => 'App\\Controller\\Admin\\SportsController::edit'], ['slug'], null, null, false, true, null]],
        361 => [[['_route' => 'app_utilisateurs_edit', '_controller' => 'App\\Controller\\Admin\\UsersController::edit'], ['id'], null, null, false, true, null]],
        395 => [[['_route' => 'app_mock-payment', '_controller' => 'App\\Controller\\Admin\\MockPaymentController::pay'], ['id'], null, null, false, true, null]],
        432 => [[['_route' => 'reset_password', '_controller' => 'App\\Controller\\SecurityController::resetPassword'], ['token'], null, null, false, true, null]],
        458 => [[['_route' => 'app_tickets_show', '_controller' => 'App\\Controller\\Admin\\MockPaymentController::showTicket'], ['id'], null, null, false, true, null]],
        501 => [[['_route' => 'app_offres-par-categories', '_controller' => 'App\\Controller\\Admin\\OffresController::filterByCategorie'], ['slug'], null, null, false, true, null]],
        530 => [[['_route' => 'app_offres_filter', 'slugs' => null, '_controller' => 'App\\Controller\\Admin\\OffresController::filterBySportsSlugs'], ['slugs'], null, null, false, true, null]],
        563 => [[['_route' => 'app_cart_add', '_controller' => 'App\\Controller\\CartController::add'], ['id'], ['POST' => 0], null, false, true, null]],
        586 => [[['_route' => 'app_cart_remove', '_controller' => 'App\\Controller\\CartController::remove'], ['id'], ['POST' => 0], null, false, true, null]],
        625 => [[['_route' => 'app_commandes_paiement', '_controller' => 'App\\Controller\\CommandesController::payerCommande'], ['id'], null, null, false, true, null]],
        649 => [
            [['_route' => 'verify_user', '_controller' => 'App\\Controller\\RegistrationController::verifUser'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
