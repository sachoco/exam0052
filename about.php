<?php 
	$page = "about";
	include "header.php"; 
?>
	<div class="jumbotron">
		<h1>本アプリについて</h1>
		<p class="lead">
			本アプリは採用試験として出題された課題に対する答案として私、白石怜が作成したものです。
		</p>
	</div>
	<div class="row results">
		<h2>機能要件一覧</h2>
		<ul>
			<li>cronによるFC2BLOGの新着情報RSSの継続的なアップデート及び保存</li>
			<li>日付、URL、ユーザー名、サーバー番号、エントリーNoによる検索機能</li>
			<li>日付、URL、タイトル、descriptionの一覧表示</li>
			<li>ページャー機能</li>
			<li>検索条件の保存</li>
			<li>古いデータの自動削除</li>
		</ul>
	</div>
<?php include "footer.php"; ?>