<?php

if (strpos(basename($PHP_SELF), 'checkout') === false 
    || strpos(basename($PHP_SELF), 'account_checkout_express') !== false
    )
{
  ?>
  <script>

  document.addEventListener('DOMContentLoaded', function() {
    var Nav = new hcOffcanvasNav('#respnav', {
      width: 400,
      disableAt: false,
      customToggle: '#hc-nav-opener',
      levelSpacing: 0,
      navTitle: '<?php echo TEXT_MENU_TITLE; ?>',
      levelTitles: true,
      levelTitleAsBack: true,
      bodyInsert: 'append',
      //pushContent: '#container',
      ariaLabels: {
        open: 'Open Menu',
        close: 'Close Menu',
        submenu: 'Submenu'
      }
    });
    //Nav.querySelectorAll('li.nav-item.overview').forEach(e => e.remove());
    Nav.on('open', function() {
      var activeNav = document.querySelector('.hc-offcanvas-nav');
      var activeLink = activeNav.querySelector('li.nav-highlight a');
      if (activeLink !== null) {
        activeLink.focus({
          focusVisible: true
        });
      } else {
        activeNav.querySelector('.nav-content ul > li a').focus({
          focusVisible: true
        });
      }
    });
  });
  </script>
  <?php
}
