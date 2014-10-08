<?php
/*!
 * 服务器认知失败时的异常
 */

require_once dirname( __FILE__ ) . '/SDKException.class.php';

class ForbiddenException extends SDKException {}