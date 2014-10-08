<?php
/**
 * 请求执行者
 */

require_once dirname( __FILE__) . '/../impl/exception/ConflictException.class.php';
require_once dirname( __FILE__) . '/../impl/exception/IllegalException.class.php';
require_once dirname( __FILE__) . '/../impl/exception/InvalidParameterException.class.php';
require_once dirname( __FILE__) . '/../impl/exception/NotFoundException.class.php';
require_once dirname( __FILE__) . '/../impl/exception/PermissionException.class.php';
require_once dirname( __FILE__) . '/../impl/exception/PersistenceException.class.php';
require_once dirname( __FILE__) . '/../impl/exception/PropertyException.class.php';
require_once dirname( __FILE__) . '/../impl/exception/StorageException.class.php';
require_once dirname( __FILE__) . '/../impl/exception/UARCException.class.php';
require_once dirname( __FILE__) . '/../impl/exception/ForbiddenException.class.php';

require_once dirname( __FILE__) . '/../lib/vendor/autoload.php';

class Request {

    const SUCCESS = 'success';
    const EXCEPTION = 'exception';

    const GET = 'get';
    const POST = 'post';
    const PUT = 'put';
    const DELETE = 'delete';

    private $service = null;
    private $ak = null;
    private $sk = null;

    public function __construct ( $service, $ak, $sk ) {
        $this->service = $service;
        $this->ak = $ak;
        $this->sk = $sk;
    }

    public function get ( $route, Array $params=null ) {

        $url = $this->service . '/' . $route;
        $queryString = isset( $params ) ? http_build_query( $params ) : null;

        if ( !is_null( $queryString ) ) {
            $url .= '?' . $queryString;
        }

        $response = \Httpful\Request::get( $url )->addHeaders( array (
            'ak' => $this->ak,
            'sk' => $this->sk
        ) )->send();

        return $this->process( $response );

    }

    public function post ( $route, Array $params=null ) {

        return $this->request( self::POST, $route, $params );

    }

    public function put ( $route, Array $params=null ) {

        return $this->request( self::PUT, $route, $params );

    }

    public function delete ( $route, Array $params=null ) {

        return $this->request( self::DELETE, $route, $params );

    }

    private function request ( $method, $route, $params=null ) {

        $url = $this->service . '/' . $route;
        $queryString = isset( $params ) ? http_build_query( $params ) : null;

        $response = \Httpful\Request::$method( $url )->addHeaders( array (
            'ak' => $this->ak,
            'sk' => $this->sk
        ) )->body( $queryString )->sendIt();

        return $this->process( $response );

    }

    private function process ( $response ) {

        if ( !$response->hasErrors() ) {

            $body = $response->body;
            $result = $body[ 'result' ];

            if ( $body[ 'state' ] === self::SUCCESS ) {

                return $result;

            } else {

                $exception = $result[ 'name' ];
                $messag = $result[ 'message' ];

                throw new $exception( $messag );

            }

        } else if ( $response->code == 403 ) {

            throw new ForbiddenException( $response->raw_body );

        } else {
            throw new Exception( $response->body );
        }

    }

}