<?php
	

	
	use https://api.qrserver.com/v1/create-qr-code/?size=350x350&data=https://maps.app.goo.gl/vrwrx8yYawhK3DgP7;
	
	$qrCode = new QrCode($_GET['code']);
	echo $qrCode->writeString();
?>