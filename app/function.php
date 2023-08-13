<?php
session_start();
error_reporting(0);

//set_time_default
date_default_timezone_set('Asia/Bangkok');
require("../core/connect.core.php");
require("../core/config.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");
switch (htmlspecialchars($_GET['type'])) {
    case "delete_work":
		$getdata->my_sql_update($connect, "problem_list", "admin_update = '".$_SESSION['ukey']."', status = '0', date_update='" . date("Y-m-d") . "', time_update='" . date("H:i:s") . "'", "ticket ='" . htmlspecialchars($_GET['key']) . "'");
		echo '<script>window.location="index?p=service";</script>';
		break;
		case "delete_employee":
			$getdata->my_sql_update($connect, "employee", "em_status = '0'", "em_key='" . htmlspecialchars($_GET['key']) . "'");
			$getdata->my_sql_update($connect, "user", "user_status = '0'", "user_key='" . htmlspecialchars($_GET['key']) . "'");
			echo '<script>window.location="index?p=employee";</script>';
			break;
			case "delete_prefix":
				$getdata->my_sql_update($connect, "prefix_title", "prefix_status = '2'", "prefix_key='" . htmlspecialchars($_GET['key']) . "'");
				echo '<script>window.location="index?p=setting_system";</script>';
				break;
				case "delete_department":
					$getdata->my_sql_update($connect, "department_name", "department_status = '2'", "id='" . htmlspecialchars($_GET['key']) . "'");
					echo '<script>window.location="index?p=setting_system";</script>';
					break;
					case "delete_company":
						$getdata->my_sql_update($connect, "company", "cp_status = '2'", "id='" . htmlspecialchars($_GET['key']) . "'");
						echo '<script>window.location="index?p=setting_system";</script>';
						break;
						case "delete_location":
							$getdata->my_sql_update($connect, "locations", "status = '0'", "id='" . htmlspecialchars($_GET['key']) . "'");
							echo '<script>window.location="index?p=setting_system";</script>';
							break;
						case "delete_status":
							$getdata->my_sql_update($connect, "use_status", "status='2'", "status_key='" . htmlspecialchars($_GET['key']) . "'");
							echo '<script>window.location="index?p=setting_card_status";</script>';
							break;
							case "change_menu_status":
								if (htmlspecialchars($_GET['sts']) == "1") {
									$getdata->my_sql_update($connect, "menus", "menu_status='0'", "menu_key='" . htmlspecialchars($_GET['key']) . "'");
									$getdata->my_sql_update($connect, "access_list", "access_status='0'", "access_key='" . htmlspecialchars($_GET['key']) . "'");
								} else {
									$getdata->my_sql_update($connect, "menus", "menu_status='1'", "menu_key='" . htmlspecialchars($_GET['key']) . "'");
									$getdata->my_sql_update($connect, "access_list", "access_status='1'", "access_key='" . htmlspecialchars($_GET['key']) . "'");
								}
						
								break;
								case "delete_page": // 2 เท่ากับลบ
									$getdata->my_sql_update($connect, "list", "case_status = '2'", "id='" . htmlspecialchars($_GET['key']) . "'");
									echo '<script>window.location="index.php?p=administrator_cases";</script>';
									break;
									case "download_backup":
										$getlink = $getdata->my_sql_query($connect, "backup_file", "backup_logs", "backup_key='" . htmlspecialchars($_GET['key']) . "'");
										$file = "../backup/" . $getlink->backup_file;
										$filename = $getlink->backup_file;
										header("Content-Description: Clear Download");
										header("Content-Type: application/octet-stream");
										header("Content-Disposition: attachment; filename=\"$filename\"");
										readfile($file);
										break;
										case "restore":
											$getdata->my_sql_update($connect, "employee", "em_status = '1'", "em_key='" . htmlspecialchars($_GET['key']) . "'");
											$getdata->my_sql_update($connect, "user", "user_status = '1'", "user_key='" . htmlspecialchars($_GET['key']) . "'");
											echo '<script>window.location="index?p=setting_users";</script>';
											break;
											case "restoreemployee":
												$getdata->my_sql_update($connect, "employee", "em_status = '1'", "em_key='" . htmlspecialchars($_GET['key']) . "'");
												echo '<script>window.location="index?p=employee";</script>';
												break;
}
?>