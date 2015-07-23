<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?
if(!empty($arResult)){

    foreach($arResult as $key => $arSection)
    {	if (is_array($arSection['ITEMS'])) { // если в разделе есть элементы
?>
        <p class="parket_title"><?=$arSection["NAME"]?></p>
<?
        //echo "<h2>".$arSection["NAME"]."(".$arSection['COUNT'].")</h2>"; // название и количество
        if(count($arSection["ITEMS"]) > 0)
        {

//<a onclick="changeImage('uploads/b870304e72115213f7a0460629fc1613.jpg')"> <img src="uploads/e5eec36a60145f7a19e9eba21503bc79.jpg"> </a>
            foreach ($arSection["ITEMS"] as $arItem)
            {
                if($arItem["NAME"]) // если есть детальный текст статьи
                 //if($arItem["DETAIL_TEXT_SIZE"] > 0) // если есть детальный текст статьи
                {
                ?>    <a href="#"><?=$arItem["NAME"]?></a>
                <? //   echo "<a href=\"".$arItem["DETAIL_PAGE_URL"]."\" style=\"font-weight:bold;\" >".$arItem["NAME"]."</a> <br />"; // выводим ссылку на детальную страницу
                }
               // else
               //  {
               //      echo "<span style=\"font-weight:bold;\">".$arItem["NAME"]."</span><br />"; // если нет то просто заголовок
               //  }
                if(strlen($arItem["PREVIEW_TEXT"]) > 0){ //если есть текст для анонса
                    echo "<span>".$arItem["PREVIEW_TEXT"]."</span>";  // выодим его
                }
                echo "</li>";
            }

        }
    }
    }
}
?>



<?/*
    <div id="content">
        <div class="center_box">
            <h1>ОНЛАЙН КОНСТРУКТОР</h1>
            <link rel="stylesheet" href="css/organictabs.css">
            <script src="js/organictabs.jquery.js"></script>
            <script>
                $(function () {

                    $("#constructor").organicTabs({
                        "speed": 100
                    });


                });
            </script>







            <div class="wrap-interier">
                <div class="wallpaper" style="background-image: url('img/wallpaper.png');"></div>
                <div class="parket" style="background-image: url('img/parket.png');"></div>
                <img src="img/s303.png" class="designer_left">
            </div>













            <div class="designer_rihgt">
                <div id="constructor">




                    <ul class="nav">
                        <li class="nav-one"><a href="#tab1" class="current">ПОЛЫ</a></li>
                        <li class="nav-three"><a href="#tab2">ОБОИ</a></li>
                    </ul>








                    <div class="list-wrap">

                        <div id="tab1">
                            <div class="tab_parket">
                                <p class="parket_title">Ламинат</p>
                                <a onclick="changeImage('uploads/b870304e72115213f7a0460629fc1613.jpg')"> <img
                                        src="uploads/e5eec36a60145f7a19e9eba21503bc79.jpg"> </a> <a
                                    onclick="changeImage('uploads/fc9b19bc56d307a5c39e8e665f6b5cc8.jpg')"> <img
                                        src="uploads/6df0fcc6bda6ee1f691be59755b2fb6f.jpg"> </a>

                                <p class="parket_title">Паркетная доска</p>
                                <a onclick="changeImage('uploads/c3e3e8e9129219c5bc44c5732a54602a.jpg')"> <img
                                        src="uploads/59f697fc918dac317f95edc287c59220.jpg"> </a> <a
                                    onclick="changeImage('uploads/d995bd064a5c82ae5f2a06abbf4134f0.jpg')"> <img
                                        src="uploads/ab6d29f7b2a9592e8e0f186de963231b.jpg"> </a>

                               </div>
                        </div>















                        <div id="tab2" class="hide">
                            <div class="tab_wallpaper">
                                <p class="parket_title">обои</p>
                                <a onclick="change2Image('uploads/fcf6ed3c7b9e461f8e018722540ccd46.jpg')"> <img
                                        src="uploads/crop_fcf6ed3c7b9e461f8e018722540ccd46.jpg"> </a> </div>
                        </div>












                    </div>






                </div>
                <!-- END List Wrap -->

            </div>
            <div class="clear"></div>
        </div>
    </div>
<script>
    function changeImage(url) {
        $('.parket').css('background-image', 'url(' + url + ')');
    }
    function change2Image(url) {
        $('.wallpaper').css('background-image', 'url(' + url + ')');
    }
</script>



*/?>

