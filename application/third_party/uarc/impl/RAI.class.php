<?php
/**
 * RSS 资源存取接口
 */

require_once dirname( __FILE__ ) . '/base/Cooly.class.php';

require_once dirname( __FILE__ ) . '/exception/ConflictException.class.php';
require_once dirname( __FILE__ ) . '/exception/IllegalException.class.php';

class RAI {

    private $cooly = null;

    private function __construct ( $repos ) {
        $this->cooly = new Cooly( $repos );
    }

    public static function newInstance ( $repos ) {
        return new RAI( $repos );
    }

    public function createReposrity () {
        return $this->cooly->createRepository();
    }

    public function storageFile ( $resname, $localpath ) {

        $suffix = $this->getSuffix( $resname );

        $resname = '/' . md5( $resname . microtime() ) . $suffix;

        if ( $this->cooly->pushFile( $resname, $localpath ) ) {
            return $resname;
        }

        return null;

    }

    public function storageContent ( $resname, $content ) {

        $suffix = $this->getSuffix( $resname );

        $resname = '/' . md5( $resname . microtime() ) . $suffix;

        if ( $this->cooly->pushContent( $resname, $content ) ) {
            return $resname;
        }

        return null;

    }

    public function fetchContent ( $resname ) {

        return $this->cooly->pullContent( $resname );

    }

    public function fetchFile ( $resname, $localpath=null ) {

        if ( !isset( $localpath ) ) {
            $localpath = Utils::getTmpFilePath();
        } else {

            if ( file_exists( $localpath ) ) {
                throw new ConflictException( 'the local file already exists' );
            }

            if ( !is_writable( dirname( $localpath ) ) ) {
                throw new IllegalException( 'directory is not writable' );
            }

        }

        return $this->cooly->pullFile( $resname, $localpath );

    }

    private static function getSuffix ( $name ) {

        $matchs = array();

        if ( preg_match( '/\.[^\/]+$/', $name, $matchs ) ) {
            return $matchs[ 0 ];
        }

        return '';

    }

} 