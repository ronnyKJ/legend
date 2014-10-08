<?php
/*!
 * 参数无效或不合法时抛出的异常
 */

require_once dirname( __FILE__ ) . '/UARCException.class.php';

class InvalidParameterException extends UARCException {

    public function __construct ( $msg=null ) {

        if ( !isset( $msg ) ) {
            $msg = "Parameter is invalid";
        }

        parent::__construct( $msg );

    }

}