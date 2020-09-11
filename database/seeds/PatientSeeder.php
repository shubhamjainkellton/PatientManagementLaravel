<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Db;
use Faker\Factory as Faker;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,10) as $index){
            DB::table('patients')->insert([
                'name'=>$faker->name,
                'email'=>$faker->email,
                'phone_no'=>$faker->phoneNumber,
                'gender'=>$faker->randomElement(['male', 'female']),
                'age'=>$faker->numberBetween(1,100),
                'blood_grp'=>$faker->randomElement(['O−','O+','A-','A+','B-','B+','AB-','AB+']),
                'dob'=>$faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('d/m/Y'),
                'doc_id'=>$faker->unique()->randomDigit,
            ]);  
        }        
    }
}
