<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Language;
use App\Models\Category;
use App\Models\Currency;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(LanguagesSeeder::class);
//        $this->call(CategoriesSeeder::class);
        //$this->call(PostsSeeder::class);
        $this->call(DemoSeeder::class);
    }
}

class DemoSeeder extends Seeder
{
    public function run()
    {
        
        DB::table('Categories_languages')->delete();
        DB::table('Currencies_languages')->delete();
        DB::table('Posts_languages')->delete();
        DB::table('Posts')->delete();
        DB::table('Categories')->delete();
        DB::table('Currencies')->delete();
        DB::table('Languages')->delete();
        
        $language = Language::create([
            'name' => 'Russian',
            'iso' => 'rus',
            'sort' => 0,
            'status' => 1
        ]);
        Language::create([
            'name' => 'English',
            'iso' => 'eng',
            'sort' => 1,
            'status' => 1
        ]);
        
        
        
        $category = Category::create([
            'sort' => 0,
            'status' => 1
        ]);
        
        DB::table('Categories_languages')->insert([
            'category_id' => $category->id,
            'language_id' => $language->id,
            'name' => 'Грузы',
            'decription' => '',
            'metatitle' => '',
            'metadescription' => '',
        ]);
        
        $category2 = Category::create([
            'sort' => 0,
            'status' => 1
        ]);
        
        DB::table('Categories_languages')->insert([
            'category_id' => $category2->id,
            'language_id' => $language->id,
            'name' => 'Машины',
            'decription' => '',
            'metatitle' => '',
            'metadescription' => '',
        ]);
        
        
        
        $currency = Currency::create([
            'curs' => 1,
            'sort' => 0,
            'status' => 1
        ]);
        
        DB::table('Currencies_languages')->insert([
            'currency_id' => $currency->id,
            'language_id' => $language->id,
            'name' => 'UAH',
        ]);
        
        
        $post = Post::create([
            'price' => 15,
            'viewed_post' => 0,
            'viewed_contacts' => 0,
            'sort' => 1,
            'status' => 1,
            'category_id' => $category->id,
            'currency_id' => $currency->id,
        ]);
        
        DB::table('Posts_languages')->insert([
            'post_id' => $post->id,
            'language_id' => $language->id,
            'name' => 'Груз 1',
            'description' => '',
        ]);
        
        $post = Post::create([
            'price' => 10,
            'viewed_post' => 0,
            'viewed_contacts' => 0,
            'sort' => 2,
            'status' => 1,
            'category_id' => $category->id,
            'currency_id' => $currency->id,
        ]);
        
        DB::table('Posts_languages')->insert([
            'post_id' => $post->id,
            'language_id' => $language->id,
            'name' => 'Груз 2',
            'description' => '',
        ]);
        
        $post = Post::create([
            'price' => 5,
            'viewed_post' => 0,
            'viewed_contacts' => 0,
            'sort' => 3,
            'status' => 1,
            'category_id' => $category->id,
            'currency_id' => $currency->id, 
        ]);
        
        DB::table('Posts_languages')->insert([
            'post_id' => $post->id,
            'language_id' => $language->id,
            'name' => 'Груз 3',
            'description' => '',
        ]);
        
    }

}


class LanguagesSeeder extends Seeder
{
    public function run()
    {
        DB::table('Languages')->delete();
        
        Language::create([
            'name' => 'Russian',
            'iso' => 'rus',
            'sort' => 0,
            'status' => 1
        ]);
        Language::create([
            'name' => 'English',
            'iso' => 'eng',
            'sort' => 1,
            'status' => 1
        ]);
    }
}

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        DB::table('Categories_languages')->delete();
        DB::table('Categories')->delete();
        
        $id = Category::create([
            'sort' => 0,
            'status' => 1
        ]);
        
        DB::table('Categories_languages')->insert([
            'category_id' => $id->id,
            'language_id' => 1,
            'name' => 'Грузы',
            'decription' => '',
            'metatitle' => '',
            'metadescription' => '',
        ]);
        
    }
}

class PostsSeeder extends Seeder
{
    public function run()
    {
        DB::table('Posts')->delete();
        Post::create([
            'price' => 15,
            'viewed_post' => 0,
            'viewed_contacts' => 0,
            'sort' => 1,
            'status' => 1,
            'category_id' => null,
            'currency_id' => null,
        ]);
        Post::create([
            'price' => 10,
            'viewed_post' => 0,
            'viewed_contacts' => 0,
            'sort' => 2,
            'status' => 1,
            'category_id' => null,
            'currency_id' => null,
        ]);
        Post::create([
            'price' => 5,
            'viewed_post' => 0,
            'viewed_contacts' => 0,
            'sort' => 3,
            'status' => 1,
            'category_id' => null,
            'currency_id' => null,
        ]);
    }
}