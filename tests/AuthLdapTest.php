<?php

class AuthLdapTest extends PHPUnit_Framework_TestCase
{
    /** @var LDAP_Auth_Backend */
    static $ldap;

    public static function setupBeforeClass() {
        if (getenv('TRAVIS')) {
            self::markTestSkipped('Skip LDAP test on Travis');
        }

        self::$ldap = new LDAP_Auth_Backend();
    }

    public function testLdapSearch()
    {
        $search = self::$ldap->getUserListing();
        foreach ($search as $entry) {
            $uid = $entry['uid'][0];
            $dn = $entry['dn'];

            // if no email, skip completely
            $emails = isset($entry['mail']) ? $entry['mail'] : null;
            if (!$emails) {
                echo "skip (no email): $uid, $dn\n";
                continue;
            }
            echo "user: $uid, $dn\n";
        }
    }

    public function testAll()
    {
        $login = '';
        $password = '';
        $usr_id = 1;
        self::$ldap->verifyPassword($login, $password);
        self::$ldap->updatePassword($usr_id, $password);
        self::$ldap->getUserIDByLogin($login);
        self::$ldap->canUserUpdateName($usr_id);
        self::$ldap->canUserUpdateEmail($usr_id);
        self::$ldap->canUserUpdatePassword($usr_id);
        self::$ldap->incrementFailedLogins($usr_id);
        self::$ldap->resetFailedLogins($usr_id);
        self::$ldap->isUserBackOffLocked($usr_id);
    }

    public function testZf2Ldap()
    {
        $setup = array(
            'host' => 'localhost',
            'port' => '389',
            'binddn' => '',
            'bindpw' => '',
            'basedn' => 'dc=delfi,dc=net',
            'userdn' => 'uid=%UID%,ou=People,dc=delfi,dc=net',
            'customer_id_attribute' => '',
            'contact_id_attribute' => '',
            'create_users' => '1',
            'default_role' =>
                array(
                    1 => '2',
                ),
            'user_filter' => '(&(objectClass=eapsPerson)(!(uid=*$)))',
        );


        $options = array(
            'host' => $setup['host'],
            'port' => $setup['port'],
//            'useSsl' => false,
            'username' => $setup['binddn'],
            'password' => $setup['bindpw'],
//            'bindRequiresDn' => false,
            'baseDn' => $setup['basedn'],
//            'accountCanonicalForm' => null,
//            'accountDomainName' => null,
//            'accountDomainNameShort' => null,
//            'accountFilterFormat' => null,
//            'allowEmptyPassword' => false,
//            'useStartTls' => false,
//            'optReferrals' => false,
//            'tryUsernameSplit' => true,
//            'networkTimeout' => null,
        );
        $conn = new \Zend\Ldap\Ldap($options);
    }
}
