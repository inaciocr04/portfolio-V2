<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'id' => '1',
            'name' => 'SAE 105 Document Minecraft',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque, dui suscipit auctor aliquet, enim nibh ultricies massa, sed luctus ipsum nisi eu nisi. Suspendisse nisi dui, mollis ac arcu ut, vestibulum egestas nulla. Suspendisse metus purus, sollicitudin id arcu a, sagittis feugiat sapien. Ut aliquam mollis nunc vel pulvinar. In quis metus vitae elit maximus venenatis quis gravida massa. In ex tellus, mattis et purus eget, lobortis bibendum sem. Nunc augue risus, commodo nec odio vitae, maximus gravida risus. Phasellus ante orci, cursus a convallis non, rhoncus et neque. Mauris lorem leo, laoreet ac posuere ac, mollis in velit. Fusce pellentesque arcu risus, at convallis lectus efficitur sit amet.

Nam volutpat elementum libero a porta. Maecenas feugiat nec erat quis tristique. Suspendisse potenti. Donec in venenatis orci, quis vulputate leo. Nam porta sapien lectus, non commodo purus convallis sit amet. Cras et imperdiet tellus, quis vestibulum nulla. Fusce urna nibh, scelerisque id erat sit amet, blandit rhoncus odio. Sed ac lacus sed mauris vehicula auctor. Maecenas erat mauris, porttitor dapibus gravida non, pretium commodo nunc.',
            'url_site' => 'https://sae105.rodrigues.etu.mmi-unistra.fr/',
            'url_git' => 'fsfsfs',
            'video' => 'https://www.youtube-nocookie.com/embed/3dOe_kYquFo?si=6bQNlx4Laa3dgLh3',
            'image_visuel' => 'projects/c8cd8956262c9478ace09629974d4472.png',
            'image_deco1' => 'projects/1088e3e694cdd45bdc2c3e86b4b0dbec.png',
            'image_deco2' => 'projects/b74fe39d0d33ab2eb822fcc048674b60.png',
            'image_deco3' => 'projects/8a9e39bea486a166d6a46066ca856db2.png',
            'image_deco4' => 'projects/35633f79eba2fed46c175906e5ccbb32.png',
            'image_deco5' => 'projects/9dd4792afc12c591d1cfe1d0251a696c.png',
            'status' => 'en_cours',
            'active' => 1,
        ]);
    }
}
