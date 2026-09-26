<?php
/**********************************************************************
* file: show_full_legal_garan_label.js.php
* path: /templates/YOUR_TEMPLATE/javascript/extra/
* use: insert the legal guarantee img with jQuery,
       depending on the exitstance of data-guarantee-label-img

* © copyright noRiddle, 09-2026
             ____
            |    |       |     | |
  __   ___  |____/ °  ___|  ___| |  ___
|/  | |   | |   \  | |   | |   | | |___|
|   n |___o |    R i |___d |__ d l |__e

**********************************************************************/
if(basename($PHP_SELF) == 'checkout_confirmation.php'
    && defined(MODULE_GUARANTEE_LABELS_STATUS) && MODULE_GUARANTEE_LABELS_STATUS == 'true'
    && BS5_SHOW_FULL_EU_GUARANTEE_LABEL_CHECKOUT != 'none')
{
?>
<script>
$(function() {
  let $LglGrnt = $('.guarantee-label__full');
  if($LglGrnt.length) {
    let $datAttrLglGrnt = $LglGrnt.data('guarantee-label-img'),
        $insCont = $('#legeal-guaran-lbl'),
        imgInsStr = '<img class="img-fluid" src="' + DIR_WS_CATALOG + 'lang/<?php echo $_SESSION['language']; ?>/notice.svg" alt="legal guarantee" />';

    $insCont.append($(imgInsStr));
  }
});
</script>
<?php
}
