<?php
/*!
 * 发生非法操作时抛出的异常
 */

require_once dirname( __FILE__ ) . '/UARCException.class.php';

class IllegalException extends UARCException {

    public function __construct ( $msg=null ) {
        parent::__construct( $msg );
    }

}