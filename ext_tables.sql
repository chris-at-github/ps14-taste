CREATE TABLE pages (
	tx_teaser_abstract_long text,
	tx_teaser_title varchar(255) DEFAULT '' NOT NULL,
	tx_teaser_readmore varchar(255) DEFAULT '' NOT NULL,
	tx_teaser_media_large int(11) unsigned DEFAULT '0' NOT NULL
);