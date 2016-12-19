<?php

/**
 * @Author: mikegani
 * @Date:   2016-03-21 16:06:12
 * @Last Modified by:   mikegani
 * @Last Modified time: 2016-12-14 15:17:47
 */
define("MASTER_DB_NAME", getenv("DB_NAME"));
define("ARTICLE_DB_NAME", getenv("DB_ARTICLE_NAME"));

define("SQL_SELECT", 1);
define("SQL_UPDATE", 2);
define("SQL_DELETE", 3);