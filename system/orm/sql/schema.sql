
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- thread
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `thread`;


CREATE TABLE `thread`
(
	`threadid` INTEGER  NOT NULL AUTO_INCREMENT,
	`threaduserid` INTEGER  NOT NULL,
	`title` VARCHAR(150)  NOT NULL,
	PRIMARY KEY (`threadid`),
	INDEX `thread_FI_1` (`threaduserid`),
	CONSTRAINT `thread_FK_1`
		FOREIGN KEY (`threaduserid`)
		REFERENCES `user` (`userid`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- post
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `post`;


CREATE TABLE `post`
(
	`postid` INTEGER  NOT NULL AUTO_INCREMENT,
	`threadid` INTEGER  NOT NULL,
	`postuserid` INTEGER  NOT NULL,
	`text` TEXT  NOT NULL,
	PRIMARY KEY (`postid`),
	INDEX `post_FI_1` (`threadid`),
	CONSTRAINT `post_FK_1`
		FOREIGN KEY (`threadid`)
		REFERENCES `thread` (`threadid`),
	INDEX `post_FI_2` (`postuserid`),
	CONSTRAINT `post_FK_2`
		FOREIGN KEY (`postuserid`)
		REFERENCES `user` (`userid`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;


CREATE TABLE `user`
(
	`userid` INTEGER  NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(50)  NOT NULL,
	PRIMARY KEY (`userid`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
