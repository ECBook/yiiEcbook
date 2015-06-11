<?php
/* @var $this yii\web\View */
$this->title = 'ECBook- elektronisches Klassenbuch';
use common\models;
use yii\helpers\html;
use kartik\mpdf\Pdf;

?>

<div class="site-index">
<?php

	echo nl2br("Willkommen, \n");
 if (Yii::$app->user->getIsGuest())
                        {
						print('Sie sind angemeldet als ');
						echo nl2br("<b> Gast </b>\n");
						print ('<b>Bitte melden Sie sich an!</b>');
						}
						else
						{
						print('Sie sind angemeldet als ');
						echo nl2br("<b> <a href=index.php?r=site%2Finformation>" . Yii::$app->user->identity->username . "</a></b>\n");
					//	echo nl2br("Ihre Prüfungen einsehen\n");
						
						}
						echo Html::a('PDF', ['/site/mpdf-demo-1'], [
    'class'=>'btn btn-danger', 
    'target'=>'_blank', 
    'data-toggle'=>'tooltip', 
    'title'=>'Als PDF abspeichern'
]);
?>

    <div class="jumbotron">
		
        <!--<h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
		-->
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <!--<h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
				-->
            </div>
        </div>

    </div>
</div>
