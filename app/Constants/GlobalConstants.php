<?php


namespace App\Constants;


class GlobalConstants {
    const PER_PAGE_LIMIT = 6;
    const USER_TYPE_FRONTEND = "frontend";
    const USER_TYPE_BACKEND = "backend";

    const ALL = 'Tout';

    const LIST_TYPE = [self::USER_TYPE_FRONTEND, self::USER_TYPE_BACKEND];

    const LIST_COUNTRIES = ["Canada", "Uganda", "Malaysia", "Finland", "Spain", "Norway"];

    const FRAMEWORK = ['Laravel', 'Symfony', 'React', 'VueJs', 'Django'];


}
