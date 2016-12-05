<?php

/**
* Quota Class
**/

abstract class Quota extends DatabaseObject {
 abstract protected $name;
 abstract protected $quota_type;
}
