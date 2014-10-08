<?php
/**
 * 获取的数据不存在时抛出的异常
 */

require_once dirname( __FILE__ ) . '/UARCException.class.php';

class NotFoundException extends UARCException {

    public function __construct ( $msg = null ) {

        parent::__construct( $msg );

    }

}