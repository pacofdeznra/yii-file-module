CREATE TABLE file
(
	id INTEGER NOT NULL AUTO_INCREMENT,
	name VARCHAR(128) NOT NULL,
	extension VARCHAR(128) NOT NULL,
	type VARCHAR(128) NOT NULL,
	size INTEGER NOT NULL,
	account_id INTEGER NOT NULL,
	PRIMARY KEY (id),
	INDEX FK_file_account (account_id ASC),
	CONSTRAINT FK_file_account FOREIGN KEY (account_id)
		REFERENCES account (id) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = InnoDB;

