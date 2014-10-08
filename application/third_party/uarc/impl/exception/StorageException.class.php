<?php
/*!
 * 存储资源文件时发生的异常
 */

require_once dirname( __FILE__ ) . '/UARCException.class.php';

class StorageException extends UARCException {

    public function __construct ( $msg=null ) {
        parent::__construct( $msg );
    }

}