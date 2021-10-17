<?php 
use Illuminate\Database\Seeder;
use App\Models\ClassSection

class newfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = array(
            array("section"=>"A"),
            array("section"=>"B"),
            array("section"=>"C"),
            array("section"=>"D"),
        );

        ClassSection::insert($data);

    }
}