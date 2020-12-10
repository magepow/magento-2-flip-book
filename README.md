# Magento 2 Flipbook
**Magento 2 flipbook** is a booklet with a series of images that very gradually change from one page to the next so that when the pages are viewed in quick succession, the images appear to animate by simulating motion or some other change. Often, flipbooks are illustrated books for children, but may also be geared toward adults and employ a series of photographs rather than drawings. Flipbooks are not always separate books but may appear as an added feature in ordinary books or magazines, frequently, using the page corners. Software packages and websites are also available that convert digital video files into custom-made flipbooks.

Before you continue, ensure you meet the following requirements:

  * You have installed Magento 2.
  * You are using a Linux or Mac OS machine. Windows is not currently supported.


## 1. Download Magento 2 Flipbook

 ### Install via composer (recommend).
Run the following commands in Magento 2 root folder:
```
composer require magepow/flipbook
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
```

## 2. User guide
   #### Key features of Magento 2 Flipbook Extension:
  * It looks like actual content with user-friendly design.
  * Creates both left-to-right and right-to-left transition of pages.
  * Easy to use Navigation bar.
  * Quick page flips with different transition effects.
  * Responsive design.
  * Work on all devices.Our Flipbook code is based on javascript so works without flash.
  ### 2.1. General configuration

  `Login to Magento Admin > Stores > Configuration > Magepow > Flipbook > General > Choose Yes/No to Show or hide Flipbook.`  
  ![Image of Magento admin config](https://github.com/magepow/magento2-flipbook/blob/master/media/configflipbook.png)
  ### 2.2. Add new book
   `Login to Magento Admin > Magepow > Books => Click on Add New Book, Create new content and information for the book.`
   ![Image of Magento admin config](https://github.com/magepow/magento2-flipbook/blob/master/media/addbook.png)
   * **Name**: The title of the book you want to add.
   * **Thumbnail**: Add image file to your book.
   * **Book**: Add my book file that you want to add here as a file pdf.
   * **Author**: Add author your book.
   * **Description**: Describe your book.
  ### 2.3. Add new widgets 

  `Login to Magento Admin > Content > Widgets > Add Widget > Setting > Setting type and design theme > Continue.`
  ![Image of Magento admin config](https://github.com/magepow/magento2-flipbook/blob/master/media/widget.png)
  `Login to Magento Admin > Content > Widgets > Add Widget > Storefront Properties > Setting widget and save.`
  * Add widget title, assign store views, sort order and in layout updates to display on pages the example shown below.
  ![Image of Magento storefront](https://github.com/magepow/magento2-flipbook/blob/master/media/settingwidget.png)
  On the web page click on the picture of the book being displayed on the installed page.
  ![Image of Magento storefront](https://github.com/magepow/magento2-flipbook/blob/master/media/widgetstorefront.png)
  ![Image of Magento storefront](https://github.com/magepow/magento2-flipbook/blob/master/media/result-front.png)
  We can also query the URL **https://you-domain/flipbook** to display all created flipbooks.
 ## Donation

If this project help you reduce time to develop, you can give me a cup of coffee :).

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/paypalme/alopay)

      
**Free Extensions List**

* [Magento 2 Categories Extension](https://magepow.com/magento-categories-extension.html)

* [Magento 2 Sticky Cart](https://magepow.com/magento-sticky-cart.html)

**Premium Extensions List**

* [Magento 2 Pages Speed Optimizer](https://magepow.com/magento2-speed-optimizer.html)

* [Magento 2 Mutil Translate](https://magepow.com/magento-multi-translate.html)

* [Magento 2 Instagram Integration](https://magepow.com/magento-2-instagram.html)

* [Magento 2 Lookbook Pin Products](https://magepow.com/lookbook-pin-products.html)

**Featured Magento Themes**

* [Expert Multipurpose responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/expert-premium-responsive-magento-2-and-1-support-rtl-magento-2-/21667789)

* [Gecko Premium responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/gecko-responsive-magento-2-theme-rtl-supported/24677410)

* [Milano Fashion responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/milano-fashion-responsive-magento-1-2-theme/12141971)

* [Electro responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/electro-responsive-magento-1-2-theme/17042067)

* [Pizzaro Food responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/pizzaro-food-responsive-magento-1-2-theme/19438157)

* [Biolife Organic responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/biolife-organic-food-magento-2-theme-rtl-supported/25712510)

* [Market responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/market-responsive-magento-2-theme/22997928)

* [Kuteshop responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/kuteshop-multipurpose-responsive-magento-1-2-theme/12985435)

**Featured Magento Services**

* [PSD to Magento 2 Theme Conversion](https://magepow.com/psd-to-magento-theme-conversion.html)

* [Magento Speed Optimization Service](https://magepow.com/magento-speed-optimization-service.html)

* [Magento Security Patch Installation](https://magepow.com/magento-security-patch-installation.html)

* [Magento Website Maintenance Service](https://magepow.com/website-maintenance-service.html)

* [Magento Professional Installation Service](https://magepow.com/professional-installation-service.html)

* [Magento Upgrade Service](https://magepow.com/magento-upgrade-service.html)

* [Customization Service](https://magepow.com/customization-service.html)

* [Hire Magento Developer](https://magepow.com/hire-magento-developer.html)

[![Latest Stable Version](https://poser.pugx.org/magepow/flipbook/v/stable)](https://packagist.org/packages/magepow/flipbook)
[![Total Downloads](https://poser.pugx.org/magepow/flipbook/downloads)](https://packagist.org/packages/magepow/flipbook)
