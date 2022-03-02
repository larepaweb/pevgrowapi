<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\Api\V1\Langs\PevLangController;
use App\Http\Controllers\Api\V1\Faqs\PevFaqCategoryController;
use App\Http\Controllers\Api\V1\Faqs\PevFaqCategoryLangController;
use App\Http\Controllers\Api\V1\Faqs\PevFaqController;
use App\Http\Controllers\Api\V1\Faqs\PevFaqLangController;

use App\Http\Controllers\Api\V1\Blogs\PevBlogCategoryController;
use App\Http\Controllers\Api\V1\Blogs\PevBlogCategoryLangController;
use App\Http\Controllers\Api\V1\Blogs\PevBlogPostController;
use App\Http\Controllers\Api\V1\Blogs\PevBlogPostLangController;
use App\Http\Controllers\Api\V1\Blogs\PevBlogCommentController;
use App\Http\Controllers\Api\V1\Blogs\PevBlogCommentLangController;

use App\Http\Controllers\Api\V1\Redirections\PevRedirectionController;

use App\Http\Controllers\Api\V1\CMS\PevCMSController;
use App\Http\Controllers\Api\V1\CMS\PevCMSLangController;

use App\Http\Controllers\Api\V1\TextoEstatico\TextoEstaticoController;

use App\Http\Controllers\Api\V1\Product\PevProductCategoryController;
use App\Http\Controllers\Api\V1\Product\PevProductCategoryLangController;
use App\Http\Controllers\Api\V1\Product\PevProductCategoryCommentController;
use App\Http\Controllers\Api\V1\Product\PevProductCategoryCommentLangController;
use App\Http\Controllers\Api\V1\Product\PevProductAttributeGroupController;
use App\Http\Controllers\Api\V1\Product\PevProductAttributeGroupLangController;
use App\Http\Controllers\Api\V1\Product\PevProductAttributeController;
use App\Http\Controllers\Api\V1\Product\PevProductAttributeLangController;
use App\Http\Controllers\Api\V1\Product\PevProductFeatureController;
use App\Http\Controllers\Api\V1\Product\PevProductFeatureLangController;
use App\Http\Controllers\Api\V1\Product\PevProductFeatureValueController;
use App\Http\Controllers\Api\V1\Product\PevProductFeatureValueLangController;
use App\Http\Controllers\Api\V1\Product\PevCategorySeedfinderController;
use App\Http\Controllers\Api\V1\Product\PevProductController;
use App\Http\Controllers\Api\V1\Product\PevProductLangController;
use App\Http\Controllers\Api\V1\Product\PevProductAttributePriceController;
use App\Http\Controllers\Api\V1\Product\PevProductCommentController;
use App\Http\Controllers\Api\V1\Product\PevProductCommentLangController;
use App\Http\Controllers\Api\V1\Product\PevMediaPevProductController;
use App\Http\Controllers\Api\V1\Product\PevCategoryPevProductController;
use App\Http\Controllers\Api\V1\Product\PevMediaPevProductAttributePriceController;
use App\Http\Controllers\Api\V1\Product\PevCarrierPevProductController;
use App\Http\Controllers\Api\V1\Product\PevFeatureValuePevProductController;

use App\Http\Controllers\Api\V1\Files\PevMediaController;

use App\Http\Controllers\Api\V1\Gift\PevGiftController;

use App\Http\Controllers\Api\V1\Word\PevWordController;
use App\Http\Controllers\Api\V1\Word\PevWordLangController;

use App\Http\Controllers\Api\V1\Trivial\PevTrivialThemeController;
use App\Http\Controllers\Api\V1\Trivial\PevTrivialThemeLangController;
use App\Http\Controllers\Api\V1\Trivial\PevTrivialQuestionController;
use App\Http\Controllers\Api\V1\Trivial\PevTrivialQuestionLangController;

use App\Http\Controllers\Api\V1\Currency\PevCurrencyController;

use App\Http\Controllers\Api\V1\ZonePaisProvincia\PevZoneController;
use App\Http\Controllers\Api\V1\ZonePaisProvincia\PevCountryController;
use App\Http\Controllers\Api\V1\ZonePaisProvincia\PevCountryLangController;
use App\Http\Controllers\Api\V1\ZonePaisProvincia\PevStateController;

