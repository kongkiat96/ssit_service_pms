# Dump of access_list 
# Dump DATE : 14-Aug-2023

DROP TABLE IF EXISTS access_list;
CREATE TABLE access_list (
  access_key char(32) NOT NULL,
  access_name varchar(256) NOT NULL,
  access_detail text NOT NULL,
  access_class int(11) DEFAULT '0',
  access_status tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (access_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO access_list VALUES("3ea03351897df2d73bf8cf9490320d32","เพิ่มผู้เข้าพัก","guest",0,1);
INSERT INTO access_list VALUES("42a506d013f41c3ca988f22d0e7cdeb8","อาคาร Horizon","building_2",0,1);
INSERT INTO access_list VALUES("7815696ecbf1c96e6894b779456d330e","อาคาร Vertical View","building_3",0,1);
INSERT INTO access_list VALUES("84c9bcdb1355355cada9fe3e97f1089e","รายงานผู้เข้าพัก","report",0,1);
INSERT INTO access_list VALUES("acac0001f4c9f206256b9a2dfe433b42","อาคาร Vertex View ","building_1",0,1);
INSERT INTO access_list VALUES("c2bb8023b1ae36aac9cbc8d16c1b27e6","ออกรายงาน","report",0,2);
INSERT INTO access_list VALUES("f1344bc0fb9c5594fa0e3d3f37a56957","เพิ่มผู้ใช้งาน","employee",0,1);



# Dump of access_user 
# Dump DATE : 14-Aug-2023

DROP TABLE IF EXISTS access_user;
CREATE TABLE access_user (
  access_key char(32) NOT NULL,
  user_key char(32) NOT NULL,
  access_status tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO access_user VALUES("84c9bcdb1355355cada9fe3e97f1089e","ce63f18f7cf0a712fd4a2f47bc9ae14c",1);
INSERT INTO access_user VALUES("42a506d013f41c3ca988f22d0e7cdeb8","ce63f18f7cf0a712fd4a2f47bc9ae14c",1);
INSERT INTO access_user VALUES("acac0001f4c9f206256b9a2dfe433b42","ce63f18f7cf0a712fd4a2f47bc9ae14c",1);
INSERT INTO access_user VALUES("7815696ecbf1c96e6894b779456d330e","ce63f18f7cf0a712fd4a2f47bc9ae14c",1);
INSERT INTO access_user VALUES("3ea03351897df2d73bf8cf9490320d32","ce63f18f7cf0a712fd4a2f47bc9ae14c",1);
INSERT INTO access_user VALUES("f1344bc0fb9c5594fa0e3d3f37a56957","ce63f18f7cf0a712fd4a2f47bc9ae14c",1);
INSERT INTO access_user VALUES("84c9bcdb1355355cada9fe3e97f1089e","6984cc373b759a8b703c4dc9adba3ed8",1);
INSERT INTO access_user VALUES("42a506d013f41c3ca988f22d0e7cdeb8","6984cc373b759a8b703c4dc9adba3ed8",1);
INSERT INTO access_user VALUES("acac0001f4c9f206256b9a2dfe433b42","6984cc373b759a8b703c4dc9adba3ed8",1);
INSERT INTO access_user VALUES("3ea03351897df2d73bf8cf9490320d32","6984cc373b759a8b703c4dc9adba3ed8",1);
INSERT INTO access_user VALUES("f1344bc0fb9c5594fa0e3d3f37a56957","6984cc373b759a8b703c4dc9adba3ed8",1);



# Dump of area_type 
# Dump DATE : 14-Aug-2023

DROP TABLE IF EXISTS area_type;
CREATE TABLE area_type (
  id int(11) NOT NULL AUTO_INCREMENT,
  area_type varchar(45) DEFAULT NULL COMMENT 'พื้นที่',
  area_status int(1) NOT NULL DEFAULT '1' COMMENT '1 use 0 del',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;



INSERT INTO area_type VALUES(1,"ฐานจาน และตู้คอนเทนเนอร์",1);
INSERT INTO area_type VALUES(2,"อาคาร Horizon",1);
INSERT INTO area_type VALUES(3,"อาคาร Space Centerium",1);
INSERT INTO area_type VALUES(4,"อาคาร Space Inspirium (SI)",1);
INSERT INTO area_type VALUES(5,"อาคาร Vertex View",1);
INSERT INTO area_type VALUES(6,"อาคาร Vertical View",1);
INSERT INTO area_type VALUES(7,"อาคาร Visionarium",1);
INSERT INTO area_type VALUES(8,"อาคารควบคุมดาวเทียม THEOS",1);
INSERT INTO area_type VALUES(9,"อาคารที่จอดรถ และสันทนาการ",1);
INSERT INTO area_type VALUES(10,"อาคารศูนย์ภูมิสารสนเทศสิรินธร (สภ.)",1);
INSERT INTO area_type VALUES(11,"อาคารสถานีดาวเทียม THEOS",1);



# Dump of backup_logs 
# Dump DATE : 14-Aug-2023

DROP TABLE IF EXISTS backup_logs;
CREATE TABLE backup_logs (
  backup_key varchar(32) NOT NULL,
  backup_file varchar(256) NOT NULL,
  backup_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  user_key char(32) NOT NULL,
  PRIMARY KEY (backup_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






# Dump of bm_guest 
# Dump DATE : 14-Aug-2023

DROP TABLE IF EXISTS bm_guest;
CREATE TABLE bm_guest (
  key_guest char(32) NOT NULL,
  code varchar(50) DEFAULT NULL,
  prefix_name varchar(10) DEFAULT NULL,
  fname varchar(100) DEFAULT NULL,
  lname varchar(100) DEFAULT NULL,
  position varchar(255) DEFAULT NULL,
  tel varchar(50) DEFAULT NULL,
  id_card varchar(20) DEFAULT NULL,
  pic varchar(100) DEFAULT NULL,
  detail text,
  status int(2) DEFAULT '1',
  building int(2) NOT NULL,
  floor int(2) NOT NULL,
  room int(2) NOT NULL,
  check_in varchar(50) DEFAULT NULL,
  check_out varchar(50) DEFAULT NULL,
  user_key char(32) NOT NULL,
  sys_procress int(1) DEFAULT '0',
  create_time date NOT NULL,
  update_time datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  status_guest varchar(45) DEFAULT NULL,
  department varchar(50) DEFAULT NULL,
  end_date varchar(20) DEFAULT NULL,
  status_guest_detail varchar(45) DEFAULT NULL,
  PRIMARY KEY (key_guest)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO bm_guest VALUES("0f690d35d5f63ce15c5d41709ffdb49d","CIEWBZG","1","ณัฐพงษ์(เดิม)","สว่างแข ","นักพัฒนานวัตกรรม","-","-","CIEWBZG-2.png",NULL,0,1,1,5,"2020-10-01T11:45","2021-09-30T11:46","6984cc373b759a8b703c4dc9adba3ed8",1,"2021-10-18","2021-10-18 11:50:37",NULL,NULL,NULL,NULL);
INSERT INTO bm_guest VALUES("22efeae2fd154192fd17db01cdb2a313","C6C16SBO",NULL,"Test","TRG","GGG","01234",NULL,NULL,NULL,2,3,10,105,"2023-08-09","2023-08-11","ce63f18f7cf0a712fd4a2f47bc9ae14c",1,"2023-08-06","2023-08-07 00:35:27","3","2","2023-08-22","2");
INSERT INTO bm_guest VALUES("4501a863901730ca4ee73103e5ba3e7b","CUDRWSBT",NULL,"ธัญชนก","ปริวัตรพันธ์","นักพัฒนานวัตกรรม","0921111111",NULL,"CUDRWSBT-istockphoto-861919404-1024x1024.jpg",NULL,2,2,5,53,"2023-08-11","2023-10-31","ce63f18f7cf0a712fd4a2f47bc9ae14c",1,"2023-08-11","2023-08-11 14:48:45","3","3","2023-10-31","1");
INSERT INTO bm_guest VALUES("6936d0c56f92fdc4d74a0a86cff83a0a","C40B0D0L","3","ฐิติรัตน์","แบบวา","นักบริการวิชาการ","096-319-5540",NULL,"C40B0D0L-1.png",NULL,2,1,1,1,"2023-08-14",NULL,"ce63f18f7cf0a712fd4a2f47bc9ae14c",1,"2021-10-18","2023-08-14 06:47:32","3","2","2023-08-26","1");
INSERT INTO bm_guest VALUES("69629951c0343fae4281d8f507c9ef4e","C7WFVU0I","2","asdas","asdasd","asdasd","1231231231",NULL,NULL,NULL,1,1,2,10,NULL,NULL,"ce63f18f7cf0a712fd4a2f47bc9ae14c",0,"2023-08-14","2023-08-14 02:00:37","1","2",NULL,NULL);
INSERT INTO bm_guest VALUES("8773c2e3e33ab792e0dcf24680291391","C7XQ41DL","1","ชื่อ","นามสกุล","ERP","01234567890","1234312345467",NULL,NULL,1,1,1,3,"2023-05-11T00:14","2023-05-13T00:14","ce63f18f7cf0a712fd4a2f47bc9ae14c",1,"2023-05-10","2023-05-11 00:46:50",NULL,NULL,NULL,NULL);
INSERT INTO bm_guest VALUES("c2b749f17ce619f0ff791ea7a1a9e5d5","C7570H4E","1","S","A","SW","0123456789","1112323425561",NULL,NULL,0,1,1,3,"2023-05-10T23:15","2023-05-11T23:15","ce63f18f7cf0a712fd4a2f47bc9ae14c",1,"2023-05-10","2023-05-10 23:23:57",NULL,NULL,NULL,NULL);
INSERT INTO bm_guest VALUES("ca47334c77acc4244a9e0143347ccac5","CO63YIIX",NULL,"มณีรัตน์","ชัยวัชนันท์","นักจัดการงานทั่วไป","0925459399",NULL,NULL,NULL,1,1,2,10,NULL,NULL,"ce63f18f7cf0a712fd4a2f47bc9ae14c",0,"2023-08-07","2023-08-07 15:15:05","3","5","2023-09-30",NULL);
INSERT INTO bm_guest VALUES("ceb615862f77848fa5bb08f3d559ce0b","CDS4VXJQ","1","ณัฐพงษ์","สว่างแข ","นักพัฒนานวัตกรรม","-","-","CDS4VXJQ-2.png",NULL,9,1,1,5,"2021-10-01T11:50","2022-08-31T11:50","ce63f18f7cf0a712fd4a2f47bc9ae14c",2,"2021-10-18","2023-05-10 23:23:05",NULL,NULL,NULL,NULL);
INSERT INTO bm_guest VALUES("d1c168b0f3bbcce9ff1e3984a71c944c","CESS3VJ","1","ทดสอบ","เพิ่มข้อมูล","พัฒนาระบบ","0939406155","1129900435882",NULL,"ทดสอบ",2,2,5,52,"2023-05-14","2023-05-16","ce63f18f7cf0a712fd4a2f47bc9ae14c",1,"2023-05-13","2023-05-14 20:01:08","3","โปรแกรมเมอร์","2023-05-16","2");
INSERT INTO bm_guest VALUES("fc072b38a00301526bdbc7ce52d80084","C73HGVPR","1","เทส","ทดสอบ","สว","1231231231",NULL,"C73HGVPR-5229448.png",NULL,2,1,2,10,"2023-08-14",NULL,"ce63f18f7cf0a712fd4a2f47bc9ae14c",1,"2023-08-14","2023-08-14 05:57:32","3","2","2023-08-25","1");
INSERT INTO bm_guest VALUES("ffe9bd7c570d0862fdd396cd6733911a","C98RXSNC","2","ทิพวัลย์","ช้างโรจน์ ","เลขานุการ (ลจ. สทอภ.)","084-674-4679","084-674-4679","C98RXSNC-1.png",NULL,2,1,1,2,"2020-10-01T11:35","2022-09-30T11:35","6984cc373b759a8b703c4dc9adba3ed8",1,"2021-10-18","2021-10-18 11:37:17",NULL,NULL,NULL,NULL);



# Dump of bm_guest_detail 
# Dump DATE : 14-Aug-2023

DROP TABLE IF EXISTS bm_guest_detail;
CREATE TABLE bm_guest_detail (
  ID int(6) NOT NULL AUTO_INCREMENT,
  prefix_name varchar(10) DEFAULT NULL,
  fname varchar(100) DEFAULT NULL,
  lname varchar(100) DEFAULT NULL,
  position varchar(255) DEFAULT NULL,
  relation varchar(10) DEFAULT NULL,
  tel varchar(50) DEFAULT NULL,
  id_card varchar(20) DEFAULT NULL,
  pic varchar(100) DEFAULT NULL,
  detail text,
  code_guest varchar(20) NOT NULL,
  user_key varchar(100) NOT NULL,
  create_time datetime NOT NULL,
  update_time datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (ID),
  KEY code_guest (code_guest)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;



INSERT INTO bm_guest_detail VALUES(1,"1","นนทิการ","แบบวา",NULL,"1",NULL,NULL,"C40B0D0L-detail-2.png",NULL,"C40B0D0L","6984cc373b759a8b703c4dc9adba3ed8","2021-10-18 11:30:28","2021-10-18 11:30:28");
INSERT INTO bm_guest_detail VALUES(2,"1","sD","WW","SX","2","1234567890","123454321234",NULL,NULL,"C7570H4E","ce63f18f7cf0a712fd4a2f47bc9ae14c","2023-05-10 23:14:04","2023-05-10 23:14:28");
INSERT INTO bm_guest_detail VALUES(5,"2","DF","DD",NULL,NULL,NULL,NULL,NULL,NULL,"C7XQ41DL","ce63f18f7cf0a712fd4a2f47bc9ae14c","2023-05-11 00:35:27","2023-05-11 00:35:27");
INSERT INTO bm_guest_detail VALUES(10,"1","FG","FR","GGG","2","01234",NULL,"C73HGVPR-detail-5229448.png",NULL,"C73HGVPR","ce63f18f7cf0a712fd4a2f47bc9ae14c","2023-08-14 05:28:15","2023-08-14 05:28:15");
INSERT INTO bm_guest_detail VALUES(13,"1","FG","FR","GGG","2","01234",NULL,"C73HGVPR-detail-5229448.png",NULL,"C73HGVPR","ce63f18f7cf0a712fd4a2f47bc9ae14c","2023-08-14 05:29:27","2023-08-14 05:29:27");
INSERT INTO bm_guest_detail VALUES(15,"1","FG","FR","GGG","2","01234",NULL,"C73HGVPR-detail-5229448.png",NULL,"C73HGVPR","ce63f18f7cf0a712fd4a2f47bc9ae14c","2023-08-14 05:30:15","2023-08-14 05:30:15");



# Dump of company 
# Dump DATE : 14-Aug-2023

DROP TABLE IF EXISTS company;
CREATE TABLE company (
  id int(11) NOT NULL AUTO_INCREMENT,
  company_name varchar(255) DEFAULT NULL COMMENT 'ชื่อบริษัท',
  cp_status int(2) NOT NULL DEFAULT '1' COMMENT '1 ปกติ 0 ลบ',
  show_it int(1) NOT NULL DEFAULT '0' COMMENT '1 แสดง 0 ไม่แสดง',
  show_asset int(1) NOT NULL DEFAULT '0' COMMENT '1 แสดง 0 ไม่แสดง',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;



INSERT INTO company VALUES(1,"บริษัท ทดสอบ จำกัด",1,1,1);



# Dump of department_name 
# Dump DATE : 14-Aug-2023

DROP TABLE IF EXISTS department_name;
CREATE TABLE department_name (
  id int(11) NOT NULL AUTO_INCREMENT,
  department_name varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชื่อแผนก',
  department_status int(1) NOT NULL DEFAULT '1' COMMENT '1 use 0 del',
  PRIMARY KEY (id) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



INSERT INTO department_name VALUES(1,"นักวิจัย/สวภ",1);
INSERT INTO department_name VALUES(2,"นักบริการวิชาการ/กภด",1);
INSERT INTO department_name VALUES(3,"อื่น ๆ",1);
INSERT INTO department_name VALUES(4,"สสว",1);
INSERT INTO department_name VALUES(5,"สำนักจัดการอุทยานรังสรรค์นวัตกรรมอวกาศ : สจอ.",1);
INSERT INTO department_name VALUES(6,"ssq",2);



# Dump of employee 
# Dump DATE : 14-Aug-2023

DROP TABLE IF EXISTS employee;
CREATE TABLE employee (
  card_key char(32) NOT NULL,
  title_name int(2) DEFAULT NULL,
  name varchar(150) DEFAULT NULL,
  lastname varchar(255) DEFAULT NULL,
  user_position varchar(100) DEFAULT NULL COMMENT 'ตำแหน่ง',
  user_department varchar(100) DEFAULT NULL COMMENT 'แผนก',
  department_id int(11) DEFAULT NULL COMMENT 'บริษัทอิงจาก company',
  em_status int(2) DEFAULT '1' COMMENT '1 ปกติ 0 ลบ',
  date_create datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (card_key)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



INSERT INTO employee VALUES("ce63f18f7cf0a712fd4a2f47bc9ae14c",1,"ผู้ดูแล","ระบบ","ITs",NULL,0,1,"2023-08-14 15:42:33");
INSERT INTO employee VALUES("924fa24cb81dbd80c739e667b5a6f4b2",1,"ทดสอบ","เพิ่มข้อมูล","test",NULL,NULL,0,"2023-08-14 17:16:21");



# Dump of list 
# Dump DATE : 14-Aug-2023

DROP TABLE IF EXISTS list;
CREATE TABLE list (
  id int(3) unsigned NOT NULL AUTO_INCREMENT,
  cases varchar(64) NOT NULL,
  menu varchar(64) NOT NULL,
  pages varchar(128) NOT NULL,
  case_status tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;



INSERT INTO list VALUES(1,"setting","setting","settings/setting.php",1);
INSERT INTO list VALUES(2,"employee","employee","employee/index.php",1);
INSERT INTO list VALUES(50,"case_all_repair","asset","asset/view/case_all_repair.php",2);
INSERT INTO list VALUES(8,"setting_users","setting","settings/setting_users.php",1);
INSERT INTO list VALUES(9,"setting_backup","setting","settings/setting_backup.php",1);
INSERT INTO list VALUES(10,"setting_info","setting","settings/setting_info.php",1);
INSERT INTO list VALUES(11,"setting_system","setting","settings/setting_system.php",1);
INSERT INTO list VALUES(12,"setting_user_access","setting","settings/setting_user_access.php",1);
INSERT INTO list VALUES(13,"administrator_access_list","setting","administrator/administrator_access_list.php",1);
INSERT INTO list VALUES(14,"administrator_cases","setting","administrator/administrator_cases.php",1);
INSERT INTO list VALUES(15,"administrator_menus","setting","administrator/administrator_menus.php",1);
INSERT INTO list VALUES(16,"administrator_modules","setting","administrator/administrator_modules.php",1);
INSERT INTO list VALUES(17,"administrator_helper","seting","administrator/administrator_helper.php",1);
INSERT INTO list VALUES(51,"asset2","asset2","asset2/index.php",2);
INSERT INTO list VALUES(55,"all_repair","asset2","asset2/view/all_repair.php",2);
INSERT INTO list VALUES(26,"setting_card_status","setting","settings/setting_card_status.php",1);
INSERT INTO list VALUES(29,"administrator_log","setting","administrator/administrator_log.php",1);
INSERT INTO list VALUES(54,"asset_history2","asset2","asset2/asset_history.php",2);
INSERT INTO list VALUES(33,"asset_history","asset","asset/asset_history.php",2);
INSERT INTO list VALUES(41,"view_info","setting","settings/view_info.php",1);
INSERT INTO list VALUES(42,"assetall","asset","asset/assetall.php",2);
INSERT INTO list VALUES(43,"printbarcode","asset","asset/printbarcode.php",2);
INSERT INTO list VALUES(44,"setting_services","setting","settings/setting_services.php",1);
INSERT INTO list VALUES(47,"asset","asset","asset/index.php",2);
INSERT INTO list VALUES(48,"setting_app","setting","settings/setting_app.php",1);
INSERT INTO list VALUES(53,"assetall2","asset2","asset2/assetall.php",2);
INSERT INTO list VALUES(56,"building_1","building_1","building_1/index.php",1);
INSERT INTO list VALUES(57,"setting_room","setting","settings/setting_room.php",1);
INSERT INTO list VALUES(58,"guest","guest","guest/index.php",1);
INSERT INTO list VALUES(59,"guest_detail","guest","guest/guest_detail.php",1);
INSERT INTO list VALUES(60,"building_2","building_2","building_2/index.php",1);
INSERT INTO list VALUES(61,"report","report","report/index.php",1);
INSERT INTO list VALUES(62,"building_3","building_3","building_3/index.php",1);



# Dump of logs 
# Dump DATE : 14-Aug-2023

DROP TABLE IF EXISTS logs;
CREATE TABLE logs (
  log_key varchar(16) NOT NULL,
  log_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  log_ipaddress varchar(32) NOT NULL,
  log_text varchar(256) NOT NULL,
  log_user varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



INSERT INTO logs VALUES("998e6aec8cab2374","2021-09-22 10:54:45","124.120.123.37","superadmin ออกจากระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("877432319b127a87","2021-09-22 10:54:49","124.120.123.37","test01 เข้าสู่ระบบ.","899b55ae535ba2020b73701221f47a4b");
INSERT INTO logs VALUES("2a0c81b93a377410","2021-09-22 10:55:12","124.120.123.37","test01 ออกจากระบบ.","899b55ae535ba2020b73701221f47a4b");
INSERT INTO logs VALUES("06a0b5219bfb57b4","2021-09-22 10:55:16","124.120.123.37","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("5abaed7389c63f12","2021-09-22 12:15:32","124.120.123.37","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("81d07791b8de8aa6","2021-09-22 12:15:42","124.120.123.37","superadmin ออกจากระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("49206dd64b8083e3","2021-10-15 15:09:58","103.156.150.254","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("a6b313ae1c6d7c7c","2021-10-15 15:12:39","103.156.150.254","superadmin ออกจากระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("d4bb159e796e7d7f","2021-10-17 10:45:55","182.232.54.89","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("2eb3d65b6070001d","2021-10-17 10:55:06","182.232.54.89","superadmin ออกจากระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("cf90bcd6c0afa99b","2021-10-17 10:55:18","182.232.54.89","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("c03a7d103640f874","2021-10-17 10:56:26","182.232.54.89","superadmin ออกจากระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("1c07f972184f7659","2021-10-17 10:56:56","182.232.54.89","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("41e3b46d6601b796","2021-10-17 11:00:08","182.232.54.89","superadmin ออกจากระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("a2aec987f112633c","2021-10-17 11:00:18","182.232.54.89","ekapong@gistda.or.th เข้าสู่ระบบ.","6984cc373b759a8b703c4dc9adba3ed8");
INSERT INTO logs VALUES("999c31b519c7deec","2021-10-18 11:23:22","103.156.150.254","ekapong@gistda.or.th เข้าสู่ระบบ.","6984cc373b759a8b703c4dc9adba3ed8");
INSERT INTO logs VALUES("50a69cf615e20a33","2021-10-18 11:40:19","103.156.150.254","ekapong@gistda.or.th ออกจากระบบ.","6984cc373b759a8b703c4dc9adba3ed8");
INSERT INTO logs VALUES("3ab258b3ba5dd40a","2021-10-18 11:40:47","103.156.150.254","ekapong.tg@gmail.com เข้าสู่ระบบ.","f79954707e2febb6a105b547fd291293");
INSERT INTO logs VALUES("f1ad280fe6e19855","2021-10-18 11:41:58","103.156.150.254","ekapong.tg@gmail.com ออกจากระบบ.","f79954707e2febb6a105b547fd291293");
INSERT INTO logs VALUES("7c9a5fa32c159172","2021-10-18 11:42:12","103.156.150.254","ekapong@gistda.or.th เข้าสู่ระบบ.","6984cc373b759a8b703c4dc9adba3ed8");
INSERT INTO logs VALUES("2c95022d34301c26","2021-10-18 13:22:49","103.156.150.254","ekapong@gistda.or.th ออกจากระบบ.","6984cc373b759a8b703c4dc9adba3ed8");
INSERT INTO logs VALUES("0b4059768b7eff42","2021-10-18 13:33:49","103.156.150.254","ekapong@gistda.or.th เข้าสู่ระบบ.","6984cc373b759a8b703c4dc9adba3ed8");
INSERT INTO logs VALUES("9bc6c10d38fd2f94","2021-10-18 13:37:15","103.156.150.254","ekapong@gistda.or.th ออกจากระบบ.","6984cc373b759a8b703c4dc9adba3ed8");
INSERT INTO logs VALUES("046305b3aac3d0c5","2021-10-19 16:03:48","103.156.150.254","ekapong@gistda.or.th เข้าสู่ระบบ.","6984cc373b759a8b703c4dc9adba3ed8");
INSERT INTO logs VALUES("3db52fc6af0c79bc","2021-10-19 16:04:52","103.156.150.254","ekapong@gistda.or.th ออกจากระบบ.","6984cc373b759a8b703c4dc9adba3ed8");
INSERT INTO logs VALUES("631dac9882e18a6b","2022-02-03 20:25:14","115.87.76.2","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("58491cc6ac0ed9ff","2023-05-10 23:04:49","::1","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("58491cc6ac0ed9ff","2023-05-13 14:38:22","::1","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("58491cc6ac0ed9ff","2023-05-13 17:48:11","::1","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("6beb530691249807","2023-05-14 20:02:39","::1","superadmin ออกจากระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("58491cc6ac0ed9ff","2023-07-31 18:48:35","::1","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("58491cc6ac0ed9ff","2023-07-31 19:14:01","::1","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("58491cc6ac0ed9ff","2023-08-06 22:59:43","::1","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("6beb530691249807","2023-08-07 08:52:56","::1","superadmin ออกจากระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("58491cc6ac0ed9ff","2023-08-07 09:33:42","::1","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("8b7b4c46b3fee5ad","2023-08-07 11:03:10","27.55.83.245","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("0b5b6249fe10d720","2023-08-07 11:06:56","27.55.83.245","superadmin ออกจากระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("20e02f5f88c21d09","2023-08-07 14:48:02","103.156.150.254","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("1135f894b29013da","2023-08-11 13:56:03","103.156.150.254","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("aec7b29aa9611a06","2023-08-11 15:03:19","103.156.150.254","superadmin ออกจากระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("1eabb7ec3b0c0397","2023-08-13 14:46:15","103.156.150.254","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("e62be53080a3cbb6","2023-08-13 15:32:18","103.156.150.254","superadmin ออกจากระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("2c88f01c1217f32f","2023-08-13 21:04:43","124.120.21.97","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("6beb530691249807","2023-08-14 16:02:19","::1","superadmin ออกจากระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("58491cc6ac0ed9ff","2023-08-14 16:03:02","::1","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("6beb530691249807","2023-08-14 16:13:44","::1","superadmin ออกจากระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");
INSERT INTO logs VALUES("58491cc6ac0ed9ff","2023-08-14 16:13:53","::1","superadmin เข้าสู่ระบบ.","ce63f18f7cf0a712fd4a2f47bc9ae14c");



# Dump of members_prefix 
# Dump DATE : 14-Aug-2023

DROP TABLE IF EXISTS members_prefix;
CREATE TABLE members_prefix (
  prefix_code int(3) unsigned NOT NULL AUTO_INCREMENT,
  prefix_key varchar(32) NOT NULL,
  prefix_title varchar(64) NOT NULL,
  prefix_status tinyint(1) NOT NULL,
  prefix_insert timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (prefix_code)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;



INSERT INTO members_prefix VALUES(1,"00d3ee50b62c10ee1f590819a045ea47","นาย",1,"2019-01-04 15:22:28");
INSERT INTO members_prefix VALUES(2,"2f9f2c0fc106a86ea7cb3bca1a28de00","นางสาว",1,"2019-01-04 15:24:28");
INSERT INTO members_prefix VALUES(3,"b69fcedf741f32260fb2323fe8fdc9dc","นาง",1,"2019-01-04 15:26:28");
INSERT INTO members_prefix VALUES(4,"c50c44364721dd2fd78c9809ba63348b","ส่วนกลาง",1,"2019-04-20 16:39:01");
INSERT INTO members_prefix VALUES(5,"07e6dad4c35626e2eef6879f9e6bc224","Mr.",1,"2019-09-25 14:31:01");
INSERT INTO members_prefix VALUES(6,"7bb3cfcdc10f0830609626871f48a2e1","Miss.",1,"2019-09-25 14:31:15");
INSERT INTO members_prefix VALUES(7,"92fffc8038fb8082d8f3286cc95d68e3","ว่าง",1,"2020-01-28 16:13:04");
INSERT INTO members_prefix VALUES(8,"7f183ddcb3abf3cefdda95a434ba0d3a"," -",1,"2020-02-05 10:52:45");
INSERT INTO members_prefix VALUES(9,"aecb78619b671a76e672be6a2ee5060f","gml",2,"2023-08-14 16:48:12");



# Dump of menus 
# Dump DATE : 14-Aug-2023

DROP TABLE IF EXISTS menus;
CREATE TABLE menus (
  menu_key char(32) NOT NULL,
  menu_icon varchar(256) NOT NULL,
  menu_name varchar(128) NOT NULL COMMENT '<span class="pull-right"><span class="badge" id="card_count"></span></span>',
  menu_case varchar(128) NOT NULL,
  menu_link varchar(256) NOT NULL,
  menu_status tinyint(1) DEFAULT '1',
  menu_sorting int(11) NOT NULL,
  PRIMARY KEY (menu_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO menus VALUES("2309e0cdb2c541bf7cb8ef0dee7b7eba","fa-cogs","ตั้งค่า","setting","?p=setting",1,98);
INSERT INTO menus VALUES("3ea03351897df2d73bf8cf9490320d32","fa-user-plus","เพิ่มผู้เข้าพัก","guest","?p=guest",1,2);
INSERT INTO menus VALUES("42a506d013f41c3ca988f22d0e7cdeb8","fa-hotel","อาคาร Horizon","building_2","?p=building_2",1,4);
INSERT INTO menus VALUES("7815696ecbf1c96e6894b779456d330e","fa-hotel","อาคาร Vertical View","building_3","?p=building_3",1,5);
INSERT INTO menus VALUES("84c9bcdb1355355cada9fe3e97f1089e","fa-user-friends","รายงานผู้เข้าพัก","report","?p=report",1,6);
INSERT INTO menus VALUES("a16043256ea5ca0ea86995e2b69ec238","fa-home","หน้าแรก","","index.php",1,1);
INSERT INTO menus VALUES("acac0001f4c9f206256b9a2dfe433b42","fa-hotel","อาคาร Vertex View ","building_1","?p=building_1",1,3);
INSERT INTO menus VALUES("c2bb8023b1ae36aac9cbc8d16c1b27e6","fa-file-csv","ออกรายงาน","report","?p=report",2,6);
INSERT INTO menus VALUES("c6c8729b45d1fec563f8453c16ff03b8","fa-sign-out-alt","ออกจากระบบ","logout","../core/logout.core.php",1,99);
INSERT INTO menus VALUES("f1344bc0fb9c5594fa0e3d3f37a56957","fa-users","เพิ่มผู้ใช้งาน","employee","?p=employee",1,7);



# Dump of service 
# Dump DATE : 14-Aug-2023

DROP TABLE IF EXISTS service;
CREATE TABLE service (
  se_id int(11) NOT NULL AUTO_INCREMENT,
  se_sort int(3) DEFAULT '0',
  se_name varchar(200) DEFAULT NULL,
  se_group varchar(100) DEFAULT NULL,
  se_status int(1) DEFAULT '1',
  data_time datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (se_id)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;



INSERT INTO service VALUES(1,0,"ชั้น 1","1",1,"2023-07-31 20:01:25");
INSERT INTO service VALUES(2,0,"ชั้น 2","1",1,"2021-08-02 23:53:53");
INSERT INTO service VALUES(3,0,"ชั้น 3","1",1,"2021-08-02 23:54:00");
INSERT INTO service VALUES(4,0,"ชั้น 4","1",1,"2021-08-02 23:54:06");
INSERT INTO service VALUES(5,0,"ชั้น 1","2",1,"2021-08-02 23:54:17");
INSERT INTO service VALUES(6,0,"ชั้น 2","2",1,"2021-08-02 23:54:23");
INSERT INTO service VALUES(7,0,"ชั้น 3","2",1,"2021-08-02 23:54:29");
INSERT INTO service VALUES(8,0,"ชั้น 4","2",1,"2021-08-02 23:54:35");
INSERT INTO service VALUES(10,0,"ชั้น 1","3",1,"2023-07-31 20:43:06");
INSERT INTO service VALUES(11,0,"ชั้น 2","3",1,"2023-08-14 17:56:05");



# Dump of service_list 
# Dump DATE : 14-Aug-2023

DROP TABLE IF EXISTS service_list;
CREATE TABLE service_list (
  se_li_id int(11) NOT NULL AUTO_INCREMENT,
  se_id int(11) NOT NULL,
  se_group int(3) NOT NULL,
  se_li_name varchar(200) NOT NULL,
  se_li_status int(1) NOT NULL DEFAULT '1',
  data_time datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (se_li_id,se_id)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;



INSERT INTO service_list VALUES(1,1,1,"V101",2,"2021-10-18 11:31:43");
INSERT INTO service_list VALUES(2,1,1,"V102",2,"2021-10-18 11:37:17");
INSERT INTO service_list VALUES(3,1,1,"V103",2,"2023-05-11 00:47:05");
INSERT INTO service_list VALUES(4,1,1,"V104",1,"2023-05-13 18:02:51");
INSERT INTO service_list VALUES(5,1,1,"V105",1,"2023-05-10 23:23:05");
INSERT INTO service_list VALUES(6,1,1,"V106",1,"2021-08-03 00:00:35");
INSERT INTO service_list VALUES(7,1,1,"V107",1,"2021-08-03 00:00:35");
INSERT INTO service_list VALUES(8,1,1,"V108",1,"2021-08-03 00:00:35");
INSERT INTO service_list VALUES(9,2,1,"V201",1,"2021-08-03 00:02:13");
INSERT INTO service_list VALUES(10,2,1,"V202",2,"2023-08-14 05:57:32");
INSERT INTO service_list VALUES(11,2,1,"V203",1,"2021-08-03 00:04:50");
INSERT INTO service_list VALUES(12,2,1,"V204",1,"2021-08-03 00:04:52");
INSERT INTO service_list VALUES(13,2,1,"V205",1,"2021-08-03 00:04:53");
INSERT INTO service_list VALUES(14,2,1,"V206",1,"2021-08-03 00:04:54");
INSERT INTO service_list VALUES(15,2,1,"V207",1,"2021-08-03 00:04:57");
INSERT INTO service_list VALUES(16,2,1,"V208",1,"2021-08-03 00:05:00");
INSERT INTO service_list VALUES(17,2,1,"V209",1,"2021-08-03 00:07:18");
INSERT INTO service_list VALUES(18,2,1,"V210",1,"2021-08-03 00:07:18");
INSERT INTO service_list VALUES(19,2,1,"V211",1,"2021-08-03 00:07:18");
INSERT INTO service_list VALUES(20,2,1,"V212",1,"2021-08-03 00:07:18");
INSERT INTO service_list VALUES(21,2,1,"V213",1,"2021-08-03 00:07:18");
INSERT INTO service_list VALUES(22,2,1,"V214",1,"2021-08-03 00:07:18");
INSERT INTO service_list VALUES(23,2,1,"V215",1,"2021-08-03 00:07:18");
INSERT INTO service_list VALUES(24,3,1,"V301",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(25,3,1,"V302",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(26,3,1,"V303",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(27,3,1,"V304",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(28,3,1,"V305",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(29,3,1,"V306",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(30,3,1,"V307",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(31,3,1,"V308",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(32,3,1,"V309",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(33,3,1,"V310",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(34,3,1,"V311",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(35,3,1,"V312",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(36,3,1,"V313",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(37,3,1,"V314",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(38,3,1,"V315",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(39,4,1,"V401",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(40,4,1,"V402",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(41,4,1,"V403",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(42,4,1,"V404",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(43,4,1,"V405",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(44,4,1,"V406",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(45,4,1,"V407",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(46,4,1,"V408",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(47,4,1,"V409",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(48,4,1,"V410",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(49,4,1,"V411",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(50,4,1,"V412",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(51,4,1,"V413",1,"2021-08-03 00:11:10");
INSERT INTO service_list VALUES(52,5,2,"H101",2,"2023-05-14 19:56:35");
INSERT INTO service_list VALUES(53,5,2,"H102",2,"2023-08-11 14:43:47");
INSERT INTO service_list VALUES(54,5,2,"H103",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(55,5,2,"H104",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(56,5,2,"H105",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(57,5,2,"H106",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(58,5,2,"H107",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(59,5,2,"H108",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(60,5,2,"H109",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(61,6,2,"H201",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(62,6,2,"H202",1,"2021-09-06 22:13:33");
INSERT INTO service_list VALUES(63,6,2,"H203",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(64,6,2,"H204",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(65,6,2,"H205",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(66,6,2,"H206",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(67,6,2,"H207",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(68,6,2,"H208",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(69,6,2,"H209",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(70,6,2,"H210",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(71,6,2,"H211",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(72,6,2,"H212",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(73,6,2,"H213",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(74,7,2,"H301",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(75,7,2,"H302",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(76,7,2,"H303",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(77,7,2,"H304",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(78,7,2,"H305",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(79,7,2,"H306",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(80,7,2,"H307",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(81,7,2,"H308",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(82,7,2,"H309",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(83,7,2,"H310",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(84,7,2,"H311",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(85,7,2,"H312",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(86,7,2,"H313",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(87,7,2,"H314",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(88,7,2,"H315",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(89,8,2,"H401",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(90,8,2,"H402",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(91,8,2,"H403",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(92,8,2,"H404",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(93,8,2,"H405",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(94,8,2,"H406",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(95,8,2,"H407",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(96,8,2,"H408",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(97,8,2,"H409",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(98,8,2,"H410",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(99,8,2,"H411",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(100,8,2,"H412",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(101,8,2,"H413",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(102,8,2,"H414",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(103,8,2,"H415",1,"2021-08-03 00:18:32");
INSERT INTO service_list VALUES(104,1,1,"5555555",0,"2023-07-31 19:28:45");
INSERT INTO service_list VALUES(105,10,3,"VT101",2,"2023-08-07 00:35:09");
INSERT INTO service_list VALUES(106,10,3,"VT102",1,"2023-08-07 11:05:44");
INSERT INTO service_list VALUES(107,10,3,"VT103",1,"2023-08-07 11:06:09");
INSERT INTO service_list VALUES(108,10,3,"VT104",1,"2023-08-07 11:06:18");
INSERT INTO service_list VALUES(109,11,3,"VT201",1,"2023-08-07 11:06:39");
INSERT INTO service_list VALUES(110,10,3,"FG",0,"2023-08-14 17:57:01");
INSERT INTO service_list VALUES(111,10,3,"FG",0,"2023-08-14 17:57:17");
INSERT INTO service_list VALUES(112,10,3,"FG",0,"2023-08-14 17:57:07");
INSERT INTO service_list VALUES(113,10,3,"FG",0,"2023-08-14 17:57:11");
INSERT INTO service_list VALUES(114,11,3,"FGT",0,"2023-08-14 17:56:48");



# Dump of system_info 
# Dump DATE : 14-Aug-2023

DROP TABLE IF EXISTS system_info;
CREATE TABLE system_info (
  a int(2) NOT NULL AUTO_INCREMENT,
  site_key varchar(255) NOT NULL,
  site_logo varchar(256) NOT NULL,
  site_favicon varchar(256) NOT NULL,
  site_name varchar(255) DEFAULT NULL,
  site_color_form varchar(255) DEFAULT NULL,
  site_color_name varchar(255) DEFAULT NULL,
  time_zone varchar(128) NOT NULL,
  PRIMARY KEY (a)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



INSERT INTO system_info VALUES(1,"l32xunIVtbGv9sYCdt17Uwjrwg4aSntQRHm8TttR7Hp","DJI_0541.JPG","DJI_0541.JPG","ระบบบริหารจัดการทะเบียนผู้พักอาศัย","#efebeb","#0a0a0a","Asia/Bangkok");



# Dump of user 
# Dump DATE : 14-Aug-2023

DROP TABLE IF EXISTS user;
CREATE TABLE user (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_key char(32) NOT NULL,
  name varchar(64) NOT NULL,
  lastname varchar(64) DEFAULT NULL,
  username varchar(64) NOT NULL,
  password varchar(32) NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  user_photo varchar(128) NOT NULL DEFAULT 'noimg.jpg',
  user_class tinyint(1) NOT NULL DEFAULT '2' COMMENT '1=user,2=admin,3=super admin',
  user_status tinyint(1) NOT NULL DEFAULT '1',
  email varchar(128) DEFAULT NULL,
  data_time datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;



INSERT INTO user VALUES(1,"ce63f18f7cf0a712fd4a2f47bc9ae14c","ผู้ดูแล","ระบบ","superadmin","fcea920f7412b5da7be0cf42b8c93759","noimg.jpg",3,1,"admin@admin.com","2023-08-14 15:52:09");
INSERT INTO user VALUES(9,"924fa24cb81dbd80c739e667b5a6f4b2","ทดสอบ","เพิ่มข้อมูล","test01","e10adc3949ba59abbe56e057f20f883e","noimg.jpg",2,1,"a@b.com","2023-08-14 17:16:31");



# Dump of user_online 
# Dump DATE : 14-Aug-2023

DROP TABLE IF EXISTS user_online;
CREATE TABLE user_online (
  osession varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  user_key varchar(32) CHARACTER SET utf8 NOT NULL,
  otime int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO user_online VALUES("95522vphtn7a7tbgki5envcgs4","85dc6d4bd6e7189330a9e2b7b39408c2",1566376833);



