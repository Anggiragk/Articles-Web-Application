<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\Author;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        Post::create([
            'title' => 'The Ant and The Elephant',
            'slug' => 'the_ant_and_the_elephant',
            'excerpt' => 'Once upon a time, there lived a huge elephant in a jungle. He was arrogant and always underestimated animals smaller than him.',
            'body' => '            One day, when the ant family was coming back collecting their food, the elephant sprayed a trunk full of water on them. “You shouldn`t hurt others like this” cried one of the ants. “Shut up you, tiny ant! Keep quiet or I will crush you to death,” said the elephant angrily. The poor ant kept quiet and went on its way. But she decided to teach the proud elephant a lesson.
            
            Next day, when the elephant was sleeping, the tiny ant slowly crept into the elephant`s trunk and started biting him. The elephant woke up and tried everything to get the ant out his trunk but could not. Such a big animal but he could not do anything to get the tiny ant out.
            
            The elephant started to cry and begged sorry to the ant. “I hope now you understand how others feel when you hurt them” said the ant. “Yes, I do. Yes, I do,” cried the elephant and pleaded the ant to come out. The ant took pity on the elephant and came out of his trunk. From that day onward, the elephant never troubled any animals.',
            'author_id' => '1',
            'category_id' => '1'
        ]);
        Post::factory(3)->create();

        Author::create([
            'name' => 'Anggira GK',
            'username' => "anggira_gk",
            'email' => 'anggira@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'is_admin' => true
        ]);

        Category::create([
            'name' => 'Music',
            'slug' => 'music',
        ]);

        Category::create([
            'name' => 'Movies',
            'slug' => 'movies',
        ]);

        Category::create([
            'name' => 'Tech',
            'slug' => 'tech',
        ]);
        
        Category::create([
            'name' => 'Narrative Text',
            'slug' => 'narrative_text',
        ]);

    }
}
