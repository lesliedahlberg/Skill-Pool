<?
  require_once "lib/php/meekrodb.class.php";
  DB::$user = 'root';
  DB::$dbName = 'skill_pool';

  DB::query("CREATE TABLE IF NOT EXISTS user(
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    email varchar(128) NOT NULL,
    hash char(32) NOT NULL,
    first_name varchar(128) NOT NULL,
    last_name varchar(128) NOT NULL,
    registration_date timestamp,
    photo_link varchar(128),
    title varchar(128),
    city varchar(128),
    zip_code varchar(128),
    country varchar(128),
    verification_code char(32) NOT NULL,
    status tinyint(1) NOT NULL,
    telephone varchar(128),
    homepage varchar(128),
    about_me text
  );");

  DB::query("CREATE TABLE IF NOT EXISTS category(
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    name varchar(128) NOT NULL,
    CONSTRAINT uc_name_category UNIQUE (name)
  );");

  DB::query("CREATE TABLE IF NOT EXISTS skill(
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    name varchar(128) NOT NULL,
    category_id int(11) NOT NULL,
    FOREIGN KEY (category_id) REFERENCES category(id),
    CONSTRAINT uc_name_skill UNIQUE (name)
  );");

  DB::query("CREATE TABLE IF NOT EXISTS user_skill(
    user_id int(11) NOT NULL,
    skill_id int(11) NOT NULL,
    date_added timestamp,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (skill_id) REFERENCES skill(id),
    PRIMARY KEY(user_id, skill_id)
  );");

  DB::query("CREATE TABLE IF NOT EXISTS skill_message(
    id int(11) PRIMARY KEY AUTO_INCREMENT ,
    skill_id int(11) NOT NULL,
    user_id int(11) NOT NULL,
    date_added timestamp,
    message text NOT NULL,
    title varchar(128) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (skill_id) REFERENCES skill(id)
  );");

  DB::query("CREATE TABLE IF NOT EXISTS site_setting(
    setting_key varchar(128) PRIMARY KEY,
    value varchar(128) NOT NULL
  );");

  DB::query("INSERT INTO user(email, hash, first_name, last_name, verification_code, status)
  VALUES('jln14010@student.mdh.se', '63a9f0ea7bb98050796b649e85481845', 'Jonathan', 'Larsson', '63a9f0ea7bb98050796b649e85481845', '1');");

  DB::query("INSERT INTO user(email, hash, first_name, last_name, verification_code, status)
  VALUES('elt08001@student.mdh.se', '63a9f0ea7bb98050796b649e85481845', 'Erik', 'Liljeqvist', '63a9f0ea7bb98050796b649e85481845', '1');");

  DB::query("INSERT INTO user(email, hash, first_name, last_name, verification_code, status)
  VALUES('flm14001@student.mdh.se', '63a9f0ea7bb98050796b649e85481845', 'Filip', 'Lagerholm', '63a9f0ea7bb98050796b649e85481845', '1');");

  DB::query("INSERT INTO user(email, hash, first_name, last_name, verification_code, status)
  VALUES('ldg14001@student.mdh.se', '63a9f0ea7bb98050796b649e85481845', 'Leslie', 'Dahlberg', '63a9f0ea7bb98050796b649e85481845', '1');");



?>
