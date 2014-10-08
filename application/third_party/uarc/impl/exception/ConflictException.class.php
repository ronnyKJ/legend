<?php
/**
 * 发生冲突时抛出的异常
 */

require_once dirname( __FILE__ ) . '/UARCException.class.php';

class ConflictException extends UARCException {}