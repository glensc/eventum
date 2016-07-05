<?php

namespace Base;

use \IssueCheckin as ChildIssueCheckin;
use \IssueCheckinQuery as ChildIssueCheckinQuery;
use \Exception;
use \PDO;
use Map\IssueCheckinTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'eventum_issue_checkin' table.
 *
 *
 *
 * @method     ChildIssueCheckinQuery orderById($order = Criteria::ASC) Order by the isc_id column
 * @method     ChildIssueCheckinQuery orderByIssueId($order = Criteria::ASC) Order by the isc_iss_id column
 * @method     ChildIssueCheckinQuery orderByCommitId($order = Criteria::ASC) Order by the isc_commitid column
 * @method     ChildIssueCheckinQuery orderByReponame($order = Criteria::ASC) Order by the isc_reponame column
 * @method     ChildIssueCheckinQuery orderByModule($order = Criteria::ASC) Order by the isc_module column
 * @method     ChildIssueCheckinQuery orderByFilename($order = Criteria::ASC) Order by the isc_filename column
 * @method     ChildIssueCheckinQuery orderByOldVersion($order = Criteria::ASC) Order by the isc_old_version column
 * @method     ChildIssueCheckinQuery orderByNewVersion($order = Criteria::ASC) Order by the isc_new_version column
 * @method     ChildIssueCheckinQuery orderByCreatedDate($order = Criteria::ASC) Order by the isc_created_date column
 * @method     ChildIssueCheckinQuery orderByUsername($order = Criteria::ASC) Order by the isc_username column
 * @method     ChildIssueCheckinQuery orderByCommitMsg($order = Criteria::ASC) Order by the isc_commit_msg column
 *
 * @method     ChildIssueCheckinQuery groupById() Group by the isc_id column
 * @method     ChildIssueCheckinQuery groupByIssueId() Group by the isc_iss_id column
 * @method     ChildIssueCheckinQuery groupByCommitId() Group by the isc_commitid column
 * @method     ChildIssueCheckinQuery groupByReponame() Group by the isc_reponame column
 * @method     ChildIssueCheckinQuery groupByModule() Group by the isc_module column
 * @method     ChildIssueCheckinQuery groupByFilename() Group by the isc_filename column
 * @method     ChildIssueCheckinQuery groupByOldVersion() Group by the isc_old_version column
 * @method     ChildIssueCheckinQuery groupByNewVersion() Group by the isc_new_version column
 * @method     ChildIssueCheckinQuery groupByCreatedDate() Group by the isc_created_date column
 * @method     ChildIssueCheckinQuery groupByUsername() Group by the isc_username column
 * @method     ChildIssueCheckinQuery groupByCommitMsg() Group by the isc_commit_msg column
 *
 * @method     ChildIssueCheckinQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildIssueCheckinQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildIssueCheckinQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildIssueCheckin findOne(ConnectionInterface $con = null) Return the first ChildIssueCheckin matching the query
 * @method     ChildIssueCheckin findOneOrCreate(ConnectionInterface $con = null) Return the first ChildIssueCheckin matching the query, or a new ChildIssueCheckin object populated from the query conditions when no match is found
 *
 * @method     ChildIssueCheckin findOneById(int $isc_id) Return the first ChildIssueCheckin filtered by the isc_id column
 * @method     ChildIssueCheckin findOneByIssueId(int $isc_iss_id) Return the first ChildIssueCheckin filtered by the isc_iss_id column
 * @method     ChildIssueCheckin findOneByCommitId(string $isc_commitid) Return the first ChildIssueCheckin filtered by the isc_commitid column
 * @method     ChildIssueCheckin findOneByReponame(string $isc_reponame) Return the first ChildIssueCheckin filtered by the isc_reponame column
 * @method     ChildIssueCheckin findOneByModule(string $isc_module) Return the first ChildIssueCheckin filtered by the isc_module column
 * @method     ChildIssueCheckin findOneByFilename(string $isc_filename) Return the first ChildIssueCheckin filtered by the isc_filename column
 * @method     ChildIssueCheckin findOneByOldVersion(string $isc_old_version) Return the first ChildIssueCheckin filtered by the isc_old_version column
 * @method     ChildIssueCheckin findOneByNewVersion(string $isc_new_version) Return the first ChildIssueCheckin filtered by the isc_new_version column
 * @method     ChildIssueCheckin findOneByCreatedDate(string $isc_created_date) Return the first ChildIssueCheckin filtered by the isc_created_date column
 * @method     ChildIssueCheckin findOneByUsername(string $isc_username) Return the first ChildIssueCheckin filtered by the isc_username column
 * @method     ChildIssueCheckin findOneByCommitMsg(string $isc_commit_msg) Return the first ChildIssueCheckin filtered by the isc_commit_msg column *

 * @method     ChildIssueCheckin requirePk($key, ConnectionInterface $con = null) Return the ChildIssueCheckin by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssueCheckin requireOne(ConnectionInterface $con = null) Return the first ChildIssueCheckin matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildIssueCheckin requireOneById(int $isc_id) Return the first ChildIssueCheckin filtered by the isc_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssueCheckin requireOneByIssueId(int $isc_iss_id) Return the first ChildIssueCheckin filtered by the isc_iss_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssueCheckin requireOneByCommitId(string $isc_commitid) Return the first ChildIssueCheckin filtered by the isc_commitid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssueCheckin requireOneByReponame(string $isc_reponame) Return the first ChildIssueCheckin filtered by the isc_reponame column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssueCheckin requireOneByModule(string $isc_module) Return the first ChildIssueCheckin filtered by the isc_module column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssueCheckin requireOneByFilename(string $isc_filename) Return the first ChildIssueCheckin filtered by the isc_filename column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssueCheckin requireOneByOldVersion(string $isc_old_version) Return the first ChildIssueCheckin filtered by the isc_old_version column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssueCheckin requireOneByNewVersion(string $isc_new_version) Return the first ChildIssueCheckin filtered by the isc_new_version column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssueCheckin requireOneByCreatedDate(string $isc_created_date) Return the first ChildIssueCheckin filtered by the isc_created_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssueCheckin requireOneByUsername(string $isc_username) Return the first ChildIssueCheckin filtered by the isc_username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIssueCheckin requireOneByCommitMsg(string $isc_commit_msg) Return the first ChildIssueCheckin filtered by the isc_commit_msg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildIssueCheckin[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildIssueCheckin objects based on current ModelCriteria
 * @method     ChildIssueCheckin[]|ObjectCollection findById(int $isc_id) Return ChildIssueCheckin objects filtered by the isc_id column
 * @method     ChildIssueCheckin[]|ObjectCollection findByIssueId(int $isc_iss_id) Return ChildIssueCheckin objects filtered by the isc_iss_id column
 * @method     ChildIssueCheckin[]|ObjectCollection findByCommitId(string $isc_commitid) Return ChildIssueCheckin objects filtered by the isc_commitid column
 * @method     ChildIssueCheckin[]|ObjectCollection findByReponame(string $isc_reponame) Return ChildIssueCheckin objects filtered by the isc_reponame column
 * @method     ChildIssueCheckin[]|ObjectCollection findByModule(string $isc_module) Return ChildIssueCheckin objects filtered by the isc_module column
 * @method     ChildIssueCheckin[]|ObjectCollection findByFilename(string $isc_filename) Return ChildIssueCheckin objects filtered by the isc_filename column
 * @method     ChildIssueCheckin[]|ObjectCollection findByOldVersion(string $isc_old_version) Return ChildIssueCheckin objects filtered by the isc_old_version column
 * @method     ChildIssueCheckin[]|ObjectCollection findByNewVersion(string $isc_new_version) Return ChildIssueCheckin objects filtered by the isc_new_version column
 * @method     ChildIssueCheckin[]|ObjectCollection findByCreatedDate(string $isc_created_date) Return ChildIssueCheckin objects filtered by the isc_created_date column
 * @method     ChildIssueCheckin[]|ObjectCollection findByUsername(string $isc_username) Return ChildIssueCheckin objects filtered by the isc_username column
 * @method     ChildIssueCheckin[]|ObjectCollection findByCommitMsg(string $isc_commit_msg) Return ChildIssueCheckin objects filtered by the isc_commit_msg column
 * @method     ChildIssueCheckin[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class IssueCheckinQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\IssueCheckinQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'eventum', $modelName = '\\IssueCheckin', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildIssueCheckinQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildIssueCheckinQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildIssueCheckinQuery) {
            return $criteria;
        }
        $query = new ChildIssueCheckinQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildIssueCheckin|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = IssueCheckinTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(IssueCheckinTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildIssueCheckin A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT isc_id, isc_iss_id, isc_commitid, isc_reponame, isc_module, isc_filename, isc_old_version, isc_new_version, isc_created_date, isc_username, isc_commit_msg FROM eventum_issue_checkin WHERE isc_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildIssueCheckin $obj */
            $obj = new ChildIssueCheckin();
            $obj->hydrate($row);
            IssueCheckinTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildIssueCheckin|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildIssueCheckinQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildIssueCheckinQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the isc_id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE isc_id = 1234
     * $query->filterById(array(12, 34)); // WHERE isc_id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE isc_id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueCheckinQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_ID, $id, $comparison);
    }

    /**
     * Filter the query on the isc_iss_id column
     *
     * Example usage:
     * <code>
     * $query->filterByIssueId(1234); // WHERE isc_iss_id = 1234
     * $query->filterByIssueId(array(12, 34)); // WHERE isc_iss_id IN (12, 34)
     * $query->filterByIssueId(array('min' => 12)); // WHERE isc_iss_id > 12
     * </code>
     *
     * @param     mixed $issueId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueCheckinQuery The current query, for fluid interface
     */
    public function filterByIssueId($issueId = null, $comparison = null)
    {
        if (is_array($issueId)) {
            $useMinMax = false;
            if (isset($issueId['min'])) {
                $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_ISS_ID, $issueId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($issueId['max'])) {
                $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_ISS_ID, $issueId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_ISS_ID, $issueId, $comparison);
    }

    /**
     * Filter the query on the isc_commitid column
     *
     * Example usage:
     * <code>
     * $query->filterByCommitId('fooValue');   // WHERE isc_commitid = 'fooValue'
     * $query->filterByCommitId('%fooValue%'); // WHERE isc_commitid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $commitId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueCheckinQuery The current query, for fluid interface
     */
    public function filterByCommitId($commitId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($commitId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $commitId)) {
                $commitId = str_replace('*', '%', $commitId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_COMMITID, $commitId, $comparison);
    }

    /**
     * Filter the query on the isc_reponame column
     *
     * Example usage:
     * <code>
     * $query->filterByReponame('fooValue');   // WHERE isc_reponame = 'fooValue'
     * $query->filterByReponame('%fooValue%'); // WHERE isc_reponame LIKE '%fooValue%'
     * </code>
     *
     * @param     string $reponame The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueCheckinQuery The current query, for fluid interface
     */
    public function filterByReponame($reponame = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($reponame)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $reponame)) {
                $reponame = str_replace('*', '%', $reponame);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_REPONAME, $reponame, $comparison);
    }

    /**
     * Filter the query on the isc_module column
     *
     * Example usage:
     * <code>
     * $query->filterByModule('fooValue');   // WHERE isc_module = 'fooValue'
     * $query->filterByModule('%fooValue%'); // WHERE isc_module LIKE '%fooValue%'
     * </code>
     *
     * @param     string $module The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueCheckinQuery The current query, for fluid interface
     */
    public function filterByModule($module = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($module)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $module)) {
                $module = str_replace('*', '%', $module);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_MODULE, $module, $comparison);
    }

    /**
     * Filter the query on the isc_filename column
     *
     * Example usage:
     * <code>
     * $query->filterByFilename('fooValue');   // WHERE isc_filename = 'fooValue'
     * $query->filterByFilename('%fooValue%'); // WHERE isc_filename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $filename The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueCheckinQuery The current query, for fluid interface
     */
    public function filterByFilename($filename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($filename)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $filename)) {
                $filename = str_replace('*', '%', $filename);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_FILENAME, $filename, $comparison);
    }

    /**
     * Filter the query on the isc_old_version column
     *
     * Example usage:
     * <code>
     * $query->filterByOldVersion('fooValue');   // WHERE isc_old_version = 'fooValue'
     * $query->filterByOldVersion('%fooValue%'); // WHERE isc_old_version LIKE '%fooValue%'
     * </code>
     *
     * @param     string $oldVersion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueCheckinQuery The current query, for fluid interface
     */
    public function filterByOldVersion($oldVersion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($oldVersion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $oldVersion)) {
                $oldVersion = str_replace('*', '%', $oldVersion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_OLD_VERSION, $oldVersion, $comparison);
    }

    /**
     * Filter the query on the isc_new_version column
     *
     * Example usage:
     * <code>
     * $query->filterByNewVersion('fooValue');   // WHERE isc_new_version = 'fooValue'
     * $query->filterByNewVersion('%fooValue%'); // WHERE isc_new_version LIKE '%fooValue%'
     * </code>
     *
     * @param     string $newVersion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueCheckinQuery The current query, for fluid interface
     */
    public function filterByNewVersion($newVersion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($newVersion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $newVersion)) {
                $newVersion = str_replace('*', '%', $newVersion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_NEW_VERSION, $newVersion, $comparison);
    }

    /**
     * Filter the query on the isc_created_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedDate('2011-03-14'); // WHERE isc_created_date = '2011-03-14'
     * $query->filterByCreatedDate('now'); // WHERE isc_created_date = '2011-03-14'
     * $query->filterByCreatedDate(array('max' => 'yesterday')); // WHERE isc_created_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueCheckinQuery The current query, for fluid interface
     */
    public function filterByCreatedDate($createdDate = null, $comparison = null)
    {
        if (is_array($createdDate)) {
            $useMinMax = false;
            if (isset($createdDate['min'])) {
                $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_CREATED_DATE, $createdDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdDate['max'])) {
                $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_CREATED_DATE, $createdDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_CREATED_DATE, $createdDate, $comparison);
    }

    /**
     * Filter the query on the isc_username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE isc_username = 'fooValue'
     * $query->filterByUsername('%fooValue%'); // WHERE isc_username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueCheckinQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $username)) {
                $username = str_replace('*', '%', $username);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the isc_commit_msg column
     *
     * Example usage:
     * <code>
     * $query->filterByCommitMsg('fooValue');   // WHERE isc_commit_msg = 'fooValue'
     * $query->filterByCommitMsg('%fooValue%'); // WHERE isc_commit_msg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $commitMsg The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIssueCheckinQuery The current query, for fluid interface
     */
    public function filterByCommitMsg($commitMsg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($commitMsg)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $commitMsg)) {
                $commitMsg = str_replace('*', '%', $commitMsg);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_COMMIT_MSG, $commitMsg, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildIssueCheckin $issueCheckin Object to remove from the list of results
     *
     * @return $this|ChildIssueCheckinQuery The current query, for fluid interface
     */
    public function prune($issueCheckin = null)
    {
        if ($issueCheckin) {
            $this->addUsingAlias(IssueCheckinTableMap::COL_ISC_ID, $issueCheckin->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the eventum_issue_checkin table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(IssueCheckinTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            IssueCheckinTableMap::clearInstancePool();
            IssueCheckinTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(IssueCheckinTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(IssueCheckinTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            IssueCheckinTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            IssueCheckinTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // IssueCheckinQuery
