<?php
/**
 * 资源存取器
 */

require_once dirname( __FILE__ ) . '/../../lib/bcs/bcs.class.php';

require_once dirname( __FILE__ ) . '/../exception/StorageException.class.php';

function logger ( $msg = null ) {}

class Cooly {

    private $bcs = null;
    private $repos = null;
    private $opt = null;

    public function __construct ( $repos ) {
        $this->repos = $repos;
        $this->opt = array(
            BaiduBCS::IMPORT_BCS_LOG_METHOD => "logger"
        );
        $config = require dirname( __FILE__ ) . '/rss.conf.php';
        $this->bcs = new BaiduBCS( $config[ 'ak' ], $config[ 'sk' ], $config[ 'host' ] );
    }

    public function createRepository () {

        try {
            $result = $this->bcs->create_bucket( $this->repos, BaiduBCS::BCS_SDK_ACL_TYPE_PRIVATE, $this->opt );
        } catch ( BCS_Exception $e ) {
            throw new StorageException( $e->getMessage() );
        }

        if ( $result->isOK() ) {
            return true;
        }

        throw new StorageException( $result->body );

    }

    public function pushContent ( $resname, $content ) {

        try {

            $result = $this->bcs->create_object_by_content( $this->repos, $resname, $content, $this->opt );

        } catch ( BCS_Exception $e ) {
            throw new StorageException( $e->getMessage() );
        }

        if ( $result->isOK() ) {
            return true;
        }

        throw new StorageException( $result->body );

    }

    /**
     * 把filepath指向的文件上传到仓库中，存储的名字由resname参数指定
     * @param $resname
     * @param $filepath
     * @return 上传是否成功
     * @throws StorageException 如果上传过程中出现错误，则抛出该异常
     */
    public function pushFile ( $resname, $filepath ) {

        if ( !is_readable( $filepath ) ) {
            throw new StorageException( 'cannot read file: ' . $filepath );
        }

        try {

            $result = $this->bcs->create_object( $this->repos, $resname, $filepath, $this->opt );

        } catch ( BCS_Exception $e ) {
            throw new StorageException( $e->getMessage() );
        }

        if ( $result->isOK() ) {
            return true;
        }

        throw new StorageException( $result->body );

    }

    public function pullContent ( $resname ) {

        try {

            $result = $this->bcs->get_object( $this->repos, $resname, $this->opt );

        } catch ( BCS_Exception $e ) {
            throw new StorageException( $e->getMessage() );
        }

        if ( $result->isOK() ) {
            return $result->body;
        }

        throw new StorageException( $result->body );

    }

    public function pullFile ( $resname, $localpath ) {

        try {

            $opt = $this->opt;

            $opt[ 'fileWriteTo' ] = $localpath;

            $result = $this->bcs->get_object( $this->repos, $resname, $opt );

        } catch ( BCS_Exception $e ) {
            throw new StorageException( $e->getMessage() );
        }

        if ( $result->isOK() ) {
            return $localpath;
        }

        throw new StorageException( $result->body );

    }

}