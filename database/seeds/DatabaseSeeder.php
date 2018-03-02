<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        /*-----------------------Region Code---------------------*/

        /*Sumatra Region*/
    	 DB::table('MsProvince')->insert([
            'province_id' => 11,'province_name' => 'Nanggroe Aceh D.'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 12,'province_name' => 'Sumatra Utara'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 13,'province_name' => 'Sumatra Barat'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 14,'province_name' => 'Riau'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 15,'province_name' => 'Jambi'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 16,'province_name' => 'Sumatra Selatan'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 17,'province_name' => 'Bengkulu'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 18,'province_name' => 'Lampung'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 19,'province_name' => 'Kepulauan Bangka Belitung'
            ]);

         /*Java Region*/
         DB::table('MsProvince')->insert([
            'province_id' => 30,'province_name' => 'Banten'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 31,'province_name' => 'DKI Jakarta'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 32,'province_name' => 'Jawa Barat'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 33,'province_name' => 'Jawa Tengah'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 34,'province_name' => 'D.I.Yogyakarta'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 35,'province_name' => 'Jawa Timur'
            ]);
         /*Bali & Nusa Tenggara*/
         DB::table('MsProvince')->insert([
            'province_id' => 51,'province_name' => 'Bali'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 52,'province_name' => 'Nusa Tenggara Barat'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 53,'province_name' => 'Nusa Tenggara Timur'
            ]);

         /*Kalimantan*/
         DB::table('MsProvince')->insert([
            'province_id' => 61,'province_name' => 'Kalimantan Barat'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 62,'province_name' => 'Kalimantan Tengah'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 63,'province_name' => 'Kalimantan Selatan'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 64,'province_name' => 'Kalimantan Timur'
            ]);

         /*Gorontalo & Sulawesi*/
         DB::table('MsProvince')->insert([
            'province_id' => 70,'province_name' => 'Gorontalo'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 71,'province_name' => 'Sulawesi Utara'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 72,'province_name' => 'Sulawesi Tengah'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 73,'province_name' => 'Sulawesi Selatan'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 74,'province_name' => 'Sulawesi Tenggara'
            ]);

         /*Maluku & Papua*/
         DB::table('MsProvince')->insert([
            'province_id' => 81,'province_name' => 'Maluku'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 82,'province_name' => 'Maluku Utara'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 85,'province_name' => 'Papua I'
            ]);
         DB::table('MsProvince')->insert([
            'province_id' => 86,'province_name' => 'Papua II'
            ]);
        DB::table('MsProvince')->insert([
            'province_id' => 87,'province_name' => 'Papua Bar.'
            ]);
        /*---------------------Region Code End Here--------------------*/    



        /*-------------------------City Code-----------------------------*/

        /*Nanggroe Aceh D.*/
        DB::table('MsCity')->insert([
            'city_id' => 11013,'city_name' => 'Kab. Aceh Selatan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 11021,'city_name' => 'Kab. Aceh Tenggara'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 11036,'city_name' => 'Kab. Aceh Timur'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 11052,'city_name' => 'Kab. Aceh Barat'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 11067,'city_name' => 'Kab. Aceh Besar'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 11075,'city_name' => 'Kab. Aceh Pidie'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 11083,'city_name' => 'Kab. Aceh Utara'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 11091,'city_name' => 'Kab. Bireun'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 11102,'city_name' => 'Kab. Aceh Singkil'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 11117,'city_name' => 'Kab. Simeulue'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 11156,'city_name' => 'Kab. Nagan Raya'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 11713,'city_name' => 'Kota Banda Aceh'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 11721,'city_name' => 'Kota Sabang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 11736,'city_name' => 'Kote Lhokseumawe'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 11744,'city_name' => 'Kota Langsa'
            ]);

        /*Sumatra Utara*/
        DB::table('MsCity')->insert([
            'city_id' => 12016,'city_name' => 'Kab. Nias'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12024,'city_name' => 'Kab. Tapanuli Selatan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12032,'city_name' => 'Kab. Tapanuli Tengah'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12047,'city_name' => 'Kab. Tapanuli Utara'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12055,'city_name' => 'Kab. Labuhan Batu'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12063,'city_name' => 'Kab. Asahan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12071,'city_name' => 'Kab. Simalungun'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12086,'city_name' => 'Kab. Dairi'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12094,'city_name' => 'Kab. Karo'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12105,'city_name' => 'Kab. Deli Serdang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12113,'city_name' => 'Kab. Langkat'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12121,'city_name' => 'Kab. Toba Samosir'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12136,'city_name' => 'Kab. Mandailing Natal'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12716,'city_name' => 'Kota Sibolga'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12724,'city_name' => 'Kota Tanjung Balai'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12732,'city_name' => 'Kota P.Siangtar'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12747,'city_name' => 'Kota Tebingtinggi'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12755,'city_name' => 'Kota Medan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12763,'city_name' => 'Kota Binjai'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 12771,'city_name' => 'Kota P.Sidempuan'
            ]);

        /*Sumatra Barat*/
        DB::table('MsCity')->insert([
            'city_id' => 13012,'city_name' => 'Kab. Pesisir Selatan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 13027,'city_name' => 'Kab. Solok'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 13035,'city_name' => 'Kab. Sawah Lunto'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 13043,'city_name' => 'Kab. Tanah Datar'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 13051,'city_name' => 'Kab. Padang Pariaman'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 13066,'city_name' => 'Kab. Agam'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 13074,'city_name' => 'Kab. Limapuluhkota'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 13082,'city_name' => 'Kab. Pasaman'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 13097,'city_name' => 'Kab. Kep. Mentawai'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 13046,'city_name' => 'Kab. Dharmasraya'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 13712,'city_name' => 'Kota Padang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 13727,'city_name' => 'Kota Solok'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 13735,'city_name' => 'Kota Sawah Lunto'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 13743,'city_name' => 'Kota Padang Panjang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 13751,'city_name' => 'Kota Bukit Tinggi'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 13766,'city_name' => 'Kota Payakumbuh'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 13774,'city_name' => 'Kota Pariaman'
            ]);

        /*Riau*/
        DB::table('MsCity')->insert([
            'city_id' => 14015,'city_name' => 'Kab. Indragiri Hulu'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 14023,'city_name' => 'Kab. Indragiri Hilir'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 14031,'city_name' => 'Kab. Kepulauan Riau'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 14046,'city_name' => 'Kab. Kampar'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 14054,'city_name' => 'Kab. Bengkalis'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 14062,'city_name' => 'Kab. Karimnun'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 14077,'city_name' => 'Kab. Kuantan Singingi'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 14085,'city_name' => 'Kab. Natuna'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 14093,'city_name' => 'Kab. Siak'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 14104,'city_name' => 'Kab. Rokan Hilir'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 14112,'city_name' => 'Kab. Rokan Hulu'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 14127,'city_name' => 'Kab. Pelalawan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 14715,'city_name' => 'Kota Pekanbaru'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 14723,'city_name' => 'Kota Batam'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 14731,'city_name' => 'Kota Dumai'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 14746,'city_name' => 'Kota Tanjung Pinang'
            ]);

        /*Jambi*/
        DB::table('MsCity')->insert([
            'city_id' => 15011,'city_name' => 'Kab. Kerinci'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 15026,'city_name' => 'Kab. Bangko Sarolangun'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 15034,'city_name' => 'Kab. Batanghari'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 15065,'city_name' => 'Kab. Sarolangun'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 15073,'city_name' => 'Kab. Merangin'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 15081,'city_name' => 'Kab. Tj. Jabung Timur'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 15096,'city_name' => 'Kab. Tj. Jabung Barat'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 15107,'city_name' => 'Kab. Muaro Jambi'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 15115,'city_name' => 'Kab. Bungo'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 15123,'city_name' => 'Kab. Tebo'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 15711,'city_name' => 'Kota Jambi'
            ]);

        /*Sumatra Selatan*/
        DB::table('MsCity')->insert([
            'city_id' => 16014,'city_name' => 'Kab. Ogan Komering Ulu'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 16022,'city_name' => 'Kab. Ogan Komering Ilir'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 16037,'city_name' => 'Kab. Muara Enimr'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 16045,'city_name' => 'Kab. Lahat'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 16053,'city_name' => 'Kab. Musi Rawas'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 16061,'city_name' => 'Kab. Musi Banyuasin'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 16714,'city_name' => 'Kota Palebang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 16737,'city_name' => 'Kota Prabumulih'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 16745,'city_name' => 'Kota Pagaralam'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 16753,'city_name' => 'Kota Lubuk Linggau'
            ]);

        /*Bengkulu*/
        DB::table('MsCity')->insert([
            'city_id' => 17017,'city_name' => 'Kab. Bengkulu Selatan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 17025,'city_name' => 'Kab. Rejang Lebong'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 17033,'city_name' => 'Kab. Bengkulu Utara'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 17717,'city_name' => 'Kota Bengkulu'
            ]);

        /*Lampung*/
        DB::table('MsCity')->insert([
            'city_id' => 18013,'city_name' => 'Kab. Lampung Selatan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 18021,'city_name' => 'Kab. Lampung Tengah'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 18036,'city_name' => 'Kab. Lampung Utara'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 18044,'city_name' => ' Lampung Barat'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 18052,'city_name' => 'Kab. Tanggamus'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 18067,'city_name' => 'Kab. Tulang Bawang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 18075,'city_name' => 'Kab. Lampung Timur'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 18083,'city_name' => 'Kab. Way Kanan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 18713,'city_name' => 'Kota Bandar Lampung'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 18721,'city_name' => 'Kota Metro'
            ]);

        /*Kepulauan Bangka Belitung*/
        DB::table('MsCity')->insert([
            'city_id' => 19016,'city_name' => 'Kab. Bangka'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 19024,'city_name' => 'Kab. Belitung'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 19716,'city_name' => 'Kota Pangkal Pinang'
            ]);

        /*Banten*/
        DB::table('MsCity')->insert([
            'city_id' => 30014,'city_name' => 'Kab. Pandeglang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 30022,'city_name' => 'Kab. Lebak'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 30037,'city_name' => 'Kab. Tanggerang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 30045,'city_name' => 'Kab. Serang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 30714,'city_name' => 'Kota Tanggerang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 30722,'city_name' => 'Kota Cilegon'
            ]);

        /*DKI Jakarta*/
        DB::table('MsCity')->insert([
            'city_id' => 31717,'city_name' => 'Jakarta Selatan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 31725,'city_name' => 'Jakarta Timur'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 31733,'city_name' => 'Jakarta Pusat'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 31741,'city_name' => 'Jakarta Barat'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 31756,'city_name' => 'Jakarta Utara'
            ]);

        /*Jawa Barat*/
        DB::table('MsCity')->insert([
            'city_id' => 32036,'city_name' => 'Kab. Bogor'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32044,'city_name' => 'Kab. Sukabumi'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32052,'city_name' => 'Kab. Cianjur'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 320367,'city_name' => 'Kab. Bandung'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32075,'city_name' => 'Kab. Garut'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32083,'city_name' => 'Kab. Tasikmalaya'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32091,'city_name' => 'Kab. Ciamis'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32102,'city_name' => 'Kab. Kuningan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32117,'city_name' => 'Kab. Cirebon'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32125,'city_name' => 'Kab. Majalengka'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32133,'city_name' => 'Kab. Sumedang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32141,'city_name' => 'Kab. Indramayu'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32156,'city_name' => 'Kab. Subang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32164,'city_name' => 'Kab. Purwakarta'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32172,'city_name' => 'Kab. Karawang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32187,'city_name' => 'Kab. Bekasi'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32713,'city_name' => 'Kota Bogor'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32721,'city_name' => 'Kota Sukabumi'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32736,'city_name' => 'Kota Bandung'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32744,'city_name' => 'Kota Cirebon'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32767,'city_name' => 'Kota Bekasi'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32775,'city_name' => 'Kota Depok'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32783,'city_name' => 'Kota Cimahi'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 32791,'city_name' => 'Kota Tasikmalaya'
            ]);

        /*Jawa Tengah*/
        DB::table('MsCity')->insert([
            'city_id' => 33016,'city_name' => 'Kab. Cilacap'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33024,'city_name' => 'Kab. Banyumas'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33032,'city_name' => 'Kab. Purbalingga'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33047,'city_name' => 'Kab. Banjarnegara'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33055,'city_name' => 'Kab. Kebumen'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33063,'city_name' => 'Kab. Purworejo'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33071,'city_name' => 'Kab. Wonosobo'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33086,'city_name' => 'Kab. Magelang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33094,'city_name' => 'Kab. Boyolali'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33105,'city_name' => 'Kab. Klaten'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33113,'city_name' => 'Kab. Sukoharjo'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33121,'city_name' => 'Kab. Wonogiri'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33136,'city_name' => 'Kab. Karanganyar'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33144,'city_name' => 'Kab. Sragen'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33152,'city_name' => 'Kab. Grobogan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33167,'city_name' => 'Kab. Blora'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33175,'city_name' => 'Kab. Rembang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33183,'city_name' => 'Kab. Pati'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33191,'city_name' => 'Kab. Kudus'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33202,'city_name' => 'Kab. Jepara'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33217,'city_name' => 'Kab. Demak'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33225,'city_name' => 'Kab. Semarang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33233,'city_name' => 'Kab. Temanggung'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33241,'city_name' => 'Kab. Kendal'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33256,'city_name' => 'Kab. Batang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33264,'city_name' => 'Kab. Pekalongan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33272,'city_name' => 'Kab. Pemalang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33287,'city_name' => 'Kab. Tegal'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33295,'city_name' => 'Kab. Brebes'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33716,'city_name' => 'Kota Magelang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33724,'city_name' => 'Kota Surakarta'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33732,'city_name' => 'Kota Salatiga'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33747,'city_name' => 'Kota Semarang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33755,'city_name' => 'Kota Pekalongan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 33763,'city_name' => 'Kota Tegal'
            ]);

        /*D.I Yogyakarta*/
        DB::table('MsCity')->insert([
            'city_id' => 34012,'city_name' => 'Kab. Kulonprogo'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 34027,'city_name' => 'Kab. Bantul'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 34035,'city_name' => 'Kab. Gunung Kidul'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 34043,'city_name' => 'Kab. Sleman'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 34712,'city_name' => 'Kota Yogyakarta'
            ]);

        /*Jawa timur*/
        DB::table('MsCity')->insert([
            'city_id' => 35015,'city_name' => 'Kab. Pacitan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35023,'city_name' => 'Kab. Ponorogo'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35031,'city_name' => 'Kab. Trenggalek'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35046,'city_name' => 'Kab. Tulungagung'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35054,'city_name' => 'Kab. Blitar'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35062,'city_name' => 'Kab. Kediri'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35077,'city_name' => 'Kab. Malang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35085,'city_name' => 'Kab. Lumajang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35093,'city_name' => 'Kab. Jember'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35104,'city_name' => 'Kab. Banyuwangi'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35112,'city_name' => 'Kab. Bondowoso'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35127,'city_name' => 'Kab. Situbondo'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35135,'city_name' => 'Kab. Probolinggo'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35143,'city_name' => 'Kab. Pasuruan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35151,'city_name' => 'Kab. Sidoarjo'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35166,'city_name' => 'Kab. Mojokerto'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35174,'city_name' => 'Kab. Jombang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35182,'city_name' => 'Kab. Nganjuk'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35197,'city_name' => 'Kab. Madiun'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35201,'city_name' => 'Kab. Mangetan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35216,'city_name' => 'Kab. Ngawi'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35224,'city_name' => 'Kab. Bojonegoro'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35232,'city_name' => 'Kab. Tuban'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35247,'city_name' => 'Kab. Lamongan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35255,'city_name' => 'Kab. Gresik'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35263,'city_name' => 'Kab. Bangkalan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35271,'city_name' => 'Kab. Sampang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35286,'city_name' => 'Kab. Pamekasan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35294,'city_name' => 'Kab. Sumenep'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35715,'city_name' => 'Kota Kediri'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35723,'city_name' => 'Kota Blitar'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35731,'city_name' => 'Kota Malang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35746,'city_name' => 'Kota Probolinggo'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35754,'city_name' => 'Kota Pasuruan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35762,'city_name' => 'Kota Mojokerto'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35777,'city_name' => 'Kota Madiun'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35785,'city_name' => 'Kota Surabaya'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 35793,'city_name' => 'Kota Batu'
            ]);

        /*Bali*/
        DB::table('MsCity')->insert([
            'city_id' => 51014,'city_name' => 'Kab. Jembrana'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 51022,'city_name' => 'Kab. Tabanan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 51037,'city_name' => 'Kab. Badung'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 51045,'city_name' => 'Kab. Gianyar'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 51053,'city_name' => 'Kab. Klungkung'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 51061,'city_name' => 'Kab. Bangli'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 51076,'city_name' => 'Kab. Karangasem'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 51084,'city_name' => 'Kab. Buleleng'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 51714,'city_name' => 'Kota Denpasar'
            ]);

        /*Nusa Tenggara Barat*/
        DB::table('MsCity')->insert([
            'city_id' => 52017,'city_name' => 'Kab. Lombok Barat'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 52025,'city_name' => 'Kab. Lombok Tengah'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 52033,'city_name' => 'Kab. Lombok Timur'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 52041,'city_name' => 'Kab. Sumbawa'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 52026,'city_name' => 'Kab. Dompu'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 52064,'city_name' => 'Kab. Bima'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 52717,'city_name' => 'Kota Mataram'
            ]);

        /*Nusa Tenggara Timur*/
        DB::table('MsCity')->insert([
            'city_id' => 53013,'city_name' => 'Kab. Sumba Barat'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 53021,'city_name' => 'Kab. Sumba Timur'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 53036,'city_name' => 'Kab. Kupang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 53044,'city_name' => 'Kab. Timur Tengah Sel.'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 53052,'city_name' => 'Kab. Timur Tengah Ut.'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 53067,'city_name' => 'Kab. Belu'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 53075,'city_name' => 'Kab. Alor'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 53083,'city_name' => 'Kab. Flores Timur'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 53091,'city_name' => 'Kab. Sikka'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 53102,'city_name' => 'Kab. Ende'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 53117,'city_name' => 'Kab. Ngada'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 53125,'city_name' => 'Kab. Manggarai.'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 53133,'city_name' => 'Kab. Lembata'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 53711,'city_name' => 'Kota Kupang'
            ]);

        /*Kalimantan Barat*/
        DB::table('MsCity')->insert([
            'city_id' => 61016,'city_name' => 'Kab. Sambas'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 61024,'city_name' => 'Kab. Pontianak'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 61032,'city_name' => 'Kab. Sanggau'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 61047,'city_name' => 'Kab. Ketapang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 61055,'city_name' => 'Kab. Sintang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 61063,'city_name' => 'Kab. Kapuas Hulu'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 61071,'city_name' => 'Kab. Bengkayang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 61086,'city_name' => 'Kab. Landak'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 61716,'city_name' => 'Kota Pontianak'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 61724,'city_name' => 'Kota Singkawang'
            ]);

        /*Kalimantan Tengah*/
        DB::table('MsCity')->insert([
            'city_id' => 62012,'city_name' => 'Kab. KotaWaringinBarat'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 62027,'city_name' => 'Kab. KotaWaringinTimur'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 62035,'city_name' => 'Kab. Katingan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 62043,'city_name' => 'Kab. Kapuas'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 62051,'city_name' => 'Kab. Barito Selatan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 62074,'city_name' => 'Kab. Barito Utara'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 62082,'city_name' => 'Kab. Gunung Mas'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 62097,'city_name' => 'Kab. Murung Jaya'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 62101,'city_name' => 'Kab. Seruyan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 62712,'city_name' => 'Kota Palangkaraya'
            ]);

        /*Kalimantan Selatan*/
        DB::table('MsCity')->insert([
            'city_id' => 63015,'city_name' => 'Kab. Tanah Laut'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 63023,'city_name' => 'Kab. Kota Baru'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 63031,'city_name' => 'Kab. Banjar'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 63046,'city_name' => 'Kab. Barito Kuala'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 63054,'city_name' => 'Kab. Tapin'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 63062,'city_name' => 'Kab. Hulu Sei Selatan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 63085,'city_name' => 'Kab. Hulu Sei Utara'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 63093,'city_name' => 'Kab. Tabalong'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 63715,'city_name' => 'Kota Banjarmasin'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 63723,'city_name' => 'Kota Banjar Baru'
            ]);

        /*Kalimantan Timur*/
        DB::table('MsCity')->insert([
            'city_id' => 64011,'city_name' => 'Kab. Pasir'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 64026,'city_name' => 'Kab. Kutai'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 64034,'city_name' => 'Kab. Berau'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 64042,'city_name' => 'Kab. Bulungan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 64057,'city_name' => 'Kab. Nunukan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 64065,'city_name' => 'Kab. Kutai Timur'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 64073,'city_name' => 'Kab. Malinau'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 64081,'city_name' => 'Kab. Kutai Barat'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 64711,'city_name' => 'Kota Balikpapan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 64726,'city_name' => 'Kota Samarinda'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 64734,'city_name' => 'Kota Tarakan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 64742,'city_name' => 'Kota Bontang'
            ]);

        /*Gorontalo*/
        DB::table('MsCity')->insert([
            'city_id' => 70015,'city_name' => 'Kab. Gorontalo'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 70023,'city_name' => 'Kab. Boalemo'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 70715,'city_name' => 'Kota Gorontalo'
            ]);
        
        /*Sulawesi Utara*/
        DB::table('MsCity')->insert([
            'city_id' => 71026,'city_name' => 'Kab. Bolaang Mongondow'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 71034,'city_name' => 'Kab. Minahasa'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 71042,'city_name' => 'Kab. Sangihe Talaud'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 71726,'city_name' => 'Kota Manado'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 71734,'city_name' => 'Kota Bitung'
            ]);

        /*Sulawesi Tengah*/
        DB::table('MsCity')->insert([
            'city_id' => 72014,'city_name' => 'Luwuk/Banggal'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 72022,'city_name' => 'Kab. Poso'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 72037,'city_name' => 'Kab. Donggala'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 72053,'city_name' => 'Kab. Banggal Kepulauan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 72061,'city_name' => 'Kab. Banggal'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 72084,'city_name' => 'Kab. Toli-toli'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 72092,'city_name' => 'Kab. Morowali'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 72714,'city_name' => 'Kota Palu'
            ]);

        /*Sulawesi Selatan*/
        DB::table('MsCity')->insert([
            'city_id' => 73017,'city_name' => 'Kab. Selayar'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73025,'city_name' => 'Kab. Bulukumbda'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73033,'city_name' => 'Kab. Bantaeng'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73041,'city_name' => 'Kab. Jeneponto'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73056,'city_name' => 'Kab. Takalar'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73064,'city_name' => 'Kab. Gowa'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73072,'city_name' => 'Kab. Sinjai'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73087,'city_name' => 'Kab. Bone'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73095,'city_name' => 'Kab. Maros'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73106,'city_name' => 'Kab. Pangkajene Kepulauan'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73114,'city_name' => 'Kab. Barru'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73122,'city_name' => 'Kab. Soppeng'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73137,'city_name' => 'Kab. Wajo'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73145,'city_name' => 'Kab. Sidenreng Rappang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73153,'city_name' => 'Kab. Pinrang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73161,'city_name' => 'Kab. Enrekang'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73176,'city_name' => 'Kab. Luwu'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73184,'city_name' => 'Kab. Tana Toraja'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73192,'city_name' => 'Kab. Polewali Mamasa'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73203,'city_name' => 'Kab. Majene'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73211,'city_name' => 'Kab. Mamuju'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73226,'city_name' => 'Kab. Luwu Utara'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73717,'city_name' => 'Kota Makassar'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73725,'city_name' => 'Kota Pare - Pare'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 73331,'city_name' => 'Kota Palopo'
            ]);

        /*Sulawesi Tenggara*/
        DB::table('MsCity')->insert([
            'city_id' => 74013,'city_name' => 'Kab. Buton'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 74021,'city_name' => 'Kab. Muna'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 74036,'city_name' => 'Kab. Kendari'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 74044,'city_name' => 'Kab. Kolaka'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 74713,'city_name' => 'Kota Kendari'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 74721,'city_name' => 'Kota Bau - Bau'
            ]);

        /*Maluku*/
        DB::table('MsCity')->insert([
            'city_id' => 81013,'city_name' => 'Kab. Maluku Tenggara'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 81021,'city_name' => 'Kab. Maluku Tengah'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 81052,'city_name' => 'Kab. Buru'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 81067,'city_name' => 'Kab. Malukuteng. Barat'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 81713,'city_name' => 'Kota Ambon'
            ]);

        /*Maluku Utara*/
        DB::table('MsCity')->insert([
            'city_id' => 81044,'city_name' => 'Kab. Maluku Utara'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 81036,'city_name' => 'Kab. Halmahera Tengah'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 81715,'city_name' => 'Kota Ternate'
            ]);

        /*Papua I*/
        DB::table('MsCity')->insert([
            'city_id' => 85011,'city_name' => 'Kab. Jayapura'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 85026,'city_name' => 'Kab. Jayawijaya'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 85034,'city_name' => 'Kab. Puncak Jaya'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 85042,'city_name' => 'Kab. Merauke'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 85711,'city_name' => 'Kota Jayapura'
            ]);

        /*Papua II*/
        DB::table('MsCity')->insert([
            'city_id' => 86014,'city_name' => 'Kab. Biak Numfor'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 86022,'city_name' => 'Kab. Yapen Waropen'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 86037,'city_name' => 'Kab. Mimika'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 86045,'city_name' => 'Kab. Nabire'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 86053,'city_name' => 'Kab. Paniai'
            ]);

        /*Papua Bar.*/
        DB::table('MsCity')->insert([
            'city_id' => 87071,'city_name' => 'Kab. Sorong'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 87025,'city_name' => 'Kab. Manokwari'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 87033,'city_name' => 'Kab. Fak-fak'
            ]);
        DB::table('MsCity')->insert([
            'city_id' => 87717,'city_name' => 'Kota Sorong'
            ]);


    
        
        /*Role*/
        DB::table('MsRole')->insert([
            'role_id' => 1,'role_access' => 'Artist'
            ]);
        DB::table('MsRole')->insert([
            'role_id' => 2,'role_access' => 'Listener'
            ]);
        DB::table('MsRole')->insert([
            'role_id' => 3,'role_access' => 'Admin'
            ]);









    


    
    }
}
