ALTER TABLE {{%issue_checkin}}
    add `isc_scm_id` INT(10) UNSIGNED NOT NULL after isc_id;

# alter these to be just NULL
update {{%issue_checkin}} set isc_old_version=NULL where isc_old_version='NONE';
update {{%issue_checkin}} set isc_new_version=NULL where isc_new_version='NONE';

CREATE TABLE {{%scm}} (
    `scm_id`           INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `scm_name`         VARCHAR(255) NOT NULL,
    `scm_checkout_url` VARCHAR(255)     NOT NULL,
    `scm_diff_url`     VARCHAR(255)     NOT NULL,
    `scm_log_url`      VARCHAR(255)     NOT NULL,
    PRIMARY KEY (`scm_id`)
) ENGINE =MyISAM DEFAULT CHARSET =utf8;

insert into eventum_scm
    set scm_name='default',
        scm_checkout_url='',
        scm_diff_url='',
        scm_log_url=''
    ;
set @scm_id = last_insert_id();

UPDATE {{%issue_checkin}}
    SET isc_scm_id=@scm_id;
