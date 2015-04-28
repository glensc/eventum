<?php

class adLDAPTest extends PHPUnit_Framework_TestCase
{

    public function testAdLdap()
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
        $config = array(
            'binddn' => $setup['binddn'],
            'bindpw' => $setup['bindpw'],
            'basedn' => $setup['basedn'],
            'host' => $setup['host'],
            'port' => $setup['port'],
        );
        $options = array(
            //            account_suffix
            'base_dn' => $setup['basedn'],
            'domain_controllers' => array($setup['host']),
            'admin_username' => $setup['binddn'],
            'admin_password' => $setup['bindpw'],
            // real_primarygroup
            // use_ssl
            // use_tls
            // recursive_groups
            'ad_port' => $setup['port'],
            // sso
        );
        $conn = new adLDAP\adLDAP($options);
        $adldapUtils = new \adLDAP\classes\adLDAPUtils($conn);

        /** @var \adLDAP\classes\adLDAPUsers $user */
        $user = $conn->user();
        $search = '';
        if ($search) {
            $res = $user->all(false, $search);

        } else {
            $res = $user->all();
        }
        echo $res;
    }
}
