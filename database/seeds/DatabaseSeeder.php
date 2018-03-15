<?php

use Illuminate\Database\Seeder;

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
    	$this->call(OrderDetailsTableSeeder::class);
    }
}

// class OrderDetailsTableSeeder extends Seeder{
// 	public function run() {
// 		DB::table('categories')->insert([
// 			[
// 				'name'=>'Samsung',
// 				'description'=>'Samsung chính hãng',
// 				'parent_id' => 0,

// 			],
// 			[
// 				'name'=>'Sony',
// 				'description'=>'Sony giá rẻ',
// 				'parent_id' => 0,
// 			],
// 			[
// 				'name'=>'HTC',
// 				'description'=>'HTC giá rẻ',
// 				'parent_id' => 0,
// 			],

// 		]);
// 	}
// }
class CustomersTableSeeder extends Seeder{
	public function run() {
		DB::table('customers')->insert([
			[
				'fullname'=>'Võ Duy Phước',
				'email'=>'phuoctk@gmail.com',
				'password'=>bcrypt('123'),
				'phone'=>'01659702912',			
				'avatar'=>'hinh1.jpg',
			],
			[
				'fullname'=>'Võ Duy Nam',
				'email'=>'nam@gmail.com',
				'password'=>bcrypt('123'),
				'phone'=>'01659702912',			
				'avatar'=>'hinh2.jpg',
			],
			[
				'fullname'=>'Võ Duy Tuấn',
				'email'=>'tuan@gmail.com',
				'password'=>bcrypt('123'),
				'phone'=>'01659702912',			
				'avatar'=>'hinh3.jpg',
			],

		]);
	}
}

class OrdersTableSeeder extends Seeder{
	public function run() {
		DB::table('orders')->insert([
			[
				'customer_id'=>'11',
				'order_date'=>'2018-02-28',
				'address'=>'Tam  Kỳ - Quảng Nam',		
			],
			[
				'customer_id'=>'10',
				'order_date'=>'2018-03-28',
				'address'=>'Thăng Bình',		
			],
			[
				'customer_id'=>'11',
				'order_date'=>'2018-02-28',
				'address'=>'Tam  Kỳ - Quảng Nam',		
			],
		]);
	}
}

class OrderDetailsTableSeeder extends Seeder{
	public function run() {
		DB::table('order_details')->insert([
			[
				'order_id'=>'5',
				'product_id'=>'2',
				'qty'=>'2',		
			],
			[
				'order_id'=>'5',
				'product_id'=>'2',
				'qty'=>'2',		
			],
			[
				'order_id'=>'6',
				'product_id'=>'3',
				'qty'=>'2',		
			],
		]);
	}
}

class UsersTableSeeder extends Seeder{
	public function run() {
		DB::table('users')->insert([
			[
				'username'=>'lelai',
				'email'=>'lai@gmai.com',
				'password'=>bcrypt('123456'),	
				'fullname'=>'Lê Văn Lai',		
				'level'=>'1',		
				'avatar'=>'hinh1.jpg',		
				'address'=>'Đà Nẵng - Viêt Nam',		
				'status' => 1,
				'phone'=>'0987665431'

			],

			[
				'username'=>'leloi',
				'email'=>'loi@gmai.com',
				'password'=>bcrypt('123456'),	
				'fullname'=>'Lê Văn Lợi',		
				'level'=>'1',		
				'avatar'=>'hinh1.jpg',		
				'address'=>'Đà Nẵng - Viêt Nam',		
				'status' => 1,
				'phone'=>'0987665431'

			],

			[
				'username'=>'duyphuoc',
				'email'=>'phuoc@gmai.com',
				'password'=>bcrypt('123456'),	
				'fullname'=>'Lê Văn Lai',		
				'level'=>'1',		
				'avatar'=>'hinh1.jpg',		
				'address'=>'Quảng Nam - Viêt Nam',		
				'status' => 1,
				'phone'=>'0987665431'

			],	

		]);
	}
}
class ProductsTableSeeder extends Seeder{
	public function run() {
		DB::table('products')->insert([
			[
				'name'=>'Sam sung 1',
				'price'=>'100000',
				'description'=>'sam sung giá rẻ',		
				'images'=>'hinh1.jpg',		
				'status'=>'1',		
				'discount'=>'10',		
				'buyed'=>'2',		
				'total'=>'20',		
				'cate_id'=>'1',		
				'user_id'=>'1',
				'detail'=>'abc'		
			],	
			[
				'name'=>'Sam sung 2',
				'price'=>'100000',
				'description'=>'sam sung giá rẻ',		
				'images'=>'hinh1.jpg',		
				'status'=>'1',		
				'discount'=>'10',		
				'buyed'=>'2',		
				'total'=>'20',		
				'cate_id'=>'1',		
				'user_id'=>'1',
				'detail'=>'abc'		
			],
			[
				'name'=>'Sam sung 3',
				'price'=>'100000',
				'description'=>'sam sung giá rẻ',		
				'images'=>'hinh1.jpg',		
				'status'=>'1',		
				'discount'=>'10',		
				'buyed'=>'2',		
				'total'=>'20',		
				'cate_id'=>'1',		
				'user_id'=>'1',
				'detail'=>'abc'		
			],	
		]);
	}
}

// class OrdersTableSeeder extends Seeder{
// 	public function run() {
// 		DB::table('orders')->insert([
// 			[
// 				'customer_id'=>'10',
// 				'order_date'=>'2018-03-12',
// 				'address'=>'Tam Kỳ',		
// 			],	
// 			[
// 				'customer_id'=>'10',
// 				'order_date'=>'2018-03-13',
// 				'address'=>'Đà Nẵng',
// 			],
// 			[
// 				'customer_id'=>'10',
// 				'order_date'=>'2018-03-14',
// 				'address'=>'Tam Kỳ',	
// 			],	
// 			[
// 				'customer_id'=>'10',
// 				'order_date'=>'2018-03-15',
// 				'address'=>'Đà Nẵng',	
// 			],	
// 		]);
// 	}
// }