use App\Http\Controllers\Api\V1\Carrier\PevCarrierController;
use App\Http\Controllers\Api\V1\Carrier\PevCarrierLangController;
use App\Http\Controllers\Api\V1\Carrier\PevCarrierRangePriceController;
use App\Http\Controllers\Api\V1\Carrier\PevCarrierRangeWeightController;
use App\Http\Controllers\Api\V1\Carrier\PevCarrierShippingCostController;

use App\Http\Controllers\Api\V1\Ekomi\PevEkomiShopRatingController;
use App\Http\Controllers\Api\V1\Ekomi\PevEkomiOrderController;


use App\Http\Controllers\Api\V1\Alias\PevAliasController;

use App\Http\Controllers\Api\V1\Customer\PevCustomerGroupController;
use App\Http\Controllers\Api\V1\Customer\PevCustomerGroupLangController;
use App\Http\Controllers\Api\V1\Customer\PevCustomerController;
use App\Http\Controllers\Api\V1\Customer\PevAddressController;


use App\Http\Controllers\Api\V1\HomePersonalizada\PevProductVisitedController;
use App\Http\Controllers\Api\V1\HomePersonalizada\PevCategoryVisitedController;

use App\Http\Controllers\Api\V1\Geolocation\PevGeolocationCurrencyController;
use App\Http\Controllers\Api\V1\Geolocation\PevGeolocationCountryController;

