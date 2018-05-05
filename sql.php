create database db_ems;
use db_ems;

/* 1 */
create table academic_sessions(
	id serial,
	session_name varchar(255),
	session_start_date date,
	session_end_date date,
	created_at timestamp,
	updated_at timestamp,
	created_by int(11) unsigned,
	updated_by int(11) unsigned,
	status tinyint(4) 
);
	/* 2 */
create table acl_employee_wise_branch_setups(
	id serial,
	created_at timestamp,
	updated_at timestamp,
	created_by int(11) unsigned,
	updated_by int(11) unsigned,
	 fk_employee_id int(11) unsigned,
	 fk_branch_id int(11) unsigned
	 -- fK_acl_employee_branch_history_id bigint(20) unsigned,
	-- foreign key (fk_acl_employee_branch_history_id)
	 -- references acl_employee_branch_histories(id)


);
	/* 3 */
create table acl_employee_branch_histories(
	id serial,
	start_date datetime,
	end_date datetime,
	created_at timestamp,
	updated_at timestamp,
	created_by int(11) unsigned,
	updated_by int(11) unsigned,
	fK_acl_employee_wise_branch_setup_id bigint(20) unsigned,
	foreign key (fk_acl_employee_wise_branch_setup_id) references acl_employee_wise_branch_setups(id)

);

/* 4 */
create table acl_roles(
	id serial,
	title varchar(255),
	status tinyint(4),
	created_at timestamp,
	updated_at timestamp

);

/* 5 */
create table acl_employee_wise_roles(
	id serial,
	status tinyint(4),
	created_at timestamp,
	updated_at timestamp,
	created_by int(11) unsigned,
	updated_by int(11) unsigned,
	fk_acl_role_id bigint(20) unsigned,
	foreign key(fk_acl_role_id) references acl_roles(id),
	fK_acl_employee_wise_branch_setup_id bigint(20) unsigned,
	foreign key (fk_acl_employee_wise_branch_setup_id) references acl_employee_wise_branch_setups(id)

);

/* 6 */

create table acl_menu_names(
	id serial,
	menu_name varchar(255),
	menu_url varchar(255),
	icon varchar(255),
	has_sub_menu tinyint(4),
	view_order int(11),
	status tinyint(4),
	created_at timestamp,
	updated_at timestamp
);

/* 7 */

create table acl_role_wise_menu_permissions(
	id serial,
	created_at timestamp,
	updated_at timestamp,
	fk_acl_role_id bigint(20) unsigned,
	foreign key(fk_acl_role_id) references acl_roles(id),
	fk_acl_menu_name_id bigint(20) unsigned,
	foreign key(fk_acl_menu_name_id) references acl_menu_names(id)

);

/* 8 */

create table acl_sub_menu_names(
	id serial,
	sub_menu_name varchar(255),
	sub_menu_url varchar(255),
	view_order int(11),
	status tinyint(4),
	created_at timestamp,
	updated_at timestamp,
	fK_acl_menu_name_id bigint(20) unsigned,
	foreign key(fK_acl_menu_name_id) references acl_menu_names(id)

);

/* 9 */

create table acl_role_wise_sub_menu_permissions(
	id serial,
	status tinyint(4),
	created_at timestamp,
	updated_at timestamp,
	fk_acl_role_id bigint(20) unsigned,
	foreign key(fk_acl_role_id) references acl_roles(id),
	fk_acl_sub_menu_name bigint(20) unsigned,
	foreign key(fk_acl_sub_menu_name) references acl_sub_menu_names(id)

);

/* 10 */


create table acl_url_names(
		id serial,
		url_name varchar(255),
		route_name varchar(255),
		allias_name varchar(255),
		status tinyint(4),
		created_at timestamp,
		updated_at timestamp
);
/* 11 */
create table acl_role_wise_url_permissions(
	id serial,
	status tinyint(4),
	created_at timestamp,
	updated_at timestamp,
	fk_acl_role_id bigint(20) unsigned,
	foreign key(fk_acl_role_id) references acl_roles(id),
	fk_acl_url_name_id bigint(20) unsigned,
	foreign key(fk_acl_url_name_id) references acl_url_names(id)
);


/* 12 */

create table admission_states(
	id serial,
	admission_state_type varchar(255),
	status tinyint(4),
	created_at timestamp,
	updated_at timestamp,
	created_by int(11) unsigned,
	updated_by int(11) unsigned

);
/* kaj baki ace */

create table adm_student_chosen_subjects(
	id serial,
	created_at timestamp,
	updated_at timestamp,
	created_by int(11) unsigned,
	updated_by int(11) unsigned,
	fk_student_application_info_id bigint(20) unsigned,
	foreign key(fk_student_application_info_id) references student_application_info(id)

);

	/* All primary key table */


create table cc_subjects_names(
	id serial,
	sub_name varchar(255),
	status tinyint(4),
	created_at timestamp,
	updated_at timestamp,
	created_by int(11) unsigned,
	updated_by int(11) unsigned

);

create table cc_subject_types(
	id serial,
	sub_type_name varchar(255),
	status tinyint(4),
	created_at timestamp,
	updated_at timestamp

);

create table branch_info(
	id serial,
	branch_name varchar(255),
	branch_address varchar(255),
	estd_date date,
	estd_by	varchar(50),
	status tinyint(4),
	created_at timestamp,
	updated_at timestamp,
	short_name varchar(10)

);


create table cc_shift_info(
	id serial,
	shift_name	varchar(255),
	status tinyint(4),
	created_at timestamp,
	updated_at timestamp
);

create table cc_group_names(
	id serial,
	group_name	varchar(50),
	view_order int(10) unsigned,
	status tinyint(4),
	created_at timestamp,
	updated_at timestamp,
	created_by int(11) unsigned,
	updated_by int(11) unsigned

);

create table education_levels(
	id serial,
	education_level_name varchar(255),
	status tinyint(4),
	created_at timestamp,
	updated_at timestamp
);


create table cc_class_names(
	id serial,
	class_name varchar(255),
	view_order int(11) unsigned,
	status tinyint(4),
	created_at timestamp,
	updated_at timestamp,
	created_by int(11) unsigned,
	updated_by int(11) unsigned,
	fk_education_level_id bigint(20) unsigned,
	foreign key(fk_education_level_id) references education_levels(id)
);


create table cc_class_wise_group_setups(
	id serial,
	status tinyint(4),
	created_at timestamp,
	updated_at timestamp,
	created_by int(11) unsigned,
	updated_by int(11) unsigned,
	fK_cc_class_name_id bigint(20) unsigned,
	foreign key(fK_cc_class_name_id) references cc_class_names(id),
	fk_cc_group_name_id bigint(20) unsigned,
	foreign key(fk_cc_group_name_id) references cc_group_names(id)
);



















