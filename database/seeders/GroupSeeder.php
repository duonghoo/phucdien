<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;
use stdClass;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new Group();
        $group->name = 'Admin';

        $data = [
            'category' => new \stdClass,
            'post' => new \stdClass,
            'page' => new \stdClass,
            'user' => new \stdClass,
            'group' => new \stdClass,
            'site_setting' => new \stdClass,
            'redirect' => new \stdClass,
            'menu' => new \stdClass,
            'banner' => new \stdClass,
            'categoryauthor' => new \stdClass,
            'video' => new \stdClass,
            'shortcode' => new \stdClass
            ];
            foreach($data as &$item){
                $item->index = 'on';
                $item->add = 'on';
                $item->edit = 'on';
                $item->delete = 'on';
            }
        $group->permission = json_encode($data);
        $group->save();
    }
}
