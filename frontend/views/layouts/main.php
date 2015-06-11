<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use common\models\ValueHelpers;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
		
		//Benutzerrechteverwalung (Eltern wurde aussen vor gelassen da
		// sie eigentlich die gleichen Rechte wie Schüler haben.)
		$is_lehrer = ValueHelpers::getRoleValue('Lehrer');
		$is_schueler = ValueHelpers::getRoleValue('Schüler');
		$is_eltern = ValueHelpers::getRoleValue('Eltern');
		
            NavBar::begin([
                'brandLabel' => "ECBook - Elektronisches Klassenbuch", //'<img src= "../web/ECBook.png">',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],

            ]);
			
			
            // $menuItems = [
                // ['label' => 'Home', 'url' => ['/site/index']],
                // ['label' => 'About', 'url' => ['/site/about']],
                // ['label' => 'Contact', 'url' => ['/site/contact']],
			   
            //];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
			//	$menuItems[] = ['label' => 'Admin-Login', 'url' =>\Yii::$app->urlManagerBackEnd->baseUrl];
            } 
			
			// Wenn als lehrer angemeldet erfolgt zugriff auf folgende seiten
			if (!Yii::$app->user->isGuest 
			&& Yii::$app->user->identity->benutzergruppe == $is_lehrer)
			{
				$menuItems[] =['label' => 'Information', 'url' => ['/site/information']];
				$menuItems[] =['label' => 'Fehlstunden', 'url' => ['/site/fehlstunden']];
				$menuItems[] =['label' => 'Prüfung', 'url' => ['/site/pruefung']];
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
			
            }
			
			// Wenn als schüler angemeldet erfolgt zugriff auf folgende seiten
			if (!Yii::$app->user->isGuest 
			&& Yii::$app->user->identity->benutzergruppe == $is_schueler)
			{
				$menuItems[] =['label' => 'Fehlstunden', 'url' => ['/fehlstunde/index']];
				$menuItems[] =['label' => 'Prüfung', 'url' => ['/pruefung/index']];
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
			}
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
				'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
