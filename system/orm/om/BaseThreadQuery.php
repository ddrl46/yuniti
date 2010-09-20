<?php


/**
 * Base class that represents a query for the 'thread' table.
 *
 * 
 *
 * @method     ThreadQuery orderByThreadid($order = Criteria::ASC) Order by the threadid column
 *
 * @method     ThreadQuery groupByThreadid() Group by the threadid column
 *
 * @method     ThreadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ThreadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ThreadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Thread findOne(PropelPDO $con = null) Return the first Thread matching the query
 * @method     Thread findOneOrCreate(PropelPDO $con = null) Return the first Thread matching the query, or a new Thread object populated from the query conditions when no match is found
 *
 * @method     Thread findOneByThreadid(int $threadid) Return the first Thread filtered by the threadid column
 *
 * @method     array findByThreadid(int $threadid) Return Thread objects filtered by the threadid column
 *
 * @package    propel.generator.orm.om
 */
abstract class BaseThreadQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseThreadQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'yuniti', $modelName = 'Thread', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ThreadQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ThreadQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ThreadQuery) {
			return $criteria;
		}
		$query = new ThreadQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Thread|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ThreadPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    ThreadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ThreadPeer::THREADID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ThreadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ThreadPeer::THREADID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the threadid column
	 * 
	 * @param     int|array $threadid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ThreadQuery The current query, for fluid interface
	 */
	public function filterByThreadid($threadid = null, $comparison = null)
	{
		if (is_array($threadid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ThreadPeer::THREADID, $threadid, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Thread $thread Object to remove from the list of results
	 *
	 * @return    ThreadQuery The current query, for fluid interface
	 */
	public function prune($thread = null)
	{
		if ($thread) {
			$this->addUsingAlias(ThreadPeer::THREADID, $thread->getThreadid(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseThreadQuery
