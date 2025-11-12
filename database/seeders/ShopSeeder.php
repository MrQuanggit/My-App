<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ShopSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // Categories
        $menId = DB::table('categories')->insertGetId([
            'name' => 'Men',
            'slug' => 'men',
            'parent_id' => null,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $womenId = DB::table('categories')->insertGetId([
            'name' => 'Women',
            'slug' => 'women',
            'parent_id' => null,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Brand
        $brandId = DB::table('brands')->insertGetId([
            'name' => 'Acme',
            'slug' => 'acme',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Sizes
        $sizeS = DB::table('sizes')->insertGetId(['name' => 'S', 'created_at' => $now, 'updated_at' => $now]);
        $sizeM = DB::table('sizes')->insertGetId(['name' => 'M', 'created_at' => $now, 'updated_at' => $now]);
        $sizeL = DB::table('sizes')->insertGetId(['name' => 'L', 'created_at' => $now, 'updated_at' => $now]);

        // Colors
        $colorBlack = DB::table('colors')->insertGetId(['name' => 'Black', 'hex' => '#000000', 'created_at' => $now, 'updated_at' => $now]);
        $colorWhite = DB::table('colors')->insertGetId(['name' => 'White', 'hex' => '#FFFFFF', 'created_at' => $now, 'updated_at' => $now]);

        // Product
        $productId = DB::table('products')->insertGetId([
            'category_id' => $menId,
            'brand_id' => $brandId,
            'name' => 'Basic Tee',
            'slug' => 'basic-tee',
            'description' => 'A comfortable, everyday t-shirt.',
            'base_price_cents' => 1500,
            'is_active' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Product Variants (S/M/L in Black)
        $variants = [
            ['size_id' => $sizeS, 'color_id' => $colorBlack, 'sku' => 'TEE-BLK-S', 'price_cents' => 1500, 'stock' => 10],
            ['size_id' => $sizeM, 'color_id' => $colorBlack, 'sku' => 'TEE-BLK-M', 'price_cents' => 1500, 'stock' => 12],
            ['size_id' => $sizeL, 'color_id' => $colorBlack, 'sku' => 'TEE-BLK-L', 'price_cents' => 1500, 'stock' => 8],
        ];
        foreach ($variants as $v) {
            DB::table('product_variants')->insert([
                'product_id' => $productId,
                'size_id' => $v['size_id'],
                'color_id' => $v['color_id'],
                'sku' => $v['sku'],
                'price_cents' => $v['price_cents'],
                'stock' => $v['stock'],
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // Images
        DB::table('product_images')->insert([
            ['product_id' => $productId, 'url' => '/images/products/basic-tee/front.jpg', 'sort_order' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['product_id' => $productId, 'url' => '/images/products/basic-tee/back.jpg', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);

        // Optional: Create a simple order for verification
        $user = DB::table('users')->where('email', 'test@example.com')->first();
        $userId = $user->id ?? null;

        $orderNumber = 'ORD-' . now()->format('Ymd') . '-' . Str::upper(Str::random(6));
        $subtotal = 1500;
        $shipping = 500;
        $tax = 0;
        $discount = 0;
        $total = $subtotal + $shipping + $tax - $discount;

        $orderId = DB::table('orders')->insertGetId([
            'user_id' => $userId,
            'number' => $orderNumber,
            'status' => 'pending',
            'subtotal_cents' => $subtotal,
            'discount_cents' => $discount,
            'shipping_cents' => $shipping,
            'tax_cents' => $tax,
            'total_cents' => $total,
            'currency' => 'USD',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('order_items')->insert([
            'order_id' => $orderId,
            'product_id' => $productId,
            'product_variant_id' => DB::table('product_variants')->where('sku', 'TEE-BLK-S')->value('id'),
            'name' => 'Basic Tee',
            'sku' => 'TEE-BLK-S',
            'price_cents' => 1500,
            'quantity' => 1,
            'line_total_cents' => 1500,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Shipping address on the order
        DB::table('addresses')->insert([
            'order_id' => $orderId,
            'user_id' => $userId,
            'type' => 'shipping',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'line1' => '123 Main St',
            'line2' => null,
            'city' => 'Sample City',
            'state' => 'CA',
            'postal_code' => '90001',
            'country' => 'US',
            'phone' => '555-0100',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('users')->insert([
            'email'=>'admin@example.com',
            'name'=>'Admin',
            'password'=>bcrypt('password'),
            'role'=>'admin',
            'is_active'=>1,
        ]);
    }
}
