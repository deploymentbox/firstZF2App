<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter as DbAdapter;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $db = new DbAdapter(
            array(
                'driver'        => 'Pdo',
                'dsn'            => 'mysql:dbname=zf2;host=db',
                'username'       => 'root',
                'password'       => 'mysqlroot',
            )
        );
        $sql = 'select * from Customers';
        $customers = $db->createStatement($sql)->execute();

        return new ViewModel(['customers' => $customers]);
    }
}
