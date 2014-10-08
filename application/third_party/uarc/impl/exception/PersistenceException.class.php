<?php
/*!
 * 持久化时发生的异常
 */

require_once dirname( __FILE__ ) . '/UARCException.class.php';

class PersistenceException extends UARCException {}