<?php
/**
 * 用户和资源控制系统
 * 访问代理器
 */

require_once dirname( __FILE__ ) . '/Request.class.php';
require_once dirname( __FILE__ ) . '/RAI.class.php';

class Agent {

    const REGISTER_THIRD = 1;
    const REGISTER_LOCAL = 2;

    const AUTH_STATE_DISABLE = 0;
    const AUTH_STATE_ENABLE = 1;

    private $request = null;
    private $rai = null;

    public function __construct () {

        $config = require dirname( __FILE__ ) . '/../config/config.php';

        if ( !isset( $config[ 'service' ], $config[ 'ak' ], $config[ 'sk' ] ) ) {
            throw new Exception( 'config error' );
        }

        $this->request = new Request( $config[ 'service' ], $config[ 'ak' ], $config[ 'sk' ] );
        $this->rai = RAI::newInstance( $config[ 'ak' ] );
    }

    public function register ( $thirdkey, $loginType ) {

        if ( is_integer( $loginType ) ) {
            $type = self::REGISTER_THIRD;
        } else {
            $type = self::REGISTER_LOCAL;
        }

        return $this->request->post( 'auth', array (
            'type' => $type,
            'username' => $thirdkey,
            'password' => $loginType
        ) );

    }

    public function authenticate ( $username, $password ) {

        if ( is_integer( $password ) ) {
            $type = self::REGISTER_THIRD;
        } else {
            $type = self::REGISTER_LOCAL;
        }

        return $this->request->get( 'auth', array (
            'type' => $type,
            'username' => $username,
            'password' => $password
        ) );

    }

    public function disable ( $userid ) {

        return $this->request->put( 'auth/state', array (
            'userid' => $userid,
            'state' => self::AUTH_STATE_DISABLE
        ) );

    }

    public function enable ( $userid ) {

        return $this->request->put( 'auth/state', array (
            'userid' => $userid,
            'state' => self::AUTH_STATE_ENABLE
        ) );

    }

    public function isDisabled ( $userid ) {

        return $this->request->get( 'auth/state', array (
            'userid' => $userid
        ) );

    }

    public function existsAuth ( $userid ) {

        return $this->request->get( 'auth/availability', array (
            'userid' => $userid
        ) );

    }

    public function setInfo ( $userid, $key, $val=null ) {

        $params = array(
            'userid' => $userid,
            'key' => $key
        );

        if ( isset( $val ) ) {
            $params[ 'val' ] = $val;
        }

        return $this->request->post( 'user/info', $params );

    }

    public function getInfo ( $userid, $key=null ) {

        $params = array(
            'userid' => $userid
        );

        if ( isset( $key ) ) {
            $params[ 'key' ] = $key;
        }

        return $this->request->get( 'user/info', $params );

    }

    public function existsUser ( $userid ) {

        return $this->request->get( 'user/info/availability', array (
            'userid' => $userid
        ) );

    }

    public function existsNickname ( $nickname ) {

        return $this->request->get( 'user/nickname/availability', array (
            'nickname' => $nickname
        ) );

    }

    public function createGroup ( $userid, $groupname, $default=false ) {
        return $this->request->post( 'group', array (
            'userid' => $userid,
            'groupname' => $groupname,
            'default' => $default
        ) );
    }

    public function getGroupList ( $userid ) {
        return $this->request->get( 'group/list', array (
            'userid' => $userid
        ) );
    }

    public function changeGroupName ( $userid, $groupid, $groupname ) {
        return $this->request->put( 'group', array (
            'userid' => $userid,
            'groupid' => $groupid,
            'groupname' => $groupname
        ) );
    }

    public function getGroupInfo ( $groupid ) {
        return $this->request->get( 'group', array (
            'groupid' => $groupid
        ) );
    }

    public function existsDefaultGroup ( $userid ) {

        return $this->request->get( 'group/default', array (
            'userid' => $userid
        ) );

    }

    public function isGroupOwner ( $userid, $groupid ) {

        return $this->request->get( 'group/owner', array (
            'userid' => $userid,
            'groupid' => $groupid
        ) );

    }

    public function deleteGroup ( $userid, $groupid ) {

        return $this->request->delete( 'group', array (
            'userid' => $userid,
            'groupid' => $groupid
        ) );

    }

    public function addFriend ( $userid, $groupid, $friendid ) {

        return $this->request->post( 'friend', array (
            'userid' => $userid,
            'groupid' => $groupid,
            'friendid' => $friendid
        ) );

    }

    public function getFriends ( $userid, $groupid ) {

        return $this->request->get( 'friend', array (
            'userid' => $userid,
            'groupid' => $groupid
        ) );

    }

    public function addFriends ( $userid, $groupid, $friendids ) {

        return $this->request->post( 'friend', array (
            'userid' => $userid,
            'groupid' => $groupid,
            'friendid' => $friendids
        ) );

    }

    public function removeFriend ( $userid, $groupid, $friendid ) {

        return $this->request->delete( 'friend', array (
            'userid' => $userid,
            'groupid' => $groupid,
            'friendid' => $friendid
        ) );

    }

