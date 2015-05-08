#!/usr/bin/php
<?php
// 外部からのアクセスを制限
if (isset($_SERVER['REMOTE_ADDR'])) die('Permission denied.');

use Zend\Feed\Reader\Reader;
use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Delete;

include "config.php";

$entryTable = new TableGateway('entry', $adapter);


// データベース内最新エントリーの日付
$latest = $entryTable->select(function (Select $select) {
     $select->order('date DESC')->limit(1);
});
if($latest->count()!=0) {
	$latest_date = $latest->toArray();
	$latest_date = $latest_date[0]["date"];
}else{
	$latest_date = 0;
}

// フィード取得
$rss = Reader::import('http://blog.fc2.com/newentry.rdf');

foreach ($rss as $item) {

// すでに保存されているエントリー以外をデータベースに保存

	$date = $item->getDateCreated()->getTimestamp();

	if($date>$latest_date){
		$link = $item->getlink();
		$find = strpos($link,'blog-entry-');
		$numbers = substr($link, $find+11);
		preg_match_all('!\d+!', $numbers, $matches);
		$entryno = $matches[0][0];
	    $data = array(
	    	'title' => $item->getTitle(),
	    	'description' => $item->getDescription(),
	    	'date' => $date,
	    	'link' => $item->getLink(),
	    	'entryno' => $entryno
	    );

	    $entryTable->insert($data);		
	}

}

// ２週間以上過ぎたエントリーの削除
$sql = new Sql($adapter);
$delete = new Delete();
$delete->from('entry')->where(array('date <= UNIX_TIMESTAMP(NOW() - INTERVAL 14 DAY)'));
$statement = $sql->prepareStatementForSqlObject($delete);
$results = $statement->execute();