<?php
$config['config_api'] = [];

defined('COURSE_ENROLMENT_DIRECT') or define ('COURSE_ENROLMENT_DIRECT', 1);
defined('COURSE_ENROLMENT_BATCH') or define ('COURSE_ENROLMENT_BATCH', 2);

defined('COURSE_STATUS_ALL') or define('COURSE_STATUS_ALL', -1);
defined('COURSE_STATUS_INACTIVE') or define('COURSE_STATUS_INACTIVE', 0);
defined('COURSE_STATUS_ACTIVE') or define('COURSE_STATUS_ACTIVE', 1);
defined('COURSE_STATUS_TRASH') or define('COURSE_STATUS_TRASH', 2);

defined('TEST_TYPE_REGULAR') or define ('TEST_TYPE_REGULAR', 1);
defined('TEST_TYPE_PRACTICE') or define ('TEST_TYPE_PRACTICE', 2);
defined('TEST_TYPE_PUBLIC') or define ('TEST_TYPE_PUBLIC',	3);