<?php
/*!
 * 参数无效或不合法时抛出的异常
 */

require_once dirname( __FILE__ ) . '/UARCException.class.php';

class PropertyException extends UARCException {

    public function __construct ( $msg = null ) {
        parent::__construct( $msg );
    }

}