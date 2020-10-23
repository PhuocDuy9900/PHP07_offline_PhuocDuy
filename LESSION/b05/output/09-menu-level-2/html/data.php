<?php
$arrMenu = [
    'index' => [
        "name"  => "Home",   "link"  => "index.php"
    ],
    'about' => [
        "name"  => "About",
        "link"  => "about.php",
        "child" => [
            'service'   => [
                "name"  => "Service",
                "link"  => "service.php",
                "child" => [
                    'sale'      => ["name" => "Sale", "link" => "sale.php"],
                    'training'  => ["name" => "Training", "link" => "training.php"]
                ]
            ],
            'company'   => [
                "name" => "Company",
                "link" => "company.php",
                "child" => [
                    'toyota' => ["name" => "Toyota", "link"   => "toyota.php"]
                ]
            ]
        ]
    ],
    'contact' => ["name" => "Contact", "link" => "contact.php"]
];

$arrBreadCrumb  = [];
foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
    $arrBreadCrumb[$keyLevelOne][]  = ['name' => $menuLevelOne['name'], 'link' => $menuLevelOne['link']];

    if (isset($menuLevelOne['child'])) {

        foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
            $arrBreadCrumb[$keyLevelTwo][]  = ['name' => $menuLevelOne['name'], 'link' => $menuLevelOne['link']];
            $arrBreadCrumb[$keyLevelTwo][]  = ['name' => $menuLevelTwo['name'], 'link' => $menuLevelTwo['link']];

            if (isset($menuLevelTwo['child'])) {

                foreach ($menuLevelTwo['child'] as $keyLevelThree => $menuLevelThree) {
                    $arrBreadCrumb[$keyLevelThree][]  = ['name' => $menuLevelOne['name'], 'link' => $menuLevelOne['link']];
                    $arrBreadCrumb[$keyLevelThree][]  = ['name' => $menuLevelTwo['name'], 'link' => $menuLevelTwo['link']];
                    $arrBreadCrumb[$keyLevelThree][]  = ['name' => $menuLevelThree['name'], 'link' => $menuLevelThree['link']];
                }
            }
        }
    }
}

$menuCurrent    = basename($_SERVER['PHP_SELF'], ".php");
