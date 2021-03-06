<?php
/**
 * ExampleAuthenticatorImpl.php
 *
 * @package MCFileManager.filesystems
 * @author Moxiecode
 * @copyright Copyright � 2005, Moxiecode Systems AB, All rights reserved.
 *
 * This is a example file of how to implement a custom authenticator.
 */

/**
 * This class is a session authenticator implementation, this implementation will check for session keys defined by the
 * config options "authenticator.session.logged_in_key, authenticator.session.groups_key".
 *
 * @package MCFileManager.Authenticators
 */
class ExampleAuthenticatorImpl extends BaseAuthenticator {
    /**#@+
	 * @access private
	 */

	var $_loggedInKey;
	var $_groupsKey;

    /**#@+
	 * @access public
	 */

	/**
	 * Main constructor.
	 */
	function ExampleAuthenticatorImpl() {
	}

	/**
	 * Initializes the authenicator.
	 *
	 * @param Array $config Name/Value collection of config items.
	 */
	function init(&$config) {
		// You may change various configuration options here
		// $config['somekey'] = 'somevalue';

		// Setup session keys
		$this->_loggedInKey = $config['authenticator.session.logged_in_key'];
		$this->_groupsKey = $config['authenticator.session.groups_key'];
	}

	/**
	 * Returns a array with group names that the user is bound to.
	 *
	 * @return Array with group names that the user is bound to.
	 */
	function getGroups() {
		return isset($_SESSION[$this->_groupsKey]) ? $_SESSION[$this->_groupsKey] : "";
	}

	/**
	 * Returns true/false if the user is logged in or not.
	 *
	 * @return bool true/false if the user is logged in or not.
	 */
	function isLoggedin() {
		return isset($_SESSION[$this->_loggedInKey]) && checkBool($_SESSION[$this->_loggedInKey]);
	}

	/**#@-*/
}

?>