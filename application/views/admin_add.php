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
	            <li>
	            	<a class="btn btn-default btn-outline btn-circle"  href="/" aria-expanded="false" >Вернуться</a>
	            </li>
	          </ul>
	        </div>
	   	</div>
	</nav>

	    <div class="container-fluid">
	    	<div class=" col-md-8 col-md-offset-2">
	    		<div class="panel panel-default">
	    			<div class="panel-heading">
	    				<h4 align="center">
	    					<b>Добавление тега / категории</b>
	    				</h4>
	    			</div>
	    			<div class="panel-body">
		    			<div class="col-md-6">
		    				<form action="" method="POST">
			    				<div class="form-group">
			                        <div class="input-group bt">
			                        	<input type="text" name="tagName" class="form-control" placeholder="Добавить тег"/>
			                        	<span class="input-group-btn">
										    <button class="btn btn-default" type="submit" ><i class="glyphicon glyphicon-ok"></i></button>
										</span>
									</div>
			                    </div>
		    				</form>
		    				<div class="panel panel-default">
		    					<div class="panel-body">
		    						<div data-toggle="buttons">
										<!--<? foreach ($myTags as $myT): ?>
				                        <label class="btn btn-success btn-xs">
				                            <input class="chkbx-tags" type="checkbox" name="checkbox_tags[]" value="<?=$myT['id_t']?>" autocomplete="off"> <?=$myT['name_tags']?>
				                        </label>
				                        <? endforeach;?>-->
				                    </div>
		    					</div>
		    				</div>
		    			</div>
		    			<div class="col-md-6">
		    				<form action="" method="POST">
			    				<div class="form-group">
			                        <div class="input-group bt">
			                        	<input type="text" name="catsName" class="form-control" placeholder="Добавить категорию"/>
			                        	<span class="input-group-btn">
										    <button class="btn btn-default" type="submit" ><i class="glyphicon glyphicon-ok"></i></button>
										</span>
									</div>
			                    </div>
	    					</form>
	    					<div class="panel panel-default">
		    					<div class="panel-body">
		    						<div data-toggle="buttons">
										<!--<? foreach ($myTags as $myT): ?>
				                        <label class="btn btn-success btn-xs">
				                            <input class="chkbx-tags" type="checkbox" name="checkbox_tags[]" value="<?=$myT['id_t']?>" autocomplete="off"> <?=$myT['name_tags']?>
				                        	<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-ok"></i></button>
				                        </label>
				                        <? endforeach;?>-->
				                    </div>
		    					</div>
		    				</div>
		    			</div>
	    			</div>
	    		</div>
	    	</div>
	    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
