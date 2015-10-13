<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Andrey Grigorash">

    <title>News24</title>

    <!-- CSS -->
	<link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/mystyle.css" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-default">
	    <div class="container-fluid">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="/">Новости 24</a>
	        </div>
	        <div class="collapse navbar-collapse" id="exit">
	          <ul class="nav navbar-nav navbar-right">
	          	<li><a class="btn btn-default btn-outline btn-circle"  href="./addMat" aria-expanded="false" >Добавить тег/категорию</a></li>
	            <li>
	              <a class="btn btn-default btn-outline btn-circle"  href="/" aria-expanded="false" >Вернуться</a>
	            </li>
	          </ul>
	        </div>
	      </div>
	    </nav>

	    <div class="container-fluid">
	    	<div class=" col-md-8 col-md-offset-2">
	    	<? if (isset($accessStr)) { ?>
				<div class="alert alert-success" role="alert">
	    			<?=$accessStr?>
	    		</div>
	    	<?}?>
	    	<? if (isset($errorStr)) { ?>
				<div class="alert alert-danger" role="alert">
	    			<?=$errorStr?>
	    		</div>
	    	<?}?>
	    		<div class="panel panel-default">
	    			<div class="panel-heading">
	    				<h4 align="center">
	    					<b>Добавление новости</b>
	    				</h4>
	    			</div>
	    			<div class="panel-body">
	    				<form action="addNews" method="post" enctype="multipart/form-data">
	    					<div class="form-group">
	    						<div class="col-md-6">
	    							<input type="text" id="text_name" name="text_name" class="form-control bt" placeholder="Тема" autofocus required/>
									<textarea name="litle_text" cols="10" rows="10" class="form-control bt" placeholder="Анонс" required></textarea>
		    						<textarea name="full_text" cols="10" rows="10" class="form-control bt" placeholder="Полный текст" required></textarea>
	    						</div>
								<div class="col-md-6">
								<p align="center"><h4><b>Выберите категорию</b></h4></p>
									<select name="categorie" class="form-control bt">
										<? foreach ($categories as $categorie):?>
										<option value="<?=$categorie['id_c']?>"><?=$categorie['name']?></option>
										<? endforeach; ?>
									</select>

									<p align="center"><h4><b>Выберите теги</b></h4></p>
									<div class="panel panel-default">
										<div class="panel-body tags_panel">
											<div data-toggle="buttons">
											<? foreach ($allTags as $allT): ?>
				                                <label class="btn btn-success btn-xs">
				                                     <input class="chkbx-tags" type="checkbox" name="checkbox_tags[]" value="<?=$allT['id_t']?>" autocomplete="off"> <?=$allT['name_tags']?>
				                                </label>
				                            <? endforeach;?>
				                            </div>
										</div>
									</div>
									<p align="center"><h4><b>Выберите изображение</b></h4></p>
									<input type="file" name="fileToUpload" id="fileToUpload">
								</div>
		                    </div>
		                    <div class=" col-md-8 col-md-offset-6">
		                    	<button type="submit" class="btn btn-success">Добавить</button>
		                    </div>
	    				</form>
	    			</div>
	    			</div>
	    		</div>
	    	</div>
	    </div>
    <!-- jQuery -->
    <script src="<?=base_url()?>js/jquery.js"></script>
    <script src="<?=base_url()?>js/bootstrap.min.js"></script>
</body>

</html>
