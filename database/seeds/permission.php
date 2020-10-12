<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class permission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'Quản lí sản phẩm',
            'parent_id'  =>0],

            ['name' => 'Quản lí user',
            'parent_id'  =>0],
            ['name' => 'Quản lí kho tồn',
            'parent_id'  =>0],
            ['name' => 'Quản lí phân quyền',
            'parent_id'  =>0],

            ['name' => 'Thêm hàng hóa đăng',
            'parent_id'  =>1],
            ['name' => 'Sửa hàng hóa đăng',
            'parent_id'  =>1],
            ['name' => 'Xóa hàng hóa đăng',
            'parent_id'  =>1],
            ['name' => 'Xem hàng hóa đăng',
            'parent_id'  =>1],
            ['name' => 'Thêm user',
            'parent_id'  =>2],
            ['name' => 'Sửa user',
            'parent_id'  =>2],
            ['name' => 'Xóa user',
            'parent_id'  =>2],
            ['name' => 'Xem user',
            'parent_id'  =>2],
            ['name' => 'Thêm hàng tồn',
            'parent_id'  =>3],
            ['name' => 'Sửa hàng tồn',
            'parent_id'  =>3],
            ['name' => 'Xóa hàng tồn',
            'parent_id'  =>3],
            ['name' => 'Xem hàng tồn',
            'parent_id'  =>3],
            ['name' => 'Thêm quyền',
            'parent_id'  =>4],
            ['name' => 'Sửa bộ quyền',
            'parent_id'  =>4],
            ['name' => 'Xóa bộ quyền',
            'parent_id'  =>4],
            ['name' => 'Xem bộ quyền',
            'parent_id'  =>4],




        ]);

    }
}
