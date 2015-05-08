			<footer class="footer">
				<p>&copy; Satoshi Shiraishi</p>
			</footer>
	    </div> <!-- /container -->
<?php if($page=="index"): ?>
	    <script src="bower_components/jquery/dist/jquery.min.js"></script>
		<script type="text/javascript" src="bower_components/moment/min/moment.min.js"></script>
		<script type="text/javascript" src="bower_components/moment/min/locales.min.js"></script>
		<script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		<script type="text/javascript" src="bower_components/twbs-pagination/jquery.twbsPagination.min.js"></script>
		<script type="text/javascript" src="bower_components/jQuery-Storage-API/jquery.storageapi.min.js"></script>
		<script type="text/javascript" src="bower_components/jquery-tmpl/jquery.tmpl.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-formhelpers.js"></script>
		<script type="text/javascript" src="js/main.js"></script>

		<!-- エントリー表示テンプレート -->
		<script id="tmpl_entry" type="text/x-jquery-tmpl">
		<article class="entry">
		    <header>${date}</header>    	
		    <section>
		    	<h4><a href='${link}' target='_blank'>${title}</a></h4>
		    	<div class="link">${link}</div>
		    	<p class="description">${description}</p>
		    </section>
		</article>
		</script>
<?php endif; ?>
    </body>
</html>