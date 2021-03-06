<?php



/**
 * This class defines the structure of the 'thread' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.orm.map
 */
class ThreadTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'orm.map.ThreadTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('thread');
		$this->setPhpName('Thread');
		$this->setClassname('Thread');
		$this->setPackage('orm');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('THREADID', 'Threadid', 'INTEGER', true, null, null);
		$this->addForeignKey('THREADUSERID', 'Threaduserid', 'INTEGER', 'user', 'USERID', true, null, null);
		$this->addColumn('TITLE', 'Title', 'VARCHAR', true, 150, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('threaduserid' => 'userid', ), null, null);
    $this->addRelation('Post', 'Post', RelationMap::ONE_TO_MANY, array('threadid' => 'threadid', ), null, null);
	} // buildRelations()

} // ThreadTableMap
