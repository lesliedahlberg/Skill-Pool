<?
  require_once "lib/php/meekrodb.class.php";
  DB::$user = 'root';
  DB::$dbName = 'skill_pool';

  /*  OBS! För att använda:

      Ta bort hela databasen, kör install.php först och sedan populate_db.php ... annars kan vi lägga in detta i install scriptet.

      ( Insert av skills, som ni ser längst ner, fungerar inte så bra om ni tidigare haft kategorier som sedan tagits bort.
      Detta på grund av AUTO INCREMENT värdet som ju inte börjar om från 0 ... )

  */


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
    'verification_code' => "63a9f0ea7bb98050796b649e85481845",
    'zip_code' => "20500"
  ));

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
    'verification_code' => "63a9f0ea7bb98050796b649e85481845",
    'zip_code' => "20300"
  ));

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
    'verification_code' => "63a9f0ea7bb98050796b649e85481845",
    'zip_code' => "72347"
  ));

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
    'verification_code' => "63a9f0ea7bb98050796b649e85481845",
    'zip_code' => "72347"
  ));

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
    'verification_code' => "63a9f0ea7bb98050796b649e85481845",
    'zip_code' => "72347"
  ));

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
    'verification_code' => "63a9f0ea7bb98050796b649e85481845",
    'zip_code' => "750 23"
  ));

  DB::update('user', array(
    'about_me' => "Student of Computer Science",
    'city' => "Västerås",
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
