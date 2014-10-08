<?php
/**
 * 通用工具包
 */

class Utils {

    /**
     * 根据传递进来的名称字符串，获取该名称对应的后缀名
     * @param $name 要处理的名称字符串
     * @return 返回该名称的后缀，如果没有后缀，则返回null
     */
    public static function getSuffix ( $name ) {

        $matchs = array();

        if ( preg_match( '/\\.[^\\\\]+$/', $name, $matchs ) ) {
            return $matchs[ 0 ];
        }

        return null;

    }

    /**
     * 获取一个临时文件的路径，该路径所指向的文件已经创建
     * @return string 系统中临时目录下的文件路径
     */
    public static function getTmpFile () {

        return tempnam( sys_get_temp_dir(), null );

    }

    /**
     * 类同getTmpFile()方法，但是该方法仅返回路径， 不创建与该路径对应的文件
     */
    public static function getTmpFilePath () {

        $tmpdir = sys_get_temp_dir();
        $filename = $tmpdir . '/' . self::getRandomKey();

        while ( file_exists( $filename ) ) {
            $filename = $tmpdir . '/' . self::getRandomKey();
        }

        return str_replace( "//", "/", $filename );

    }

    public static function format ( $path ) {

        $path = preg_replace( '/\/+/', '/', trim( $path ) );

        if ( strlen( $path ) === 1 ) {
            return $path;
        }

        return preg_replace( '/\/$/', '', $path );

    }

    public static function validatePath ( $path ) {

        if ( strpos( $path, '/') !== 0 ) {
            throw new InvalidParameterException( 'invalid path' );
        }

        return true;

    }

    /*----------------------------------- private --------------- */

    private static function getRandomKey () {

        return substr( md5( microtime() ), 0, 6 );

    }

}