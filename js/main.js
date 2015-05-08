// 変数定義
var $loading = $("<div class='loading' />").append("<div class='throbber throbber_medium'/>");
var date, url, username, serverid, entryno, entryno_option, num_per_page, page = 1;

// ローカルウェブストレージ
storage=$.localStorage

/**
*
* Function save
* ローカルウェブストレージに検索データを保存
*
**/
function save(){
	storage.set('date', date);
	storage.set('url', url);
	storage.set('username', username);
	storage.set('serverid', serverid);
	storage.set('entryno', entryno);
	storage.set('entryno_option', entryno_option);
	storage.set('num_per_page', num_per_page);
}

/**
*
* Function reset
* 検索項目をリセットし、全エントリーを表示
*
**/
function reset(){
	$("input.date").val('');
	$("input.url").val('');
	$("input.username").val('');
	$("input.serverid").val('');
	$("input.entryno").val('');
	$("select.entryno_option").val('eq');
	$('.selectpicker.entryno_option').selectpicker('val', 'eq');
	$("select.num_per_page").val(50);
	$('.selectpicker.num_per_page').selectpicker('val', 50);
	searchItems();	
}

/**
*
* Function initPager
* ペジネーション・ナビゲーター
* arg: トータルページ数
*
**/
function initPager(n){
	$('.pagination ul').remove();
	var $el = $('<ul>').addClass('paginationi-sm');
	if(page > n){ page = n; }
	$el.appendTo('.pagination').twbsPagination({
        totalPages: n,
        startPage: page,
        visiblePages: 10,
        first: '最初',
        prev: '前',
        next: '次',
        last: '最後',
        onPageClick: function (event, page) {
        	getItemsByPage(page);
        }
    });          		
}

/**
*
* Function showItems
* ブログエントリーの表示
* arg: JSON
*
**/
function showItems(data){
	$loading.fadeOut("fast",function(){
		$loading.detach();
    });
	$(".entries").empty();

	$.each(data.results, function(i,item){
		var date = new Date(item.date*1000);
		$('#tmpl_entry').tmpl({'date':date.toLocaleString("ja-JP"), 'title': item.title, 'description': item.description, 'link': item.link}).appendTo('.entries');
	});	
}

/**
*
* Function searchItems
* 検索
*
**/
function searchItems( ){

	date = $("input.date").val();
	url = $.trim($("input.url").val());
	username = $.trim($("input.username").val());
	serverid = $.trim($("input.serverid").val());
	entryno = $.trim($("input.entryno").val());
	entryno_option = $("select.entryno_option").val();
	num_per_page = $("select.num_per_page").val();

	$.ajax({
		method: "POST",
		url: "search.php",
		dataType: "json",
		data: { action: "search", date: date, url: url, username: username, serverid: serverid, entryno, entryno, entryno_option: entryno_option, num_per_page: num_per_page },
		beforeSend: function(){
			$(".results").prepend($loading);
		},
		success: function( data ){
			
			showItems(data);
			
			page = 1;
			$("#total_item").html("（"+data.total_item+"件）");
			if(data.total_page==0){
				$("<div>").text('お探しのアイテムは見つかりませんでした。').appendTo(".entries");
				$('.pagination ul').remove();
			}else{
				initPager(data.total_page);
			}
			save();
		}
	});            	
}

/**
*
* Function getItemsByPage
* ページ移動
* arg: ページ番号
*
**/
function getItemsByPage(p){
	if(p){ page = p; }
	$.ajax({
		method: "POST",
		url: "search.php",
		dataType: "json",
		data: { action: "move_page", page: page, date: date, url: url, username: username, serverid: serverid, entryno, entryno, entryno_option: entryno_option, num_per_page: num_per_page },
		beforeSend: function(){
			$(".results").prepend($loading);
		},
		success: function( data ){
			showItems(data);
		}
	});            	
}

/**
*
* Function changeNumPerPage
* 表示エントリー数の変更
*
**/
function changeNumPerPage(){
	$.ajax({
		method: "POST",
		url: "search.php",
		dataType: "json",
		data: { action: "move_page", page: page, date: date, url: url, username: username, serverid: serverid, entryno, entryno, entryno_option: entryno_option, num_per_page: num_per_page },
		beforeSend: function(){
			$(".results").prepend($loading);
		},
		success: function( data ){
			showItems(data);
			initPager(data.total_page);
			save();
		}
	});            	
}

/**
*
* Function init
* イニシャリゼーション
*
**/
var init = function(){

	$('a.search').on('click', function(e){
		e.preventDefault();
		searchItems();
	});
	$('a.reset').on('click', function(e){
		e.preventDefault();
		reset();
	});
	$('select.num_per_page').change(function(){
		num_per_page = $("select.num_per_page").val();
		changeNumPerPage();
	});

    $('#datetimepicker1').datetimepicker({
    	locale: 'ja',
    	format: 'MM/DD/YYYY'
    });
    $('.selectpicker').selectpicker();

	if(storage.isSet('date')){ $("input.date").val(storage.get('date')); }
	if(storage.isSet('url')){ $("input.url").val(storage.get('url')); }
	if(storage.isSet('username')){ $("input.username").val(storage.get('username')); }
	if(storage.isSet('serverid')){ $("input.serverid").val(storage.get('serverid')); }
	if(storage.isSet('entryno')){ $("input.entryno").val(storage.get('entryno')); }
	if(storage.isSet('entryno_option')){ $("select.entryno_option").val(storage.get('entryno_option')); }
	if(storage.isSet('num_per_page')){ $("select.num_per_page").val(storage.get('num_per_page')); }

  	searchItems();

}

$(document).ready(init);


