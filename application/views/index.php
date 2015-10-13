<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Andrey Grigorash">

    <title>News24</title>

    <!-- STYLE -->
    <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/mystyle.css" rel="stylesheet"

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
            
            <div class="collapse navbar-collapse" id="navbar-collapse-2">
                <ul class="nav navbar-nav navbar-right">
                <? if (isset($_SESSION['email'])) 
                {?>
                    <li><a class="btn btn-default btn-outline btn-circle" href="<?=base_url()?>Admin/addNews">Добавить новость</a></li>
                    <li><a class="btn btn-default btn-outline btn-circle" href="<?=base_url()?>Admin/logout">Выход</a></li>
                <?}
                ?>
                <? if (!isset($_SESSION['email'])) {?>
                    <li>
                      <a class="btn btn-default btn-outline btn-circle"  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">Admin</a>
                    </li>
                <?}?>
                </ul>
            
                </div>
                <div class="collapse nav navbar-nav nav-collapse" id="nav-collapse2">
                    <form class="navbar-form navbar-right form-inline" role="form" method="POST" action="<?=base_url()?>Admin/auth_login">
                        <div class="form-group">
                            <label class="sr-only" for="Email">E-mail</label>
                            <input type="email" class="form-control" name="email" placeholder="E-mail" autofocus required />
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="Password">Password</label>
                            <input type="password" class="form-control" name="passwd" placeholder="Password" required />
                        </div>
                        <button type="submit" class="btn btn-success">Войти</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
                
    <div class="container-fluid">
        <div class=" col-md-12">
            <div class="col-md-8" id="news-content">
            <div class="alert alert-warning" role="alert">
                По Вашему запросу ничего не найдено
            </div>
            <? foreach ($news as $curNews): ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-4">
                            <img src="<?=base_url().$curNews['img']?>" class="img-responsive">
                        </div>
                        <div class="col-md-8">
                            <p align="left">
                                <b><h4><?=$curNews['name_text']?></h3></b>
                                <span class="label label-primary"> <?=$curNews['name'] == NULL ? "Нет категории" : $curNews['name'] ?></span>
                                <? foreach ($tags[$curNews['id_n']] as $curTags):?>
                                <span class="label label-success"><?=$curTags['name_tags']?></span>
                                <?endforeach; ?>
                            </p>

                            <p align="justify" ><?=$curNews['little_text']?></p>
                            <p align="right"><em>Дата публикации: <?=$curNews['date']?></em></p>
                        <? if (isset($_SESSION['email'])){?>
                            <button class="btn btn-default btn-xs pull-right" hidden><i class="glyphicon glyphicon-remove"></i></button>
                            <button class="btn btn-default btn-xs pull-right" hidden><i class="glyphicon glyphicon-pencil"></i></button>
                        <?}?>
                        </div>
                    </div>
                </div>
            <? endforeach;?>
                <div class="col-md-6 col-md-offset-5">
                    <?=$this->pagination->create_links();?> 
                </div>
            </div>
            <div class="col-md-4">
                <form  method="POST" action="News/search">
                    <div class="panel panel-success">
                        <div class="panel-heading panel-t">
                            <h3 class="panel-title" align="center">Фильтр</h3>
                            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <h5><p align="center"><b>ПОИСК ПО НАЗВАНИЮ</b></p></h5>
                                <div id="search">
                                    <input name="filtr_post" type="text" class="search-query form-control" placeholder="Search" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h5><p align="center"><b>ПОИСК ПО КАТЕГОРИЯМ</b></p></h5>
                                <div data-toggle="buttons">
                                <? foreach ($allCategories as $allCat): ?>
                                    <label class="btn btn-primary btn-xs">
                                        <input class="chkbx-category" type="checkbox"  name="checkbox_cast[]" value="<?=$allCat['id_c']?>" autocomplete="off" ><?=$allCat['name']?>
                                    </label>
                                <? endforeach;?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h5><p align="center"><b>ПОИСК ПО ТЕГАМ</b></p></h5>
                                <div data-toggle="buttons">
                                <? foreach ($allTags as $allT): ?>
                                    <label class="btn btn-success btn-xs">
                                         <input class="chkbx-tags" type="checkbox"  name="checkbox_tags[]" value="<?=$allT['id_t']?>" autocomplete="off"> <?=$allT['name_tags']?>
                                    </label>
                                <? endforeach;?>
                                </div>
                            </div>
                            <div class="col-md-6 col-md-offset-5">
                                <button class="btn btn-primary" type="submit">Принять</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?=base_url()?>js/jquery.js"></script>
    <script src="<?=base_url()?>js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>js/click.js"></script>
</body>

</html>
