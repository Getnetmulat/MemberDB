<?php
	include "includes/header.php";
	include_once 'includes/db_connect.php';
	include_once 'includes/functions.php';
	sec_session_start();
?>  
<?php if (login_check($mysqli) == true) : ?>
			<p align='right'>Welcome <?php echo htmlentities($_SESSION['username']); ?>! <a href="includes/logout.php">[Log Out!]</a>.</p>
				<p>&nbsp;</p>


<?php
			$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);

			if (! $error) {
				$error = 'Oops! An unknown error happened.';
			}
?>
			<p>There was a problem</p>
			<p class="error"><?php echo $error; ?></p>  
			
<?php else : 
	header('Location: ./index.php');
endif; ?>
			</div><!--close site_content-->	
			
			</div><!--close footer-->	
		</div><!--close main-->	
	</body>
</html>
