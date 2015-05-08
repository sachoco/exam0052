<?php
use Zend\Db\Sql\Select;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\DbSelect;

if(isset($_REQUEST["action"])&&($_REQUEST["action"]=="search"||$_REQUEST["action"]=="move_page")):
	
	include "config.php";

	$select = new Select();
	$select->from('entry')->order('date DESC');
	
// 日付検索
	if(isset($_REQUEST["date"])&&trim($_REQUEST["date"])!=""){
		$unixtime_begin = strtotime($_REQUEST["date"]);
		$unixtime_end = strtotime('+1 day', $unixtime_begin);
		$select->where('date >= '.$unixtime_begin.' AND date <= '.$unixtime_end);
	}

// URL検索
	if(isset($_REQUEST["url"])&&trim($_REQUEST["url"])!=""){

		$url = $_REQUEST["url"];
		$select->where->like('link', '%'.$url.'%');
	}

// ユーザー名検索
	if(isset($_REQUEST["username"])&&trim($_REQUEST["username"])!=""){

		$username = $_REQUEST["username"];
		$select->where->like('link', 'http://%'.$username.'%.blog%');

	}

// サーバー番号検索
	if(isset($_REQUEST["serverid"])&&trim($_REQUEST["serverid"])!=""){

		$serverid = $_REQUEST["serverid"];
		$select->where->like('link', '%.blog'.$serverid.'.fc2.com%');

	}

// エントリーNo.検索
	if(isset($_REQUEST["entryno"])&&trim($_REQUEST["entryno"])!=""){


		$entryno = $_REQUEST["entryno"];

		// エントリーNo.検索オピション
		if(isset($_REQUEST["entryno_option"])&&trim($_REQUEST["entryno_option"])!=""){

			$entryno_option = $_REQUEST["entryno_option"];

			if($entryno_option=="gt"){

				$select->where('entryno >= '.$entryno);

			}elseif($entryno_option=="lt"){

				$select->where('entryno <= '.$entryno);

			}else{

				$select->where('entryno = '.$entryno);
			}
		}
		
	}
	// var_dump($select->getSqlString());

// 表示ページ番号
	if($_REQUEST["action"]=="move_page"&&isset($_REQUEST["page"])){
	
		$page = $_REQUEST["page"];

	}else{
		$page = 1;
	}

// ページ毎表示エントリー数
	if(isset($_REQUEST["num_per_page"])){
	
		$num_per_page = $_REQUEST["num_per_page"];

	}else{
		$num_per_page = 50;
	}

// 検索
	$adpt = new DbSelect($select, $adapter);
	$paginator = new Paginator($adpt);
	$paginator->setDefaultItemCountPerPage($num_per_page); 
	$results = $paginator->getItemsByPage($page);

// JSONフォーマットにてリターン
	$output = array(
		"total_page" => $paginator->count(),
		"total_item" => $paginator->getTotalItemCount(),
		"results" => $results
	);
	echo json_encode($output);

endif;