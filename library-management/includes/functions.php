<?php
function e($v){ return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
function url($path=''){ return BASE_URL . '/' . ltrim($path,'/'); }
function api_url($path=''){ return API_URL . '/' . ltrim($path,'/'); }
function redirect_to($path){ header('Location: '.url($path)); exit; }
function flash($key,$message=null){ if($message!==null){ $_SESSION['flash'][$key]=$message; return; } if(!empty($_SESSION['flash'][$key])){ $m=$_SESSION['flash'][$key]; unset($_SESSION['flash'][$key]); return $m; } return null; }
function current_user(){ return $_SESSION['user'] ?? null; }
function is_logged_in(){ return !empty($_SESSION['user']); }
function is_admin(){ return is_logged_in() && ($_SESSION['user']['role_name'] ?? '') === 'admin'; }
function require_login(){ if(!is_logged_in()){ flash('error','Vui lòng đăng nhập để tiếp tục.'); redirect_to('login.php'); } }
function require_admin(){ require_login(); if(!is_admin()){ http_response_code(403); include PUBLIC_PATH.'/403.php'; exit; } }
function money_vnd($amount){ return number_format((float)$amount,0,',','.').' VNĐ'; }
function date_vi($date){ return $date ? date('d/m/Y', strtotime($date)) : ''; }
function selected($a,$b){ return (string)$a===(string)$b ? 'selected' : ''; }
function item_type_vi($type){ return ['book'=>'Sách','newspaper'=>'Báo','magazine'=>'Tạp chí'][$type] ?? 'Tài liệu'; }
function item_badge_class($type){ return ['book'=>'primary','newspaper'=>'info','magazine'=>'secondary'][$type] ?? 'dark'; }
function paginate_info($total,$page,$perPage){ $totalPages=max(1,(int)ceil($total/$perPage)); return ['total_pages'=>$totalPages,'page'=>max(1,min($page,$totalPages))]; }
