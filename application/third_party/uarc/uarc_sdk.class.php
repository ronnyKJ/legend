<?php
/**
 * SDK接口
 */
require_once dirname( __FILE__ ) . '/impl/exception/SDKException.class.php';
require_once dirname( __FILE__ ) . '/impl/agent.class.php';

class UARC_SDK {

    const ACL_R = 4;
    const ACL_W = 2;
    const ACL_X = 1;
    const ACL_RW = 6;
    const ACL_RX = 5;
    const ACL_WX = 3;
    const ACL_RWX = 7;

    private $agent = null;

    private function __construct () {
        $this->agent = new Agent();
    }

    public static function newInstance () {
        return new UARC_SDK();
    }

    public function __call ( $methodName, array $arguments ) {
        if ( is_callable( array ( $this->agent, $methodName ) ) ) {
            return call_user_func_array( array (
                $this->agent, $methodName
            ), $arguments );
        } else {
            throw new SDKException( 'API not found: ' . $methodName );
        }
    }

}