<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Category::factory()->create([
            'name' => 'Elektronic'
        ]);

        Category::factory()->create([
            'name' => 'Makanan'
        ]);

        Category::factory()->create([
            'name' => 'Minuman'
        ]);

        Product::factory()->create([
            'name' => 'Samsung Galaxy A56 5G [8/256]',
            'category_id' => 1,
            'price' => 5999000,
            'stock' => 46,
            'release_year' => 2025,
            'color' => "Light Gray",
            'made_in' => "Indonesia",
            'status' => "Active",
            'image' => "samsung.jpg",
            'description' => "Performance
                            - Exynos 1580 (4nm Octa-core)
                            - RAM: 8GB
                            - Storage: 256GB
                            - Network: 5G

                            Display
                            - Size: 6,7 inch
                            - Technology: Super AMOLED 120Hz (1,200nits)
                            - Resolution: FHD+
                            - Dimension: 162.9 x 78.2 x 7.4 mm
                            - Weight: 195g

                            Camera
                            - Rear Camera Resolution: 50MP + 12MP + 5MP
                            - Main Camera Auto Focus: Yes
                            - Main Camera IOS: Yes
                            - Zoom: Digital Zoom up to 10x
                            - Front Camera Resolution: 12 MP
                            - Front Camera Auto Focus: Yes
                            - Video Resolution: UHD 4K (3840 x 2160) | @30fps

                            Connectivity
                            - USB Interface: Data cable C to C
                            - USB Version: USB 2.1
                            - Bluetooth Version: Bluetooth v5.3

                            Battery
                            - Capacity: 5,000mAh
                            - Charging: 45W Super Fast Charge

                            Awesome Intelligence:
                            - Circle to Search
                            - Object Eraser
                            - Edit Suggestion
                            - Filters
                            - Auto Trim
                            - Best Face
                            - AI Select
                            - Read Aloud",
        ]);
    }
}
