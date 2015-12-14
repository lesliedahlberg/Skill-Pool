<?
  require_once "lib/php/meekrodb.class.php";
  DB::$user = 'root';
  DB::$password = 'root';
  DB::$dbName = 'skill_pool';

  //Variables to change depending on company information, maybe make an installation form of it
  $domain = "/@.*mdh\\.se$/"; //Should be @something.mdh.se or @mdh.se

  /*  OBS! För att använda:

      Ta bort hela databasen, kör install.php.

      ( Insert av skills, som ni ser längst ner, fungerar inte så bra om ni tidigare haft kategorier som sedan tagits bort.
      Detta på grund av AUTO INCREMENT värdet som ju inte börjar om från 0 ... )

  */

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
    skey varchar(128) PRIMARY KEY,
    value varchar(128) NOT NULL
  );");

  DB::query("INSERT INTO site_setting(skey, value) VALUES('domain', '".$domain."');");

/*  DB::insert('site_setting', array(
  'skey' => 'domain',
  'value' => $domain) // $domain() is evaluated by MySQL
);*/

  $rand_int = rand(); //Generates random int //cant get this:  random_int(PHP_INT_MIN, PHP_INT_MAX); to work
  $hash = md5(strval($rand_int)); //Creates hash of the random int

  DB::query("INSERT INTO user(email, hash, first_name, last_name, verification_code, status)
  VALUES('jln14010@student.mdh.se', '63a9f0ea7bb98050796b649e85481845', 'Jonathan', 'Larsson', '$hash', '1');");

  $rand_int = rand(); //Generates random int
  $hash = md5(strval($rand_int)); //Creates hash of the random int

  DB::query("INSERT INTO user(email, hash, first_name, last_name, verification_code, status)
  VALUES('elt08001@student.mdh.se', '63a9f0ea7bb98050796b649e85481845', 'Erik', 'Liljeqvist', '$hash', '1');");

  $rand_int = rand(); //Generates random int
  $hash = md5(strval($rand_int)); //Creates hash of the random int

  DB::query("INSERT INTO user(email, hash, first_name, last_name, verification_code, status)
  VALUES('flm14001@student.mdh.se', '63a9f0ea7bb98050796b649e85481845', 'Filip', 'Lagerholm', '$hash', '1');");

  $rand_int = rand(); //Generates random int
  $hash = md5(strval($rand_int)); //Creates hash of the random int

  DB::query("INSERT INTO user(email, hash, first_name, last_name, verification_code, status)
  VALUES('ldg14001@student.mdh.se', '63a9f0ea7bb98050796b649e85481845', 'Leslie', 'Dahlberg', '$hash', '1');");

  /*  OBS! För att använda:

      Ta bort hela databasen, kör install.php.

      ( Insert av skills, som ni ser längst ner, fungerar inte så bra om ni tidigare haft kategorier som sedan tagits bort.
      Detta på grund av AUTO INCREMENT värdet som ju inte börjar om från 0 ... )

  */

  $rand_int = rand(); //Generates random int
  $hash = md5(strval($rand_int)); //Creates hash of the random int
  /*  --- USERS --- */

  DB::insert('user', array(
    'about_me' => "I am the ki... President!",
    'city' => "Washington D.C.",
    'country' => "United States of Bacon",
    'email' => "barack.obama@whitehouse.gov",
    'first_name' => "Barack",
    'hash' => "63a9f0ea7bb98050796b649e85481845",
    'homepage' => "www.whitehouse.gov",
    'last_name' => "Obama",
    'photo_link' => "1449879692_586.png",
    'status' => "1",
    'telephone' => "202-456-1111",
    'title' => "President of the United States",
    'verification_code' => $hash,
    'zip_code' => "20500"
  ));

  $rand_int = rand(); //Generates random int
  $hash = md5(strval($rand_int)); //Creates hash of the random int

  DB::insert('user', array(
    'about_me' => "Look. If this works, it'll keep us from getting caught. If it doesn't, it'll keep us from getting old.",
    'city' => "Los Angeles",
    'country' => "USA",
    'email' => "mcguy.where@gmail.com",
    'first_name' => "Angus",
    'hash' => "63a9f0ea7bb98050796b649e85481845",
    'homepage' => "www.whitehouse.gov",
    'last_name' => "MacGyver",
    'photo_link' => "1449879676_995.png",
    'status' => "1",
    'telephone' => "201-241-351",
    'title' => "Problem solver, Phoenix Foundation",
    'verification_code' => $hash,
    'zip_code' => "20300"
  ));

  $rand_int = rand(); //Generates random int
  $hash = md5(strval($rand_int)); //Creates hash of the random int

  DB::insert('user', array(
    'about_me' => "Contact me for help with programming",
    'city' => "Stockholm",
    'country' => "Sweden",
    'email' => "ifixeverything@gmail.com",
    'first_name' => "Steven",
    'hash' => "63a9f0ea7bb98050796b649e85481845",
    'homepage' => "www.dreamincode.net",
    'last_name' => "Coolman",
    'photo_link' => "1449879704_287.png",
    'status' => "1",
    'telephone' => "08-258714",
    'title' => "Programmer",
    'verification_code' => $hash,
    'zip_code' => "72347"
  ));

  $rand_int = rand(); //Generates random int
  $hash = md5(strval($rand_int)); //Creates hash of the random int

  DB::insert('user', array(
    'about_me' => "I love making web apps, don't hesitate to contact me if you need any help!",
    'city' => "Stockholm",
    'country' => "Sweden",
    'email' => "zeb_do_webapps@codeacademy.se",
    'first_name' => "Zeb",
    'hash' => "63a9f0ea7bb98050796b649e85481845",
    'homepage' => "www.codeacademy.se",
    'last_name' => "Macahan",
    'photo_link' => "1449879667_124.png",
    'status' => "1",
    'telephone' => "08-114457",
    'title' => "Web developer",
    'verification_code' => $hash,
    'zip_code' => "72347"
  ));

  $rand_int = rand(); //Generates random int
  $hash = md5(strval($rand_int)); //Creates hash of the random int

  DB::insert('user', array(
    'about_me' => "I love football, coffee, playing the guitar etc.",
    'city' => "Västerås",
    'country' => "Sweden",
    'email' => "isak_nytong@codeacademy.se",
    'first_name' => "Isak",
    'hash' => "63a9f0ea7bb98050796b649e85481845",
    'homepage' => "www.isaknytong.se",
    'last_name' => "Nytong",
    'photo_link' => "1449879628_743.png",
    'status' => "1",
    'telephone' => "021-151351",
    'title' => "Server engineer",
    'verification_code' => $hash,
    'zip_code' => "72347"
  ));

  $rand_int = rand(); //Generates random int
  $hash = md5(strval($rand_int)); //Creates hash of the random int

  DB::insert('user', array(
    'about_me' => "Master of everything regarding web apps",
    'city' => "Uppsala",
    'country' => "Sweden",
    'email' => "jim_see@codeacademy.se",
    'first_name' => "Jim",
    'hash' => "63a9f0ea7bb98050796b649e85481845",
    'homepage' => "www.isaknytong.se",
    'last_name' => "Carryer",
    'photo_link' => "1449879637_663.png",
    'status' => "1",
    'telephone' => "0714-135116",
    'title' => "Web app master",
    'verification_code' => $hash,
    'zip_code' => "750 23"
  ));

  $rand_int = rand(); //Generates random int
  $hash = md5(strval($rand_int)); //Creates hash of the random int

  DB::insert('user', array(
    'about_me' => "Ask me about computers and the world wide web",
    'city' => "Örebro",
    'country' => "Sweden",
    'email' => "selena@gomez.se",
    'first_name' => "Selena",
    'hash' => "63a9f0ea7bb98050796b649e85481845",
    'homepage' => "www.selenagomez.se",
    'last_name' => "Gomez",
    'photo_link' => "1450124192_766.png",
    'status' => "1",
    'telephone' => "1135-1641461",
    'title' => "Developer",
    'verification_code' => $hash,
    'zip_code' => "713 13"
  ));

  $rand_int = rand(); //Generates random int
  $hash = md5(strval($rand_int)); //Creates hash of the random int

  DB::insert('user', array(
    'about_me' => "How can I help you?",
    'city' => "Stockholm",
    'country' => "Sweden",
    'email' => "customer.service@skillpool.se",
    'first_name' => "Tiffany",
    'hash' => "63a9f0ea7bb98050796b649e85481845",
    'homepage' => "www.skillpool.com/support",
    'last_name' => "Hillburg",
    'photo_link' => "1450124198_292.png",
    'status' => "1",
    'telephone' => "0771-141414",
    'title' => "Customer Support",
    'verification_code' => $hash,
    'zip_code' => "713 13"
  ));

  $rand_int = rand(); //Generates random int
  $hash = md5(strval($rand_int)); //Creates hash of the random int

  DB::insert('user', array(
    'about_me' => "This user has nothing to say",
    'city' => "Stockholm",
    'country' => "Sweden",
    'email' => "mac.lover@apple-luuv.com",
    'first_name' => "Gregory",
    'hash' => "63a9f0ea7bb98050796b649e85481845",
    'homepage' => "www2.apple4life.com",
    'last_name' => "Marshall",
    'photo_link' => "1450124205_274.png",
    'status' => "1",
    'telephone' => "31513-1515",
    'title' => "CSS Programmer",
    'verification_code' => $hash,
    'zip_code' => "714 18"
  ));

  $rand_int = rand(); //Generates random int
  $hash = md5(strval($rand_int)); //Creates hash of the random int

  DB::insert('user', array(
    'about_me' => "I love my orange shirt.",
    'city' => "Bedum",
    'country' => "Netherlands",
    'email' => "arjen@bmunchen.com",
    'first_name' => "Arya",
    'hash' => "63a9f0ea7bb98050796b649e85481845",
    'homepage' => "www.bmunchen.com",
    'last_name' => "Robin",
    'photo_link' => "1450124211_859.png",
    'status' => "1",
    'telephone' => "31513-1515",
    'title' => "Soccer player",
    'verification_code' => $hash,
    'zip_code' => "9781"
  ));

  $rand_int = rand(); //Generates random int
  $hash = md5(strval($rand_int)); //Creates hash of the random int

  DB::insert('user', array(
    'about_me' => "I love my orange shirt.",
    'city' => "Rosario",
    'country' => "Argentina",
    'email' => "messi@notbmunchen.com",
    'first_name' => "Lion",
    'hash' => "63a9f0ea7bb98050796b649e85481845",
    'homepage' => "www.notbmunchen.com",
    'last_name' => "El Messy",
    'photo_link' => "1450124236_183.png",
    'status' => "1",
    'telephone' => "1547-1515",
    'title' => "Soccer player",
    'verification_code' => $hash,
    'zip_code' => "1609"
  ));


  DB::update('user', array(
    'about_me' => "Student of Computer Science",
    'city' => "Västerås",
    'email' => "flm14001@student.mdh.se",
    'country' => "Sweden",
    'homepage' => "www.student.mdh.se",
    'photo_link' => "1449879613_8.png",
    'telephone' => "0760-460195",
    'title' => "Student",
    'zip_code' => "722 43"
  ), "last_name=%s",'Lagerholm');

  /*  --- CATEGORIES --- */

  DB::insert('category', array(
    'name' => "Web programming and design"
  ));
  DB::insert('skill', array(
    'name' => "HTML",
    'category_id' => "1"
  ));
  DB::insert('skill', array(
    'name' => "PHP",
    'category_id' => "1"
  ));
  DB::insert('skill', array(
    'name' => "ASP.NET",
    'category_id' => "1"
  ));


  DB::insert('category', array(
    'name' => "Algorithms and data structures"
  ));
  DB::insert('skill', array(
    'name' => "Parallel computational procedures",
    'category_id' => "2"
  ));


  DB::insert('category', array(
    'name' => "Artificial intelligence"
  ));
  DB::insert('skill', array(
    'name' => "Robotics",
    'category_id' => "3"
  ));
  DB::insert('skill', array(
    'name' => "Machine learning",
    'category_id' => "3"
  ));
  DB::insert('skill', array(
    'name' => "Computer vision",
    'category_id' => "3"
  ));


  DB::insert('category', array(
    'name' => "Communication and security"
  ));
  DB::insert('skill', array(
    'name' => "Networking",
    'category_id' => "4"
  ));
  DB::insert('skill', array(
    'name' => "Cryptography",
    'category_id' => "4"
  ));


  DB::insert('category', array(
    'name' => "Computer architecture"
  ));
  DB::insert('skill', array(
    'name' => "Operating Systems",
    'category_id' => "5"
  ));


  DB::insert('category', array(
    'name' => "Computer graphics"
  ));
  DB::insert('skill', array(
    'name' => "Image processing",
    'category_id' => "6"
  ));


  DB::insert('category', array(
    'name' => "Concurrent, parallel, and distributed systems"
  ));
  DB::insert('skill', array(
    'name' => "Concurrency",
    'category_id' => "7"
  ));
  DB::insert('skill', array(
    'name' => "Parallel computing",
    'category_id' => "7"
  ));


  DB::insert('category', array(
    'name' => "Databases"
  ));
  DB::insert('skill', array(
    'name' => "Relational databases",
    'category_id' => "8"
  ));
  DB::insert('skill', array(
    'name' => "Distributed computing",
    'category_id' => "8"
  ));


  DB::insert('category', array(
    'name' => "Programming languages and compilers"
  ));
  DB::insert('skill', array(
    'name' => "Python",
    'category_id' => "9"
  ));


  DB::insert('category', array(
    'name' => "Scientific computing"
  ));
  DB::insert('skill', array(
    'name' => "Symbolic computation",
    'category_id' => "10"
  ));
  DB::insert('skill', array(
    'name' => "Bioinformatics",
    'category_id' => "10"
  ));


  DB::insert('category', array(
    'name' => "Software engineering"
  ));
  DB::insert('skill', array(
    'name' => "Human-computer interaction",
    'category_id' => "11"
  ));
  DB::insert('skill', array(
    'name' => "Formal methods",
    'category_id' => "11"
  ));


  DB::insert('category', array(
    'name' => "Theory of computation"
  ));
  DB::insert('skill', array(
    'name' => "Quantum computing",
    'category_id' => "12"
  ));
?>
