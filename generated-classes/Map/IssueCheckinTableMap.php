<?php

namespace Map;

use \IssueCheckin;
use \IssueCheckinQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'eventum_issue_checkin' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class IssueCheckinTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.IssueCheckinTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'eventum';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'eventum_issue_checkin';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\IssueCheckin';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'IssueCheckin';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the isc_id field
     */
    const COL_ISC_ID = 'eventum_issue_checkin.isc_id';

    /**
     * the column name for the isc_iss_id field
     */
    const COL_ISC_ISS_ID = 'eventum_issue_checkin.isc_iss_id';

    /**
     * the column name for the isc_commitid field
     */
    const COL_ISC_COMMITID = 'eventum_issue_checkin.isc_commitid';

    /**
     * the column name for the isc_reponame field
     */
    const COL_ISC_REPONAME = 'eventum_issue_checkin.isc_reponame';

    /**
     * the column name for the isc_module field
     */
    const COL_ISC_MODULE = 'eventum_issue_checkin.isc_module';

    /**
     * the column name for the isc_filename field
     */
    const COL_ISC_FILENAME = 'eventum_issue_checkin.isc_filename';

    /**
     * the column name for the isc_old_version field
     */
    const COL_ISC_OLD_VERSION = 'eventum_issue_checkin.isc_old_version';

    /**
     * the column name for the isc_new_version field
     */
    const COL_ISC_NEW_VERSION = 'eventum_issue_checkin.isc_new_version';

    /**
     * the column name for the isc_created_date field
     */
    const COL_ISC_CREATED_DATE = 'eventum_issue_checkin.isc_created_date';

    /**
     * the column name for the isc_username field
     */
    const COL_ISC_USERNAME = 'eventum_issue_checkin.isc_username';

    /**
     * the column name for the isc_commit_msg field
     */
    const COL_ISC_COMMIT_MSG = 'eventum_issue_checkin.isc_commit_msg';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'IssueId', 'CommitId', 'Reponame', 'Module', 'Filename', 'OldVersion', 'NewVersion', 'CreatedDate', 'Username', 'CommitMsg', ),
        self::TYPE_CAMELNAME     => array('id', 'issueId', 'commitId', 'reponame', 'module', 'filename', 'oldVersion', 'newVersion', 'createdDate', 'username', 'commitMsg', ),
        self::TYPE_COLNAME       => array(IssueCheckinTableMap::COL_ISC_ID, IssueCheckinTableMap::COL_ISC_ISS_ID, IssueCheckinTableMap::COL_ISC_COMMITID, IssueCheckinTableMap::COL_ISC_REPONAME, IssueCheckinTableMap::COL_ISC_MODULE, IssueCheckinTableMap::COL_ISC_FILENAME, IssueCheckinTableMap::COL_ISC_OLD_VERSION, IssueCheckinTableMap::COL_ISC_NEW_VERSION, IssueCheckinTableMap::COL_ISC_CREATED_DATE, IssueCheckinTableMap::COL_ISC_USERNAME, IssueCheckinTableMap::COL_ISC_COMMIT_MSG, ),
        self::TYPE_FIELDNAME     => array('isc_id', 'isc_iss_id', 'isc_commitid', 'isc_reponame', 'isc_module', 'isc_filename', 'isc_old_version', 'isc_new_version', 'isc_created_date', 'isc_username', 'isc_commit_msg', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'IssueId' => 1, 'CommitId' => 2, 'Reponame' => 3, 'Module' => 4, 'Filename' => 5, 'OldVersion' => 6, 'NewVersion' => 7, 'CreatedDate' => 8, 'Username' => 9, 'CommitMsg' => 10, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'issueId' => 1, 'commitId' => 2, 'reponame' => 3, 'module' => 4, 'filename' => 5, 'oldVersion' => 6, 'newVersion' => 7, 'createdDate' => 8, 'username' => 9, 'commitMsg' => 10, ),
        self::TYPE_COLNAME       => array(IssueCheckinTableMap::COL_ISC_ID => 0, IssueCheckinTableMap::COL_ISC_ISS_ID => 1, IssueCheckinTableMap::COL_ISC_COMMITID => 2, IssueCheckinTableMap::COL_ISC_REPONAME => 3, IssueCheckinTableMap::COL_ISC_MODULE => 4, IssueCheckinTableMap::COL_ISC_FILENAME => 5, IssueCheckinTableMap::COL_ISC_OLD_VERSION => 6, IssueCheckinTableMap::COL_ISC_NEW_VERSION => 7, IssueCheckinTableMap::COL_ISC_CREATED_DATE => 8, IssueCheckinTableMap::COL_ISC_USERNAME => 9, IssueCheckinTableMap::COL_ISC_COMMIT_MSG => 10, ),
        self::TYPE_FIELDNAME     => array('isc_id' => 0, 'isc_iss_id' => 1, 'isc_commitid' => 2, 'isc_reponame' => 3, 'isc_module' => 4, 'isc_filename' => 5, 'isc_old_version' => 6, 'isc_new_version' => 7, 'isc_created_date' => 8, 'isc_username' => 9, 'isc_commit_msg' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('eventum_issue_checkin');
        $this->setPhpName('IssueCheckin');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\IssueCheckin');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('isc_id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('isc_iss_id', 'IssueId', 'INTEGER', true, 10, 0);
        $this->addColumn('isc_commitid', 'CommitId', 'VARCHAR', false, 40, null);
        $this->addColumn('isc_reponame', 'Reponame', 'VARCHAR', true, 255, 'default');
        $this->addColumn('isc_module', 'Module', 'VARCHAR', true, 255, '');
        $this->addColumn('isc_filename', 'Filename', 'VARCHAR', true, 255, '');
        $this->addColumn('isc_old_version', 'OldVersion', 'VARCHAR', false, 40, null);
        $this->addColumn('isc_new_version', 'NewVersion', 'VARCHAR', false, 40, null);
        $this->addColumn('isc_created_date', 'CreatedDate', 'TIMESTAMP', true, null, '0000-00-00 00:00:00');
        $this->addColumn('isc_username', 'Username', 'VARCHAR', true, 32, '');
        $this->addColumn('isc_commit_msg', 'CommitMsg', 'LONGVARCHAR', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? IssueCheckinTableMap::CLASS_DEFAULT : IssueCheckinTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (IssueCheckin object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = IssueCheckinTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = IssueCheckinTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + IssueCheckinTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = IssueCheckinTableMap::OM_CLASS;
            /** @var IssueCheckin $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            IssueCheckinTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = IssueCheckinTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = IssueCheckinTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var IssueCheckin $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                IssueCheckinTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(IssueCheckinTableMap::COL_ISC_ID);
            $criteria->addSelectColumn(IssueCheckinTableMap::COL_ISC_ISS_ID);
            $criteria->addSelectColumn(IssueCheckinTableMap::COL_ISC_COMMITID);
            $criteria->addSelectColumn(IssueCheckinTableMap::COL_ISC_REPONAME);
            $criteria->addSelectColumn(IssueCheckinTableMap::COL_ISC_MODULE);
            $criteria->addSelectColumn(IssueCheckinTableMap::COL_ISC_FILENAME);
            $criteria->addSelectColumn(IssueCheckinTableMap::COL_ISC_OLD_VERSION);
            $criteria->addSelectColumn(IssueCheckinTableMap::COL_ISC_NEW_VERSION);
            $criteria->addSelectColumn(IssueCheckinTableMap::COL_ISC_CREATED_DATE);
            $criteria->addSelectColumn(IssueCheckinTableMap::COL_ISC_USERNAME);
            $criteria->addSelectColumn(IssueCheckinTableMap::COL_ISC_COMMIT_MSG);
        } else {
            $criteria->addSelectColumn($alias . '.isc_id');
            $criteria->addSelectColumn($alias . '.isc_iss_id');
            $criteria->addSelectColumn($alias . '.isc_commitid');
            $criteria->addSelectColumn($alias . '.isc_reponame');
            $criteria->addSelectColumn($alias . '.isc_module');
            $criteria->addSelectColumn($alias . '.isc_filename');
            $criteria->addSelectColumn($alias . '.isc_old_version');
            $criteria->addSelectColumn($alias . '.isc_new_version');
            $criteria->addSelectColumn($alias . '.isc_created_date');
            $criteria->addSelectColumn($alias . '.isc_username');
            $criteria->addSelectColumn($alias . '.isc_commit_msg');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(IssueCheckinTableMap::DATABASE_NAME)->getTable(IssueCheckinTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(IssueCheckinTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(IssueCheckinTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new IssueCheckinTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a IssueCheckin or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or IssueCheckin object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(IssueCheckinTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \IssueCheckin) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(IssueCheckinTableMap::DATABASE_NAME);
            $criteria->add(IssueCheckinTableMap::COL_ISC_ID, (array) $values, Criteria::IN);
        }

        $query = IssueCheckinQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            IssueCheckinTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                IssueCheckinTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the eventum_issue_checkin table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return IssueCheckinQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a IssueCheckin or Criteria object.
     *
     * @param mixed               $criteria Criteria or IssueCheckin object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(IssueCheckinTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from IssueCheckin object
        }

        if ($criteria->containsKey(IssueCheckinTableMap::COL_ISC_ID) && $criteria->keyContainsValue(IssueCheckinTableMap::COL_ISC_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.IssueCheckinTableMap::COL_ISC_ID.')');
        }


        // Set the correct dbName
        $query = IssueCheckinQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // IssueCheckinTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
IssueCheckinTableMap::buildTableMap();
