<?php 
	$page = "index";
	include "header.php"; 
?>
	<div class="jumbotron">
		<h1>絞り込み検索</h1>
		<div class="input-group float col-md-4" id='datetimepicker1'>
			<span class="input-group-addon">日付</span>
			<input type="text" class="form-control date" placeholder="日付" aria-describedby="date">
			<span class="input-group-addon">
			<span class="glyphicon glyphicon-calendar"></span>
			</span>
		</div>
		<div class="input-group float col-md-4">
			<span class="input-group-addon">サーバー番号</span>
			<input type="number" min="0" step="1" class="form-control bfh-number serverid" placeholder="サーバー番号" aria-describedby="serverid">
			<span class="errmsg"></span>
		</div>
		<div class="input-group float col-md-4">
			<span class="input-group-addon">ユーザー名</span>
			<input type="text" class="form-control username" placeholder="ユーザー名" aria-describedby="username">
		</div>
		<div class="input-group float col-md-4">
			<span class="input-group-addon">URL</span>
			<input type="text" class="form-control url" placeholder="URL" aria-describedby="url">
		</div>
		<div class="input-group float col-md-8">
			<span class="input-group-addon">エントリーNo.</span>
			<input type="number" min="0" step="1" class="form-control bfh-number entryno" placeholder="エントリーNo." aria-describedby="entryno">
			<select class="selectpicker entryno_option">
				<option value="eq">のブログのみ</option>
				<option value="gt">以上のブログ</option>
				<option value="lt">以下のブログ</option>
			</select>
		</div>
		<div class="clear"></div>
		<p class="margin-top"><a class="btn btn-lg btn-success search" href="#" role="button">検索</a> <a class="btn btn-sm btn-warning reset" href="#" role="button">値をクリア</a></p>
	</div>
	<div class="row results">
		<h2>検索結果一覧 <span id="total_item"></span></h2>
		<div class="input-group">
			<span class="input-group-addon">ページ毎表示エントリー数</span>
			<select class="selectpicker num_per_page">
				<option value="25">25</option>
				<option value="50" selected>50</option>
				<option value="75">75</option>
				<option value="100">100</option>
			</select>
		</div>
		<div class="pagination"></div>
		<div class="entries"></div>
		<div class="pagination"></div>
	</div>
<?php include "footer.php"; ?>