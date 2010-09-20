
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
	PRIMARY KEY (`threadid`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
