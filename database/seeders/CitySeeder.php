<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Ahmar', 'Ahtaung', 'Aingthapyu', 'Amarapura', 'Ann', 'Aungban', 'Aunglan', 'Ayadaw', 'Ayetharyar',
            'Bagan', 'Bago', 'Banmauk', 'Bawlakhe', 'Bhamo', 'Bilin', 'Bogale', 'Bokepyin', 'Budalin', 'Buthidaung',
            'Chauk', 'Chaungtha', 'Chaung-U', 'Chaungzon', 'Chin Shwe Haw', 'Chipwi', 'Cikha',
            'Daik-U', 'Danubyu', 'Dawei', 'Dedaye', 'Demoso',
            'Einme',
            'Falam',
            'Gangaw', 'Gwa', 'Gyobingauk',
            'Hainggyi Island', 'Hakha', 'Hinthada', 'Hkamti', 'Hlegu', 'Hnaring', 'Homalin', 'Hong Pai', 'Hopang', 'Hopin', 'Hopong', 'Hpakant', 'Hpasawng', 'Hpruso', 'Hsawlaw', 'Hseni', 'Hsi Hseng', 'Hsinbo', 'Hsipaw', 'Htantlang', 'Htigyaing', 'Htilin',
            'Indaw', 'Ingapu', 'Injangyang', 'Inwa',
            'Kalaw', 'Kale', 'Kalewa', 'Kamaing', 'Kamarwet', 'Kamma', 'Kanaung', 'Kanbalu', 'Kangyi Daut', 'Kani', 'Kanpetlet', 'Katha', 'Kawhmu', 'Kawlin', 'Kawnglanghpu', 'Kawthaung', 'Kengtung', 'Khawzar', 'Khin-U', 'Kunhing', 'Kunlong', 'Kutkai', 'Kyaik Khami', 'Kyaiklat', 'Kyaikmaraw', 'Kyaikto', 'Kyangin', 'Kyaukme', 'Kyauk Padaung', 'Kyauk Phyu', 'Kyaukse', 'Kyauktan', 'Kyauktaw', 'Kyaunggon', 'Kyeintali', 'Kyethi', 'Kyonmanage', 'Kyonpyaw', 'Kyunhla', 'Kyunsu',
            'Labutta', 'Lahe', 'Lai-Hka', 'Lalengpi', 'Langkho', 'Lashio', 'Laukkaing', 'Launglon', 'Lawksawk', 'Lawpita', 'Lemyethna', 'Leshi', 'Letpadan', 'Lewe', 'Loikaw', 'Loilen', 'Loilinlay', 'Lweje',
            'Mabein', 'Machanbaw', 'Madaya', 'Magway', 'Ma Hlaing', 'Man Aung', 'Mandalay', 'Mansi', 'Mantong', 'Matupi', 'Maubin', 'Maungdaw', 'Mawkmai', 'Mawlaik', 'Mawlamyine', 'Mawlamyine Gyun', 'Meiktila', 'Mese', 'Minbu', 'Minbya', 'Mindat', 'Mindon', 'Mingin', 'Minhla', 'Mogaung', 'Mogok', 'Mohnyin', 'Momauk', 'Mong Hpayak', 'Mong Hsat', 'Mong Hsu', 'Mong Khet', 'Mong Kung', 'Mong Nai', 'Mong Pan', 'Mong Ping', 'Mong Ton', 'Mong Yang', 'Mong Yawng', 'Mongko', 'Mongmit', 'Mongyai', 'Monywa', 'Mrauk U', 'Mudon', 'Muse', 'Myaing', 'Myan Aung', 'Myaung', 'Myaungmya', 'Myebon', 'Myeik', 'Myingyan', 'Myinmu', 'Myitkyina', 'Myitnge', 'Myittha', 'Myothit',
            'Namhsan', 'Namtu', 'Nanhkan', 'Nanmekon', 'Nansang', 'Nanyun', 'Natmauk', 'Natogyi', 'Nawnghkio', 'Ngan Zun', 'Ngape', 'Nga Pu Daw', 'Nga Thaing Chaung', 'Ngayok Kaung', 'Ngwe Saung', 'Nogmung', 'Nyaung Don', 'Nyaunglebin', 'Nyaung Shwe', 'Nyaung-U',
            'Pakokku', 'Palaw', 'Pale', 'Paletwa', 'Panglong', 'Pantanaw', 'Pathein', 'Pauk', 'Pauktaw', 'Paung', 'Paung Byin', 'Paungde', 'Pekon', 'Phunom', 'Pinlaung', 'Pinlebu', 'Ponna Gyun', 'Putao', 'Pwintbyu', 'Pyapon', 'Pyawbwe', 'Pyay', 'Pyinmana', 'Pyinoolwin', 'Pyinsalu', 'Pyu', 'Pyuntaza',
            'Ramree', 'Rathedaung', 'Rezua', 'Rihkhawdar',
            'Sagaing', 'Sagu', 'Salin', 'Salingyi', 'Sami', 'Saw', 'Seikpyu', 'Shadaw', 'Shwebo', 'Shwedaung', 'Shwegu', 'Shwegyin', 'Shwe Laung', 'Sidoktaya', 'Sinbyu Gyun', 'Singu', 'Sint Gaing', 'Sittaung', 'Sittwe', 'Sumprabum',
            'Tabayin', 'Tachileik', 'Tada-U', 'Tagaung', 'Taikkyi', 'Tamu', 'Tanai', 'Tangyan', 'Tanintharyi', 'Tatkon', 'Taung Dwin Gyi', 'Taunggyi', 'Taungoo', 'Taungtha', 'Taze', 'Thabaung', 'Tha Beik Kyin', 'Than Byu Zayat', 'Thandwe', 'Thanlyin', 'Tharrawaddy', 'Thaton', 'Thayet', 'Thayet Chaung', 'Thazi', 'Thongwa', 'Thuwanawaddy', 'Tiddim', 'Ton Zang', 'Toungup', 'Twante',
            'Waingmaw', 'Wakema', 'Wetlet', 'Wundwin', 'Wuntho',
            'Yamethin', 'Yangon', 'Ye', 'Yebyu', 'Yedashe', 'Yekyi', 'Ye Nan Gyaung', 'Yesagyo', 'Ye-U', 'Yin Ma Bin', 'Ywathit',
            'Zalun', 'Zin Kyaik'
        ];

        foreach ($cities as $city) {
            $countries = Country::all();

            foreach ($countries as $country) {
                City::firstOrCreate([
                    'country_id' => $country->id,
                    'city_name' => $city
                ]);
            }
        }
    }
}