use App\Http\Controllers\Api\V1\CacheCssJs\PevCacheCssJsController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'as' => 'v1.'], function () {

  Route::group([
    'middleware' => 'auth:api'
  ], function() {

    Route::apiResources([
      //--------------------ETAPA LANG--------------------------------------------
      'lenguajes' => PevLangController::class,

      //--------------------ETAPA FAQ--------------------------------------------
       'faq_category' => PevFaqCategoryController::class,
       'faq_category_lang' => PevFaqCategoryLangController::class,
       'faq' => PevFaqController::class,
       'faq_lang' => PevFaqLangController::class,

      //--------------------ETAPA BLOG--------------------------------------------
       'blog_category' => PevBlogCategoryController::class,
       'blog_category_lang' => PevBlogCategoryLangController::class,
       'blog_post' => PevBlogPostController::class,
       'blog_post_lang' => PevBlogPostLangController::class,
       'blog_comment' => PevBlogCommentController::class,
       'blog_comment_lang' => PevBlogCommentLangController::class,

       //--------------------ETAPA REDIRECTION--------------------------------------------
       'redirecciones' => PevRedirectionController::class,

       //--------------------ETAPA CMS--------------------------------------------
       'cms' => PevCMSController::class,
       'cms_lang' => PevCMSLangController::class,

        //--------------------ETAPA TEXTO ESTATICO--------------------------------------------
        'fichero_texto' => TextoEstaticoController::class,

        //--------------------ETAPA PRODUCTOS--------------------------------------------
        'product_category' => PevProductCategoryController::class,
        'product_category_lang' => PevProductCategoryLangController::class,
        'product_category_comment' => PevProductCategoryCommentController::class,
        'product_category_comment_lang' => PevProductCategoryCommentLangController::class,
        'product_attribute_group' => PevProductAttributeGroupController::class,
        'product_attribute_group_lang' => PevProductAttributeGroupLangController::class,
        'product_attribute' => PevProductAttributeController::class,
        'product_attribute_lang' => PevProductAttributeLangController::class,
        'product_feature' => PevProductFeatureController::class,
        'product_feature_lang' => PevProductFeatureLangController::class,
        'product_feature_value' => PevProductFeatureValueController::class,
        'product_feature_value_lang' => PevProductFeatureValueLangController::class,
        'category_seedfinder' => PevCategorySeedfinderController::class,
        'product' => PevProductController::class,
        'product_lang' => PevProductLangController::class,
        'product_attribute_price' => PevProductAttributePriceController::class,
        'product_comment' => PevProductCommentController::class,
        'product_comment_lang' => PevProductCommentLangController::class,
        'imagenes_product' => PevMediaPevProductController::class,
        'categorias_product' => PevCategoryPevProductController::class,
        'imagene_attribute_price' => PevMediaPevProductAttributePriceController::class,
        'transporte_product' => PevCarrierPevProductController::class,
        'caracterisiticas_values_product' => PevFeatureValuePevProductController::class,

        //--------------------ETAPA FILE--------------------------------------------
        'create_image_s3' => PevMediaController::class,

        //--------------------ETAPA GIFT--------------------------------------------
        'gitf' => PevGiftController::class,

        //--------------------ETAPA WORD--------------------------------------------
        'words' => PevWordController::class,
        'word_langs' => PevWordLangController::class,

        //--------------------ETAPA TRIVIAL--------------------------------------------
        'trivial_theme' => PevTrivialThemeController::class,
        'trivial_theme_lang' => PevTrivialThemeLangController::class,
        'trivial_question' => PevTrivialQuestionController::class,
        'trivial_question_lang' => PevTrivialQuestionLangController::class,

        //--------------------ETAPA CURRENCY--------------------------------------------
        'currency' => PevCurrencyController::class,

        //--------------------ETAPA ZONE PAIS PROVINCIA--------------------------------------------
        'zone' => PevZoneController::class,
        'country' => PevCountryController::class,
        'country_lang' => PevCountryLangController::class,
        'state' => PevStateController::class,


        //--------------------ETAPA CARRIER--------------------------------------------
         'carrier' => PevCarrierController::class,
         'carrier_lang' => PevCarrierLangController::class,
         'carrier_range_price' => PevCarrierRangePriceController::class,
         'carrier_range_weight' => PevCarrierRangeWeightController::class,
         'carrier_shipping_cost' => PevCarrierShippingCostController::class,


        //--------------------ETAPA EKOMI--------------------------------------------
        'ekomi_shop_rating' => PevEkomiShopRatingController::class,
        'ekomi_order' => PevEkomiOrderController::class,

        //--------------------ETAPA ALIAS--------------------------------------------
        'alias' => PevAliasController::class,

        //--------------------ETAPA CUSTOMER--------------------------------------------
        'customer_group' => PevCustomerGroupController::class,
        'customer_group_lang' => PevCustomerGroupLangController::class,
        'customer' => PevCustomerController::class,
        'address' => PevAddressController::class,

        //--------------------ETAPA ALIAS--------------------------------------------
        'pev_product_visited' => PevProductVisitedController::class,
        'pev_category_visited' => PevCategoryVisitedController::class,


         //--------------------ETAPA GEOLOCATION--------------------------------------------
         'geolocation_currency' => PevGeolocationCurrencyController::class,
         'geolocation_country' => PevGeolocationCountryController::class,

         //--------------------CACHE CSS JS ----------------------------------------------

         'cache_css_js' => PevCacheCssJsController::class,


    ]);

    Route::get('path_image/{pev_image_zone_id}', [PevMediaController::class, "pathSizes"]);
    Route::get('product_category_parent/{parent_id}', [PevProductCategoryController::class, "parent_tree"]);

 }); //pertenece al middleware de auth:api NO BORRAR...

 //--------------------ETAPA para APP Dictionary--------------------------------------------

 Route::get('word_by/{initial}/and_lang/{lang_id}', [PevWordLangController::class, "showInitial"]);
 Route::get('word_all', [PevWordLangController::class, "indexForApp"]);
 Route::get('word_only/{id}', [PevWordLangController::class, "showForApp"]);

  //  Route::get('faq_lang/lang/{lang_id}', [PevFaqLangController::class, "forlangs"]);
  //  Route::get('faq_category_by_langs/{lang_id}', [PevFaqCategoryPevLangController::class, "forlangs"]);

  //-------------------------ETAPA LOGIN------------------------------------------------------
  Route::post('login_admin', [AuthController::class, "loginAdmin"]);//ruta para el inicio de sesion de admin
  Route::post('login_customer', [AuthController::class, "loginCustomer"]);//ruta para el inicio de sesion de customer
});
