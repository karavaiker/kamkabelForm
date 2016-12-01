<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online заказ | КамКабель</title>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
	<script src="main.js"></script>
</head>
<body class="grey lighten-3">
<nav>
	<div class="nav-wrapper  grey lighten-2">
		<a href="/" class="brand-logo" >
			<img src="http://kamkabel.ru/images/kamkabel/img/logo.png" width="209" height="60">
		</a>
		<ul id="nav-mobile" class="right hide-on-med-and-down ">
			<li><a href="http://kamkabel.ru/" class="red-text text-darken-3">Вернуться на сайт</a></li>
		</ul>
	</div>
</nav>
<div class="row">
	<div class="col s3">
		<!--  navigation panel -->
	</div>
	<div class="col s6">
		<div class="row">
			<form class="col s12" action="form.php" id="send-form">
				<h1 class="red-text text-darken-3">On-line заказ</h1>
				<div class="row">
					<div class="input-field col s6">
						<input id="mark_name" type="text" name="mark_name">
						<label for="mark_name">Марка</label>
					</div>
					<div class="input-field col s6">
						<input id="count" type="text" name="count">
						<label for="count">Количество</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="name" type="text" name="name" class="validate required" required>
						<label for="name" data-error="Это поле обязательно для заполнения" >Ф.И.О *</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="phone" type="tel" name="phone" class="validate" required minlength="9">
						<label for="phone" data-error="Это поле обязательно для заполнения">Телефон *</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="email" type="email" name="email" class="validate">
						<label for="email" data-error="Укажите правильный email">Email</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<textarea id="addText" name="addText" class="materialize-textarea"></textarea>
						<label for="addText">Примечание</label>
					</div>
				</div>

				<div class="row">
					<blockquote class="grey-text text-darken-1">
						Прикрепить файл с перечнем (если имеется).<br>
						Вы можете прикрепить несколько файлов.
					</blockquote>
				</div>

				<div class="file-field input-field">
					<div class="btn red darken-3">
						<span>Файл</span>
						<input type="file" name="file[]" multiple maxlength="2">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path" type="text" multiple maxlength="2">
					</div>
				</div>

				<div class="row">
					<div class="col offset-s9 s3">
						<input type="text" name="data-hash" value="<?php echo md5('date'+date('H'));?>" style="display: none;">
						<input class="btn waves-effect waves-light red darken-3" type="submit"  value="Заказать">
					</div>
				</div>
			</form>

			<div class="progress red darken-3" style="display: none;">
				<div class="indeterminate red lighten-4"></div>
			</div>

			<!-- Modal -->
			<div id="response" class="modal">
				<div class="modal-content">

				</div>
				<div class="modal-footer">
					<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ок</a>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
<script src="https://cdn.callibri.ru/callibri.js" type="text/javascript"></script>
</html>

