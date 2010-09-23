<?php



/**
 * This class defines the structure of the 'post' table.
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
class PostTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'orm.map.PostTableMap';

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
		$this->setName('post');
		$this->setPhpName('Post');
		$this->setClassname('Post');
		$this->setPackage('orm');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('POSTID', 'Postid', 'INTEGER', true, null, null);
		$this->addForeignKey('THREADID', 'Threadid', 'INTEGER', 'thread', 'THREADID', true, null, null);
		$this->addForeignKey('POSTUSERID', 'Postuserid', 'INTEGER', 'user', 'USERID', true, null, null);
		$this->addColumn('TEXT', 'Text', 'LONGVARCHAR', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Thread', 'Thread', RelationMap::MANY_TO_ONE, array('threadid' => 'threadid', ), null, null);
    $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('postuserid' => 'userid', ), null, null);
	} // buildRelations()

} // PostTableMap
