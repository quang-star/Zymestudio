<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FileData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // tao 10000 ban ghi bang file
        $fileArray = [];
        for( $i = 0; $i < 10000; $i++ ){
            array_push($fileArray, [
                'filename' => 'filename-' .$i,
                'deadline'=> Carbon::now(),
                'status'=> 1,
                'priority'=> 1,
                'user_id'=> rand(1, 100),
                'synchronize' => 0
            ]);
        }
        // Debug trong Laravel
        // dd($fileArray);
        try{
            // tao 1 yeu cau giao dich voi CSDL
            DB::beginTransaction();
            // khi thao tac cua yeu cau thanh cong thi moi cap nhat du lieu
            DB::table('files')->insert($fileArray);
            // tien hanh xu ly du lieu
            DB::commit();
        }catch(\Exception $e){
            // neu thao tac giao dich voi CSDL that bai
            // tien hanh rollback ve du lieu cu
            DB::rollBack();
            dd($e);
        }
    }
}