    public function removeFriends ( $userid, $groupid, $friendids ) {

        return $this->request->delete( 'friend', array (
            'userid' => $userid,
            'groupid' => $groupid,
            'friendid' => $friendids
        ) );

    }

    public function isFriend ( $userid, $friendid ) {

        return $this->request->get( 'friend/availability', array (
            'userid' => $userid,
            'friendid' => $friendid
        ) );

    }

    public function mkdir ( $path, $owner, $parents=false ) {

        return $this->request->post( 'dir', array (
            'path' => $path,
            'owner' => $owner,
            'parents' => $parents
        ) );

    }

    public function touch ( $path, $owner ) {

        return $this->request->post( 'file', array (
            'path' => $path,
            'owner' => $owner
        ) );

    }

    public function existsPath ( $path, $owner ) {

        return $this->request->get( 'path/availability', array (
            'path' => $path,
            'owner' => $owner
        ) );

    }

    public function isFile ( $path, $owner ) {

        return $this->request->get( 'path/type', array (
            'path' => $path,
            'type' => 'file',
            'owner' => $owner
        ) );

    }

    public function isDir ( $path, $owner ) {

        return $this->request->get( 'path/type', array (
            'path' => $path,
            'type' => 'dir',
            'owner' => $owner
        ) );

    }

    public function ls ( $path, $owner, Array $opt=null ) {

        $params = array (
            'path' => $path,
            'owner' => $owner
        );

        if ( isset( $opt ) ) {
            $params[ 'opt' ] = $opt;
        }

        return $this->request->get( 'dir', $params );

    }

    public function mv ( $source, $target, $owner ) {

        return $this->request->put( 'path', array (
            'source' => $source,
            'target' => $target,
            'owner' => $owner
        ) );

    }

    public function rm ( $path, $owner, $force=false ) {

        return $this->request->delete( 'path', array (
            'path' => $path,
            'owner' => $owner,
            'force' => $force
        ) );

    }

    public function canRead ( $fileid, $userid ) {

        return $this->request->get( 'path/acl', array (
            'type' => 'read',
            'fileid' => $fileid,
            'userid' => $userid
        ) );

    }

    public function canWrite ( $fileid, $userid ) {

        return $this->request->get( 'path/acl', array (
            'type' => 'write',
            'fileid' => $fileid,
            'userid' => $userid
        ) );

    }

    public function canExecute ( $fileid, $userid ) {

        return $this->request->get( 'path/acl', array (
            'type' => 'execute',
            'fileid' => $fileid,
            'userid' => $userid
        ) );

    }

    public function hasPermission ( $fileid, $userid, $permission ) {

        return $this->request->get( 'path/acl', array (
            'type' => 'has',
            'fileid' => $fileid,
            'userid' => $userid,
            'permission' => $permission
        ) );

    }

    public function setPermission ( $fileid, $opUserid, $userid, $permission ) {

        return $this->request->post( 'path/acl', array (
            'fileid' => $fileid,
            'opid' => $opUserid,
            'userid' => $userid,
            'permission' => $permission
        ) );

    }

    public function clearPermission ( $fileid, $opUserid, $userid ) {

        return $this->request->delete( 'path/acl', array (
            'fileid' => $fileid,
            'opid' => $opUserid,
            'userid' => $userid
        ) );

    }

    public function addPermission ( $fileid, $opUserid, $userid, $permission ) {

        return $this->request->put( 'path/acl', array (
            'type' => 'add',
            'fileid' => $fileid,
            'opid' => $opUserid,
            'userid' => $userid,
            'permission' => $permission
        ) );

    }

    public function removePermission ( $fileid, $opUserid, $userid, $permission ) {

        return $this->request->put( 'path/acl', array (
            'type' => 'remove',
            'fileid' => $fileid,
            'opid' => $opUserid,
            'userid' => $userid,
            'permission' => $permission
        ) );

    }

    public function write ( $opUserid, $owner, $filepath, $content ) {

        $resname = $this->rai->storageContent( $filepath, $content );

        return $this->request->post( 'resource', array (
            'opid' => $opUserid,
            'owner' => $owner,
            'filepath' => $filepath,
            'resname' => $resname
        ) );

    }

    public function writeByFile ( $opUserid, $owner, $filepath, $localpath ) {

        $resname = $this->rai->storageFile( $filepath, $localpath );

        return $this->request->post( 'resource', array (
            'opid' => $opUserid,
            'owner' => $owner,
            'filepath' => $filepath,
            'resname' => $resname
        ) );

    }

    public function read ( $opUserid, $owner, $filepath ) {

        $resname = $this->request->get( 'resource', array (
            'opid' => $opUserid,
            'owner' => $owner,
            'filepath' => $filepath
        ) );

        if ( is_null( $resname ) ) {
            return null;
        }

        return $this->rai->fetchContent( $resname );

    }

    public function readFile ( $opUserid, $owner, $filepath, $localpath=null ) {

        $resname = $this->request->get( 'resource', array (
            'opid' => $opUserid,
            'owner' => $owner,
            'filepath' => $filepath
        ) );

        if ( is_null( $resname ) ) {
            return null;
        }

        return $this->rai->fetchFile( $resname, $localpath );

    }

}