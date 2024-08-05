<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function Random($arrNameLoad = [])
	{
		return $arrNameLoad[array_rand($arrNameLoad)];
	}

	public function run(): void
	{
		for ($i = 0; $i < 10; $i++) {
			$namePro11 = 'Iphone 11' . $this->Random([' ', ' Pro ', ' Pro Max ', ' Plus ']) . $this->Random([' ', ' 64GB ', ' 128GB ', ' 256GB ', ' 512GB ', ' 1TB ']);

			$imagePro11 = 'iphone_' . rand(1, 30) . '.webp';
	
			DB::table('products')->insert(
				[
					'categories_id' => 1,
					'brands_id' => 1,
					'name' => $namePro11,
					'alias_sp' => Str::slug($namePro11 . rand(0, 990), '-'),
					'price_new' => round(rand(29000000, 33900000) / 100000) * 100000,
					'price_old' => round(rand(10900000, 25900000) / 100000) * 100000,
					'image' => 'iphone_' . rand(1, 30) . '.webp',
					'sub_image' => $imagePro11.",". $imagePro11 ,
					'status' => '1',
					'description' => '<h3><a href="https://cdn.tgdd.vn/Products/Images/42/299033/iphone-15-pro-131023-034959.jpg" onclick="return false;"><img alt="iPhone 15 Pro Max Tổng quan" src="https://cdn.tgdd.vn/Products/Images/42/299033/iphone-15-pro-131023-034959.jpg" /></a></h3>',
					'information_engineering' => '
					<table cellspacing="0" style="border-collapse:collapse">
						<tbody>
							<tr>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:114px">
								<p>M&agrave;n h&igrave;nh:</p>
								</td>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:454px">
								<p>OLED6.7&quot;Super Retina XDR</p>
								</td>
							</tr>
							<tr>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
								<p>Hệ điều h&agrave;nh:</p>
								</td>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:454px">
								<p>iOS 17</p>
								</td>
							</tr>
							<tr>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
								<p>Camera sau:</p>
								</td>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:454px">
								<p>Ch&iacute;nh 48 MP &amp; Phụ 12 MP, 12 MP</p>
								</td>
							</tr>
							<tr>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
								<p>Camera trước:</p>
								</td>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:454px">
								<p>12 MP</p>
								</td>
							</tr>
							<tr>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
								<p>Chip:</p>
								</td>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:454px">
								<p>Apple A17 Pro 6 nh&acirc;n</p>
								</td>
							</tr>
							<tr>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
								<p>RAM:</p>
								</td>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:454px">
								<p>8 GB</p>
								</td>
							</tr>
							<tr>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
								<p>Dung lượng lưu trữ:</p>
								</td>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:454px">
								<p>256 GB</p>
								</td>
							</tr>
							<tr>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
								<p>SIM:</p>
								</td>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:454px">
								<p>1 Nano SIM &amp; 1 eSIMHỗ trợ 5G</p>
								</td>
							</tr>
							<tr>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
								<p>Pin, Sạc:</p>
								</td>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:454px">
								<p>4422 mAh20 W</p>
								</td>
							</tr>
							<tr>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
								<p>H&atilde;ng</p>
								</td>
								<td style="background-color:#f1f1f1; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:454px">
								<p>iPhone (Apple)</p>
								</td>
							</tr>
						</tbody>
					</table>',
				]
			);
		}
	}
}
