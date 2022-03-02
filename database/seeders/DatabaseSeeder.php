<?php

namespace Database\Seeders;

use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Model::unguard();

        // $this->truncateMultiple([
        //     'activity_log',
        //     'failed_jobs',
        // ]);

        // $this->call(AuthSeeder::class);
        // $this->call(AnnouncementSeeder::class);
        $this->call(PevLangSeed::class);
        $this->call(PevCustomerGroupSeed::class);
        $this->call(PevCustomerGroupLangSeeder::class);
        $this->call(PevCustomerSeeder::class);
        $this->call(PevAdminSeeder::class);
        $this->call(InsertBlogPostCommentSeeders::class);
        $this->call(Migration_ps_cms_to_pev_cms_Seeder::class);
        $this->call(Migration_ps_cms_lang_to_pev_cms_langs_Seeder::class);
        $this->call(FileIsertDataSeeder::class);


        $this->call(MigracionDiccionarioSeeder::class);
        $this->call(MigracionWordLangSeeder::class);

        //Etapa ZONE.............................
        $this->call(PevCurrenciesSeeder::class);
        $this->call(PevZonesSeeder::class);
        $this->call(PevCountriesSeeder::class);
        $this->call(PevCountryLangsSeeder::class);
        $this->call(PevStatesSeeder::class);

        //Etapa de productos...............

        $this->call(PevTaxRulesGroupsSeeder::class);
        $this->call(PevProductAttributeGRoupsSeeder::class);
        $this->call(PevProductAttributeGroupLangsSeeder::class);
        $this->call(PevProductAttributesSeeder::class);
        $this->call(PevProductAttributeLangsSeeder::class);
        $this->call(Migration_ps_category_to_pev_product_categories_Seeder::class);
        $this->call(PevProductCategoryLangsSeeder::class);
        $this->call(PevRedirectionsSeeder::class);
        $this->call(PevProductFeaturesSeeder::class);
        $this->call(PevProductFeatureLangsSeeder::class);
        $this->call(PevProductFeaturevaluesSeeder::class);
        $this->call(PevProductFeaturevalueLangsSeeder::class);
        $this->call(PevCategorySeedfindersSeeder::class);
        $this->call(PevAliasSeeder::class);
        $this->call(PevProductSeeder::class);
        $this->call(PevFeatureValuePevProductSeeder::class);




        //Etapa de geolocation...............
        $this->call(PevGeolocationCurrencySeeder::class);

        //Etapa Addresssss..........................
        $this->call(PevAddressSeeder::class);
        // Model::reguard();


        //Etapa BLOG .............................................
        $this->call(PevBlogCategorySeeder::class);
        $this->call(PevBlogCategoryLangSeeder::class);
        $this->call(PevBlogPostSeeder::class);
        $this->call(PevBlogCategoryPevBlogPostSeeder::class);
        $this->call(PevBlogPostLangSeeder::class);

        //cache data
        $this->call(PevCacheCssJsSeeder::class);


    }
}
