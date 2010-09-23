<?php


/**
 * Base class that represents a query for the 'thread' table.
 *
 * 
 *
 * @method     ThreadQuery orderByThreadid($order = Criteria::ASC) Order by the threadid column
 * @method     ThreadQuery orderByThreaduserid($order = Criteria::ASC) Order by the threaduserid column
 * @method     ThreadQuery orderByTitle($order = Criteria::ASC) Order by the title column
 *
 * @method     ThreadQuery groupByThreadid() Group by the threadid column
 * @method     ThreadQuery groupByThreaduserid() Group by the threaduserid column
 * @method     ThreadQuery groupByTitle() Group by the title column
 *
 * @method     ThreadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ThreadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ThreadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ThreadQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ThreadQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ThreadQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ThreadQuery leftJoinPost($relationAlias = null) Adds a LEFT JOIN clause to the query using the Post relation
 * @method     ThreadQuery rightJoinPost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Post relation
 * @method     ThreadQuery innerJoinPost($relationAlias = null) Adds a INNER JOIN clause to the query using the Post relation
 *
 * @method     Thread findOne(PropelPDO $con = null) Return the first Thread matching the query
 * @method     Thread findOneOrCreate(PropelPDO $con = null) Return the first Thread matching the query, or a new Thread object populated from the query conditions when no match is found
 *
 * @method     Thread findOneByThreadid(int $threadid) Return the first Thread filtered by the threadid column
 * @method     Thread findOneByThreaduserid(int $threaduserid) Return the first Thread filtered by the threaduserid column
 * @method     Thread findOneByTitle(string $title) Return the first Thread filtered by the title column
 *
 * @method     array findByThreadid(int $threadid) Return Thread objects filtered by the threadid column
 * @method     array findByThreaduserid(int $threaduserid) Return Thread objects filtered by the threaduserid column
 * @method     array findByTitle(string $title) Return Thread objects filtered by the title column
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
	 * Filter the query on the threaduserid column
	 * 
	 * @param     int|array $threaduserid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ThreadQuery The current query, for fluid interface
	 */
	public function filterByThreaduserid($threaduserid = null, $comparison = null)
	{
		if (is_array($threaduserid)) {
			$useMinMax = false;
			if (isset($threaduserid['min'])) {
				$this->addUsingAlias(ThreadPeer::THREADUSERID, $threaduserid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($threaduserid['max'])) {
				$this->addUsingAlias(ThreadPeer::THREADUSERID, $threaduserid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ThreadPeer::THREADUSERID, $threaduserid, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ThreadQuery The current query, for fluid interface
	 */
	public function filterByTitle($title = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($title)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $title)) {
				$title = str_replace('*', '%', $title);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ThreadPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ThreadQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = null)
	{
		return $this
			->addUsingAlias(ThreadPeer::THREADUSERID, $user->getUserid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ThreadQuery The current query, for fluid interface
	 */
	public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('User');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'User');
		}
		
		return $this;
	}

	/**
	 * Use the User relation User object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery A secondary query class using the current class as primary query
	 */
	public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
	}

	/**
	 * Filter the query by a related Post object
	 *
	 * @param     Post $post  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ThreadQuery The current query, for fluid interface
	 */
	public function filterByPost($post, $comparison = null)
	{
		return $this
			->addUsingAlias(ThreadPeer::THREADID, $post->getThreadid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Post relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ThreadQuery The current query, for fluid interface
	 */
	public function joinPost($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Post');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Post');
		}
		
		return $this;
	}

	/**
	 * Use the Post relation Post object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PostQuery A secondary query class using the current class as primary query
	 */
	public function usePostQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPost($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Post', 'PostQuery');
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
