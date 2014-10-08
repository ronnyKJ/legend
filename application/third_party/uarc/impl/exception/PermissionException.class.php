<?php

/**
 * 权限异常
 */

require_once dirname( __FILE__ ) . '/UARCException.class.php';

class PermissionException extends UARCException {

    public function __construct ( $msg=null ) {
        parent::__construct( $msg );
    }

}